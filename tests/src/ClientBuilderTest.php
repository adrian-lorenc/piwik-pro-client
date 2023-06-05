<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\tests;

use PHPUnit\Framework\TestCase;

/**
 * Tests for the ClientBuilder class.
 *
 * @coversDefaultClass \PiwikPro\ReportingApi\Builder\ClientBuilder
 */
class ClientBuilderTest extends TestCase
{
    public function testDummy(): void
    {
        $number = 1;
        $this->assertSame(1, $number);
    }
}
