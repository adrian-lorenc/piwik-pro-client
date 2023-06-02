<?php

namespace PiwikPro\ReportingApi\Builder;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use kamermans\OAuth2\GrantType\ClientCredentials;
use kamermans\OAuth2\OAuth2Middleware;
use PiwikPro\ReportingApi\Client as PiwikProClient;
use PiwikPro\ReportingApi\ClientInterface;

/**
 * Client builder.
 */
class ClientBuilder implements ClientBuilderInterface
{
    /**
     * Constructs a new ClientBuilder.
     *
     * @param string $baseUri
     *   The URL of the Piwik Pro server.
     * @param string $clientId
     *   Client id.
     * @param string $clientSecret
     *   Client secret.
     */
    protected function __construct(
        protected string $baseUri,
        protected string $clientId,
        protected string $clientSecret
    ) {
    }

    /**
     * {@inheritdoc}
     */
    public function buildClient(): ClientInterface
    {
        // Authorization client - this is used to request OAuth access tokens.
        $reauthClient = new GuzzleClient([
            'base_uri' => $this->baseUri . '/auth/token',
        ]);

        $reauthConfig = [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ];
        $grantType = new ClientCredentials($reauthClient, $reauthConfig);
        $oauth = new OAuth2Middleware($grantType);

        $stack = HandlerStack::create();
        $stack->push($oauth);

        // This is the normal Guzzle client that you use in your application.
        $guzzleClient = new GuzzleClient([
            'handler' => $stack,
            'auth' => 'oauth',
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        return new PiwikProClient($guzzleClient);
    }

    /**
     * {@inheritdoc}
     */
    public static function create(string $baseUri, string $clientId, string $clientSecret): ClientBuilderInterface
    {
        return new static($baseUri, $clientId, $clientSecret);
    }
}
