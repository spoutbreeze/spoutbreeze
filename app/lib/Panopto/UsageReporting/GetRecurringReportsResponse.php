<?php

namespace Panopto\UsageReporting;

class GetRecurringReportsResponse
{

    /**
     * @var ArrayOfRecurringStatsReportDefinition|null $GetRecurringReportsResult
     */
    protected $GetRecurringReportsResult = null;

    /**
     * @param ArrayOfRecurringStatsReportDefinition $GetRecurringReportsResult
     */
    public function __construct($GetRecurringReportsResult)
    {
      $this->GetRecurringReportsResult = $GetRecurringReportsResult;
    }

    /**
     * @return ArrayOfRecurringStatsReportDefinition
     */
    public function getGetRecurringReportsResult()
    {
        return $this->GetRecurringReportsResult;
    }

    /**
     * @param ArrayOfRecurringStatsReportDefinition $GetRecurringReportsResult
     * @return GetRecurringReportsResponse
     */
    public function setGetRecurringReportsResult($GetRecurringReportsResult): GetRecurringReportsResponse
    {
        $this->GetRecurringReportsResult = $GetRecurringReportsResult;
        return $this;
    }

}
