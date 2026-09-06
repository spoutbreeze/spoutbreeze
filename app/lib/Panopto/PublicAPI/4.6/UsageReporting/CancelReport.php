<?php

namespace Panopto\UsageReporting;

class CancelReport
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $reportId
     */
    protected $reportId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $reportId
     */
    public function __construct($auth, $reportId)
    {
      $this->auth = $auth;
      $this->reportId = $reportId;
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
     * @return CancelReport
     */
    public function setAuth($auth): CancelReport
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getReportId()
    {
        return $this->reportId;
    }

    /**
     * @param string $reportId
     * @return CancelReport
     */
    public function setReportId($reportId): CancelReport
    {
        $this->reportId = $reportId;
        return $this;
    }

}
