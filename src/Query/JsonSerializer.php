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
     * @return array
     *   Data which can be serialized by json_encode, which is a value of any type other than a resource.
     */
    public function jsonSerialize(): array
    {
        return array_filter(get_object_vars($this), function ($value) {
            return
                // Skip values which are not set.
                !is_null($value)
                &&
                // Skip empty arrays.
                !(is_array($value) && empty($value));
        });
    }
}
