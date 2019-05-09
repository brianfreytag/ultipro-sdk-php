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
interface PersonnelDetailInterface
{
    /**
     * @return string
     */
    public function getEmployeeId();

    /**
     * @param string $employeeId
     *
     * @return PersonnelDetail
     */
    public function setEmployeeId(string $employeeId);

    /**
     * @return string
     */
    public function getCompanyId();

    /**
     * @param string $companyId
     *
     * @return PersonnelDetail
     */
    public function setCompanyId(string $companyId);

    /**
     * @return string
     */
    public function getPersonId();

    /**
     * @param string $personId
     *
     * @return PersonnelDetail
     */
    public function setPersonId(string $personId);
}
