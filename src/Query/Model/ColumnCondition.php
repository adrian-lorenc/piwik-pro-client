<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\Query\Model;

use JsonSerializable;

/**
 * Definition of the condition for column.
 */
class ColumnCondition implements JsonSerializable
{
    /**
     * Constructs ColumnCondition.
     *
     * @param ColumnOperator $operator
     *   Filtering operator.
     * @param mixed $value
     *   Value that should be matched by filter.
     * Value type must match the type of the specified column. For enumerated fields, you must use the ID value.
     */
    public function __construct(
        protected ColumnOperator $operator,
        protected mixed $value
    ) {
    }

    /**
     * It serializes object.
     *
     * @return array
     *   Serialized object.
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
