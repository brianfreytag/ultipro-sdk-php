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
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\UriInterface;
use Ultipro\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
abstract class AbstractClient
{
    const HEADER_CUSTOMER_API_KEY = 'US-Customer-Api-Key';

    const CLIENT_TIMEOUT = 2;

    const ENDPOINT_CONFIG_ORG_LEVELS            = '/configuration/v1/org-levels';
    const ENDPOINT_PERSONNEL_PERSON_DETAIL      = '/personnel/v1/person-details';
    const ENDPOINT_PERSONNEL_EMPLOYMENT_DETAIL  = '/personnel/v1/employment-details';
    const ENDPOINT_PERSONNEL_EMPLOYEE_ID_LOOKUP = '/personnel/v1/employee-ids';

    protected $configuration;

    protected $userAgent;


    public function __construct(array $configuration)
    {
        $this->setConfiguration($configuration);
        $this->setUserAgent();
    }

    /**
     * @param string $path
     * @param array $queryParams
     *
     * @return Uri|UriInterface
     */
    public function buildUrl(string $path, array $queryParams = [])
    {
        $url = new Uri($this->configuration['base_url']);
        $url = $url->withPath($path);

        if (!empty($queryParams)) {
            $url = Uri::withQueryValues($url, $queryParams);
        }

        return $url;
    }

    /**
     * @return Client
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param Request $request
     *
     * @return mixed|ResponseInterface
     * @throws ClientException
     * @throws GuzzleException
     */
    public function sendRequest(Request $request)
    {
        try {
            $guzzle = $this->getUserAgent();

            return $guzzle->send($request);
        } catch (BadResponseException $badResponseException) {
            throw new ClientException(
                (string) $badResponseException->getResponse()->getBody()->getContents(),
                $badResponseException->getCode(),
                $badResponseException
            );
        }
    }

    /**
     * @param array $configuration
     *
     * @throws ClientException
     */
    protected function setConfiguration(array $configuration)
    {
        $default = [
            'customer_api_key' => null,
            'base_url'         => 'https://service5.ultipro.com/',
            'username'         => null,
            'password'         => null
        ];

        $options = array_merge($default, $configuration);

        foreach (['customer_api_key', 'base_url', 'username', 'password'] as $key) {
            if (!isset($options[$key]) || !$options[$key]) {
                throw new ClientException(sprintf('The configuration must contain the key: %s', $key));
            }
        }

        $this->configuration = $options;
    }

    /**
     *
     */
    protected function setUserAgent()
    {
        $this->userAgent = new Client([
            'base_uri' => $this->configuration['base_url'],
            'http_errors' => true,
            'headers' => [
                'DNT' => true,
                'Content-Type' => 'application/json',
                'US-Customer-Api-Key' => $this->configuration['customer_api_key']
            ],
            'auth' => [$this->configuration['username'], $this->configuration['password']]
        ]);
    }
}
