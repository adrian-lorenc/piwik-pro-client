<?php

namespace PiwikPro\ReportingApi\Query\Model;

use DateTimeInterface;
use JsonSerializable;

/**
 * Date param.
 */
class Date implements JsonSerializable
{
    /**
     * Constructs Date.
     *
     * @param DateTimeInterface $date
     *  Date.
     */
    public function __construct(protected DateTimeInterface $date)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): string
    {
        return $this->date->format('Y-m-d');
    }
}
