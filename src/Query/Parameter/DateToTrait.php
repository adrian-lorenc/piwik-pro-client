<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\Query\Parameter;

use PiwikPro\ReportingApi\Query\Model\Date;

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
     * @var Date
     */
    protected Date $date_to;

    /**
     * Sets date to.
     *
     * @param Date $date
     *   date.
     *
     * @return $this
     *   Query object.
     */
    public function setDateTo(Date $date): static
    {
        $this->date_to = $date;

        return $this;
    }
}
