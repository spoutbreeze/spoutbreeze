<?php

namespace Panopto\SessionManagement;

class ListSessionRTMPStreamKeys
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
     * @return ListSessionRTMPStreamKeys
     */
    public function setAuth($auth): ListSessionRTMPStreamKeys
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
     * @return ListSessionRTMPStreamKeys
     */
    public function setSessionId($sessionId): ListSessionRTMPStreamKeys
    {
        $this->sessionId = $sessionId;
        return $this;
    }

}
