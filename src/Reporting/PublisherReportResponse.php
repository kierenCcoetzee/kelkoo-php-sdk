<?php

namespace KelkooSdk\Reporting;

use KelkooSdk\Reporting\PublisherReportRequest;
use KelkooSdk\Reporting\ReportFormat;
use KelkooSdk\Reporting\ApiRequestEndpoint;
use KelkooSdk\Reporting\ApiRequestKey;

/**
 * Defines the publisher report response
 */
class PublisherReportResponse
{
    protected $request;

    public function __construct(
        PublisherReportRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Gets the request object
     * 
     * @return PublisherReportRequest
     * @access public
     */
    public function getRequest(): PublisherReportRequest
    {
        return $this->request;
    }

    /**
     * Gets the url from which to download the report
     * 
     * @return string
     * @throws \Exception if report format not defined in the request
     * @access public
     */
    public function getDownloadUrl(): string
    {
        if(!$reportFormat = $this->request->format)
            throw new \Exception('No report format found in the request.');

        $formatEndpoint = null;
        switch($reportFormat)
        {
            case ReportFormat::FORMAT_CSV:
                $formatEndpoint = ApiRequestEndpoint::REQUEST_STATS_CSV;
                break;
            case ReportFormat::FORMAT_XML:
                $formatEndpoint = ApiRequestEndpoint::REQUEST_STATS_XML;
                break;
        }

        $baseUrl =
            ApiRequestEndpoint::REQUEST_BASE_URL.
            $formatEndpoint.
            '?'
        ;

        $requestOptions = [
            ApiRequestKey::PAGE_TYPE => $this->request->pageType,
            ApiRequestKey::START_DATE => $this->request->startDate,
            ApiRequestKey::END_DATE => $this->request->endDate,
            ApiRequestKey::CURRENCY => $this->request->currency,
            ApiRequestKey::COUNTRIES => $this->request->countries,
            ApiRequestKey::SPLIT => $this->request->split,
            ApiRequestKey::DEVICE_TYPE => $this->request->deviceType
        ];

        $downloadUrl = $baseUrl.http_build_query($requestOptions);
        return $downloadUrl;
    }
}