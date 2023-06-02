<?php

namespace PiwikPro\ReportingApi;

use GuzzleHttp\Psr7\Response;
use PiwikPro\ReportingApi\Query\QueryInterface;

/**
 * Interface for objects that wrap an HTTP client.
 */
interface ClientInterface
{
    /**
     * Performs query.
     *
     * @param \JsonSerializable&\PiwikPro\ReportingApi\Query\QueryInterface $query
     *   Piwik query.
     *
     * @return \GuzzleHttp\Psr7\Response
     *   Response.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(QueryInterface & \JsonSerializable $query): Response;
}
