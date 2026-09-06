<?php

namespace Panopto\UsageReporting;

class GetSystemSummaryUsageResponse
{

    /**
     * @var ArrayOfSummaryUsageResponseItem|null $GetSystemSummaryUsageResult
     */
    protected $GetSystemSummaryUsageResult = null;

    /**
     * @param ArrayOfSummaryUsageResponseItem $GetSystemSummaryUsageResult
     */
    public function __construct($GetSystemSummaryUsageResult)
    {
      $this->GetSystemSummaryUsageResult = $GetSystemSummaryUsageResult;
    }

    /**
     * @return ArrayOfSummaryUsageResponseItem
     */
    public function getGetSystemSummaryUsageResult()
    {
        return $this->GetSystemSummaryUsageResult;
    }

    /**
     * @param ArrayOfSummaryUsageResponseItem $GetSystemSummaryUsageResult
     * @return GetSystemSummaryUsageResponse
     */
    public function setGetSystemSummaryUsageResult($GetSystemSummaryUsageResult): GetSystemSummaryUsageResponse
    {
        $this->GetSystemSummaryUsageResult = $GetSystemSummaryUsageResult;
        return $this;
    }

}
