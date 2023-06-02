<?php

namespace PiwikPro\ReportingApi;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use JsonSerializable;
use PiwikPro\ReportingApi\Query\QueryInterface;

/**
 * Interface for objects that wrap an HTTP client.
 */
interface ClientInterface
{
    /**
     * Performs query.
     *
     * @param JsonSerializable&QueryInterface $query
     *   Piwik query.
     *
     * @return Response
     *   Response.
     *
     * @throws GuzzleException
     */
    public function request(QueryInterface & JsonSerializable $query): Response;
}
