<?php

namespace Panopto\Auth;

class GetAuthenticatedUrlResponse
{

    /**
     * @var string|null $GetAuthenticatedUrlResult
     */
    protected $GetAuthenticatedUrlResult = null;

    /**
     * @param string $GetAuthenticatedUrlResult
     */
    public function __construct($GetAuthenticatedUrlResult)
    {
      $this->GetAuthenticatedUrlResult = $GetAuthenticatedUrlResult;
    }

    /**
     * @return string
     */
    public function getGetAuthenticatedUrlResult()
    {
        return $this->GetAuthenticatedUrlResult;
    }

    /**
     * @param string $GetAuthenticatedUrlResult
     * @return GetAuthenticatedUrlResponse
     */
    public function setGetAuthenticatedUrlResult($GetAuthenticatedUrlResult): GetAuthenticatedUrlResponse
    {
        $this->GetAuthenticatedUrlResult = $GetAuthenticatedUrlResult;
        return $this;
    }

}
