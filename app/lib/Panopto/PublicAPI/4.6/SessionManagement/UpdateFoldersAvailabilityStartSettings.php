<?php

namespace Panopto\SessionManagement;

class UpdateFoldersAvailabilityStartSettings
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ArrayOfguid|null $folderIds
     */
    protected $folderIds = null;

    /**
     * @var FolderStartSettingType|null $settingType
     */
    protected $settingType = null;

    /**
     * @var \DateTime|string|null $startDate
     */
    protected \DateTime|string|null $startDate = null;

    /**
     * @var bool|null $overrideSessionsSettings
     */
    protected $overrideSessionsSettings = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfguid $folderIds
     * @param FolderStartSettingType $settingType
     * @param \DateTime $startDate
     * @param bool $overrideSessionsSettings
     */
    public function __construct($auth, $folderIds, $settingType, \DateTime $startDate, $overrideSessionsSettings)
    {
      $this->auth = $auth;
      $this->folderIds = $folderIds;
      $this->settingType = $settingType;
      $this->startDate = $startDate->format(\DateTime::ATOM);
      $this->overrideSessionsSettings = $overrideSessionsSettings;
    }

    /**
     * @return AuthenticationInfo
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param AuthenticationInfo $auth
     * @return UpdateFoldersAvailabilityStartSettings
     */
    public function setAuth($auth): UpdateFoldersAvailabilityStartSettings
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getFolderIds()
    {
        return $this->folderIds;
    }

    /**
     * @param ArrayOfguid $folderIds
     * @return UpdateFoldersAvailabilityStartSettings
     */
    public function setFolderIds($folderIds): UpdateFoldersAvailabilityStartSettings
    {
        $this->folderIds = $folderIds;
        return $this;
    }

    /**
     * @return FolderStartSettingType
     */
    public function getSettingType()
    {
        return $this->settingType;
    }

    /**
     * @param FolderStartSettingType $settingType
     * @return UpdateFoldersAvailabilityStartSettings
     */
    public function setSettingType($settingType): UpdateFoldersAvailabilityStartSettings
    {
        $this->settingType = $settingType;
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getStartDate(): \DateTime|bool|null
    {
        if ($this->startDate == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->startDate);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime $startDate
     * @return UpdateFoldersAvailabilityStartSettings
     */
    public function setStartDate(\DateTime $startDate): UpdateFoldersAvailabilityStartSettings
    {
        $this->startDate = $startDate->format(\DateTime::ATOM);
        return $this;
    }

    /**
     * @return bool
     */
    public function getOverrideSessionsSettings()
    {
        return $this->overrideSessionsSettings;
    }

    /**
     * @param bool $overrideSessionsSettings
     * @return UpdateFoldersAvailabilityStartSettings
     */
    public function setOverrideSessionsSettings($overrideSessionsSettings): UpdateFoldersAvailabilityStartSettings
    {
        $this->overrideSessionsSettings = $overrideSessionsSettings;
        return $this;
    }

}
