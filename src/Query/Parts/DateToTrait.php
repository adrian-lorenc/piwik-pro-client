<?php

namespace PiwikPro\ReportingApi\Query\Parts;


use PiwikPro\ReportingApi\Query\Parameter\Date;

/**
 * DateTo param.
 */
trait DateToTrait
{

    /**
     * End date for the query (inclusive).
     *
     * Cannot be used with relative_date field at the same time. Mandatory if
     * relative_date is not used.
     *
     * @var \PiwikPro\ReportingApi\Query\Parameter\Date
     */
    protected Date $date_to;

    /**
     * Sets date to.
     *
     * @param Date $date
     *   date.
     *
     * @return mixed
     *   Query object.
     */
    public function setDateTo(Date $date): self
    {
        $this->date_to = $date;

        return $this;
    }

}
