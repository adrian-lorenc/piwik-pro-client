<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\tests;

use DateTime;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use PiwikPro\ReportingApi\Query\DirectQuery;
use PiwikPro\ReportingApi\Query\FetchEventsQuery;
use PiwikPro\ReportingApi\Query\FetchSessionsQuery;
use PiwikPro\ReportingApi\Query\Model\Column;
use PiwikPro\ReportingApi\Query\Model\ColumnCondition;
use PiwikPro\ReportingApi\Query\Model\ColumnFormat;
use PiwikPro\ReportingApi\Query\Model\ColumnOperator;
use PiwikPro\ReportingApi\Query\Model\Condition;
use PiwikPro\ReportingApi\Query\Model\Date;
use PiwikPro\ReportingApi\Query\Model\Filter;
use PiwikPro\ReportingApi\Query\Model\LogicalOperator;
use PiwikPro\ReportingApi\Query\Model\RelativeDate;
use PiwikPro\ReportingApi\Query\QueryBase;

/**
 * Tests for the QueryBase class.
 *
 * @coversDefaultClass \PiwikPro\ReportingApi\Query\QueryBase
 */
class QueryBaseTest extends TestCase
{
    /**
     * Query types data provider.
     *
     * @return array[]
     *  Query types.
     */
    public static function queryTypesDataProvider(): array
    {
        return [
            'Direct Query' => [DirectQuery::class],
            'Fetch Events Query' => [FetchEventsQuery::class],
            'Fetch Sessions Query' => [FetchSessionsQuery::class],
        ];
    }

    #[DataProvider('queryTypesDataProvider')]
    public function testDefaultParameters(string $classQuery): void
    {
        /** @var QueryBase $query */
        $query = new $classQuery('bzSmbxbKUu');

        $this->assertSame(
            '{"website_id":"bzSmbxbKUu","offset":0,"limit":100,"column_format":"id"}',
            json_encode($query)
        );

        $query->setOffset(10)
            ->setLimit(50)
            ->setColumnFormat(ColumnFormat::name);

        $this->assertSame(
            '{"website_id":"bzSmbxbKUu","offset":10,"limit":50,"column_format":"name"}',
            json_encode($query)
        );
    }

    #[DataProvider('queryTypesDataProvider')]
    public function testColumns(string $classQuery): void
    {
        /** @var QueryBase $query */
        $query = (new $classQuery('XOaDUaRkaz'))
            ->addColumn(new Column('device_type'))
            ->addColumn(new Column('revenue', 'sum'))
            ->addColumn(new Column('device_type', 'sum', 2));

        $expected = '{"columns":[{"column_id":"device_type"},{"column_id":"revenue","transformation_id":"sum"},' .
            '{"column_id":"device_type","transformation_id":"sum","goal_id":2}],' .
            '"website_id":"XOaDUaRkaz","offset":0,"limit":100,"column_format":"id"}';
        $this->assertSame($expected, json_encode($query));
    }

    #[DataProvider('queryTypesDataProvider')]
    public function testDateRange(string $classQuery): void
    {
        $dateFrom = new Date(new DateTime('03/26/2020'));
        $dateTo = new Date(new DateTime('02/28/2021'));

        /** @var QueryBase $query */
        $query = (new $classQuery('rljPVPMKQq'))
            ->setDateFrom($dateFrom)
            ->setDateTo($dateTo);

        $expected = '{"website_id":"rljPVPMKQq","date_from":"2020-03-26","date_to":"2021-02-28",' .
            '"offset":0,"limit":100,"column_format":"id"}';
        $this->assertSame($expected, json_encode($query));
    }

    #[DataProvider('queryTypesDataProvider')]
    public function testRelativeDate(string $classQuery): void
    {
        /** @var QueryBase $query */
        $query = (new $classQuery('9Vyk3VOKhx'))
            ->setRelativeDate(RelativeDate::LastMonth);

        $this->assertSame(
            '{"website_id":"9Vyk3VOKhx","relative_date":"last_month","offset":0,"limit":100,"column_format":"id"}',
            json_encode($query)
        );
    }

    #[DataProvider('queryTypesDataProvider')]
    public function testFilters(string $classQuery): void
    {
        $columnCondition = new ColumnCondition(ColumnOperator::not_empty, null);
        $condition = new Condition('goal_uuid', $columnCondition);

        $filter = (new Filter(LogicalOperator::or))
            ->addCondition($condition);

        $filterContainer = (new Filter(LogicalOperator::and))
            ->addFilter($filter);

        /** @var QueryBase $query */
        $query = (new $classQuery('4BLOh7NHUZ'))
            ->setFilter($filterContainer);

        $expected = '{"website_id":"4BLOh7NHUZ",' .
            '"filters":{"conditions":[{"conditions":[{"column_id":"goal_uuid",' .
            '"condition":{"operator":"not_empty","value":null}}],"operator":"or"}],"operator":"and"},' .
            '"offset":0,"limit":100,"column_format":"id"}';/**/

        $this->assertSame($expected, json_encode($query));
    }
}
