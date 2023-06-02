<?php

namespace PiwikPro\ReportingApi\Query;

/**
 * Specify data which should be serialized to JSON.
 */
trait JsonSerializer
{
    /**
     * It serializes object.
     *
     * @return mixed
     *   Data which can be serialized by json_encode, which is a value of any type other than a resource.
     */
    public function jsonSerialize(): mixed
    {
        return array_filter(get_object_vars($this), function ($value) {
            return !is_null($value);
        });
    }
}
