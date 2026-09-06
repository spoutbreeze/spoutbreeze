<?php

namespace Panopto\SessionManagement;

class UpdateFoldersAvailabilityStartSettingsResponse
{

    /**
     * @var bool|null $UpdateFoldersAvailabilityStartSettingsResult
     */
    protected $UpdateFoldersAvailabilityStartSettingsResult = null;

    /**
     * @param bool $UpdateFoldersAvailabilityStartSettingsResult
     */
    public function __construct($UpdateFoldersAvailabilityStartSettingsResult)
    {
      $this->UpdateFoldersAvailabilityStartSettingsResult = $UpdateFoldersAvailabilityStartSettingsResult;
    }

    /**
     * @return bool
     */
    public function getUpdateFoldersAvailabilityStartSettingsResult()
    {
        return $this->UpdateFoldersAvailabilityStartSettingsResult;
    }

    /**
     * @param bool $UpdateFoldersAvailabilityStartSettingsResult
     * @return UpdateFoldersAvailabilityStartSettingsResponse
     */
    public function setUpdateFoldersAvailabilityStartSettingsResult($UpdateFoldersAvailabilityStartSettingsResult): UpdateFoldersAvailabilityStartSettingsResponse
    {
        $this->UpdateFoldersAvailabilityStartSettingsResult = $UpdateFoldersAvailabilityStartSettingsResult;
        return $this;
    }

}
