<?php
/**
 * This file is part of the Ultipro SDK for PHP (Unofficial) Package
 *
 * (c) Brian Freytag
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Ultipro\Personnel\Model;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class EmployeeIdLookup
{
    /** @var string */
    private $employeeId;

    /** @var array */
    private $companyIds;

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
     * @return EmployeeIdLookup
     */
    public function setEmployeeId(string $employeeId)
    {
        $this->employeeId = $employeeId;

        return $this;
    }

    /**
     * @return array
     */
    public function getCompanyIds()
    {
        return $this->companyIds;
    }

    /**
     * @param array $companyIds
     *
     * @return EmployeeIdLookup
     */
    public function setCompanyIds(array $companyIds)
    {
        $this->companyIds = $companyIds;

        return $this;
    }
}
