<?php

declare(strict_types=1);

namespace PiwikPro\ReportingApi\Query\Parameter;

use PiwikPro\ReportingApi\Query\Model\ColumnFormat;

/**
 * ColumnFormat param.
 */
trait ColumnFormatTrait
{
    /**
     * Format of the columns header (in CSV responses) and metadata labels (in JSON responses).
     *
     * @var ColumnFormat
     */
    protected ColumnFormat $column_format = ColumnFormat::id;

    /**
     * Sets column format.
     *
     * @param ColumnFormat $columnFormat
     *   date.
     *
     * @return $this
     *   Query object.
     */
    public function setColumnFormat(ColumnFormat $columnFormat): static
    {
        $this->column_format = $columnFormat;

        return $this;
    }
}
