<?php

namespace PiwikPro\ReportingApi\Query;

use JsonSerializable;
use PiwikPro\ReportingApi\Query\Model\Column;
use PiwikPro\ReportingApi\Query\Parameter\ColumnFormatTrait;
use PiwikPro\ReportingApi\Query\Parameter\DateFromTrait;
use PiwikPro\ReportingApi\Query\Parameter\DateToTrait;
use PiwikPro\ReportingApi\Query\Parameter\FiltersTrait;
use PiwikPro\ReportingApi\Query\Parameter\LimitTrait;
use PiwikPro\ReportingApi\Query\Parameter\OffsetTrait;
use PiwikPro\ReportingApi\Query\Parameter\RelativeDateTrait;

/**
 * Base query class.
 */
abstract class QueryBase implements JsonSerializable, QueryInterface
{
    use JsonSerializer;
    use DateFromTrait;
    use DateToTrait;
    use RelativeDateTrait;
    use FiltersTrait;
    use OffsetTrait;
    use LimitTrait;
    use ColumnFormatTrait;

    /**
     * Column definitions for the query.
     *
     * @var Column[] $columns
     */
    protected array $columns = [];

    /**
     * Created query class.
     *
     * @param string $website_id
     *   ID of a website or a meta site.
     */
    public function __construct(
        protected string $website_id
    ) {
    }

    /**
     * Adds column definitions for the query.
     *
     * @param Column $column
     *   Column definitions.
     * @return $this
     *   Query object.
     */
    public function addColumn(Column $column): self
    {
        $this->columns[] = $column;

        return $this;
    }
}
