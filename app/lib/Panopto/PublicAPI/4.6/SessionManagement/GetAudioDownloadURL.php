<?php

namespace Panopto\SessionManagement;

class GetAudioDownloadURL
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
     * @return GetAudioDownloadURL
     */
    public function setAuth($auth): GetAudioDownloadURL
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
     * @return GetAudioDownloadURL
     */
    public function setSessionId($sessionId): GetAudioDownloadURL
    {
        $this->sessionId = $sessionId;
        return $this;
    }

}
