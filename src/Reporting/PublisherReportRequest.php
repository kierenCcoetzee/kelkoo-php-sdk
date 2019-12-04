<?php

namespace KelkooSdk\Reporting;

/**
 * Defines a publisher report request
 */
class PublisherReportRequest
{
    /**
     * The start date for the report
     * @var string
     */
    public $startDate;

    /**
     * The end date for the report
     * @var string
     */
    public $endDate;

    /**
     * Page type
     * @see KelkooSdk\Reporting\PageTypeModel
     * @var string
     */
    public $pageType = 'custom';

    /**
     * Device type
     * @see KelkooSdk\Reporting\DeviceTypeModel
     * @var string
     */
    public $deviceType = 'All';

    /**
     * The currency
     * @see KelkooSdk\Reporting\CurrencyModel
     * @var string
     */
    public $currency;

    /**
     * The country or locale
     * @var string
     * @todo add a model for countries
     */
    public $countries = 'All';

    /**
     * The split value
     * @see KelkooSdk\Reporting\SplitModel
     */
    public $split = 'daily';

    /**
     * The report format
     * @see KelkooSdk\Reporting\ReportFormatModel
     */
    public $format = 'csv';
}