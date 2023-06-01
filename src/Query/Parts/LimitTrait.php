<?php

namespace PiwikPro\ReportingApi\Query\Parts;


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
     * @return mixed
     *   Query object.
     */
    public function setLimit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

}
