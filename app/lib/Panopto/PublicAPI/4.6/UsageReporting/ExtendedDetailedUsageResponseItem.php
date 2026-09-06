<?php

namespace Panopto\UsageReporting;

class ExtendedDetailedUsageResponseItem extends DetailedUsageResponseItem
{

    /**
     * @var float|null $PlaybackSpeed
     */
    protected $PlaybackSpeed = null;

    /**
     * @var ExtendedDetailedUsageResponseItemStartReasons|null $StartReason
     */
    protected $StartReason = null;

    /**
     * @var ExtendedDetailedUsageResponseItemStopReasons|null $StopReason
     */
    protected $StopReason = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return float
     */
    public function getPlaybackSpeed()
    {
        return $this->PlaybackSpeed;
    }

    /**
     * @param float $PlaybackSpeed
     * @return ExtendedDetailedUsageResponseItem
     */
    public function setPlaybackSpeed($PlaybackSpeed): ExtendedDetailedUsageResponseItem
    {
        $this->PlaybackSpeed = $PlaybackSpeed;
        return $this;
    }

    /**
     * @return ExtendedDetailedUsageResponseItemStartReasons
     */
    public function getStartReason()
    {
        return $this->StartReason;
    }

    /**
     * @param ExtendedDetailedUsageResponseItemStartReasons $StartReason
     * @return ExtendedDetailedUsageResponseItem
     */
    public function setStartReason($StartReason): ExtendedDetailedUsageResponseItem
    {
        $this->StartReason = $StartReason;
        return $this;
    }

    /**
     * @return ExtendedDetailedUsageResponseItemStopReasons
     */
    public function getStopReason()
    {
        return $this->StopReason;
    }

    /**
     * @param ExtendedDetailedUsageResponseItemStopReasons $StopReason
     * @return ExtendedDetailedUsageResponseItem
     */
    public function setStopReason($StopReason): ExtendedDetailedUsageResponseItem
    {
        $this->StopReason = $StopReason;
        return $this;
    }

}
