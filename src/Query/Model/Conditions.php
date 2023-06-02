<?php

namespace PiwikPro\ReportingApi\Query\Model;

use DateTimeInterface;
use JsonSerializable;

/**
 * Conditions.
 */
class Conditions
{
    /**
     * List of filters or recursively nested clauses.
     *
     * @var array
     */
    protected array $conditions = [];
}
