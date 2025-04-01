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
interface RequestInterface
{
    /**
     * @return string
     */
    public function getMethod();

    /**
     * @param string|null $method
     *
     * @return $this
     */
    public function setMethod(?string $method);

    /**
     * @return string
     */
    public function getEndPoint();

    /**
     * @param string $endPoint
     *
     * @return $this
     */
    public function setEndPoint(string $endPoint);

    /**
     * @return Query
     */
    public function getQueryParameters();

    /**
     * @param Query $queryParameters
     *
     * @return $this
     */
    public function setQueryParameters(Query $queryParameters);

    /**
     * @return Query
     */
    public function getPostParameters();

    /**
     * @param Query $postParameters
     *
     * @return Query
     */
    public function setPostParameters(Query $postParameters);
}
