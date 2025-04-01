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
class PersonDetailQuery extends PersonnelQuery
{
    /** @var string */
    protected $lastName;

    /** @var string */
    protected $emailAddress;

    /** @var string */
    protected $addressState;

    /** @var string */
    protected $addressCountry;

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return PersonDetailQuery
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     *
     * @return PersonDetailQuery
     */
    public function setEmailAddress(string $emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressState()
    {
        return $this->addressState;
    }

    /**
     * @param string $addressState
     *
     * @return PersonDetailQuery
     */
    public function setAddressState(string $addressState)
    {
        $this->addressState = $addressState;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressCountry()
    {
        return $this->addressCountry;
    }

    /**
     * @param string $addressCountry
     *
     * @return PersonDetailQuery
     */
    public function setAddressCountry(string $addressCountry)
    {
        $this->addressCountry = $addressCountry;

        return $this;
    }
}
