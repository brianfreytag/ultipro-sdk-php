<?php
/**
 * This file is part of the Ultipro SDK for PHP (Unofficial) Package
 *
 * (c) Brian Freytag
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Ultipro\Personnel;

use Ultipro\Exception\InvalidArgumentException;
use Ultipro\Personnel\Model\EmployeeIdLookup;
use Ultipro\Personnel\Model\EmploymentDetail;
use Ultipro\Personnel\Model\PersonDetail;
use Ultipro\Personnel\Query\EmployeeIdLookupQuery;
use Ultipro\Request;
use Ultipro\RequestInterface;
use Ultipro\Response;
use Ultipro\UltiproClient;
use GuzzleHttp\Exception\GuzzleException;
use Ultipro\ResponseInterface;
use Ultipro\Exception\ClientException;

/**
 * @author Brian Freytag <me@brianfreytag.com>
 */
class PersonnelClient extends UltiproClient
{
    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     * @throws ClientException
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function getPersonDetails(RequestInterface $request)
    {
        if (!$request->getEndPoint()) {
            $request->setEndPoint(self::ENDPOINT_PERSONNEL_PERSON_DETAIL);
        }

        $guzzleResponse = $this->get($request);

        $personnelResponse = new PersonnelResponse();

        return $this->parseResponse($guzzleResponse, $personnelResponse, PersonDetail::class);
    }

    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     * @throws ClientException
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function getEmploymentDetails(RequestInterface $request)
    {
        if (!$request->getEndPoint()) {
            $request->setEndPoint(self::ENDPOINT_PERSONNEL_EMPLOYMENT_DETAIL);
        }

        $request->setMethod(Request::HTTP_METHOD_GET);

        $guzzleResponse = $this->get($request);

        $personnelResponse = new PersonnelResponse();

        return $this->parseResponse($guzzleResponse, $personnelResponse, EmploymentDetail::class);
    }

    /**
     * @param RequestInterface $request
     *
     * @return PersonnelResponse
     * @throws ClientException
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function getEmployeeIds(RequestInterface $request)
    {
        $request->setMethod(Request::HTTP_METHOD_POST);

        if (!$request->getEndPoint()) {
            $request->setEndPoint(self::ENDPOINT_PERSONNEL_EMPLOYEE_ID_LOOKUP);
        }

        $guzzleResponse = $this->post($request, false, true);

        $data = json_decode($guzzleResponse->getBody()->getContents());

        $personnelResponse = new PersonnelResponse();
        $personnelResponse->setStatusCode($guzzleResponse->getStatusCode())
            ->setStatusReason($guzzleResponse->getReasonPhrase());

        if ($guzzleResponse->getStatusCode() !== Response::HTTP_RESPONSE_CODE_MULTI_STATUS) {
            $personnelResponse->setStatusReason($data->errors->general->message);

            return $personnelResponse;
        }

        $employeeIds = [];

        foreach ($data->multistatus as $status) {
            if ($status->status !== '200 OK') {
                /** @var EmployeeIdLookupQuery $postParameters */
                $postParameters = $request->getPostParameters();

                $personnelResponse->setStatusCode(preg_replace('/[^0-9]/', '', $status->status));
                $personnelResponse->setStatusReason(sprintf('Unable to find Ultipro Employee ID for employee ' . $postParameters->getEmployeeIdentifierValue()));

                return $personnelResponse;
            }

            $employeeId = new EmployeeIdLookup();
            $employeeId->setEmployeeId($status->body->eeid)
                ->setCompanyIds($status->body->coid);

            $employeeIds[] = $employeeId;
        }

        $personnelResponse->setContent($employeeIds);

        return $personnelResponse;
    }
}
