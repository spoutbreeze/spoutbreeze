<?php

namespace Panopto\UsageReporting;

class GetRecentReports
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
     * @return GetRecentReports
     */
    public function setAuth($auth): GetRecentReports
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
     * @return GetRecentReports
     */
    public function setReportType($reportType): GetRecentReports
    {
        $this->reportType = $reportType;
        return $this;
    }

}
