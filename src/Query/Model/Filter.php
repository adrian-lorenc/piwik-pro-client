<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\Query\Model;

use JsonSerializable;
use PiwikPro\ReportingApi\Query\JsonSerializer;

/**
 * Filter.
 */
class Filter implements JsonSerializable
{
    use JsonSerializer;

    /**
     * List of filters or recursively nested clauses.
     *
     * @var Filter[]|Condition[]
     */
    protected array $conditions = [];

    /**
     * Constructs filter.
     *
     * @param LogicalOperator $operator
     *   Logical operator (AND/OR) for the clause.
     */
    public function __construct(
        protected LogicalOperator $operator
    ) {
    }

    /**
     * Adds filter.
     *
     * @param Filter $filter
     *   Filter.
     * @return $this
     *   Filter object.
     */
    public function addFilter(Filter $filter): self
    {
        $this->conditions[] = $filter;

        return $this;
    }

    /**
     * Adds condition.
     *
     * @param Condition $condition
     *   Condition.
     * @return $this
     *   Filter object.
     */
    public function addCondition(Condition $condition): self
    {
        $this->conditions[] = $condition;

        return $this;
    }
}
