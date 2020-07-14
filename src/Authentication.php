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

    /** @var string */
    private $userApiKey;

    /**
     * @param string $username
     * @param string $password
     * @param string $customerApiKey
     * @param string $userApiKey
     */
    public function __construct(string $username, string $password, string $customerApiKey, ?string $userApiKey = null)
    {
        $this->username       = $username;
        $this->password       = $password;
        $this->customerApiKey = $customerApiKey;
        $this->userApiKey     = $userApiKey;
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
     * @return string
     */
    public function getUserApiKey()
    {
        return $this->userApiKey;
    }

    /**
     * @param boolean $isSoap
     *
     * @return array
     */
    public function toArray(bool $isSoap = false)
    {
        if ($isSoap) {
            return [
                'logOnRequest' => [
                    'UserName'        => $this->getUsername(),
                    'Password'        => $this->getPassword(),
                    'ClientAccessKey' => $this->getCustomerApiKey(),
                    'UserAccessKey'   => $this->getUserApiKey()
                ]
            ];
        }
        return [
            'auth'    => [
                $this->getUsername(),
                $this->getPassword(),
            ],
            'headers' => [
                UltiproClient::HEADER_CUSTOMER_API_KEY => $this->getCustomerApiKey(),
            ]
        ];
    }
}
