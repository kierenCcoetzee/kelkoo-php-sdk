<?php

namespace KelkooSdk\Samples;

use KelkooSdk\Reporting\Currency;
use KelkooSdk\Reporting\PublisherReportDownloader;
use KelkooSdk\Reporting\PublisherReportRequest;
use KelkooSdk\Reporting\PublisherReportResponse;

/**
 * Example helper class to fetch publisher reports from Kelkoo
 */
class PublisherReportExampleHelper
{
    /** download directory */
    const DOWNLOAD_DIR = '/path/to/download/dir';

    /** user credentials */
    const CREDENTIALS_USER = 'username';
    const CREDENTIALS_PASSWORD = 'password';

    /**
     * Fetches the report from kelkoo and saves to a file
     * 
     * @param $fileName the file name
     * @return null
     * @access public
     */
    public function fetchReportAndSaveToFile(
        string $fileName)
    {
        $request = new PublisherReportRequest();
        $request->startDate = date('Y-m-d', strtotime('-1 days'));
        $request->endDate = date('Y-m-d', strtotime('-1 days'));
        $request->currency = Currency::CURRENCY_GBP;

        $response = new PublisherReportResponse($request);

        $downloader = new PublisherReportDownloader($response);
        $credentials = self::CREDENTIALS_USER.':'.self::CREDENTIALS_PASSWORD;
        $downloader->downloadReport($credentials)
            ->saveToFile(self::DOWNLOAD_DIR, $fileName);
    }
}