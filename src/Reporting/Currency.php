<?php

namespace KelkooSdk\Reporting;

/**
 * Defines commonly used currencies in a PublisherReportRequest
 * !! IMPORTANT !! This value will not actually reflect in the revenue returned in the
 *      report which is based on the account's market defined in Kelkoo
 */
class Currency
{
    /** Great Brittish Pound GBP */
    const CURRENCY_GBP = 'GBP';

    /** United States Dollar USD */
    const CURRENCY_USD = 'USD';
}