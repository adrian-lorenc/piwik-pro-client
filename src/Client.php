<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface as GuzzleHttpClientInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JsonSerializable;
use kamermans\OAuth2\GrantType\ClientCredentials;
use kamermans\OAuth2\OAuth2Middleware;
use PiwikPro\ReportingApi\Client as PiwikProClient;
use PiwikPro\ReportingApi\Query\QueryInterface;

/**
 * Piwik Pro client.
 */
class Client implements ClientInterface
{
    /**
     * Constructs a new client object.
     *
     * @param GuzzleHttpClientInterface $guzzleHTTPClient
     *   The Guzzle HTTP client.
     */
    public function __construct(
        protected GuzzleHttpClientInterface $guzzleHTTPClient
    ) {
    }

    /**
     * {@inheritdoc}
     */
    public static function create(string $baseUri, string $clientId, string $clientSecret): ClientInterface
    {
        // Authorization client - this is used to request OAuth access tokens.
        $reauthClient = new GuzzleClient([
            'base_uri' => $baseUri . '/auth/token',
        ]);

        $reauthConfig = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ];
        $grantType = new ClientCredentials($reauthClient, $reauthConfig);
        $oauth = new OAuth2Middleware($grantType);

        $stack = HandlerStack::create();
        $stack->push($oauth);

        // This is the normal Guzzle client that you use in your application.
        $guzzleClient = new GuzzleClient([
            'handler' => $stack,
            'auth' => 'oauth',
            'base_uri' => $baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        return new PiwikProClient($guzzleClient);
    }

    /**
     * {@inheritdoc}
     */
    public function request(QueryInterface & JsonSerializable $query): Response
    {
        return $this->guzzleHTTPClient->post($query->getUri(), [
            'body' => json_encode($query),
            'headers' => ['Accept-Encoding' => 'gzip'],
            'decode_content' => true,
        ]);
    }
}
