<?php

namespace Panopto\SessionManagement;

class UpdateSessionsAvailabilityEndSettings
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
     * @var SessionEndSettingType|null $settingType
     */
    protected $settingType = null;

    /**
     * @var \DateTime|string|null $endDate
     */
    protected \DateTime|string|null $endDate = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfguid $sessionIds
     * @param SessionEndSettingType $settingType
     * @param \DateTime $endDate
     */
    public function __construct($auth, $sessionIds, $settingType, \DateTime $endDate)
    {
      $this->auth = $auth;
      $this->sessionIds = $sessionIds;
      $this->settingType = $settingType;
      $this->endDate = $endDate->format(\DateTime::ATOM);
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
     * @return UpdateSessionsAvailabilityEndSettings
     */
    public function setAuth($auth): UpdateSessionsAvailabilityEndSettings
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
     * @return UpdateSessionsAvailabilityEndSettings
     */
    public function setSessionIds($sessionIds): UpdateSessionsAvailabilityEndSettings
    {
        $this->sessionIds = $sessionIds;
        return $this;
    }

    /**
     * @return SessionEndSettingType
     */
    public function getSettingType()
    {
        return $this->settingType;
    }

    /**
     * @param SessionEndSettingType $settingType
     * @return UpdateSessionsAvailabilityEndSettings
     */
    public function setSettingType($settingType): UpdateSessionsAvailabilityEndSettings
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
     * @return UpdateSessionsAvailabilityEndSettings
     */
    public function setEndDate(\DateTime $endDate): UpdateSessionsAvailabilityEndSettings
    {
        $this->endDate = $endDate->format(\DateTime::ATOM);
        return $this;
    }

}
