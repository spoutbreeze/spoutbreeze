<?php

namespace Panopto\SessionManagement;

class GetSessionsAvailabilitySettingsResponse
{

    /**
     * @var SessionsWithAvailabilitySettings|null $GetSessionsAvailabilitySettingsResult
     */
    protected $GetSessionsAvailabilitySettingsResult = null;

    /**
     * @param SessionsWithAvailabilitySettings $GetSessionsAvailabilitySettingsResult
     */
    public function __construct($GetSessionsAvailabilitySettingsResult)
    {
      $this->GetSessionsAvailabilitySettingsResult = $GetSessionsAvailabilitySettingsResult;
    }

    /**
     * @return SessionsWithAvailabilitySettings
     */
    public function getGetSessionsAvailabilitySettingsResult()
    {
        return $this->GetSessionsAvailabilitySettingsResult;
    }

    /**
     * @param SessionsWithAvailabilitySettings $GetSessionsAvailabilitySettingsResult
     * @return GetSessionsAvailabilitySettingsResponse
     */
    public function setGetSessionsAvailabilitySettingsResult($GetSessionsAvailabilitySettingsResult): GetSessionsAvailabilitySettingsResponse
    {
        $this->GetSessionsAvailabilitySettingsResult = $GetSessionsAvailabilitySettingsResult;
        return $this;
    }

}
