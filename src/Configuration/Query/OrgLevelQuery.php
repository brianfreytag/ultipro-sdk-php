<?php
/**
 * This file is part of the Ultipro SDK for PHP (Unofficial) Package
 *
 * (c) Brian Freytag
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code
 */

namespace Ultipro\Configuration\Query;

use Ultipro\Configuration\ConfigurationQuery;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class OrgLevelQuery extends ConfigurationQuery
{
    /** @var string */
    private $levelDescription;

    /** @var string */
    private $code;

    /** @var string */
    private $budgetGroup;

    /** @var string */
    private $reportingCategory;

    /** @var string */
    private $isActive = 'true';

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
     * @return OrgLevelQuery
     */
    public function setLevelDescription(string $levelDescription)
    {
        $this->levelDescription = $levelDescription;

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
     * @return OrgLevelQuery
     */
    public function setCode(string $code)
    {
        $this->code = $code;

        return $this;
    }

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
     * @return OrgLevelQuery
     */
    public function setBudgetGroup(string $budgetGroup)
    {
        $this->budgetGroup = $budgetGroup;

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
     * @return OrgLevelQuery
     */
    public function setReportingCategory(string $reportingCategory)
    {
        $this->reportingCategory = $reportingCategory;

        return $this;
    }

    /**
     * @return string
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param string $isActive
     *
     * @return OrgLevelQuery
     */
    public function setIsActive($isActive)
    {
        if (is_bool($isActive)) {
            $isActive = $isActive ? 'true' : 'false';
        }

        $this->isActive = $isActive;

        return $this;
    }
}
