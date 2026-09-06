<?php

namespace Panopto\UsageReporting;

class DescribeReportTypes
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @param AuthenticationInfo $auth
     */
    public function __construct($auth)
    {
      $this->auth = $auth;
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
     * @return DescribeReportTypes
     */
    public function setAuth($auth): DescribeReportTypes
    {
        $this->auth = $auth;
        return $this;
    }

}
