<?php

namespace Panopto\AccessManagement;

class RevokeAllImplicitGroupAccessToSession
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $sessionId
     */
    protected $sessionId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     */
    public function __construct($auth, $sessionId)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
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
     * @return RevokeAllImplicitGroupAccessToSession
     */
    public function setAuth($auth): RevokeAllImplicitGroupAccessToSession
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     * @return RevokeAllImplicitGroupAccessToSession
     */
    public function setSessionId($sessionId): RevokeAllImplicitGroupAccessToSession
    {
        $this->sessionId = $sessionId;
        return $this;
    }

}
