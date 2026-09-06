<?php

namespace Panopto\Auth;

class LogOnWithPasswordResponse
{

    /**
     * @var bool|null $LogOnWithPasswordResult
     */
    protected $LogOnWithPasswordResult = null;

    /**
     * @param bool $LogOnWithPasswordResult
     */
    public function __construct($LogOnWithPasswordResult)
    {
      $this->LogOnWithPasswordResult = $LogOnWithPasswordResult;
    }

    /**
     * @return bool
     */
    public function getLogOnWithPasswordResult()
    {
        return $this->LogOnWithPasswordResult;
    }

    /**
     * @param bool $LogOnWithPasswordResult
     * @return LogOnWithPasswordResponse
     */
    public function setLogOnWithPasswordResult($LogOnWithPasswordResult): LogOnWithPasswordResponse
    {
        $this->LogOnWithPasswordResult = $LogOnWithPasswordResult;
        return $this;
    }

}
