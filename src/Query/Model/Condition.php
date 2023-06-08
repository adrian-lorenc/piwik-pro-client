<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\Query\Model;

use JsonSerializable;
use PiwikPro\ReportingApi\Query\JsonSerializer;

/**
 * Condition.
 */
class Condition implements JsonSerializable
{
    use JsonSerializer;

    /**
     * Construct column object.
     *
     * @param string $column_id
     *   ID of the column (either a dimension or a metric).
     * @param ColumnCondition $condition
     *   Definition of the condition for this column.
     * @param string|null $transformation_id
     *   Optional ID of the transformation. Must be supported by the column that
     *   was specified.
     */
    public function __construct(
        protected string $column_id,
        protected ColumnCondition $condition,
        protected ?string $transformation_id = null
    ) {
    }
}
