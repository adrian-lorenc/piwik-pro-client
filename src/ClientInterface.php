<?php

declare(strict_types=1);

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
     * Returns a new client using default settings.
     *
     * @param string $baseUri
     *   The URL of the Piwik Pro server.
     * @param string $clientId
     *   Client id.
     * @param string $clientSecret
     *   Client secret.
     *
     * @return ClientInterface
     *   Piwik Pro client.
     */
    public static function create(string $baseUri, string $clientId, string $clientSecret): ClientInterface;

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
