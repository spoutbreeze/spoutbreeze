<?php

namespace Panopto\UsageReporting;

class GetRecurringReports
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
     * @param AuthenticationInfo $auth
     * @param StatsReportType $reportType
     */
    public function __construct($auth, $reportType)
    {
      $this->auth = $auth;
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
     * @return GetRecurringReports
     */
    public function setAuth($auth): GetRecurringReports
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
     * @return GetRecurringReports
     */
    public function setReportType($reportType): GetRecurringReports
    {
        $this->reportType = $reportType;
        return $this;
    }

}
