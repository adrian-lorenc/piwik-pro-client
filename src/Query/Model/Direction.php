<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\Query\Model;

use JsonSerializable;

/**
 * Order direction.
 */
enum Direction: string implements JsonSerializable
{
    case ASC = 'asc';
    case DESC = 'desc';

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
