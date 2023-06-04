<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\Query\Parameter;

use PiwikPro\ReportingApi\Query\Model\RelativeDate;

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
     * @var RelativeDate
     */
    protected RelativeDate $relative_date;

    /**
     * Sets relative date.
     *
     * @param RelativeDate $date
     *   Relative date.
     *
     * @return $this
     *   Query object.
     */
    public function setRelativeDate(RelativeDate $date): static
    {
        $this->relative_date = $date;

        return $this;
    }
}
