<?php

namespace PiwikPro\ReportingApi\Query\Model;

use JsonSerializable;

/**
 * Logical operator (AND/OR) for the clause.
 */
enum Operator implements JsonSerializable
{
    case and;
    case or;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
