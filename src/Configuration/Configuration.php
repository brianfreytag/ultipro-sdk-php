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
use Ultipro\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Ultipro\ResponseInterface;
use Ultipro\Exception\ClientException;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class Configuration extends Client
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

    /**
     * @param string $id
     *
     * @throws ClientException
     */
    private static function validateId(string $id)
    {
        if (preg_match('/^[a-zA-Z0-9]+$/', $id)) {
            return;
        }

        throw new ClientException('The identifier must be an alphanumeric string.');
    }

    /**
     * @param array $queryParameters
     *
     * @return array
     */
    private static function validateQueryParameters(array $queryParameters = [])
    {
        $queryParameters = array_merge(['page' => 1, 'perPage' => 500], $queryParameters);

        $queryParameters = array_filter($queryParameters, function ($v, $k) {
            return isset($v) && !empty($v);
        }, ARRAY_FILTER_USE_BOTH);

        return $queryParameters;
    }

    /**
     * @param array $queryParameters
     *
     * @return mixed
     * @throws ClientException
     * @throws GuzzleException
     */
    public function changesByDate(array $queryParameters = [])
    {
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl('/personnel/v1/employee-changes', $queryParameters);
        $req = new Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }

    /**
     * @param array $queryParameters
     *
     * @return array
     * @throws ClientException
     * @throws GuzzleException
     */
    public function compensationDetails(array $queryParameters = []) : array {
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl('/personnel/v1/compensation-details', $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }

    /**
     * @param string $company_id
     * @param array $queryParameters
     *
     * @return array
     * @throws ClientException
     * @throws GuzzleException
     */
    public function compensationDetailsByCompany(string $company_id, array $queryParameters = []) : array {
        self::_validateID($company_id);
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/companies/{$company_id}/compensation-details", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function compensationDetailsByCompanyAndEmployee(string $company_id, string $employee_id, array $queryParameters = []) : array {
        self::_validateID($company_id);
        self::_validateID($employee_id);
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/companies/{$company_id}/employees/{$employee_id}/compensation-details", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function compensationDetailsByEmployee(string $employee_id, array $queryParameters = []) : array {
        self::_validateID($employee_id);
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/compensation-details/{$employee_id}", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function employeeChanges(string $employee_id, array $queryParameters = []) : array {
        self::_validateID($employee_id);
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/employee-changes/{$employee_id}", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function employeeContract(array $queryParameters = []) : array {
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/employee-contract-details", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function employeeEducation(array $queryParameters = []) : array {
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/employee-education", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function employeeGlobalBank(array $queryParameters = []) : array {
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/employee-global-banks", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function employeeGlobalLocalizationElement(array $queryParameters = []) : array {
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/employee-global-localization-elements", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function employeeIDs(array $json_data = []) : array {
        $url = $this->buildUrl("/personnel/v1/employee-ids");
        $req = new \GuzzleHttp\Psr7\Request('POST', $url, [], json_encode($json_data));
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function employeeJobHistoryDetail(array $queryParameters = []) : array {
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/employee-job-history-details", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function employeeJobHistoryDetailEntry(string $system_id, array $queryParameters = []) : array {
        self::_validateID($system_id);
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/employee-job-history-details/{$system_id}", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function employmentDetails(array $queryParameters = []) : array {
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl('/personnel/v1/employment-details', $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function employmentDetailsByCompany(string $company_id, array $queryParameters = []) : array {
        self::_validateID($company_id);
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/companies/{$company_id}/employment-details", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function employmentDetailsByCompanyAndEmployee(string $company_id, string $employee_id, array $queryParameters = []) : array {
        self::_validateID($company_id);
        self::_validateID($employee_id);
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/companies/{$company_id}/employees/{$employee_id}/employment-details", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function nationalDocument(array $queryParameters = []) : array {
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/national-documents", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function personDetails(array $queryParameters = []) : array {
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl('/personnel/v1/person-details', $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function personDetailsByCompany(string $company_id, array $queryParameters = []) : array {
        self::_validateID($company_id);
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/companies/{$company_id}/person-details", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function personDetailsByCompanyAndEmployee(string $company_id, string $employee_id, array $queryParameters = []) : array {
        self::_validateID($company_id);
        self::_validateID($employee_id);
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/companies/{$company_id}/employees/{$employee_id}/person-details", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
    public function personDetailsByEmployee(string $employee_id, array $queryParameters = []) : array {
        self::_validateID($employee_id);
        $queryParameters = self::validateQueryParameters($queryParameters);
        $url = $this->buildUrl("/personnel/v1/person-details/{$employee_id}", $queryParameters);
        $req = new \GuzzleHttp\Psr7\Request('GET', $url);
        $res = $this->sendRequest($req);
        if ($res->getStatusCode() !== 200) {
            throw new ClientException((string) $res->getBody()->getContents(), $res->getStatusCode());
        }
        return json_decode($res->getBody()->getContents(), true);
    }
}
