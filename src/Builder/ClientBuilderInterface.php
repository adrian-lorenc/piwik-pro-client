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
     * @return \PiwikPro\ReportingApi\Builder\ClientBuilderInterface
     *   The new QueryFactory object.
     */
    public static function create(string $baseUri, string $clientId, string $clientSecret): self;

    /**
     * Builds Piwik Pro client.
     *
     * @return \PiwikPro\ReportingApi\ClientInterface
     */
    public function buildClient(): ClientInterface;

}
