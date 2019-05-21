<?php
/**
 * This file is part of the Ultipro SDK for PHP (Unofficial) Package
 *
 * (c) Brian Freytag
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Ultipro;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class Request implements RequestInterface
{
    const HTTP_METHOD_GET    = 'GET';
    const HTTP_METHOD_PUT    = 'PUT';
    const HTTP_METHOD_POST   = 'POST';
    const HTTP_METHOD_PATCH  = 'PATCH';
    const HTTP_METHOD_DELETE = 'DELETE';

    /** @var string|null */
    protected $method;

    /** @var string */
    protected $endPoint;

    /** @var array */
    protected $headers;

    /** @var Query */
    protected $queryParameters;

    /** @var Query */
    protected $postParameters;

    /**
     * @param string $method
     * @param string $endPoint
     */
    public function __construct(string $method = null, string $endPoint = '')
    {
        $this->method   = $method;
        $this->endPoint = $endPoint;
    }

    /**
     * @return null|string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param null|string $method
     *
     * @return Request
     */
    public function setMethod(?string $method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return string
     */
    public function getEndPoint()
    {
        return $this->endPoint;
    }

    /**
     * @param string $endPoint
     *
     * @return Request
     */
    public function setEndPoint(string $endPoint)
    {
        $this->endPoint = $endPoint;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     *
     * @return Request
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return Query
     */
    public function getQueryParameters()
    {
        return $this->queryParameters;
    }

    /**
     * @param Query $queryParameters
     *
     * @return $this
     */
    public function setQueryParameters(Query $queryParameters)
    {
        $this->queryParameters = $queryParameters;

        return $this;
    }

    /**
     * @return Query
     */
    public function getPostParameters()
    {
        return $this->postParameters;
    }

    /**
     * @param Query $postParameters
     *
     * @return $this
     */
    public function setPostParameters(Query $postParameters)
    {
        $this->postParameters = $postParameters;

        return $this;
    }
}
