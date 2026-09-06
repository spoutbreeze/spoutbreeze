<?php

namespace Panopto\SessionManagement;

class UpdateSessionsAvailabilityStartSettings
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ArrayOfguid|null $sessionIds
     */
    protected $sessionIds = null;

    /**
     * @var SessionStartSettingType|null $settingType
     */
    protected $settingType = null;

    /**
     * @var \DateTime|string|null $startDate
     */
    protected \DateTime|string|null $startDate = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfguid $sessionIds
     * @param SessionStartSettingType $settingType
     * @param \DateTime $startDate
     */
    public function __construct($auth, $sessionIds, $settingType, \DateTime $startDate)
    {
      $this->auth = $auth;
      $this->sessionIds = $sessionIds;
      $this->settingType = $settingType;
      $this->startDate = $startDate->format(\DateTime::ATOM);
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
     * @return UpdateSessionsAvailabilityStartSettings
     */
    public function setAuth($auth): UpdateSessionsAvailabilityStartSettings
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getSessionIds()
    {
        return $this->sessionIds;
    }

    /**
     * @param ArrayOfguid $sessionIds
     * @return UpdateSessionsAvailabilityStartSettings
     */
    public function setSessionIds($sessionIds): UpdateSessionsAvailabilityStartSettings
    {
        $this->sessionIds = $sessionIds;
        return $this;
    }

    /**
     * @return SessionStartSettingType
     */
    public function getSettingType()
    {
        return $this->settingType;
    }

    /**
     * @param SessionStartSettingType $settingType
     * @return UpdateSessionsAvailabilityStartSettings
     */
    public function setSettingType($settingType): UpdateSessionsAvailabilityStartSettings
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
     * @return UpdateSessionsAvailabilityStartSettings
     */
    public function setStartDate(\DateTime $startDate): UpdateSessionsAvailabilityStartSettings
    {
        $this->startDate = $startDate->format(\DateTime::ATOM);
        return $this;
    }

}
