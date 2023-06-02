<?php

namespace PiwikPro\ReportingApi\Query;

/**
 * Querying the database directly.
 *
 * @see https://developers.piwik.pro/en/latest/custom_reports/http_api/http_api.html#tag/Queries/paths/~1api~1analytics~1v1~1query~1/post
 */
class DirectQuery extends QueryBase
{

    /**
     * {@inheritdoc}
     */
    public function getUri(): string
    {
        return '/api/analytics/v1/query/';
    }

}

