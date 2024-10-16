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

use SoapClient;
use SoapFault;
use SoapHeader;
use Psr\Log\LoggerInterface;
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
class UltiproSoapClient
{
    /** @var string */
    private $baseUri;

    /** @var Authentication|array */
    private $auth;

    /** @var LoggerInterface */
    private $logger;

    /** @var array */
    private $options;

    /**
     * @param array|Authentication $auth
     * @param string $baseUri
     * @param array $options
     * @param LoggerInterface|null $logger
     *
     * @throws InvalidArgumentException
     */
    public function __construct($auth, string $baseUri = 'https://service5.ultipro.com/services/BIDataService', array $options = [], LoggerInterface $logger = null)
    {
        $this->setAuthentication($auth);
        $this->baseUri       = $baseUri;
        $this->options       = $options;
        $this->logger        = $logger;
    }

    /**
     * @param array $options
     */
    public function login(array $options = [])
    {
        $headers  = [
            new SoapHeader('http://www.w3.org/2005/08/addressing', 'Action', 'http://www.ultipro.com/dataservices/bidata/2/IBIDataService/LogOn', true),
            new SoapHeader('http://www.w3.org/2005/08/addressing', 'To', $this->getBaseUri() . '/services/BiDataService', true)
        ];
        
        $client = $this->buildClient($this->getBaseUri() . '/services/BIDataService', $this->options);
        
        $client->__setSoapHeaders($headers);

        try {
            $response = $client->LogOn($this->auth);
        } catch (Exception $e) {
            $this->getLogger()->error(
                'There was an error logging into the Ultipro SOAP API',
                [
                    'message'       => $e->getMessage(),
                    'last_request'  => $client->__getLastRequest(),
                    'last_response' => $client->__getLastResponse()
                ]
            );

            return false;
        }

        if (!property_exists($response, 'LogOnResult') || $response->LogOnResult->Status !== 'Ok') {
            $this->getLogger()->error(
                'There was an error logging into the Ultipro SOAP API',
                [
                    'last_request'  => $client->__getLastRequest(),
                    'last_response' => $client->__getLastResponse()
                ]
            );

            return false;
        }

        return $response->LogOnResult;
    }

    /**
     * @param string $baseUri
     * @param array $options
     *
     * @return SoapClient
     */
    protected function buildClient(string $baseUri = 'https://service5.ultipro.com/services/BIDataService', array $options = [])
    {
        $defaultOptions = [
            'soap_version' => SOAP_1_2,
            'trace'        => 1,
            'exceptions'   => 1,
            'cache_wsdl'   => WSDL_CACHE_NONE
        ];

        $options = array_merge($defaultOptions, $options);

        $client = new SoapClient($baseUri, $options);

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

                $types = $reflectionExtractor->getTypes(get_class($responseClass), $property);
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

        $properties = $reflectionExtractor->getProperties(get_class($query));

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
            $link = str_replace($this->getBaseUri(), '', trim($linkHeader['0'], '<>'));
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
            $authenticationArray = $auth->toArray(true);
        } else {
            $this->validateAuthenticationArray($auth);

            $authenticationArray = [
                'logOnRequest' => [
                    'UserName'        => $auth['username'],
                    'Password'        => $auth['password'],
                    'ClientAccessKey' => $auth['customer_api_key'],
                    'UserAccessKey'   => $auth['user_api_key']
                ]
            ];
        }

        $this->auth = $authenticationArray;
    }

    /**
     * @return array
     */
    private function requiredAuthenticationKeys()
    {
        return ['username', 'password', 'customer_api_key', 'user_api_key'];
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}
