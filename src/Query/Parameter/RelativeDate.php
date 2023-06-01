<?php

namespace PiwikPro\ReportingApi\Query\Parameter;

/**
 * Relative date.
 */
enum RelativeDate: string implements \JsonSerializable
{

    case Today = 'today';
    case Yesterday = 'yesterday';
    case lastWeek = 'last_week';
    case LastMonth = 'last_month';
    case LastYear = 'last_year';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }

}
