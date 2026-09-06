<?php

namespace Panopto\UsageReporting;

class GetUserDetailedUsageResponse
{

    /**
     * @var DetailedUsageResponse|null $GetUserDetailedUsageResult
     */
    protected $GetUserDetailedUsageResult = null;

    /**
     * @param DetailedUsageResponse $GetUserDetailedUsageResult
     */
    public function __construct($GetUserDetailedUsageResult)
    {
      $this->GetUserDetailedUsageResult = $GetUserDetailedUsageResult;
    }

    /**
     * @return DetailedUsageResponse
     */
    public function getGetUserDetailedUsageResult()
    {
        return $this->GetUserDetailedUsageResult;
    }

    /**
     * @param DetailedUsageResponse $GetUserDetailedUsageResult
     * @return GetUserDetailedUsageResponse
     */
    public function setGetUserDetailedUsageResult($GetUserDetailedUsageResult): GetUserDetailedUsageResponse
    {
        $this->GetUserDetailedUsageResult = $GetUserDetailedUsageResult;
        return $this;
    }

}
