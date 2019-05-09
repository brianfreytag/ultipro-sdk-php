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
trait PersonnelDetail
{
    /** @var string */
    private $employeeId;

    /** @var string */
    private $companyId;

    /** @var string|null */
    private $personId;

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
     * @return PersonnelDetail
     */
    public function setEmployeeId(string $employeeId)
    {
        $this->employeeId = $employeeId;

        return $this;
    }

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
     * @return PersonnelDetail
     */
    public function setCompanyId(string $companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return string
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @param string $personId
     *
     * @return PersonnelDetail
     */
    public function setPersonId(?string $personId)
    {
        $this->personId = $personId;

        return $this;
    }
}
