<?php

namespace Panopto\UsageReporting;

class CreateRecurringReportResponse
{

    /**
     * @var string|null $CreateRecurringReportResult
     */
    protected $CreateRecurringReportResult = null;

    /**
     * @param string $CreateRecurringReportResult
     */
    public function __construct($CreateRecurringReportResult)
    {
      $this->CreateRecurringReportResult = $CreateRecurringReportResult;
    }

    /**
     * @return string
     */
    public function getCreateRecurringReportResult()
    {
        return $this->CreateRecurringReportResult;
    }

    /**
     * @param string $CreateRecurringReportResult
     * @return CreateRecurringReportResponse
     */
    public function setCreateRecurringReportResult($CreateRecurringReportResult): CreateRecurringReportResponse
    {
        $this->CreateRecurringReportResult = $CreateRecurringReportResult;
        return $this;
    }

}
