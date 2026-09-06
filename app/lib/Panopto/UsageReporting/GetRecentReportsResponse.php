<?php

namespace Panopto\UsageReporting;

class GetRecentReportsResponse
{

    /**
     * @var ArrayOfStatsReportStatus|null $GetRecentReportsResult
     */
    protected $GetRecentReportsResult = null;

    /**
     * @param ArrayOfStatsReportStatus $GetRecentReportsResult
     */
    public function __construct($GetRecentReportsResult)
    {
      $this->GetRecentReportsResult = $GetRecentReportsResult;
    }

    /**
     * @return ArrayOfStatsReportStatus
     */
    public function getGetRecentReportsResult()
    {
        return $this->GetRecentReportsResult;
    }

    /**
     * @param ArrayOfStatsReportStatus $GetRecentReportsResult
     * @return GetRecentReportsResponse
     */
    public function setGetRecentReportsResult($GetRecentReportsResult): GetRecentReportsResponse
    {
        $this->GetRecentReportsResult = $GetRecentReportsResult;
        return $this;
    }

}
