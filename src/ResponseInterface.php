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
interface ResponseInterface
{
    /**
     * @return int
     */
    public function getStatusCode();

    /**
     * @param int $statusCode
     *
     * @return Response
     */
    public function setStatusCode(int $statusCode);

    /**
     * @return string
     */
    public function getStatusReason();

    /**
     * @param string $statusReason
     *
     * @return Response
     */
    public function setStatusReason(string $statusReason);

    /**
     * @return string
     */
    public function getContentType();

    /**
     * @param string $contentType
     *
     * @return $this
     */
    public function setContentType(string $contentType);

    /**
     * @return null|string
     */
    public function getFirstPage();

    /**
     * @param null|string $firstPage
     *
     * @return $this
     */
    public function setFirstPage(?string $firstPage);

    /**
     * @return null|string
     */
    public function getNextPage();

    /**
     * @param null|string $nextPage
     *
     * @return $this
     */
    public function setNextPage(?string $nextPage);

    /**
     * @return null|string
     */
    public function getPreviousPage();

    /**
     * @param null|string $previousPage
     *
     * @return $this
     */
    public function setPreviousPage(?string $previousPage);

    /**
     * @return null|string
     */
    public function getLastPage();

    /**
     * @param null|string $lastPage
     *
     * @return mixed
     */
    public function setLastPage(?string $lastPage);

    /**
     * @return int
     */
    public function getResultsPerPage();

    /**
     * @param int $resultsPerPage
     *
     * @return $this
     */
    public function setResultsPerPage(int $resultsPerPage);

    /**
     * @return object[]
     */
    public function getContent();

    /**
     * @param array $content
     *
     * @return $this
     */
    public function setContent(array $content);
}
