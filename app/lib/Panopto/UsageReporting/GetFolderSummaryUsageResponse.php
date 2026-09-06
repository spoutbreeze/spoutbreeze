<?php

namespace Panopto\UsageReporting;

class GetFolderSummaryUsageResponse
{

    /**
     * @var ArrayOfSummaryUsageResponseItem|null $GetFolderSummaryUsageResult
     */
    protected $GetFolderSummaryUsageResult = null;

    /**
     * @param ArrayOfSummaryUsageResponseItem $GetFolderSummaryUsageResult
     */
    public function __construct($GetFolderSummaryUsageResult)
    {
      $this->GetFolderSummaryUsageResult = $GetFolderSummaryUsageResult;
    }

    /**
     * @return ArrayOfSummaryUsageResponseItem
     */
    public function getGetFolderSummaryUsageResult()
    {
        return $this->GetFolderSummaryUsageResult;
    }

    /**
     * @param ArrayOfSummaryUsageResponseItem $GetFolderSummaryUsageResult
     * @return GetFolderSummaryUsageResponse
     */
    public function setGetFolderSummaryUsageResult($GetFolderSummaryUsageResult): GetFolderSummaryUsageResponse
    {
        $this->GetFolderSummaryUsageResult = $GetFolderSummaryUsageResult;
        return $this;
    }

}
