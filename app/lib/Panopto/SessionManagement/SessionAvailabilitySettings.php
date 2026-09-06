<?php

namespace Panopto\SessionManagement;

class SessionAvailabilitySettings
{

    /**
     * @var DateTimeOffset|null $EndSettingDate
     */
    protected $EndSettingDate = null;

    /**
     * @var SessionEndSettingType|null $EndSettingType
     */
    protected $EndSettingType = null;

    /**
     * @var string|null $SessionId
     */
    protected $SessionId = null;

    /**
     * @var DateTimeOffset|null $StartSettingDate
     */
    protected $StartSettingDate = null;

    /**
     * @var SessionStartSettingType|null $StartSettingType
     */
    protected $StartSettingType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return DateTimeOffset
     */
    public function getEndSettingDate()
    {
        return $this->EndSettingDate;
    }

    /**
     * @param DateTimeOffset $EndSettingDate
     * @return SessionAvailabilitySettings
     */
    public function setEndSettingDate($EndSettingDate): SessionAvailabilitySettings
    {
        $this->EndSettingDate = $EndSettingDate;
        return $this;
    }

    /**
     * @return SessionEndSettingType
     */
    public function getEndSettingType()
    {
        return $this->EndSettingType;
    }

    /**
     * @param SessionEndSettingType $EndSettingType
     * @return SessionAvailabilitySettings
     */
    public function setEndSettingType($EndSettingType): SessionAvailabilitySettings
    {
        $this->EndSettingType = $EndSettingType;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->SessionId;
    }

    /**
     * @param string $SessionId
     * @return SessionAvailabilitySettings
     */
    public function setSessionId($SessionId): SessionAvailabilitySettings
    {
        $this->SessionId = $SessionId;
        return $this;
    }

    /**
     * @return DateTimeOffset
     */
    public function getStartSettingDate()
    {
        return $this->StartSettingDate;
    }

    /**
     * @param DateTimeOffset $StartSettingDate
     * @return SessionAvailabilitySettings
     */
    public function setStartSettingDate($StartSettingDate): SessionAvailabilitySettings
    {
        $this->StartSettingDate = $StartSettingDate;
        return $this;
    }

    /**
     * @return SessionStartSettingType
     */
    public function getStartSettingType()
    {
        return $this->StartSettingType;
    }

    /**
     * @param SessionStartSettingType $StartSettingType
     * @return SessionAvailabilitySettings
     */
    public function setStartSettingType($StartSettingType): SessionAvailabilitySettings
    {
        $this->StartSettingType = $StartSettingType;
        return $this;
    }

}
