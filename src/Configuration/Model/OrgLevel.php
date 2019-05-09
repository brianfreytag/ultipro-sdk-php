<?php
/**
 * This file is part of the Ultipro SDK for PHP (Unofficial) Package
 *
 * (c) Brian Freytag
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code
 */

namespace Ultipro\Configuration\Model;

/**
 * @author Brian Freytag <brianfreytag@leecontracting.com>
 */
class OrgLevel
{
    /** @var string */
    private $budgetGroup;

    /** @var string */
    private $code;

    /** @var float */
    private $currentYearBudgetFTE;

    /** @var float */
    private $currentYearBudgetSalary;

    /** @var string */
    private $description;

    /** @var string */
    private $glSegment;

    /** @var float */
    private $lastYearBudgetFTE;

    /** @var float */
    private $lastYearBudgetSalary;

    /** @var int */
    private $level;

    /** @var string */
    private $levelDescription;

    /** @var string */
    private $reportingCategory;

    /** @var bool */
    private $isActive;

    /**
     * @return string
     */
    public function getBudgetGroup()
    {
        return $this->budgetGroup;
    }

    /**
     * @param string $budgetGroup
     *
     * @return OrgLevel
     */
    public function setBudgetGroup(string $budgetGroup)
    {
        $this->budgetGroup = $budgetGroup;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return OrgLevel
     */
    public function setCode(string $code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return float
     */
    public function getCurrentYearBudgetFTE()
    {
        return $this->currentYearBudgetFTE;
    }

    /**
     * @param float $currentYearBudgetFTE
     *
     * @return OrgLevel
     */
    public function setCurrentYearBudgetFTE(float $currentYearBudgetFTE)
    {
        $this->currentYearBudgetFTE = $currentYearBudgetFTE;

        return $this;
    }

    /**
     * @return float
     */
    public function getCurrentYearBudgetSalary()
    {
        return $this->currentYearBudgetSalary;
    }

    /**
     * @param float $currentYearBudgetSalary
     *
     * @return OrgLevel
     */
    public function setCurrentYearBudgetSalary(float $currentYearBudgetSalary)
    {
        $this->currentYearBudgetSalary = $currentYearBudgetSalary;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return OrgLevel
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getGlSegment()
    {
        return $this->glSegment;
    }

    /**
     * @param string $glSegment
     *
     * @return OrgLevel
     */
    public function setGlSegment(string $glSegment)
    {
        $this->glSegment = $glSegment;

        return $this;
    }

    /**
     * @return float
     */
    public function getLastYearBudgetFTE()
    {
        return $this->lastYearBudgetFTE;
    }

    /**
     * @param float $lastYearBudgetFTE
     *
     * @return OrgLevel
     */
    public function setLastYearBudgetFTE(float $lastYearBudgetFTE)
    {
        $this->lastYearBudgetFTE = $lastYearBudgetFTE;

        return $this;
    }

    /**
     * @return float
     */
    public function getLastYearBudgetSalary()
    {
        return $this->lastYearBudgetSalary;
    }

    /**
     * @param float $lastYearBudgetSalary
     *
     * @return OrgLevel
     */
    public function setLastYearBudgetSalary(float $lastYearBudgetSalary)
    {
        $this->lastYearBudgetSalary = $lastYearBudgetSalary;

        return $this;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     *
     * @return OrgLevel
     */
    public function setLevel(int $level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return string
     */
    public function getLevelDescription()
    {
        return $this->levelDescription;
    }

    /**
     * @param string $levelDescription
     *
     * @return OrgLevel
     */
    public function setLevelDescription(string $levelDescription)
    {
        $this->levelDescription = $levelDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getReportingCategory()
    {
        return $this->reportingCategory;
    }

    /**
     * @param string $reportingCategory
     *
     * @return OrgLevel
     */
    public function setReportingCategory(string $reportingCategory)
    {
        $this->reportingCategory = $reportingCategory;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     *
     * @return OrgLevel
     */
    public function setIsActive(bool $isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }
}
