<?php

namespace Panopto\UsageReporting;

class StatsReportStatus
{

    /**
     * @var \DateTime|string|null $EndTime
     */
    protected \DateTime|string|null $EndTime = null;

    /**
     * @var bool|null $IsAvailable
     */
    protected $IsAvailable = null;

    /**
     * @var string|null $ReportId
     */
    protected $ReportId = null;

    /**
     * @var \DateTime|string|null $ReportTime
     */
    protected \DateTime|string|null $ReportTime = null;

    /**
     * @var StatsReportType|null $ReportType
     */
    protected $ReportType = null;

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
     * @return StatsReportStatus
     */
    public function setEndTime(?\DateTime $EndTime = null): StatsReportStatus
    {
        if ($EndTime == null) {
            $this->EndTime = null;
        } else {
            $this->EndTime = $EndTime->format(\DateTime::ATOM);
        }
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsAvailable()
    {
        return $this->IsAvailable;
    }

    /**
     * @param bool $IsAvailable
     * @return StatsReportStatus
     */
    public function setIsAvailable($IsAvailable): StatsReportStatus
    {
        $this->IsAvailable = $IsAvailable;
        return $this;
    }

    /**
     * @return string
     */
    public function getReportId()
    {
        return $this->ReportId;
    }

    /**
     * @param string $ReportId
     * @return StatsReportStatus
     */
    public function setReportId($ReportId): StatsReportStatus
    {
        $this->ReportId = $ReportId;
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getReportTime(): \DateTime|bool|null
    {
        if ($this->ReportTime == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->ReportTime);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime|null $ReportTime
     * @return StatsReportStatus
     */
    public function setReportTime(?\DateTime $ReportTime = null): StatsReportStatus
    {
        if ($ReportTime == null) {
            $this->ReportTime = null;
        } else {
            $this->ReportTime = $ReportTime->format(\DateTime::ATOM);
        }
        return $this;
    }

    /**
     * @return StatsReportType
     */
    public function getReportType()
    {
        return $this->ReportType;
    }

    /**
     * @param StatsReportType $ReportType
     * @return StatsReportStatus
     */
    public function setReportType($ReportType): StatsReportStatus
    {
        $this->ReportType = $ReportType;
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
     * @return StatsReportStatus
     */
    public function setStartTime(?\DateTime $StartTime = null): StatsReportStatus
    {
        if ($StartTime == null) {
            $this->StartTime = null;
        } else {
            $this->StartTime = $StartTime->format(\DateTime::ATOM);
        }
        return $this;
    }

}
