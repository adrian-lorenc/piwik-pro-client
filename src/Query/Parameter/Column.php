<?php

namespace PiwikPro\ReportingApi\Query\Parameter;

use PiwikPro\ReportingApi\Query\JsonSerializer;

/**
 * Columns.
 *
 * Column definition for the query.
 */
class Column implements \JsonSerializable
{

    use JsonSerializer;

    /**
     * Construct column object.
     *
     * @param string $column_id
     *   ID of the column (either a dimension or a metric).
     * @param string|null $transformation_id
     *   Optional ID of the transformation. Must be supported by the column that
     *   was specified.
     * @param int|null $goal_id
     *   Optional ID of a goal. Available only for metrics related to goals.
     */
    public function __construct(
        protected string $column_id,
        protected ?string $transformation_id = NULL,
        protected ?int $goal_id = NULL
    )
    {
    }

}

