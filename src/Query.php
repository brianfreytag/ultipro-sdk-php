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

use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Ultipro\Exception\InvalidArgumentException;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class Query
{
    /** @var int */
    protected $page;

    /** @var int */
    protected $perPage;

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     *
     * @return Query
     */
    public function setPage(int $page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     *
     * @return Query
     */
    public function setPerPage(int $perPage)
    {
        $this->perPage = $perPage;

        return $this;
    }
}
