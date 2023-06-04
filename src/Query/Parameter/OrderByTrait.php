<?php

declare(strict_types=1);

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
     * Each directive is a 2-element array with 0-based colum index and direction.
     * You can sort on more than one column. By default, sorts descending by the first metric in query.
     *
     * @var array
     */
    protected array $order_by = [];

    /**
     * Adds order by param.
     *
     * @param int $columnIndex
     *   Column index.
     * @param Direction $direction
     *   Direction.
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
