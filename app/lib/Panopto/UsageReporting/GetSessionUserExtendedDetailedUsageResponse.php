<?php

namespace Panopto\UsageReporting;

class GetSessionUserExtendedDetailedUsageResponse
{

    /**
     * @var ExtendedDetailedUsageResponse|null $GetSessionUserExtendedDetailedUsageResult
     */
    protected $GetSessionUserExtendedDetailedUsageResult = null;

    /**
     * @param ExtendedDetailedUsageResponse $GetSessionUserExtendedDetailedUsageResult
     */
    public function __construct($GetSessionUserExtendedDetailedUsageResult)
    {
      $this->GetSessionUserExtendedDetailedUsageResult = $GetSessionUserExtendedDetailedUsageResult;
    }

    /**
     * @return ExtendedDetailedUsageResponse
     */
    public function getGetSessionUserExtendedDetailedUsageResult()
    {
        return $this->GetSessionUserExtendedDetailedUsageResult;
    }

    /**
     * @param ExtendedDetailedUsageResponse $GetSessionUserExtendedDetailedUsageResult
     * @return GetSessionUserExtendedDetailedUsageResponse
     */
    public function setGetSessionUserExtendedDetailedUsageResult($GetSessionUserExtendedDetailedUsageResult): GetSessionUserExtendedDetailedUsageResponse
    {
        $this->GetSessionUserExtendedDetailedUsageResult = $GetSessionUserExtendedDetailedUsageResult;
        return $this;
    }

}
