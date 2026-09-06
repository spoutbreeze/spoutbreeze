<?php

namespace Panopto\Auth;

class LogOnWithExternalProviderResponse
{

    /**
     * @var bool|null $LogOnWithExternalProviderResult
     */
    protected $LogOnWithExternalProviderResult = null;

    /**
     * @param bool $LogOnWithExternalProviderResult
     */
    public function __construct($LogOnWithExternalProviderResult)
    {
      $this->LogOnWithExternalProviderResult = $LogOnWithExternalProviderResult;
    }

    /**
     * @return bool
     */
    public function getLogOnWithExternalProviderResult()
    {
        return $this->LogOnWithExternalProviderResult;
    }

    /**
     * @param bool $LogOnWithExternalProviderResult
     * @return LogOnWithExternalProviderResponse
     */
    public function setLogOnWithExternalProviderResult($LogOnWithExternalProviderResult): LogOnWithExternalProviderResponse
    {
        $this->LogOnWithExternalProviderResult = $LogOnWithExternalProviderResult;
        return $this;
    }

}
