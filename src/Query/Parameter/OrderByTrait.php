<?php

namespace PiwikPro\ReportingApi\Query\Parameter;

use PiwikPro\ReportingApi\Query\Model\Direction;

/**
 * Order by param.
 */
trait OrderByTrait
{
    /**
     * Array of sorting directives.
     *
     * Each directive is a 2-element array with 0-based colum index and direction).
     * You can sort on more than one column. By default sorts descending by the first metric in query.
     *
     * @var \PiwikPro\ReportingApi\Query\Model\RelativeDate
     */
    protected array $order_by = [];

    /**
     * Adds order by param.
     *
     * @param \PiwikPro\ReportingApi\Query\Model\RelativeDate $date
     *   Relative date.
     *
     * @return $this
     *   Query object.
     */
    public function addOrderBy(int $columnIndex, Direction $direction): static
    {
        $this->order_by[] = [$columnIndex, $direction];

        return $this;
    }
}
