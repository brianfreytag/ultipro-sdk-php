<?php
/**
 * This file is part of the Ultipro SDK for PHP (Unofficial) Package
 *
 * (c) Brian Freytag
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code
 */

namespace Ultipro;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use function GuzzleHttp\Psr7\parse_header;
use ReflectionClass;
use ReflectionException;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Ultipro\Exception\ClientException;
use Ultipro\Exception\InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use Ultipro\ResponseInterface as UltiproResponseInterface;
use GuzzleHttp\Exception\GuzzleException;
use Exception;
use DateTime;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class UltiproClient
{
    const HEADER_CUSTOMER_API_KEY = 'US-Customer-Api-Key';

    const CLIENT_TIMEOUT = 2;

    const ENDPOINT_CONFIG_ORG_LEVELS            = '/configuration/v1/org-levels';
    const ENDPOINT_PERSONNEL_PERSON_DETAIL      = '/personnel/v1/person-details';
    const ENDPOINT_PERSONNEL_EMPLOYMENT_DETAIL  = '/personnel/v1/employment-details';
    const ENDPOINT_PERSONNEL_EMPLOYEE_ID_LOOKUP = '/personnel/v1/employee-ids';

    /** @var string */
    private $baseUri;

    /** @var Authentication|array */
    private $auth;

    /** @var Client */
    private $guzzleClient;

    /**
     * @param array|Authentication $auth
     * @param string $baseUri
     * @param array $options
     *
     * @throws InvalidArgumentException
     */
    public function __construct($auth, string $baseUri = 'https://service5.ultipro.com/', array $options = [])
    {
        $this->setAuthentication($auth);
        $this->baseUri      = $baseUri;
        $this->guzzleClient = $this->buildClient($this->baseUri, $options);
    }

    /**
     * @param RequestInterface $request
     * @param bool $parseQueryAsArray
     * @param bool $parsePostAsArray
     *
     * @return mixed|ResponseInterface
     * @throws ClientException
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function get(RequestInterface $request, $parseQueryAsArray = false, $parsePostAsArray = false)
    {
        $options = $this->parseRequest($request, $parseQueryAsArray, $parsePostAsArray);

        try {
            return $this->guzzleClient->request(Request::HTTP_METHOD_GET, $request->getEndPoint(), $options);
        } catch (BadResponseException $badResponseException) {
            $response = $badResponseException->getResponse();

            throw new ClientException(
                (string) $response->getBody()->getContents(),
                $badResponseException->getCode(),
                $badResponseException
            );
        }
    }

    /**
     * @param RequestInterface $request
     * @param bool $parseQueryAsArray
     * @param bool $parsePostAsArray
     *
     * @return mixed|ResponseInterface
     * @throws ClientException
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function post(RequestInterface $request, $parseQueryAsArray = false, $parsePostAsArray = false)
    {
        $options = $this->parseRequest($request, $parseQueryAsArray, $parsePostAsArray);

        try {
            return $this->guzzleClient->request(Request::HTTP_METHOD_POST, $request->getEndPoint(), $options);
        } catch (BadResponseException $badResponseException) {
            $response = $badResponseException->getResponse();

            throw new ClientException(
                (string) $response->getBody()->getContents(),
                $badResponseException->getCode(),
                $badResponseException
            );
        }
    }

    /**
     * @param string $baseUri
     * @param array $options
     *
     * @return Client
     */
    private function buildClient(string $baseUri, array $options = [])
    {
        $defaultOptions = [
            'base_uri'    => $baseUri,
            'auth'        => $this->auth['auth'],
            'headers'     => $this->auth['headers'],
            'http_errors' => true
        ];

        $options = array_merge($defaultOptions, $options);

        $client = new Client($options);

        return $client;
    }

    /**
     * @param ResponseInterface $response
     * @param UltiproResponseInterface $responseObject
     * @param string $dataClass
     *
     * @return UltiproResponseInterface
     * @throws ClientException
     * @throws InvalidArgumentException
     */
    protected function parseResponse(ResponseInterface $response, UltiproResponseInterface $responseObject, $dataClass)
    {
        $reflectionExtractor = new ReflectionExtractor();

        $responseObject->setStatusCode((int) $response->getStatusCode());
        $responseObject->setStatusReason($response->getReasonPhrase());
        $responseObject->setContentType($response->getHeader('Content-Type')[0]);

        if ($response->hasHeader('Link')) {
            $this->parseLinkHeader(parse_header($response->getHeader('Link')), $responseObject);
        }

        if ($responseObject->getStatusCode() !== Response::HTTP_RESPONSE_CODE_OK) {
            throw new ClientException((string) $response->getBody()->getContents(), $responseObject->getStatusCode());
        }

        $responseClasses = [];

        $content = json_decode($response->getBody()->getContents(), true);

        foreach ($content as $detail) {
            $responseClass = new $dataClass();

            foreach ($detail as $property => $value) {
                $methodName = 'set' . ucwords($property);

                if (!method_exists($responseClass, $methodName)) {
                    throw new InvalidArgumentException(
                        sprintf(
                            'The method `%s` does not exist in the `%s` class',
                            $methodName,
                            get_class($responseClass)
                        )
                    );
                }

                $types = $reflectionExtractor->getTypes($responseClass, $property);
                $type  = $types[0];

                if ($value && $type->getBuiltinType() === 'object' && $type->getClassName() === 'DateTime') {
                    try {
                        $value = new DateTime($value);
                    } catch (Exception $exception) {
                        throw new InvalidArgumentException(
                            sprintf(
                                'The value %s is not a valid DateTime on the property %s in %s',
                                $value,
                                $property,
                                get_class($responseClass)
                            )
                        );
                    }
                }

                $responseClass->{$methodName}($value);
            }

            $responseClasses[] = $responseClass;
        }

        $responseObject->setContent($responseClasses);

        return $responseObject;
    }

    /**
     * @param RequestInterface $request
     * @param bool $parseQueryAsArray
     * @param bool $parsePostAsArray
     *
     * @return array
     * @throws InvalidArgumentException
     */
    protected function parseRequest(RequestInterface $request, $parseQueryAsArray = false, $parsePostAsArray = false)
    {
        $queryParameters = $request->getQueryParameters();
        $postParameters  = $request->getPostParameters();

        $requestArray = [];

        if ($queryParameters) {
            $requestArray['query'] = $parseQueryAsArray ? [$this->parseQuery($queryParameters)] : $this->parseQuery($queryParameters);
        }

        if ($request->getMethod() !== Request::HTTP_METHOD_GET) {
            if ($postParameters) {
                $requestArray['json'] = $parsePostAsArray ? [$this->parseQuery($postParameters)] : $this->parseQuery($postParameters);
            }
        }

        return $requestArray;
    }

    /**
     * @param Query $query
     *
     * @return array
     * @throws InvalidArgumentException
     */
    protected function parseQuery(Query $query)
    {
        $queryArray = [];

        $reflectionExtractor = new ReflectionExtractor();

        $properties = $reflectionExtractor->getProperties($query);

        foreach ($properties as $property) {
            $methodName = 'get' . ucwords($property);

            if (!method_exists($query, $methodName)) {
                throw new InvalidArgumentException(
                    sprintf(
                        'The method `%s` does not exist in the `%s` class',
                        $methodName,
                        get_class($query)
                    )
                );
            }

            if ($query->{$methodName}()) {
                $queryArray[$property] = $query->{$methodName}();
            }
        }

        return $queryArray;
    }

    /**
     * @param array $parsedLinkHeader
     * @param UltiproResponseInterface $responseObject
     */
    private function parseLinkHeader(array $parsedLinkHeader, UltiproResponseInterface $responseObject)
    {
        $returnLink = null;

        foreach ($parsedLinkHeader as $linkHeader) {
            $link = str_replace($this->baseUri, '', trim($linkHeader['0'], '<>'));
            $rel   = $linkHeader['rel'];

            switch ($rel) {
                case 'previous':
                    $responseObject->setPreviousPage($link);
                    break;
                case 'next':
                    $responseObject->setNextPage($link);
                    break;
                case 'last':
                    $responseObject->setLastPage($link);
                    break;
                case 'first':
                    $responseObject->setFirstPage($link);
                    break;
            }
        }
    }

    /**
     * @param array $auth
     *
     * @return bool
     * @throws InvalidArgumentException
     */
    private function validateAuthenticationArray($auth)
    {
        if (!is_array($auth)) {
            throw new InvalidArgumentException('The authentication argument must be an array');
        }

        foreach ($this->requiredAuthenticationKeys() as $requiredAuthenticationKey) {
            if (!isset($auth[$requiredAuthenticationKey])) {
                throw new InvalidArgumentException(
                    sprintf('The authentication array is missing the key `%s`', $requiredAuthenticationKey)
                );
            }
        }

        return true;
    }

    /**
     * @param Authentication|array $auth
     *
     * @throws InvalidArgumentException
     */
    private function setAuthentication($auth)
    {
        if ($auth instanceof Authentication) {
            $authenticationArray = $auth->toArray();
        } else {
            $this->validateAuthenticationArray($auth);

            $authenticationArray = [
                'auth'    => [
                    $auth['username'],
                    $auth['password']
                ],
                'headers' => [
                    self::HEADER_CUSTOMER_API_KEY => $auth['customer_api_key']
                ]
            ];
        }

        $this->auth = $authenticationArray;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->guzzleClient;
    }

    /**
     * @param string $prefix
     *
     * @return array
     * @throws ReflectionException
     */
    public function getClientEndpoints($prefix = 'ENDPOINT_')
    {
        $reflector = new ReflectionClass(get_class($this));
        $constants = $reflector->getConstants();

        $values = [];

        foreach ($constants as $constant => $value) {
            if (strpos($constant, $prefix) !== false) {
                $values[] = $value;
            }
        }

        return $values;
    }

    /**
     * @return array
     */
    private function requiredAuthenticationKeys()
    {
        return ['username', 'password', 'customer_api_key'];
    }
}
