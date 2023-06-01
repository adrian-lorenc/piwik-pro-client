<?php

namespace PiwikPro\ReportingApi\Query;


trait JsonSerializer
{

    public function jsonSerialize(): mixed
    {
        return array_filter(get_object_vars($this), function ($value) {
            return !is_null($value);
        });
    }

}
