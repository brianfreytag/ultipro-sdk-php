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
class EmploymentDetailQuery extends PersonnelQuery
{
    /** @var string */
    protected $primaryJobCode;

    /** @var string */
    protected $jobTitle;

    /** @var string */
    protected $fullTimeOrPartTime;

    /** @var string */
    protected $primaryWorkLocationCode;

    /** @var string */
    protected $primaryProjectCode;

    /** @var string */
    protected $deductionGroupCode;

    /** @var string */
    protected $earningGroupCode;

    /** @var string */
    protected $employeeTypeCode;

    /** @var string */
    protected $employeeStatusCode;

    /** @var string */
    protected $employeeNumber;

    /** @var string */
    protected $supervisorId;

    /**
     * @return string
     */
    public function getPrimaryJobCode()
    {
        return $this->primaryJobCode;
    }

    /**
     * @param string $primaryJobCode
     *
     * @return EmploymentDetailQuery
     */
    public function setPrimaryJobCode(string $primaryJobCode)
    {
        $this->primaryJobCode = $primaryJobCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @param string $jobTitle
     *
     * @return EmploymentDetailQuery
     */
    public function setJobTitle(string $jobTitle)
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullTimeOrPartTime()
    {
        return $this->fullTimeOrPartTime;
    }

    /**
     * @param string $fullTimeOrPartTime
     *
     * @return EmploymentDetailQuery
     */
    public function setFullTimeOrPartTime(string $fullTimeOrPartTime)
    {
        $this->fullTimeOrPartTime = $fullTimeOrPartTime;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrimaryWorkLocationCode()
    {
        return $this->primaryWorkLocationCode;
    }

    /**
     * @param string $primaryWorkLocationCode
     *
     * @return EmploymentDetailQuery
     */
    public function setPrimaryWorkLocationCode(string $primaryWorkLocationCode)
    {
        $this->primaryWorkLocationCode = $primaryWorkLocationCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrimaryProjectCode()
    {
        return $this->primaryProjectCode;
    }

    /**
     * @param string $primaryProjectCode
     *
     * @return EmploymentDetailQuery
     */
    public function setPrimaryProjectCode(string $primaryProjectCode)
    {
        $this->primaryProjectCode = $primaryProjectCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeductionGroupCode()
    {
        return $this->deductionGroupCode;
    }

    /**
     * @param string $deductionGroupCode
     *
     * @return EmploymentDetailQuery
     */
    public function setDeductionGroupCode(string $deductionGroupCode)
    {
        $this->deductionGroupCode = $deductionGroupCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getEarningGroupCode()
    {
        return $this->earningGroupCode;
    }

    /**
     * @param string $earningGroupCode
     *
     * @return EmploymentDetailQuery
     */
    public function setEarningGroupCode(string $earningGroupCode)
    {
        $this->earningGroupCode = $earningGroupCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeTypeCode()
    {
        return $this->employeeTypeCode;
    }

    /**
     * @param string $employeeTypeCode
     *
     * @return EmploymentDetailQuery
     */
    public function setEmployeeTypeCode(string $employeeTypeCode)
    {
        $this->employeeTypeCode = $employeeTypeCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeStatusCode()
    {
        return $this->employeeStatusCode;
    }

    /**
     * @param string $employeeStatusCode
     *
     * @return EmploymentDetailQuery
     */
    public function setEmployeeStatusCode(string $employeeStatusCode)
    {
        $this->employeeStatusCode = $employeeStatusCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeNumber()
    {
        return $this->employeeNumber;
    }

    /**
     * @param string $employeeNumber
     *
     * @return EmploymentDetailQuery
     */
    public function setEmployeeNumber(string $employeeNumber)
    {
        $this->employeeNumber = $employeeNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getSupervisorId()
    {
        return $this->supervisorId;
    }

    /**
     * @param string $supervisorId
     *
     * @return EmploymentDetailQuery
     */
    public function setSupervisorId(string $supervisorId)
    {
        $this->supervisorId = $supervisorId;

        return $this;
    }
}
