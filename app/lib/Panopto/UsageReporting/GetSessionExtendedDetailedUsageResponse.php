<?php

namespace Panopto\UsageReporting;

class GetSessionExtendedDetailedUsageResponse
{

    /**
     * @var ExtendedDetailedUsageResponse|null $GetSessionExtendedDetailedUsageResult
     */
    protected $GetSessionExtendedDetailedUsageResult = null;

    /**
     * @param ExtendedDetailedUsageResponse $GetSessionExtendedDetailedUsageResult
     */
    public function __construct($GetSessionExtendedDetailedUsageResult)
    {
      $this->GetSessionExtendedDetailedUsageResult = $GetSessionExtendedDetailedUsageResult;
    }

    /**
     * @return ExtendedDetailedUsageResponse
     */
    public function getGetSessionExtendedDetailedUsageResult()
    {
        return $this->GetSessionExtendedDetailedUsageResult;
    }

    /**
     * @param ExtendedDetailedUsageResponse $GetSessionExtendedDetailedUsageResult
     * @return GetSessionExtendedDetailedUsageResponse
     */
    public function setGetSessionExtendedDetailedUsageResult($GetSessionExtendedDetailedUsageResult): GetSessionExtendedDetailedUsageResponse
    {
        $this->GetSessionExtendedDetailedUsageResult = $GetSessionExtendedDetailedUsageResult;
        return $this;
    }

}
