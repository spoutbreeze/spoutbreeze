<?php

namespace Panopto\UsageReporting;

class GetUserExtendedDetailedUsageResponse
{

    /**
     * @var ExtendedDetailedUsageResponse|null $GetUserExtendedDetailedUsageResult
     */
    protected $GetUserExtendedDetailedUsageResult = null;

    /**
     * @param ExtendedDetailedUsageResponse $GetUserExtendedDetailedUsageResult
     */
    public function __construct($GetUserExtendedDetailedUsageResult)
    {
      $this->GetUserExtendedDetailedUsageResult = $GetUserExtendedDetailedUsageResult;
    }

    /**
     * @return ExtendedDetailedUsageResponse
     */
    public function getGetUserExtendedDetailedUsageResult()
    {
        return $this->GetUserExtendedDetailedUsageResult;
    }

    /**
     * @param ExtendedDetailedUsageResponse $GetUserExtendedDetailedUsageResult
     * @return GetUserExtendedDetailedUsageResponse
     */
    public function setGetUserExtendedDetailedUsageResult($GetUserExtendedDetailedUsageResult): GetUserExtendedDetailedUsageResponse
    {
        $this->GetUserExtendedDetailedUsageResult = $GetUserExtendedDetailedUsageResult;
        return $this;
    }

}
