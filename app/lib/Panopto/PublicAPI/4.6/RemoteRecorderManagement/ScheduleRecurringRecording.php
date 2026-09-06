<?php

namespace Panopto\RemoteRecorderManagement;

class ScheduleRecurringRecording
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $scheduledSessionId
     */
    protected $scheduledSessionId = null;

    /**
     * @var ArrayOfDayOfWeek|null $daysOfWeek
     */
    protected $daysOfWeek = null;

    /**
     * @var \DateTime|string|null $end
     */
    protected \DateTime|string|null $end = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $scheduledSessionId
     * @param ArrayOfDayOfWeek $daysOfWeek
     * @param \DateTime $end
     */
    public function __construct($auth, $scheduledSessionId, $daysOfWeek, \DateTime $end)
    {
      $this->auth = $auth;
      $this->scheduledSessionId = $scheduledSessionId;
      $this->daysOfWeek = $daysOfWeek;
      $this->end = $end->format(\DateTime::ATOM);
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
     * @return ScheduleRecurringRecording
     */
    public function setAuth($auth): ScheduleRecurringRecording
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheduledSessionId()
    {
        return $this->scheduledSessionId;
    }

    /**
     * @param string $scheduledSessionId
     * @return ScheduleRecurringRecording
     */
    public function setScheduledSessionId($scheduledSessionId): ScheduleRecurringRecording
    {
        $this->scheduledSessionId = $scheduledSessionId;
        return $this;
    }

    /**
     * @return ArrayOfDayOfWeek
     */
    public function getDaysOfWeek()
    {
        return $this->daysOfWeek;
    }

    /**
     * @param ArrayOfDayOfWeek $daysOfWeek
     * @return ScheduleRecurringRecording
     */
    public function setDaysOfWeek($daysOfWeek): ScheduleRecurringRecording
    {
        $this->daysOfWeek = $daysOfWeek;
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
     * @return ScheduleRecurringRecording
     */
    public function setEnd(\DateTime $end): ScheduleRecurringRecording
    {
        $this->end = $end->format(\DateTime::ATOM);
        return $this;
    }

}
