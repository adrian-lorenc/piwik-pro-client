<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\tests;

use PHPUnit\Framework\TestCase;
use PiwikPro\ReportingApi\Query\FetchSessionsQuery;

/**
 * Tests for the FetchSessionsQuery class.
 *
 * @coversDefaultClass \PiwikPro\ReportingApi\Query\FetchSessionsQuery
 */
class FetchSessionsQueryTest extends TestCase
{
    /**
     * Test resource URI.
     */
    public function testQueryUri(): void
    {
        $query = new FetchSessionsQuery('6yaPkgxiLD');

        $this->assertSame('/api/analytics/v1/sessions/', $query->getUri());
    }
}
