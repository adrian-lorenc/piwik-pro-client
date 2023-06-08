<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\tests;

use PHPUnit\Framework\TestCase;
use PiwikPro\ReportingApi\Query\DirectQuery;
use PiwikPro\ReportingApi\Query\Model\Direction;

/**
 * Tests for the DirectQuery class.
 *
 * @coversDefaultClass \PiwikPro\ReportingApi\Query\DirectQuery
 */
class DirectQueryTest extends TestCase
{
    /**
     * Test resource URI.
     */
    public function testQueryUri(): void
    {
        $query = new DirectQuery('kGl9tDBioH');

        $this->assertSame('/api/analytics/v1/query/', $query->getUri());
    }

    /**
     * Test order by functionality.
     */
    public function testOrderBy(): void
    {
        $query = (new DirectQuery('1lL120zfsD'))
            ->addOrderBy(2, Direction::DESC)
            ->addOrderBy(3, Direction::ASC);

        $this->assertSame(
            '{"website_id":"1lL120zfsD","offset":0,"limit":100,"column_format":"id","order_by":[[2,"desc"],[3,"asc"]]}',
            json_encode($query)
        );
    }
}
