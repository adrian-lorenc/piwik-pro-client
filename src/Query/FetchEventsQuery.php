<?php

namespace PiwikPro\ReportingApi\Query;

/**
 * Fetch events query.
 *
 * @see https://developers.piwik.pro/en/latest/custom_reports/http_api/http_api.html#tag/Raw-data/paths/~1api~1analytics~1v1~1events~1/post
 */
class FetchEventsQuery extends QueryBase
{

    /**
     * {@inheritdoc}
     */
    public function getUri(): string
    {
        return '/api/analytics/v1/events/';
    }

}

