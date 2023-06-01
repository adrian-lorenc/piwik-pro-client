<?php

namespace PiwikPro\ReportingApi\Query\Parts;


use PiwikPro\ReportingApi\Query\Parameter\Date;

/**
 * DateFrom param.
 */
trait DateFromTrait
{

    /**
     * Start date for the query (inclusive).
     *
     * Cannot be used with relative_date field at the same time. Mandatory if
     * relative_date is not used.
     *
     * @var \PiwikPro\ReportingApi\Query\Parameter\Date
     */
    protected Date $date_from;

    /**
     * Sets date from.
     *
     * @param Date $date
     *   date.
     *
     * @return mixed
     *   Query object.
     */
    public function setDateFrom(Date $date): self
    {
        $this->date_from = $date;

        return $this;
    }

}
