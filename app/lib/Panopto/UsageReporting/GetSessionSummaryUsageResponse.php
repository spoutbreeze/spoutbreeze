<?php

namespace Panopto\UsageReporting;

class GetSessionSummaryUsageResponse
{

    /**
     * @var ArrayOfSummaryUsageResponseItem|null $GetSessionSummaryUsageResult
     */
    protected $GetSessionSummaryUsageResult = null;

    /**
     * @param ArrayOfSummaryUsageResponseItem $GetSessionSummaryUsageResult
     */
    public function __construct($GetSessionSummaryUsageResult)
    {
      $this->GetSessionSummaryUsageResult = $GetSessionSummaryUsageResult;
    }

    /**
     * @return ArrayOfSummaryUsageResponseItem
     */
    public function getGetSessionSummaryUsageResult()
    {
        return $this->GetSessionSummaryUsageResult;
    }

    /**
     * @param ArrayOfSummaryUsageResponseItem $GetSessionSummaryUsageResult
     * @return GetSessionSummaryUsageResponse
     */
    public function setGetSessionSummaryUsageResult($GetSessionSummaryUsageResult): GetSessionSummaryUsageResponse
    {
        $this->GetSessionSummaryUsageResult = $GetSessionSummaryUsageResult;
        return $this;
    }

}
