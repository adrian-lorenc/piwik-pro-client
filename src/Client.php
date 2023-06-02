<?php

namespace PiwikPro\ReportingApi;

use GuzzleHttp\ClientInterface as GuzzleHttpClientInterface;
use GuzzleHttp\Psr7\Response;
use PiwikPro\ReportingApi\Query\QueryInterface;

/**
 * Piwik Pro client.
 */
class Client implements ClientInterface
{

    /**
     * Constructs a new client object.
     *
     * @param \GuzzleHttp\ClientInterface $guzzleHTTPClient
     *   The Guzzle HTTP client.
     */
    public function __construct(
        protected GuzzleHttpClientInterface $guzzleHTTPClient)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function request(QueryInterface & \JsonSerializable $query): Response
    {
        return $this->guzzleHTTPClient->post($query->getUri(), [
            'body' => json_encode($query),
            'headers' => ['Accept-Encoding' => 'gzip'],
            'decode_content' => TRUE,
        ]);
    }

}
