<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\tests;

use PHPUnit\Framework\TestCase;
use PiwikPro\ReportingApi\Query\FetchEventsQuery;

/**
 * Tests for the FetchEventsQuery class.
 *
 * @coversDefaultClass \PiwikPro\ReportingApi\Query\FetchEventsQuery
 */
class FetchEventsQueryTest extends TestCase
{
    /**
     * Test resource URI.
     */
    public function testQueryUri(): void
    {
        $query = new FetchEventsQuery('kGl9tDBioH');

        $this->assertSame('/api/analytics/v1/events/', $query->getUri());
    }
}
