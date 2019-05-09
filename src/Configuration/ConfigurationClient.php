<?php
/**
 * This file is part of the Ultipro SDK for PHP (Unofficial) Package
 *
 * (c) Brian Freytag
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code
 */

namespace Ultipro\Configuration;

use Ultipro\Configuration\Model\OrgLevel;
use Ultipro\Exception\InvalidArgumentException;
use Ultipro\RequestInterface;
use Ultipro\UltiproClient;
use GuzzleHttp\Exception\GuzzleException;
use Ultipro\ResponseInterface;
use Ultipro\Exception\ClientException;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class ConfigurationClient extends UltiproClient
{
    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     * @throws ClientException
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function getOrgLevels(RequestInterface $request)
    {
        if (!$request->getEndPoint()) {
            $request->setEndPoint(self::ENDPOINT_CONFIG_ORG_LEVELS);
        }

        $guzzleResponse = $this->get($request);

        $configurationResponse = new ConfigurationResponse();

        return $this->parseResponse($guzzleResponse, $configurationResponse, OrgLevel::class);
    }
}
