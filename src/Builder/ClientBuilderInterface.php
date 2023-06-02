<?php

namespace PiwikPro\ReportingApi\Builder;

use PiwikPro\ReportingApi\ClientInterface;

/**
 * Client builder.
 */
interface ClientBuilderInterface
{
    /**
     * Returns a new Client Builder using default settings.
     *
     * @param string $baseUri
     *   The URL of the Piwik Pro server.
     * @param string $clientId
     *   Client id.
     * @param string $clientSecret
     *   Client secret.
     *
     * @return ClientBuilderInterface
     *   The new QueryFactory object.
     */
    public static function create(string $baseUri, string $clientId, string $clientSecret): self;

    /**
     * Builds Piwik Pro client.
     *
     * @return ClientInterface
     */
    public function buildClient(): ClientInterface;
}
