<?php

namespace PiwikPro\ReportingApi\Query\Parameter;

use \DateTimeInterface;

/**
 * Date param.
 */
class Date implements \JsonSerializable
{

    /**
     * Constructs Date.
     *
     * @param \DateTimeInterface $date
     *  Date.
     */
    public function __construct(protected DateTimeInterface $date)
    {
    }

    public function jsonSerialize(): mixed
    {
        return $this->date->format('Y-m-d');
    }

}
