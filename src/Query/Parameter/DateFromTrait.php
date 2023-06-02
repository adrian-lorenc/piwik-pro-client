<?php

namespace PiwikPro\ReportingApi\Query\Parameter;

use PiwikPro\ReportingApi\Query\Model\Date;

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
     * @var \PiwikPro\ReportingApi\Query\Model\Date
     */
    protected Date $date_from;

    /**
     * Sets date from.
     *
     * @param Date $date
     *   date.
     *
     * @return $this
     *   Query object.
     */
    public function setDateFrom(Date $date): static
    {
        $this->date_from = $date;

        return $this;
    }
}
