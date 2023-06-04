<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\Query;

/**
 * Query interface.
 */
interface QueryInterface
{
    /**
     * Gets query uri.
     *
     * @return string
     *   Query uri.
     */
    public function getUri(): string;
}
