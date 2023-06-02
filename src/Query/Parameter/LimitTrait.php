<?php

namespace PiwikPro\ReportingApi\Query\Parameter;


/**
 * Limit param.
 */
trait LimitTrait
{

    /**
     * Number of rows to return.
     *
     * @var int
     */
    protected int $limit = 100;

    /**
     * Sets limit.
     *
     * @param int $limit
     *   Limit.
     *
     * @return $this
     *   Query object.
     */
    public function setLimit(int $limit): static
    {
        $this->limit = $limit;

        return $this;
    }

}
