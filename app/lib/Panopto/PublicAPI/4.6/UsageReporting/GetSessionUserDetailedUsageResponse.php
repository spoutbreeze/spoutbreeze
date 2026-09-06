<?php

namespace Panopto\UsageReporting;

class GetSessionUserDetailedUsageResponse
{

    /**
     * @var DetailedUsageResponse|null $GetSessionUserDetailedUsageResult
     */
    protected $GetSessionUserDetailedUsageResult = null;

    /**
     * @param DetailedUsageResponse $GetSessionUserDetailedUsageResult
     */
    public function __construct($GetSessionUserDetailedUsageResult)
    {
      $this->GetSessionUserDetailedUsageResult = $GetSessionUserDetailedUsageResult;
    }

    /**
     * @return DetailedUsageResponse
     */
    public function getGetSessionUserDetailedUsageResult()
    {
        return $this->GetSessionUserDetailedUsageResult;
    }

    /**
     * @param DetailedUsageResponse $GetSessionUserDetailedUsageResult
     * @return GetSessionUserDetailedUsageResponse
     */
    public function setGetSessionUserDetailedUsageResult($GetSessionUserDetailedUsageResult): GetSessionUserDetailedUsageResponse
    {
        $this->GetSessionUserDetailedUsageResult = $GetSessionUserDetailedUsageResult;
        return $this;
    }

}
