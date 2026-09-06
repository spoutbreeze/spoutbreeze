<?php

namespace Panopto\Auth;

class GetAuthenticatedUrl
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $targetUrl
     */
    protected $targetUrl = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $targetUrl
     */
    public function __construct($auth, $targetUrl)
    {
      $this->auth = $auth;
      $this->targetUrl = $targetUrl;
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
     * @return GetAuthenticatedUrl
     */
    public function setAuth($auth): GetAuthenticatedUrl
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getTargetUrl()
    {
        return $this->targetUrl;
    }

    /**
     * @param string $targetUrl
     * @return GetAuthenticatedUrl
     */
    public function setTargetUrl($targetUrl): GetAuthenticatedUrl
    {
        $this->targetUrl = $targetUrl;
        return $this;
    }

}
