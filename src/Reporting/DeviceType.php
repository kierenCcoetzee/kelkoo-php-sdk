<?php

namespace KelkooSdk\Reporting;

/**
 * Defines common device types used in a PublisherReportRequest
 */
class DeviceType
{
    /** device type all, will return all devices */
    const DEVICE_ALL = 'All';

    /** desktop, will return only for desktop */
    const DEVICE_DESKTOP = 'Desktop';

    /** mobile, will return only for mobile */
    const DEVICE_MOBILE = 'Mobile';
}