<?php
/**
 * This file is part of the Ultipro SDK for PHP (Unofficial) Package
 *
 * (c) Brian Freytag
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Ultipro\Personnel;

use Ultipro\Query;
use Ultipro\Request;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class PersonnelQuery extends Query
{
    /** @var string */
    protected $companyId;

    /** @var string */
    protected $employeeId;

    /**
     * @return string
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param string $companyId
     *
     * @return $this
     */
    public function setCompanyId(string $companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * @param string $employeeId
     *
     * @return $this
     */
    public function setEmployeeId(string $employeeId)
    {
        $this->employeeId = $employeeId;

        return $this;
    }
}
