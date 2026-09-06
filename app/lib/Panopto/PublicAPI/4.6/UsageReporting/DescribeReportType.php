<?php

namespace Panopto\UsageReporting;

class DescribeReportType
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
     * @return DescribeReportType
     */
    public function setAuth($auth): DescribeReportType
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
     * @return DescribeReportType
     */
    public function setReportType($reportType): DescribeReportType
    {
        $this->reportType = $reportType;
        return $this;
    }

}
