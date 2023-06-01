<?php

namespace PiwikPro\Client;

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
     * @param \PiwikPro\ReportingApi\Query\QueryInterface $query
     *   Piwik query.
     *
     * @return \GuzzleHttp\Psr7\Response
     *   Response.
     */
    public function request(QueryInterface $query): Response;

}
