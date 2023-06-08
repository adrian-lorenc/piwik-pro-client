<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\Query\Parameter;

use PiwikPro\ReportingApi\Query\Model\Filter;

/**
 * Filters param.
 */
trait FiltersTrait
{
    /**
     * Dimension filters for the query.
     *
     * The top-level object must specify AND/OR clause,
     * but any nested objects may either specify another AND/OR clause or a single filter.
     *
     * @var Filter
     */
    protected Filter $filters;

    /**
     * Sets filter.
     *
     * @param Filter $filter
     *   Filter.
     * @return $this
     *   Query object.
     */
    public function setFilter(Filter $filter): static
    {
        $this->filters = $filter;

        return $this;
    }
}
