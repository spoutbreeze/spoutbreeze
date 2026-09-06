<?php

namespace Panopto\RemoteRecorderManagement;

class ScheduledRecordingInfo
{

    /**
     * @var \DateTime|string|null $EndTime
     */
    protected \DateTime|string|null $EndTime = null;

    /**
     * @var string|null $SessionID
     */
    protected $SessionID = null;

    /**
     * @var string|null $SessionName
     */
    protected $SessionName = null;

    /**
     * @var \DateTime|string|null $StartTime
     */
    protected \DateTime|string|null $StartTime = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getEndTime(): \DateTime|bool|null
    {
        if ($this->EndTime == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->EndTime);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime|null $EndTime
     * @return ScheduledRecordingInfo
     */
    public function setEndTime(?\DateTime $EndTime = null): ScheduledRecordingInfo
    {
        if ($EndTime == null) {
            $this->EndTime = null;
        } else {
            $this->EndTime = $EndTime->format(\DateTime::ATOM);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionID()
    {
        return $this->SessionID;
    }

    /**
     * @param string $SessionID
     * @return ScheduledRecordingInfo
     */
    public function setSessionID($SessionID): ScheduledRecordingInfo
    {
        $this->SessionID = $SessionID;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionName()
    {
        return $this->SessionName;
    }

    /**
     * @param string $SessionName
     * @return ScheduledRecordingInfo
     */
    public function setSessionName($SessionName): ScheduledRecordingInfo
    {
        $this->SessionName = $SessionName;
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getStartTime(): \DateTime|bool|null
    {
        if ($this->StartTime == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->StartTime);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime|null $StartTime
     * @return ScheduledRecordingInfo
     */
    public function setStartTime(?\DateTime $StartTime = null): ScheduledRecordingInfo
    {
        if ($StartTime == null) {
            $this->StartTime = null;
        } else {
            $this->StartTime = $StartTime->format(\DateTime::ATOM);
        }
        return $this;
    }

}
