<?php

namespace PiwikPro\ReportingApi\Query;

use PiwikPro\ReportingApi\Query\Parts\DateFromTrait;
use PiwikPro\ReportingApi\Query\Parts\DateToTrait;
use PiwikPro\ReportingApi\Query\Parts\LimitTrait;
use PiwikPro\ReportingApi\Query\Parts\OffsetTrait;
use PiwikPro\ReportingApi\Query\Parts\RelativeDateTrait;

/**
 * Fetch events query.
 *
 * @see https://developers.piwik.pro/en/latest/custom_reports/http_api/http_api.html#tag/Raw-data/paths/~1api~1analytics~1v1~1events~1/post
 */
class FetchEventsQuery implements \JsonSerializable, QueryInterface
{

    use JsonSerializer;
    use DateFromTrait;
    use DateToTrait;
    use RelativeDateTrait;
    use OffsetTrait;
    use LimitTrait;

    /**
     * @param string $website_id
     *   ID of a website or a meta site.
     *
     * @param \PiwikPro\ReportingApi\Query\Parameter\Column[] $columns
     *   Column definitions for the query.
     */
    public function __construct(
        protected string $website_id,
        protected array $columns
    )
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getUri(): string
    {
        return '/api/analytics/v1/events/';
    }

}

