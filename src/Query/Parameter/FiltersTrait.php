<?php

namespace PiwikPro\ReportingApi\Query\Parameter;

use PiwikPro\ReportingApi\Query\Model\Conditions;
use PiwikPro\ReportingApi\Query\Model\Date;
use PiwikPro\ReportingApi\Query\Model\Operator;

/**
 * DateTo param.
 */
trait FiltersTrait
{
    /**
     * Dimension filters for the query.
     *
     * The top-level object must specify AND/OR clause,
     * but any nested objects may either specify another AND/OR clause or a single filter.
     *
     * @var array
     */
    protected array $filters = [];

    /**
     * Sets filters.
     *
     * @param Operator $operator
     *   Logical operator (AND/OR) for the clause.
     * @param Conditions $conditions
     *   List of filters or recursively nested clauses.
     *
     * @return $this
     *   Query object.
     */
    public function setFilters(Operator $operator, Conditions $conditions): static
    {
        $this->filters = [
            'operator' => $operator,
            'conditions' => $conditions
        ];

        return $this;
    }
}
