<?php
/**
 * This file is part of the Ultipro SDK for PHP (Unofficial) Package
 *
 * (c) Brian Freytag
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Ultipro;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class Authentication
{
    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $customerApiKey;

    /**
     * @param string $username
     * @param string $password
     * @param string $customerApiKey
     */
    public function __construct(string $username, string $password, string $customerApiKey)
    {
        $this->username       = $username;
        $this->password       = $password;
        $this->customerApiKey = $customerApiKey;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getCustomerApiKey()
    {
        return $this->customerApiKey;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'auth'    => [
                $this->getUsername(),
                $this->getPassword(),
            ],
            'headers' => [
                Client::HEADER_CUSTOMER_API_KEY => $this->getCustomerApiKey(),
            ]
        ];
    }
}
