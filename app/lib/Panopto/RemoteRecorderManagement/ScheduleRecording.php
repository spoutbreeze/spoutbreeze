<?php

namespace Panopto\RemoteRecorderManagement;

class ScheduleRecording
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $name
     */
    protected $name = null;

    /**
     * @var string|null $folderId
     */
    protected $folderId = null;

    /**
     * @var bool|null $isBroadcast
     */
    protected $isBroadcast = null;

    /**
     * @var \DateTime|string|null $start
     */
    protected \DateTime|string|null $start = null;

    /**
     * @var \DateTime|string|null $end
     */
    protected \DateTime|string|null $end = null;

    /**
     * @var ArrayOfRecorderSettings|null $recorderSettings
     */
    protected $recorderSettings = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $name
     * @param string $folderId
     * @param bool $isBroadcast
     * @param \DateTime $start
     * @param \DateTime $end
     * @param ArrayOfRecorderSettings $recorderSettings
     */
    public function __construct($auth, $name, $folderId, $isBroadcast, \DateTime $start, \DateTime $end, $recorderSettings)
    {
      $this->auth = $auth;
      $this->name = $name;
      $this->folderId = $folderId;
      $this->isBroadcast = $isBroadcast;
      $this->start = $start->format(\DateTime::ATOM);
      $this->end = $end->format(\DateTime::ATOM);
      $this->recorderSettings = $recorderSettings;
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
     * @return ScheduleRecording
     */
    public function setAuth($auth): ScheduleRecording
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ScheduleRecording
     */
    public function setName($name): ScheduleRecording
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getFolderId()
    {
        return $this->folderId;
    }

    /**
     * @param string $folderId
     * @return ScheduleRecording
     */
    public function setFolderId($folderId): ScheduleRecording
    {
        $this->folderId = $folderId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsBroadcast()
    {
        return $this->isBroadcast;
    }

    /**
     * @param bool $isBroadcast
     * @return ScheduleRecording
     */
    public function setIsBroadcast($isBroadcast): ScheduleRecording
    {
        $this->isBroadcast = $isBroadcast;
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getStart(): \DateTime|bool|null
    {
        if ($this->start == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->start);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime $start
     * @return ScheduleRecording
     */
    public function setStart(\DateTime $start): ScheduleRecording
    {
        $this->start = $start->format(\DateTime::ATOM);
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getEnd(): \DateTime|bool|null
    {
        if ($this->end == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->end);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime $end
     * @return ScheduleRecording
     */
    public function setEnd(\DateTime $end): ScheduleRecording
    {
        $this->end = $end->format(\DateTime::ATOM);
        return $this;
    }

    /**
     * @return ArrayOfRecorderSettings
     */
    public function getRecorderSettings()
    {
        return $this->recorderSettings;
    }

    /**
     * @param ArrayOfRecorderSettings $recorderSettings
     * @return ScheduleRecording
     */
    public function setRecorderSettings($recorderSettings): ScheduleRecording
    {
        $this->recorderSettings = $recorderSettings;
        return $this;
    }

}
