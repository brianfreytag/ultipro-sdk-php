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

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class ReportClient extends UltiproSoapClient
{
    /**
     * @return mixed
     */
    public function getReportList()
    {
        try {
            $logonResponse = $this->login();

            $client = $this->buildClient();

            $headers = [
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'Action', 'http://www.ultipro.com/dataservices/bidata/2/IBIDataService/GetReportList', true),
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'To', 'https://service5.ultipro.com/services/BiDataService', true)
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
            $this->getLogger()->error(
                'There was an error grabbing the Reports List from the Ultipro SOAP API',
                [
                    'message'       => $e->getMessage(),
                    'last_request'  => $client->__getLastRequest(),
                    'last_response' => $client->__getLastResponse()
                ]
            );
        }

        if (!property_exists($response, 'GetReportListResult') || $response->GetReportListResult->Status !== 'Success') {
            $this->getLogger()->error(
                'There was an error grabbing the Reports List from the Ultipro SOAP API',
                [
                    'last_request'  => $client->__getLastRequest(),
                    'last_response' => $client->__getLastResponse()
                ]
            );
        }

        return $response->GetReportListResult->Reports->Report;
    }

    /**
     * @param string $report
     *
     * @return mixed
     */
    public function getReportParameters(string $report)
    {
        try {
            $logonResponse = $this->login();

            $client = $this->buildClient();

            $headers = [
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'Action', 'http://www.ultipro.com/dataservices/bidata/2/IBIDataService/GetReportParameters', true),
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'To', 'https://service5.ultipro.com/services/BiDataService', true)
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
            $this->getLogger()->error(
                'There was an error grabbing the Report Parameters from the Ultipro SOAP API',
                [
                    'message'       => $e->getMessage(),
                    'last_request'  => $client->__getLastRequest(),
                    'last_response' => $client->__getLastResponse()
                ]
            );
        }

        if (!property_exists($response, 'GetReportParametersResult') || $response->GetReportParametersResult->Status !== 'Success') {
            $this->getLogger()->error(
                'There was an error grabbing the Report Parameters from the Ultipro SOAP API',
                [
                    'last_request'  => $client->__getLastRequest(),
                    'last_response' => $client->__getLastResponse()
                ]
            );
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

        return $this->retrieveReport($executeResponse, $toArray);
    }

    /**
     * @param string $report
     * @param array $parameters
     *
     * @return mixed
     */
    public function executeReport(string $report, array $parameters = [])
    {
        try {
            $logonResponse = $this->login();

            $client = $this->buildClient('https://service5.ultipro.com/services/BiDataService', [
                'US-DELIMITER' => ','
            ]);

            $headers = [
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'Action', 'http://www.ultipro.com/dataservices/bidata/2/IBIDataService/ExecuteReport', true),
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'To', 'https://service5.ultipro.com/services/BiDataService', true)
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
            $this->getLogger()->error(
                'There was an error excuting the report from the Ultipro SOAP API',
                [
                    'message'       => $e->getMessage(),
                    'last_request'  => $client->__getLastRequest(),
                    'last_response' => $client->__getLastResponse()
                ]
            );

            return false;
        }

        if (
            !property_exists($response, 'ExecuteReportResult') ||
            $response->ExecuteReportResult->Status !== 'Success' ||
            $response->ExecuteReportResult->ReportKey === null ||
            $response->ExecuteReportResult->ReportRetrievalUri === null
        ) {
            $this->getLogger()->error(
                'There was an error executing the report from the Ultipro SOAP API',
                [
                    'last_request'  => $client->__getLastRequest(),
                    'last_response' => $client->__getLastResponse()
                ]
            );

            return false;
        }

        return $response->ExecuteReportResult;
    }

    /**
     * @param $executeResponse
     * @param bool $toArray
     *
     * @return array|bool
     */
    public function retrieveReport($executeResponse, bool $toArray = true)
    {
        $reportOutput = [];

        try {
            $logonResponse = $this->login();

            $reportClient = $this->buildClient($executeResponse->ReportRetrievalUri);

            $reportResponseHeader = [
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'Action', 'http://www.ultipro.com/dataservices/bistream/2/IBIStreamService/RetrieveReport', true),
                new SoapHeader('http://www.w3.org/2005/08/addressing', 'To', 'https://service5.ultipro.com/services/BIStreamingService', true),
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
            $this->getLogger()->error(
                'There was an error grabbing the Report Parameters from the Ultipro SOAP API',
                [
                    'message'       => $e->getMessage(),
                    'last_request'  => $client->__getLastRequest(),
                    'last_response' => $client->__getLastResponse()
                ]
            );

            return $reportOutput;
        }

        if (!$toArray) {
            return $reportStatus->ReportStream;
        }

        $xmlDocument = simplexml_load_string($reportStatus->ReportStream);

        if ($xmlDocument === false) {
            $this->getLogger()->error(
                'There was an error grabbing the Report Parameters from the Ultipro SOAP API',
                [
                    'message'       => 'The XML Document was either empty or invalid.',
                    'reportStream'  => $reportStatus->ReportStream,
                    'last_request'  => $reportClient->__getLastRequest(),
                    'last_response' => $reportClient->__getLastResponse()
                ]
            );

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
