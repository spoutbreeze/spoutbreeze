<?php

namespace Panopto\UsageReporting;

class QueueReport
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var StatsReportType|null $reportType
     */
    protected $reportType = null;

    /**
     * @var \DateTime|string|null $startTime
     */
    protected \DateTime|string|null $startTime = null;

    /**
     * @var \DateTime|string|null $endTime
     */
    protected \DateTime|string|null $endTime = null;

    /**
     * @param AuthenticationInfo $auth
     * @param StatsReportType $reportType
     * @param \DateTime $startTime
     * @param \DateTime $endTime
     */
    public function __construct($auth, $reportType, \DateTime $startTime, \DateTime $endTime)
    {
      $this->auth = $auth;
      $this->reportType = $reportType;
      $this->startTime = $startTime->format(\DateTime::ATOM);
      $this->endTime = $endTime->format(\DateTime::ATOM);
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
     * @return QueueReport
     */
    public function setAuth($auth): QueueReport
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return StatsReportType
     */
    public function getReportType()
    {
        return $this->reportType;
    }

    /**
     * @param StatsReportType $reportType
     * @return QueueReport
     */
    public function setReportType($reportType): QueueReport
    {
        $this->reportType = $reportType;
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getStartTime(): \DateTime|bool|null
    {
        if ($this->startTime == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->startTime);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime $startTime
     * @return QueueReport
     */
    public function setStartTime(\DateTime $startTime): QueueReport
    {
        $this->startTime = $startTime->format(\DateTime::ATOM);
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getEndTime(): \DateTime|bool|null
    {
        if ($this->endTime == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->endTime);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime $endTime
     * @return QueueReport
     */
    public function setEndTime(\DateTime $endTime): QueueReport
    {
        $this->endTime = $endTime->format(\DateTime::ATOM);
        return $this;
    }

}
