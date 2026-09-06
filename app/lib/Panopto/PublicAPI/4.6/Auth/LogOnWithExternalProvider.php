<?php

namespace Panopto\Auth;

class LogOnWithExternalProvider
{

    /**
     * @var string|null $userKey
     */
    protected $userKey = null;

    /**
     * @var string|null $authCode
     */
    protected $authCode = null;

    /**
     * @param string $userKey
     * @param string $authCode
     */
    public function __construct($userKey, $authCode)
    {
      $this->userKey = $userKey;
      $this->authCode = $authCode;
    }

    /**
     * @return string
     */
    public function getUserKey()
    {
        return $this->userKey;
    }

    /**
     * @param string $userKey
     * @return LogOnWithExternalProvider
     */
    public function setUserKey($userKey): LogOnWithExternalProvider
    {
        $this->userKey = $userKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * @param string $authCode
     * @return LogOnWithExternalProvider
     */
    public function setAuthCode($authCode): LogOnWithExternalProvider
    {
        $this->authCode = $authCode;
        return $this;
    }

}
