<?php
/**
 * This file is part of the Ultipro SDK for PHP (Unofficial) Package
 *
 * (c) Brian Freytag
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code
 */

namespace Ultipro\ReportsAsService;

use Ultipro\Configuration\Model\OrgLevel;
use Ultipro\Exception\InvalidArgumentException;
use Ultipro\Exception\ClientException;
use Ultipro\UltiproSoapClient;
use SoapHeader;
use Exception;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class ReportClient extends UltiproSoapClient
{
    /**
     * @return mixed
     *
     * @throws ClientException
     * @throws \SoapFault
     */
    public function getReportList()
    {
        try {
            $logonResponse = $this->login();

            $client = $this->buildClient($this->getBaseUri() . '/services/BIDataService', $this->getOptions());

            $headers = [
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'Action', 'http://www.ultipro.com/dataservices/bidata/2/IBIDataService/GetReportList', true),
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'To', $this->getBaseUri() . '/services/BiDataService', true)
            ];

            $client->__setSoapHeaders($headers);

            $response = $client->GetReportList([
                'context' => [
                    'ServiceId'       => $logonResponse->ServiceId,
                    'ClientAccessKey' => $logonResponse->ClientAccessKey,
                    'Token'           => $logonResponse->Token,
                    'Status'          => $logonResponse->Status,
                    'InstanceKey'     => $logonResponse->InstanceKey,
                ]
            ]);
        } catch (Exception $e) {
            throw new ClientException(
                'There was an error grabbing the Reports List from the Ultipro SOAP API',
                $e->getCode(),
                $e
            );
        }

        if (!property_exists($response, 'GetReportListResult') || $response->GetReportListResult->Status !== 'Success') {
            throw new ClientException('There was an error grabbing the Reports List from the Ultipro SOAP API');
        }

        return $response->GetReportListResult->Reports->Report;
    }

    /**
     * @param string $report
     *
     * @return mixed
     * @throws ClientException
     */
    public function getReportParameters(string $report)
    {
        try {
            $logonResponse = $this->login();

            $client = $this->buildClient($this->getBaseUri() . '/services/BIDataService', $this->getOptions());

            $headers = [
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'Action', 'http://www.ultipro.com/dataservices/bidata/2/IBIDataService/GetReportParameters', true),
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'To', $this->getBaseUri() . '/services/BiDataService', true)
            ];

            $client->__setSoapHeaders($headers);

            $response = $client->GetReportParameters([
                'reportPath' => $report,
                'context'    => [
                    'ServiceId'       => $logonResponse->ServiceId,
                    'ClientAccessKey' => $logonResponse->ClientAccessKey,
                    'Token'           => $logonResponse->Token,
                    'Status'          => $logonResponse->Status,
                    'InstanceKey'     => $logonResponse->InstanceKey,
                ]
            ]);

            $lastRequest = $client->__getLastRequest();
        } catch (Exception $e) {
            throw new ClientException(
                'There was an error grabbing the Report Parameters from the Ultipro SOAP API',
                $e->getCode(),
                $e
            );
        }

        if (!property_exists($response, 'GetReportParametersResult') || $response->GetReportParametersResult->Status !== 'Success') {
            throw new ClientException('There was an error grabbing the Report Parameters from the Ultipro SOAP API');
        }

        return $response->GetReportParametersResult->ReportParameters;
    }

    /**
     * @param string $report
     * @param array $parameters
     * @param bool $toArray
     *
     * @return array|bool
     */
    public function getReport(string $report, array $parameters = [], bool $toArray = true)
    {
        $executeResponse = $this->executeReport($report, $parameters);

        if (!$executeResponse) {
            return false;
        }

        return $this->retrieveReport($executeResponse, $toArray);
    }

    /**
     * @param string $report
     * @param array $parameters
     *
     * @return mixed
     * @throws ClientException
     */
    public function executeReport(string $report, array $parameters = [])
    {
        try {
            $logonResponse = $this->login();

            $client = $this->buildClient($this->getBaseUri() . '/services/BiDataService', ['US-DELIMITER' => ',']);

            $headers = [
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'Action', 'http://www.ultipro.com/dataservices/bidata/2/IBIDataService/ExecuteReport', true),
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'To', $this->getBaseUri() . '/services/BiDataService', true)
            ];

            $client->__setSoapHeaders($headers);

            $response = $client->ExecuteReport([
                'request' => [
                    'ReportPath'       => $report,
                    'ReportParameters' => $parameters,
                ],
                'context' => [
                    'ServiceId'       => $logonResponse->ServiceId,
                    'ClientAccessKey' => $logonResponse->ClientAccessKey,
                    'Token'           => $logonResponse->Token,
                    'Status'          => $logonResponse->Status,
                    'InstanceKey'     => $logonResponse->InstanceKey,
                ]
            ]);
        } catch (Exception $e) {
            throw new ClientException(
                'There was an error executing the Report from the Ultipro SOAP API',
                $e->getCode(),
                $e
            );
        }

        if (
            !property_exists($response, 'ExecuteReportResult') ||
            $response->ExecuteReportResult->Status !== 'Success' ||
            $response->ExecuteReportResult->ReportKey === null ||
            $response->ExecuteReportResult->ReportRetrievalUri === null
        ) {
            throw new ClientException('There was an error executing the Report from the Ultipro SOAP API');
        }

        return $response->ExecuteReportResult;
    }

    /**
     * @param $executeResponse
     * @param bool $toArray
     *
     * @return array
     * @throws ClientException
     */
    public function retrieveReport($executeResponse, bool $toArray = true)
    {
        $reportOutput = [];

        try {
            $logonResponse = $this->login();

            $reportClient = $this->buildClient($executeResponse->ReportRetrievalUri);

            $reportResponseHeader = [
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'Action', 'http://www.ultipro.com/dataservices/bistream/2/IBIStreamService/RetrieveReport', true),
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'To', $this->getBaseUri() . '/services/BIStreamingService', true),
                new SoapHeader('http://www.ultipro.com/dataservices/bistream/2', 'ReportKey', $executeResponse->ReportKey)
            ];

            $reportClient->__setSoapHeaders($reportResponseHeader);

            $reportStatus = $reportClient->RetrieveReport([
                'request' => [
                    'ReportKey' => $executeResponse->ReportKey
                ],
                'context' => [
                    'ServiceId'       => $logonResponse->ServiceId,
                    'ClientAccessKey' => $logonResponse->ClientAccessKey,
                    'Token'           => $logonResponse->Token,
                    'Status'          => $logonResponse->Status,
                    'InstanceKey'     => $logonResponse->InstanceKey,
                ]
            ]);
        } catch (Exception $e) {
            return $reportOutput;
        }

        if (!$toArray) {
            return $reportStatus->ReportStream;
        }

        $xmlDocument = simplexml_load_string($reportStatus->ReportStream);

        if ($xmlDocument === false) {
            return [];
        }

        $jsonEncodedData = json_encode($xmlDocument);
        $reportArray     = json_decode($jsonEncodedData, true);

        if (!isset($reportArray['data']['row'])) {
            return $reportOutput;
        }

        foreach ($reportArray['data']['row'] as $k => $row) {
            $data = [];

            foreach ($row['value'] as $key => $value) {
                $value = is_array($value) ? implode(" | ", array_map("trim", array_filter($value))) : trim($value);

                $data[$reportArray['metadata']['item'][$key]['@attributes']['name']] = trim($value);
            }

            $reportOutput[] = $data;
        }

        return $reportOutput;
    }
}
