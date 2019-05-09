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
 *
 * @todo Build out the pagination functionality in UltiproClient::class
 */
class Response implements ResponseInterface
{
    const HTTP_RESPONSE_CODE_OK            = 200;
    const HTTP_RESPONSE_CODE_MULTI_STATUS  = 207;
    const HTTP_RESPONSE_CODE_BAD_REQUEST   = 400;
    const HTTP_RESPONSE_CODE_ERROR         = 500;
    const HTTP_RESPONSE_CODE_FORBIDDEN     = 403;
    const HTTP_RESPONSE_CODE_NOT_FOUND     = 404;
    const HTTP_RESPONSE_CODE_REQUEST_LIMIT = 429;

    /** @var int */
    private $statusCode;

    /** @var string */
    private $statusReason;

    /** @var string */
    private $contentType;

    /** @var int */
    private $page = 1;

    /** @var int */
    private $lastPage;

    /** @var string|null */
    private $nextPage;

    /** @var string|null*/
    private $previousPage;

    /** @var string|null */
    private $firstPage;

    /** @var int */
    private $resultsPerPage = 30;

    /** @var object[] */
    private $content;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     *
     * @return Response
     */
    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatusReason()
    {
        return $this->statusReason;
    }

    /**
     * @param string $statusReason
     *
     * @return Response
     */
    public function setStatusReason(string $statusReason)
    {
        $this->statusReason = $statusReason;

        return $this;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     *
     * @return Response
     */
    public function setContentType(string $contentType)
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getFirstPage()
    {
        return $this->firstPage;
    }

    /**
     * @param null|string $firstPage
     *
     * @return Response
     */
    public function setFirstPage(?string $firstPage)
    {
        $this->firstPage = $firstPage;

        return $this;
    }

    /**
     * @return int
     */
    public function getLastPage()
    {
        return $this->lastPage;
    }

    /**
     * @param string|null $lastPage
     *
     * @return Response
     */
    public function setLastPage(?string $lastPage)
    {
        $this->lastPage = $lastPage;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNextPage()
    {
        return $this->nextPage;
    }

    /**
     * @param null|string $nextPage
     *
     * @return Response
     */
    public function setNextPage(?string $nextPage)
    {
        $this->nextPage = $nextPage;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPreviousPage()
    {
        return $this->previousPage;
    }

    /**
     * @param null|string $previousPage
     *
     * @return Response
     */
    public function setPreviousPage(?string $previousPage)
    {
        $this->previousPage = $previousPage;

        return $this;
    }

    /**
     * @return int
     */
    public function getResultsPerPage()
    {
        return $this->resultsPerPage;
    }

    /**
     * @param int $resultsPerPage
     *
     * @return Response
     */
    public function setResultsPerPage(int $resultsPerPage)
    {
        $this->resultsPerPage = $resultsPerPage;

        return $this;
    }

    /**
     * @return object[]
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param array $content
     *
     * @return $this
     */
    public function setContent(array $content)
    {
        $this->content = $content;

        return $this;
    }
}
