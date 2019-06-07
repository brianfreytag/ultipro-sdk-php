<?php
/**
 * This file is part of the Ultipro SDK for PHP (Unofficial) Package
 *
 * (c) Brian Freytag
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code
 */

namespace Ultipro;

use Ultipro\Configuration\Configuration;
use Ultipro\Personnel\Personnel;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class Client extends AbstractClient
{
    const HEADER_CUSTOMER_API_KEY = 'US-Customer-Api-Key';

    const CLIENT_TIMEOUT = 2;

    const ENDPOINT_CONFIG_ORG_LEVELS            = '/configuration/v1/org-levels';
    const ENDPOINT_PERSONNEL_PERSON_DETAIL      = '/personnel/v1/person-details';
    const ENDPOINT_PERSONNEL_EMPLOYMENT_DETAIL  = '/personnel/v1/employment-details';
    const ENDPOINT_PERSONNEL_EMPLOYEE_ID_LOOKUP = '/personnel/v1/employee-ids';

    /**
     * @return Configuration
     */
    public function configuration()
    {
        return new Configuration($this->configuration);
    }

    /**
     * @return Personnel
     */
    public function personnel()
    {
        return new Personnel($this->configuration);
    }
}
