<?php

namespace PiwikPro\ReportingApi\Query\Parts;

use PiwikPro\ReportingApi\Query\Parameter\RelativeDate;

/**
 * Relative date param.
 */
trait RelativeDateTrait
{

    /**
     * Use relative date in query.
     *
     * Cannot be used with absolute date fields at the same time.
     *
     * @var \PiwikPro\ReportingApi\Query\Parameter\RelativeDate
     */
    protected RelativeDate $relative_date;

    /**
     * Sets relative date.
     *
     * @param \PiwikPro\ReportingApi\Query\Parameter\RelativeDate $date
     *   Relative date.
     *
     * @return mixed
     */
    public function setRelativeDate(RelativeDate $date): self
    {
        $this->relative_date = $date;

        return $this;
    }

}
