<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\tests;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use PiwikPro\ReportingApi\Client as PiwikProClient;
use PiwikPro\ReportingApi\ClientInterface;
use PiwikPro\ReportingApi\Query\DirectQuery;

/**
 * Tests for the ClientBuilder class.
 *
 * @coversDefaultClass \PiwikPro\ReportingApi\Client
 */
class ClientTest extends TestCase
{
    /**
     * Test client creation.
     */
    public function testCreation(): void
    {
        $client = PiwikProClient::create(
            'https://github.com/adrian-lorenc/piwik-pro-reporting-api',
            'client_id',
            'client_secret'
        );

        $this->assertInstanceOf(ClientInterface::class, $client);
    }

    /**
     * Test request.
     */
    public function testRequest(): void
    {
        // Create a mock and queue two responses.
        $mock = new MockHandler([
            new Response(200, [], 'Hello, World'),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $guzzleClient = new GuzzleClient(['handler' => $handlerStack]);

        $client = new PiwikProClient($guzzleClient);
        $query = new DirectQuery('bzSmbxbKUu');

        $response = $client->request($query);
        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(200, $response->getStatusCode());
    }
}
