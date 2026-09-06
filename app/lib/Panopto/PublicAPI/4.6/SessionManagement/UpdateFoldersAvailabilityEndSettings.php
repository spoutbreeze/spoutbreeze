<?php

namespace Panopto\SessionManagement;

class UpdateFoldersAvailabilityEndSettings
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
     * @var FolderEndSettingType|null $settingType
     */
    protected $settingType = null;

    /**
     * @var \DateTime|string|null $endDate
     */
    protected \DateTime|string|null $endDate = null;

    /**
     * @var bool|null $overrideSessionsSettings
     */
    protected $overrideSessionsSettings = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfguid $folderIds
     * @param FolderEndSettingType $settingType
     * @param \DateTime $endDate
     * @param bool $overrideSessionsSettings
     */
    public function __construct($auth, $folderIds, $settingType, \DateTime $endDate, $overrideSessionsSettings)
    {
      $this->auth = $auth;
      $this->folderIds = $folderIds;
      $this->settingType = $settingType;
      $this->endDate = $endDate->format(\DateTime::ATOM);
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
     * @return UpdateFoldersAvailabilityEndSettings
     */
    public function setAuth($auth): UpdateFoldersAvailabilityEndSettings
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
     * @return UpdateFoldersAvailabilityEndSettings
     */
    public function setFolderIds($folderIds): UpdateFoldersAvailabilityEndSettings
    {
        $this->folderIds = $folderIds;
        return $this;
    }

    /**
     * @return FolderEndSettingType
     */
    public function getSettingType()
    {
        return $this->settingType;
    }

    /**
     * @param FolderEndSettingType $settingType
     * @return UpdateFoldersAvailabilityEndSettings
     */
    public function setSettingType($settingType): UpdateFoldersAvailabilityEndSettings
    {
        $this->settingType = $settingType;
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getEndDate(): \DateTime|bool|null
    {
        if ($this->endDate == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->endDate);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime $endDate
     * @return UpdateFoldersAvailabilityEndSettings
     */
    public function setEndDate(\DateTime $endDate): UpdateFoldersAvailabilityEndSettings
    {
        $this->endDate = $endDate->format(\DateTime::ATOM);
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
     * @return UpdateFoldersAvailabilityEndSettings
     */
    public function setOverrideSessionsSettings($overrideSessionsSettings): UpdateFoldersAvailabilityEndSettings
    {
        $this->overrideSessionsSettings = $overrideSessionsSettings;
        return $this;
    }

}
