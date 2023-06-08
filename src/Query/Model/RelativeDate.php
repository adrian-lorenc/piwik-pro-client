<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\Query\Model;

use JsonSerializable;

/**
 * Relative date.
 */
enum RelativeDate: string implements JsonSerializable
{
    case Today = 'today';
    case Yesterday = 'yesterday';
    case lastWeek = 'last_week';
    case LastMonth = 'last_month';
    case LastYear = 'last_year';

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
