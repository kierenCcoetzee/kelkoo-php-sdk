<?php

namespace KelkooSdk\Reporting;

/**
 * Defines common endpoints available to a Kelkoo publisher
 */
class ApiRequestEndpoint
{
    /** Base url for publisher report */
    const REQUEST_BASE_URL = 'https://partner.kelkoo.com/';

    /** CSV report endpoint */
    const REQUEST_STATS_CSV = 'statsSelectionService.csv';

    /** XML report endpoint */
    const REQUEST_STATS_XML = 'statsSelectionService.xml';
}