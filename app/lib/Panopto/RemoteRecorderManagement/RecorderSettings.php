<?php

namespace Panopto\RemoteRecorderManagement;

class RecorderSettings
{

    /**
     * @var string|null $RecorderId
     */
    protected $RecorderId = null;

    /**
     * @var bool|null $SuppressPrimary
     */
    protected $SuppressPrimary = null;

    /**
     * @var bool|null $SuppressSecondary
     */
    protected $SuppressSecondary = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getRecorderId()
    {
        return $this->RecorderId;
    }

    /**
     * @param string $RecorderId
     * @return RecorderSettings
     */
    public function setRecorderId($RecorderId): RecorderSettings
    {
        $this->RecorderId = $RecorderId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSuppressPrimary()
    {
        return $this->SuppressPrimary;
    }

    /**
     * @param bool $SuppressPrimary
     * @return RecorderSettings
     */
    public function setSuppressPrimary($SuppressPrimary): RecorderSettings
    {
        $this->SuppressPrimary = $SuppressPrimary;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSuppressSecondary()
    {
        return $this->SuppressSecondary;
    }

    /**
     * @param bool $SuppressSecondary
     * @return RecorderSettings
     */
    public function setSuppressSecondary($SuppressSecondary): RecorderSettings
    {
        $this->SuppressSecondary = $SuppressSecondary;
        return $this;
    }

}
