<?php

namespace PiwikPro\ReportingApi\Query\Model;

use JsonSerializable;

/**
 * Column format.
 *
 * Format of the columns header (in CSV responses) and metadata labels (in JSON responses).
 */
enum ColumnFormat implements JsonSerializable
{
    // Identifiers.
    case id;

    // Human-readable names.
    case name;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
