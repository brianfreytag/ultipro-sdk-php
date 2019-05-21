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

use DateTime;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class EmploymentDetail implements PersonnelDetailInterface
{
    use PersonnelDetail;

    /** @var string|null */
    private $companyCode;

    /** @var string|null */
    private $companyName;

    /** @var string|null */
    private $jobDescription;

    /** @var string|null */
    private $payGroupDescription;

    /** @var string|null */
    private $primaryJobCode;

    /** @var string|null */
    private $orgLevel1Code;

    /** @var string|null */
    private $orgLevel2Code;

    /** @var string|null */
    private $orgLevel3Code;

    /** @var string|null */
    private $orgLevel4Code;

    /** @var DateTime|null */
    private $originalHireDate;

    /** @var DateTime|null */
    private $lastHireDate;

    /** @var string|null */
    private $fullTimeOrPartTimeCode;

    /** @var string|null */
    private $primaryWorkLocationCode;

    /** @var string|null */
    private $languageCode;

    /** @var string|null */
    private $primaryProjectCode;

    /** @var string|null */
    private $workPhoneNumber;

    /** @var string|null */
    private $workPhoneExtension;

    /** @var string|null */
    private $workPhoneCountry;

    /** @var DateTime|null */
    private $dateInJob;

    /** @var DateTime|null */
    private $dateLastWorked;

    /** @var DateTime|null */
    private $dateOfBenefitSeniority;

    /** @var DateTime|null */
    private $dateOfSeniority;

    /** @var string|null */
    private $deductionGroupCode;

    /** @var string|null */
    private $earningGroupCode;

    /** @var string|null */
    private $employeeTypeCode;

    /** @var string|null */
    private $employeeStatusCode;

    /** @var string|null */
    private $employeeNumber;

    /** @var string|null */
    private $jobChangeReasonCode;

    /** @var string|null */
    private $jobTitle;

    /** @var string|null */
    private $leaveReasonCode;

    /** @var string|null */
    private $supervisorID;

    /** @var string|null */
    private $supervisorFirstName;

    /** @var string|null */
    private $supervisorLastName;

    /** @var string|null */
    private $autoAllocate;

    /** @var string|null */
    private $clockCode;

    /** @var DateTime|null */
    private $dateLastPayDatePaid;

    /** @var DateTime|null */
    private $dateOfEarlyRetirement;

    /** @var DateTime|null */
    private $dateOfLocalUnion;

    /** @var DateTime|null */
    private $dateOfNationalUnion;

    /** @var DateTime|null */
    private $dateOfRetirement;

    /** @var DateTime|null */
    private $dateOfSuspension;

    /** @var DateTime|null */
    private $dateOfTermination;

    /** @var DateTime|null */
    private $datePaidThru;

    /** @var DateTime|null */
    private $statusStartDate;

    /** @var string|null */
    private $hireSource;

    /** @var string|null */
    private $isAutoAllocated;

    /** @var string|null */
    private $isAutopaid;

    /** @var string|null */
    private $isMultipleJob;

    /** @var string|null */
    private $jobGroupCode;

    /** @var string|null */
    private $mailstop;

    /** @var string|null */
    private $okToRehire;

    /** @var string|null */
    private $payGroup;

    /** @var string|null */
    private $payPeriod;

    /** @var string|null */
    private $plannedLeaveReason;

    /** @var string|null */
    private $positionCode;

    /** @var string|null */
    private $salaryOrHourly;

    /** @var int|null */
    private $scheduledAnnualHrs = 0;

    /** @var int|null */
    private $scheduledFTE = 0;

    /** @var int|null */
    private $scheduledWorkHrs = 0;

    /** @var string|null */
    private $shift;

    /** @var string|null */
    private $shiftGroup;

    /** @var string|null */
    private $termReason;

    /** @var string|null */
    private $terminationReasonDescription;

    /** @var string|null */
    private $termType;

    /** @var string|null */
    private $timeclockID;

    /** @var string|null */
    private $unionLocal;

    /** @var string|null */
    private $unionNational;

    /** @var string|null */
    private $weeklyHours = 0;

    /** @var DateTime|null */
    private $dateTimeCreated;

    /** @var DateTime|null */
    private $dateTimeChanged;

    /**
     * @return null|string
     */
    public function getCompanyCode()
    {
        return $this->companyCode;
    }

    /**
     * @param null|string $companyCode
     *
     * @return EmploymentDetail
     */
    public function setCompanyCode(?string $companyCode)
    {
        $this->companyCode = $companyCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param null|string $companyName
     *
     * @return EmploymentDetail
     */
    public function setCompanyName(?string $companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getJobDescription()
    {
        return $this->jobDescription;
    }

    /**
     * @param null|string $jobDescription
     *
     * @return EmploymentDetail
     */
    public function setJobDescription(?string $jobDescription)
    {
        $this->jobDescription = $jobDescription;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPayGroupDescription()
    {
        return $this->payGroupDescription;
    }

    /**
     * @param null|string $payGroupDescription
     *
     * @return EmploymentDetail
     */
    public function setPayGroupDescription(?string $payGroupDescription)
    {
        $this->payGroupDescription = $payGroupDescription;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPrimaryJobCode()
    {
        return $this->primaryJobCode;
    }

    /**
     * @param null|string $primaryJobCode
     *
     * @return EmploymentDetail
     */
    public function setPrimaryJobCode(?string $primaryJobCode)
    {
        $this->primaryJobCode = $primaryJobCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOrgLevel1Code()
    {
        return $this->orgLevel1Code;
    }

    /**
     * @param null|string $orgLevel1Code
     *
     * @return EmploymentDetail
     */
    public function setOrgLevel1Code(?string $orgLevel1Code)
    {
        $this->orgLevel1Code = $orgLevel1Code;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOrgLevel2Code()
    {
        return $this->orgLevel2Code;
    }

    /**
     * @param null|string $orgLevel2Code
     *
     * @return EmploymentDetail
     */
    public function setOrgLevel2Code(?string $orgLevel2Code)
    {
        $this->orgLevel2Code = $orgLevel2Code;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOrgLevel3Code()
    {
        return $this->orgLevel3Code;
    }

    /**
     * @param null|string $orgLevel3Code
     *
     * @return EmploymentDetail
     */
    public function setOrgLevel3Code(?string $orgLevel3Code)
    {
        $this->orgLevel3Code = $orgLevel3Code;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOrgLevel4Code()
    {
        return $this->orgLevel4Code;
    }

    /**
     * @param null|string $orgLevel4Code
     *
     * @return EmploymentDetail
     */
    public function setOrgLevel4Code(?string $orgLevel4Code)
    {
        $this->orgLevel4Code = $orgLevel4Code;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getOriginalHireDate()
    {
        return $this->originalHireDate;
    }

    /**
     * @param DateTime|null $originalHireDate
     *
     * @return EmploymentDetail
     */
    public function setOriginalHireDate(?DateTime $originalHireDate)
    {
        $this->originalHireDate = $originalHireDate;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getLastHireDate()
    {
        return $this->lastHireDate;
    }

    /**
     * @param DateTime|null $lastHireDate
     *
     * @return EmploymentDetail
     */
    public function setLastHireDate(?DateTime $lastHireDate)
    {
        $this->lastHireDate = $lastHireDate;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getFullTimeOrPartTimeCode()
    {
        return $this->fullTimeOrPartTimeCode;
    }

    /**
     * @param null|string $fullTimeOrPartTimeCode
     *
     * @return EmploymentDetail
     */
    public function setFullTimeOrPartTimeCode(?string $fullTimeOrPartTimeCode)
    {
        $this->fullTimeOrPartTimeCode = $fullTimeOrPartTimeCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPrimaryWorkLocationCode()
    {
        return $this->primaryWorkLocationCode;
    }

    /**
     * @param null|string $primaryWorkLocationCode
     *
     * @return EmploymentDetail
     */
    public function setPrimaryWorkLocationCode(?string $primaryWorkLocationCode)
    {
        $this->primaryWorkLocationCode = $primaryWorkLocationCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * @param null|string $languageCode
     *
     * @return EmploymentDetail
     */
    public function setLanguageCode(?string $languageCode)
    {
        $this->languageCode = $languageCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPrimaryProjectCode()
    {
        return $this->primaryProjectCode;
    }

    /**
     * @param null|string $primaryProjectCode
     *
     * @return EmploymentDetail
     */
    public function setPrimaryProjectCode(?string $primaryProjectCode)
    {
        $this->primaryProjectCode = $primaryProjectCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getWorkPhoneNumber()
    {
        return $this->workPhoneNumber;
    }

    /**
     * @param null|string $workPhoneNumber
     *
     * @return EmploymentDetail
     */
    public function setWorkPhoneNumber(?string $workPhoneNumber)
    {
        $this->workPhoneNumber = $workPhoneNumber;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getWorkPhoneExtension()
    {
        return $this->workPhoneExtension;
    }

    /**
     * @param null|string $workPhoneExtension
     *
     * @return EmploymentDetail
     */
    public function setWorkPhoneExtension(?string $workPhoneExtension)
    {
        $this->workPhoneExtension = $workPhoneExtension;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getWorkPhoneCountry()
    {
        return $this->workPhoneCountry;
    }

    /**
     * @param null|string $workPhoneCountry
     *
     * @return EmploymentDetail
     */
    public function setWorkPhoneCountry(?string $workPhoneCountry)
    {
        $this->workPhoneCountry = $workPhoneCountry;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateInJob()
    {
        return $this->dateInJob;
    }

    /**
     * @param DateTime|null $dateInJob
     *
     * @return EmploymentDetail
     */
    public function setDateInJob(?DateTime $dateInJob)
    {
        $this->dateInJob = $dateInJob;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateLastWorked()
    {
        return $this->dateLastWorked;
    }

    /**
     * @param DateTime|null $dateLastWorked
     *
     * @return EmploymentDetail
     */
    public function setDateLastWorked(?DateTime $dateLastWorked)
    {
        $this->dateLastWorked = $dateLastWorked;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfBenefitSeniority()
    {
        return $this->dateOfBenefitSeniority;
    }

    /**
     * @param DateTime|null $dateOfBenefitSeniority
     *
     * @return EmploymentDetail
     */
    public function setDateOfBenefitSeniority(?DateTime $dateOfBenefitSeniority)
    {
        $this->dateOfBenefitSeniority = $dateOfBenefitSeniority;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfSeniority()
    {
        return $this->dateOfSeniority;
    }

    /**
     * @param DateTime|null $dateOfSeniority
     *
     * @return EmploymentDetail
     */
    public function setDateOfSeniority(?DateTime $dateOfSeniority)
    {
        $this->dateOfSeniority = $dateOfSeniority;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDeductionGroupCode()
    {
        return $this->deductionGroupCode;
    }

    /**
     * @param null|string $deductionGroupCode
     *
     * @return EmploymentDetail
     */
    public function setDeductionGroupCode(?string $deductionGroupCode)
    {
        $this->deductionGroupCode = $deductionGroupCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEarningGroupCode()
    {
        return $this->earningGroupCode;
    }

    /**
     * @param null|string $earningGroupCode
     *
     * @return EmploymentDetail
     */
    public function setEarningGroupCode(?string $earningGroupCode)
    {
        $this->earningGroupCode = $earningGroupCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmployeeTypeCode()
    {
        return $this->employeeTypeCode;
    }

    /**
     * @param null|string $employeeTypeCode
     *
     * @return EmploymentDetail
     */
    public function setEmployeeTypeCode(?string $employeeTypeCode)
    {
        $this->employeeTypeCode = $employeeTypeCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmployeeStatusCode()
    {
        return $this->employeeStatusCode;
    }

    /**
     * @param null|string $employeeStatusCode
     *
     * @return EmploymentDetail
     */
    public function setEmployeeStatusCode(?string $employeeStatusCode)
    {
        $this->employeeStatusCode = $employeeStatusCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmployeeNumber()
    {
        return $this->employeeNumber;
    }

    /**
     * @param null|string $employeeNumber
     *
     * @return EmploymentDetail
     */
    public function setEmployeeNumber(?string $employeeNumber)
    {
        $this->employeeNumber = $employeeNumber;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getJobChangeReasonCode()
    {
        return $this->jobChangeReasonCode;
    }

    /**
     * @param null|string $jobChangeReasonCode
     *
     * @return EmploymentDetail
     */
    public function setJobChangeReasonCode(?string $jobChangeReasonCode)
    {
        $this->jobChangeReasonCode = $jobChangeReasonCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @param null|string $jobTitle
     *
     * @return EmploymentDetail
     */
    public function setJobTitle(?string $jobTitle)
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLeaveReasonCode()
    {
        return $this->leaveReasonCode;
    }

    /**
     * @param null|string $leaveReasonCode
     *
     * @return EmploymentDetail
     */
    public function setLeaveReasonCode(?string $leaveReasonCode)
    {
        $this->leaveReasonCode = $leaveReasonCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSupervisorID()
    {
        return $this->supervisorID;
    }

    /**
     * @param null|string $supervisorID
     *
     * @return EmploymentDetail
     */
    public function setSupervisorID(?string $supervisorID)
    {
        $this->supervisorID = $supervisorID;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSupervisorFirstName()
    {
        return $this->supervisorFirstName;
    }

    /**
     * @param null|string $supervisorFirstName
     *
     * @return EmploymentDetail
     */
    public function setSupervisorFirstName(?string $supervisorFirstName)
    {
        $this->supervisorFirstName = $supervisorFirstName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSupervisorLastName()
    {
        return $this->supervisorLastName;
    }

    /**
     * @param null|string $supervisorLastName
     *
     * @return EmploymentDetail
     */
    public function setSupervisorLastName(?string $supervisorLastName)
    {
        $this->supervisorLastName = $supervisorLastName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAutoAllocate()
    {
        return $this->autoAllocate;
    }

    /**
     * @param null|string $autoAllocate
     *
     * @return EmploymentDetail
     */
    public function setAutoAllocate(?string $autoAllocate)
    {
        $this->autoAllocate = $autoAllocate;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getClockCode()
    {
        return $this->clockCode;
    }

    /**
     * @param null|string $clockCode
     *
     * @return EmploymentDetail
     */
    public function setClockCode(?string $clockCode)
    {
        $this->clockCode = $clockCode;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateLastPayDatePaid()
    {
        return $this->dateLastPayDatePaid;
    }

    /**
     * @param DateTime|null $dateLastPayDatePaid
     *
     * @return EmploymentDetail
     */
    public function setDateLastPayDatePaid(?DateTime $dateLastPayDatePaid)
    {
        $this->dateLastPayDatePaid = $dateLastPayDatePaid;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfEarlyRetirement()
    {
        return $this->dateOfEarlyRetirement;
    }

    /**
     * @param DateTime|null $dateOfEarlyRetirement
     *
     * @return EmploymentDetail
     */
    public function setDateOfEarlyRetirement(?DateTime $dateOfEarlyRetirement)
    {
        $this->dateOfEarlyRetirement = $dateOfEarlyRetirement;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfLocalUnion()
    {
        return $this->dateOfLocalUnion;
    }

    /**
     * @param DateTime|null $dateOfLocalUnion
     *
     * @return EmploymentDetail
     */
    public function setDateOfLocalUnion(?DateTime $dateOfLocalUnion)
    {
        $this->dateOfLocalUnion = $dateOfLocalUnion;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfNationalUnion()
    {
        return $this->dateOfNationalUnion;
    }

    /**
     * @param DateTime|null $dateOfNationalUnion
     *
     * @return EmploymentDetail
     */
    public function setDateOfNationalUnion(?DateTime $dateOfNationalUnion)
    {
        $this->dateOfNationalUnion = $dateOfNationalUnion;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfRetirement()
    {
        return $this->dateOfRetirement;
    }

    /**
     * @param DateTime|null $dateOfRetirement
     *
     * @return EmploymentDetail
     */
    public function setDateOfRetirement(?DateTime $dateOfRetirement)
    {
        $this->dateOfRetirement = $dateOfRetirement;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfSuspension()
    {
        return $this->dateOfSuspension;
    }

    /**
     * @param DateTime|null $dateOfSuspension
     *
     * @return EmploymentDetail
     */
    public function setDateOfSuspension(?DateTime $dateOfSuspension)
    {
        $this->dateOfSuspension = $dateOfSuspension;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfTermination()
    {
        return $this->dateOfTermination;
    }

    /**
     * @param DateTime|null $dateOfTermination
     *
     * @return EmploymentDetail
     */
    public function setDateOfTermination(?DateTime $dateOfTermination)
    {
        $this->dateOfTermination = $dateOfTermination;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDatePaidThru()
    {
        return $this->datePaidThru;
    }

    /**
     * @param DateTime|null $datePaidThru
     *
     * @return EmploymentDetail
     */
    public function setDatePaidThru(?DateTime $datePaidThru)
    {
        $this->datePaidThru = $datePaidThru;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getStatusStartDate()
    {
        return $this->statusStartDate;
    }

    /**
     * @param DateTime|null $statusStartDate
     *
     * @return EmploymentDetail
     */
    public function setStatusStartDate(?DateTime $statusStartDate)
    {
        $this->statusStartDate = $statusStartDate;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getHireSource()
    {
        return $this->hireSource;
    }

    /**
     * @param null|string $hireSource
     *
     * @return EmploymentDetail
     */
    public function setHireSource(?string $hireSource)
    {
        $this->hireSource = $hireSource;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getIsAutoAllocated()
    {
        return $this->isAutoAllocated;
    }

    /**
     * @param null|string $isAutoAllocated
     *
     * @return EmploymentDetail
     */
    public function setIsAutoAllocated(?string $isAutoAllocated)
    {
        $this->isAutoAllocated = $isAutoAllocated;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getIsAutopaid()
    {
        return $this->isAutopaid;
    }

    /**
     * @param null|string $isAutopaid
     *
     * @return EmploymentDetail
     */
    public function setIsAutopaid(?string $isAutopaid)
    {
        $this->isAutopaid = $isAutopaid;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getIsMultipleJob()
    {
        return $this->isMultipleJob;
    }

    /**
     * @param null|string $isMultipleJob
     *
     * @return EmploymentDetail
     */
    public function setIsMultipleJob(?string $isMultipleJob)
    {
        $this->isMultipleJob = $isMultipleJob;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getJobGroupCode()
    {
        return $this->jobGroupCode;
    }

    /**
     * @param null|string $jobGroupCode
     *
     * @return EmploymentDetail
     */
    public function setJobGroupCode(?string $jobGroupCode)
    {
        $this->jobGroupCode = $jobGroupCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getMailstop()
    {
        return $this->mailstop;
    }

    /**
     * @param null|string $mailstop
     *
     * @return EmploymentDetail
     */
    public function setMailstop(?string $mailstop)
    {
        $this->mailstop = $mailstop;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOkToRehire()
    {
        return $this->okToRehire;
    }

    /**
     * @param null|string $okToRehire
     *
     * @return EmploymentDetail
     */
    public function setOkToRehire(?string $okToRehire)
    {
        $this->okToRehire = $okToRehire;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPayGroup()
    {
        return $this->payGroup;
    }

    /**
     * @param null|string $payGroup
     *
     * @return EmploymentDetail
     */
    public function setPayGroup(?string $payGroup)
    {
        $this->payGroup = $payGroup;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPayPeriod()
    {
        return $this->payPeriod;
    }

    /**
     * @param null|string $payPeriod
     *
     * @return EmploymentDetail
     */
    public function setPayPeriod(?string $payPeriod)
    {
        $this->payPeriod = $payPeriod;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPlannedLeaveReason()
    {
        return $this->plannedLeaveReason;
    }

    /**
     * @param null|string $plannedLeaveReason
     *
     * @return EmploymentDetail
     */
    public function setPlannedLeaveReason(?string $plannedLeaveReason)
    {
        $this->plannedLeaveReason = $plannedLeaveReason;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPositionCode()
    {
        return $this->positionCode;
    }

    /**
     * @param null|string $positionCode
     *
     * @return EmploymentDetail
     */
    public function setPositionCode(?string $positionCode)
    {
        $this->positionCode = $positionCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSalaryOrHourly()
    {
        return $this->salaryOrHourly;
    }

    /**
     * @param null|string $salaryOrHourly
     *
     * @return EmploymentDetail
     */
    public function setSalaryOrHourly(?string $salaryOrHourly)
    {
        $this->salaryOrHourly = $salaryOrHourly;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getScheduledAnnualHrs()
    {
        return $this->scheduledAnnualHrs;
    }

    /**
     * @param int|null $scheduledAnnualHrs
     *
     * @return EmploymentDetail
     */
    public function setScheduledAnnualHrs(?int $scheduledAnnualHrs)
    {
        $this->scheduledAnnualHrs = $scheduledAnnualHrs;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getScheduledFTE()
    {
        return $this->scheduledFTE;
    }

    /**
     * @param int|null $scheduledFTE
     *
     * @return EmploymentDetail
     */
    public function setScheduledFTE(?int $scheduledFTE)
    {
        $this->scheduledFTE = $scheduledFTE;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getScheduledWorkHrs()
    {
        return $this->scheduledWorkHrs;
    }

    /**
     * @param int|null $scheduledWorkHrs
     *
     * @return EmploymentDetail
     */
    public function setScheduledWorkHrs(?int $scheduledWorkHrs)
    {
        $this->scheduledWorkHrs = $scheduledWorkHrs;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getShift()
    {
        return $this->shift;
    }

    /**
     * @param null|string $shift
     *
     * @return EmploymentDetail
     */
    public function setShift(?string $shift)
    {
        $this->shift = $shift;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getShiftGroup()
    {
        return $this->shiftGroup;
    }

    /**
     * @param null|string $shiftGroup
     *
     * @return EmploymentDetail
     */
    public function setShiftGroup(?string $shiftGroup)
    {
        $this->shiftGroup = $shiftGroup;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTermReason()
    {
        return $this->termReason;
    }

    /**
     * @param null|string $termReason
     *
     * @return EmploymentDetail
     */
    public function setTermReason(?string $termReason)
    {
        $this->termReason = $termReason;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTerminationReasonDescription()
    {
        return $this->terminationReasonDescription;
    }

    /**
     * @param null|string $terminationReasonDescription
     *
     * @return EmploymentDetail
     */
    public function setTerminationReasonDescription(?string $terminationReasonDescription)
    {
        $this->terminationReasonDescription = $terminationReasonDescription;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTermType()
    {
        return $this->termType;
    }

    /**
     * @param null|string $termType
     *
     * @return EmploymentDetail
     */
    public function setTermType(?string $termType)
    {
        $this->termType = $termType;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTimeclockID()
    {
        return $this->timeclockID;
    }

    /**
     * @param null|string $timeclockID
     *
     * @return EmploymentDetail
     */
    public function setTimeclockID(?string $timeclockID)
    {
        $this->timeclockID = $timeclockID;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUnionLocal()
    {
        return $this->unionLocal;
    }

    /**
     * @param null|string $unionLocal
     *
     * @return EmploymentDetail
     */
    public function setUnionLocal(?string $unionLocal)
    {
        $this->unionLocal = $unionLocal;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUnionNational()
    {
        return $this->unionNational;
    }

    /**
     * @param null|string $unionNational
     *
     * @return EmploymentDetail
     */
    public function setUnionNational(?string $unionNational)
    {
        $this->unionNational = $unionNational;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getWeeklyHours()
    {
        return $this->weeklyHours;
    }

    /**
     * @param null|string $weeklyHours
     *
     * @return EmploymentDetail
     */
    public function setWeeklyHours(?string $weeklyHours)
    {
        $this->weeklyHours = $weeklyHours;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateTimeCreated()
    {
        return $this->dateTimeCreated;
    }

    /**
     * @param DateTime|null $dateTimeCreated
     *
     * @return EmploymentDetail
     */
    public function setDateTimeCreated(?DateTime $dateTimeCreated)
    {
        $this->dateTimeCreated = $dateTimeCreated;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateTimeChanged()
    {
        return $this->dateTimeChanged;
    }

    /**
     * @param DateTime|null $dateTimeChanged
     *
     * @return EmploymentDetail
     */
    public function setDateTimeChanged(?DateTime $dateTimeChanged)
    {
        $this->dateTimeChanged = $dateTimeChanged;

        return $this;
    }
}
