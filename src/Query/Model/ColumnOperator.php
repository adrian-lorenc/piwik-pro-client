<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\Query\Model;

use JsonSerializable;

/**
 * Column filtering operator.
 *
 * Available choices depend on the specified column's type.
 */
enum ColumnOperator implements JsonSerializable
{
    case eq;
    case neq;
    case contains;
    case not_contains;
    case icontains;
    case not_icontains;
    case starts_with;
    case ends_with;
    case matches;
    case not_matches;
    case gt;
    case gte;
    case lt;
    case lte;
    case empty;
    case not_empty;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
