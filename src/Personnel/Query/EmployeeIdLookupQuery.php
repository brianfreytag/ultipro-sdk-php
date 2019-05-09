<?php
/**
 * This file is part of the Ultipro SDK for PHP (Unofficial) Package
 *
 * (c) Brian Freytag
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Ultipro\Personnel\Query;

use Ultipro\Personnel\PersonnelQuery;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class EmployeeIdLookupQuery extends PersonnelQuery
{
    const EMPLOYEE_IDENTIFIER_EMAIL          = 'EmailAddress';
    const EMPLOYEE_IDENTIFIER_EMPLOYEENUMBER = 'EmployeeNumber';
    const EMPLOYEE_IDENTIFIER_SSN            = 'SSN';

    /** @var string */
    protected $employeeIdentifierType = self::EMPLOYEE_IDENTIFIER_EMPLOYEENUMBER;

    /** @var string */
    protected $employeeIdentifierValue;

    /** @var string */
    protected $companyIdentifierType;

    /** @var string */
    protected $companyIdentifierValue;

    /**
     * @return string
     */
    public function getEmployeeIdentifierType()
    {
        return $this->employeeIdentifierType;
    }

    /**
     * @param string $employeeIdentifierType
     *
     * @return $this
     */
    public function setEmployeeIdentifierType(string $employeeIdentifierType)
    {
        $this->employeeIdentifierType = $employeeIdentifierType;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeIdentifierValue()
    {
        return $this->employeeIdentifierValue;
    }

    /**
     * @param string $employeeIdentifierValue
     *
     * @return $this
     */
    public function setEmployeeIdentifierValue(string $employeeIdentifierValue)
    {
        if ($this->getEmployeeIdentifierType() === self::EMPLOYEE_IDENTIFIER_EMPLOYEENUMBER) {
            $employeeIdentifierValue = str_pad($employeeIdentifierValue, 6, "0", STR_PAD_LEFT);
        }

        $this->employeeIdentifierValue = $employeeIdentifierValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyIdentifierType()
    {
        return $this->companyIdentifierType;
    }

    /**
     * @param string $companyIdentifierType
     *
     * @return $this
     */
    public function setCompanyIdentifierType(string $companyIdentifierType)
    {
        $this->companyIdentifierType = $companyIdentifierType;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyIdentifierValue()
    {
        return $this->companyIdentifierValue;
    }

    /**
     * @param string $companyIdentifierValue
     *
     * @return $this
     */
    public function setCompanyIdentifierValue(string $companyIdentifierValue)
    {
        $this->companyIdentifierValue = $companyIdentifierValue;

        return $this;
    }
}
