<?php

namespace KelkooSdk\Reporting;

use KelkooSdk\Reporting\PublisherReportResponse;

/**
 * Class useful for downloading a publisher report
 */
class PublisherReportDownloader
{
    protected $response;
    protected $report;

    public function __construct(
        PublisherReportResponse $response)
    {
        $this->response = $response;
    }

    /**
     * Downloads the contents of the report into this object's '$report'
     * 
     * @param string $credentials the username:password combination
     * @return self
     * @throws \Exception with curl error
     * @access public
     */
    public function downloadReport(
        string $credentials): PublisherReportDownloader
    {
        $downloadUrl = $this->response->getDownloadUrl();

        $ch = curl_init($downloadUrl);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_USERPWD => $credentials,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC
        ]);

        $result = curl_exec($ch);

        if(curl_errno($ch))
            throw new \Exception(curl_error($ch));

        curl_close($ch);

        $this->report = $result;
        return $this;
    }

    /**
     * Gets the string value of the response
     * 
     * @return string
     * @throws \Exception if no report has been downloaded
     * @throws \Exception if csv has no data but headers
     * @access public
     */
    public function getAsString(): string
    {
        if(!$this->report)
            throw new \Exception('No report has been downloaded.');

        if(count(str_getcsv($this->report)) <= 1)
            throw new \Exception('No usable data found in the report, data is probably not ready. Please try again later.');

        return (string) $this->report;
    }

    /**
     * Saves the report to a file
     * 
     * @return null
     * @param string $downloadDir the directory to which we should download the file
     * @param string $fileName what to name the newly downloaded file
     * @throws \Exception if no report has been downloaded
     * @throws \Exception if csv has no data but headers
     * @access public
     */
    public function saveToFile(
        string $downloadDir,
        string $fileName)
    {
        if(!$this->report)
            throw new \Exception('No report has been downloaded.');

        if(count(str_getcsv($this->report)) <= 1)
            throw new \Exception('No usable data found in the report, data is probably not ready. Please try again later.');

        /** string should already be in csv format, so no need to sanity check */
        $filePath = $downloadDir.'/'.$fileName;
        file_put_contents($filePath, $this->report);
    }
}