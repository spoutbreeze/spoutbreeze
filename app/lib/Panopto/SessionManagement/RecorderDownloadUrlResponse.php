<?php

namespace Panopto\SessionManagement;

class RecorderDownloadUrlResponse
{

    /**
     * @var string|null $MacRecorderDownloadUrl
     */
    protected $MacRecorderDownloadUrl = null;

    /**
     * @var string|null $WindowsRecorderDownloadUrl
     */
    protected $WindowsRecorderDownloadUrl = null;

    /**
     * @var string|null $WindowsRemoteRecorderDownloadUrl
     */
    protected $WindowsRemoteRecorderDownloadUrl = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getMacRecorderDownloadUrl()
    {
        return $this->MacRecorderDownloadUrl;
    }

    /**
     * @param string $MacRecorderDownloadUrl
     * @return RecorderDownloadUrlResponse
     */
    public function setMacRecorderDownloadUrl($MacRecorderDownloadUrl): RecorderDownloadUrlResponse
    {
        $this->MacRecorderDownloadUrl = $MacRecorderDownloadUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getWindowsRecorderDownloadUrl()
    {
        return $this->WindowsRecorderDownloadUrl;
    }

    /**
     * @param string $WindowsRecorderDownloadUrl
     * @return RecorderDownloadUrlResponse
     */
    public function setWindowsRecorderDownloadUrl($WindowsRecorderDownloadUrl): RecorderDownloadUrlResponse
    {
        $this->WindowsRecorderDownloadUrl = $WindowsRecorderDownloadUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getWindowsRemoteRecorderDownloadUrl()
    {
        return $this->WindowsRemoteRecorderDownloadUrl;
    }

    /**
     * @param string $WindowsRemoteRecorderDownloadUrl
     * @return RecorderDownloadUrlResponse
     */
    public function setWindowsRemoteRecorderDownloadUrl($WindowsRemoteRecorderDownloadUrl): RecorderDownloadUrlResponse
    {
        $this->WindowsRemoteRecorderDownloadUrl = $WindowsRemoteRecorderDownloadUrl;
        return $this;
    }

}
