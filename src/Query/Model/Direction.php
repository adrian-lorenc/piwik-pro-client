<?php

namespace PiwikPro\ReportingApi\Query\Model;

/**
 * Order direction.
 */
enum Direction: string implements \JsonSerializable
{
    case ASC = 'asc';
    case DESC = 'desc';

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
