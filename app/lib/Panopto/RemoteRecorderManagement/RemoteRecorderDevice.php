<?php

namespace Panopto\RemoteRecorderManagement;

class RemoteRecorderDevice
{

    /**
     * @var RemoteRecorderDeviceType|null $DeviceType
     */
    protected $DeviceType = null;

    /**
     * @var bool|null $IsCapturing
     */
    protected $IsCapturing = null;

    /**
     * @var string|null $Name
     */
    protected $Name = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return RemoteRecorderDeviceType
     */
    public function getDeviceType()
    {
        return $this->DeviceType;
    }

    /**
     * @param RemoteRecorderDeviceType $DeviceType
     * @return RemoteRecorderDevice
     */
    public function setDeviceType($DeviceType): RemoteRecorderDevice
    {
        $this->DeviceType = $DeviceType;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsCapturing()
    {
        return $this->IsCapturing;
    }

    /**
     * @param bool $IsCapturing
     * @return RemoteRecorderDevice
     */
    public function setIsCapturing($IsCapturing): RemoteRecorderDevice
    {
        $this->IsCapturing = $IsCapturing;
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
     * @return RemoteRecorderDevice
     */
    public function setName($Name): RemoteRecorderDevice
    {
        $this->Name = $Name;
        return $this;
    }

}
