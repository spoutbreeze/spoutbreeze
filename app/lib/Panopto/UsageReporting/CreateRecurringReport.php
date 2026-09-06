<?php

namespace Panopto\UsageReporting;

class CreateRecurringReport
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var RecurringReportCadence|null $cadenceType
     */
    protected $cadenceType = null;

    /**
     * @var int|null $cadenceOffset
     */
    protected $cadenceOffset = null;

    /**
     * @var StatsReportType|null $reportType
     */
    protected $reportType = null;

    /**
     * @param AuthenticationInfo $auth
     * @param RecurringReportCadence $cadenceType
     * @param int $cadenceOffset
     * @param StatsReportType $reportType
     */
    public function __construct($auth, $cadenceType, $cadenceOffset, $reportType)
    {
      $this->auth = $auth;
      $this->cadenceType = $cadenceType;
      $this->cadenceOffset = $cadenceOffset;
      $this->reportType = $reportType;
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
     * @return CreateRecurringReport
     */
    public function setAuth($auth): CreateRecurringReport
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return RecurringReportCadence
     */
    public function getCadenceType()
    {
        return $this->cadenceType;
    }

    /**
     * @param RecurringReportCadence $cadenceType
     * @return CreateRecurringReport
     */
    public function setCadenceType($cadenceType): CreateRecurringReport
    {
        $this->cadenceType = $cadenceType;
        return $this;
    }

    /**
     * @return int
     */
    public function getCadenceOffset()
    {
        return $this->cadenceOffset;
    }

    /**
     * @param int $cadenceOffset
     * @return CreateRecurringReport
     */
    public function setCadenceOffset($cadenceOffset): CreateRecurringReport
    {
        $this->cadenceOffset = $cadenceOffset;
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
     * @return CreateRecurringReport
     */
    public function setReportType($reportType): CreateRecurringReport
    {
        $this->reportType = $reportType;
        return $this;
    }

}
