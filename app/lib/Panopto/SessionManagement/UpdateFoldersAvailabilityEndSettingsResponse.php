<?php

namespace Panopto\SessionManagement;

class UpdateFoldersAvailabilityEndSettingsResponse
{

    /**
     * @var bool|null $UpdateFoldersAvailabilityEndSettingsResult
     */
    protected $UpdateFoldersAvailabilityEndSettingsResult = null;

    /**
     * @param bool $UpdateFoldersAvailabilityEndSettingsResult
     */
    public function __construct($UpdateFoldersAvailabilityEndSettingsResult)
    {
      $this->UpdateFoldersAvailabilityEndSettingsResult = $UpdateFoldersAvailabilityEndSettingsResult;
    }

    /**
     * @return bool
     */
    public function getUpdateFoldersAvailabilityEndSettingsResult()
    {
        return $this->UpdateFoldersAvailabilityEndSettingsResult;
    }

    /**
     * @param bool $UpdateFoldersAvailabilityEndSettingsResult
     * @return UpdateFoldersAvailabilityEndSettingsResponse
     */
    public function setUpdateFoldersAvailabilityEndSettingsResult($UpdateFoldersAvailabilityEndSettingsResult): UpdateFoldersAvailabilityEndSettingsResponse
    {
        $this->UpdateFoldersAvailabilityEndSettingsResult = $UpdateFoldersAvailabilityEndSettingsResult;
        return $this;
    }

}
