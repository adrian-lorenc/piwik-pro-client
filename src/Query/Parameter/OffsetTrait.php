<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\Query\Parameter;

/**
 * offset param.
 */
trait OffsetTrait
{
    /**
     * Number of rows to skip before beginning to return rows.
     *
     * @var int
     */
    protected int $offset = 0;

    /**
     * Sets offset.
     *
     * @param int $offset
     *   offset.
     *
     * @return mixed
     *   Query object.
     */
    public function setOffset(int $offset): static
    {
        $this->offset = $offset;

        return $this;
    }
}
