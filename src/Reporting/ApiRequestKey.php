<?php

namespace KelkooSdk\Reporting;

/**
 * Defines common api request keys used in a PublisherReportRequest
 */
class ApiRequestKey
{
    /** the start date */
    const START_DATE = 'from';

    /** the end date */
    const END_DATE = 'to';

    /** the page type */
    const PAGE_TYPE = 'pageType';

    /** the currency with which the report should be formatted */
    const CURRENCY = 'currency';

    /** the countries that should be included in the report */
    const COUNTRIES = 'countries';

    /** the split */
    const SPLIT = 'split';

    /** the device types that should be returned in the report */
    const DEVICE_TYPE = 'deviceType';
}