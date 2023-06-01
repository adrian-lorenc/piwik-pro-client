<?php

namespace PiwikPro\ReportingApi\Query\Parts;

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
    public function setOffset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

}
