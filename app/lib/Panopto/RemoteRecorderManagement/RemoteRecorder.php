<?php

namespace Panopto\RemoteRecorderManagement;

class RemoteRecorder
{

    /**
     * @var ArrayOfRemoteRecorderDevice|null $Devices
     */
    protected $Devices = null;

    /**
     * @var string|null $ExternalId
     */
    protected $ExternalId = null;

    /**
     * @var string|null $Id
     */
    protected $Id = null;

    /**
     * @var string|null $MachineIP
     */
    protected $MachineIP = null;

    /**
     * @var string|null $Name
     */
    protected $Name = null;

    /**
     * @var string|null $PreviewUrl
     */
    protected $PreviewUrl = null;

    /**
     * @var ArrayOfguid|null $ScheduledRecordings
     */
    protected $ScheduledRecordings = null;

    /**
     * @var string|null $SettingsUrl
     */
    protected $SettingsUrl = null;

    /**
     * @var RemoteRecorderState|null $State
     */
    protected $State = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ArrayOfRemoteRecorderDevice
     */
    public function getDevices()
    {
        return $this->Devices;
    }

    /**
     * @param ArrayOfRemoteRecorderDevice $Devices
     * @return RemoteRecorder
     */
    public function setDevices($Devices): RemoteRecorder
    {
        $this->Devices = $Devices;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->ExternalId;
    }

    /**
     * @param string $ExternalId
     * @return RemoteRecorder
     */
    public function setExternalId($ExternalId): RemoteRecorder
    {
        $this->ExternalId = $ExternalId;
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param string $Id
     * @return RemoteRecorder
     */
    public function setId($Id): RemoteRecorder
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return string
     */
    public function getMachineIP()
    {
        return $this->MachineIP;
    }

    /**
     * @param string $MachineIP
     * @return RemoteRecorder
     */
    public function setMachineIP($MachineIP): RemoteRecorder
    {
        $this->MachineIP = $MachineIP;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     * @return RemoteRecorder
     */
    public function setName($Name): RemoteRecorder
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPreviewUrl()
    {
        return $this->PreviewUrl;
    }

    /**
     * @param string $PreviewUrl
     * @return RemoteRecorder
     */
    public function setPreviewUrl($PreviewUrl): RemoteRecorder
    {
        $this->PreviewUrl = $PreviewUrl;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getScheduledRecordings()
    {
        return $this->ScheduledRecordings;
    }

    /**
     * @param ArrayOfguid $ScheduledRecordings
     * @return RemoteRecorder
     */
    public function setScheduledRecordings($ScheduledRecordings): RemoteRecorder
    {
        $this->ScheduledRecordings = $ScheduledRecordings;
        return $this;
    }

    /**
     * @return string
     */
    public function getSettingsUrl()
    {
        return $this->SettingsUrl;
    }

    /**
     * @param string $SettingsUrl
     * @return RemoteRecorder
     */
    public function setSettingsUrl($SettingsUrl): RemoteRecorder
    {
        $this->SettingsUrl = $SettingsUrl;
        return $this;
    }

    /**
     * @return RemoteRecorderState
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * @param RemoteRecorderState $State
     * @return RemoteRecorder
     */
    public function setState($State): RemoteRecorder
    {
        $this->State = $State;
        return $this;
    }

}
