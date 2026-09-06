<?php

namespace Panopto\SessionManagement;

class UploadTranscript
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
     * @var string|null $file
     */
    protected $file = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param string $file
     */
    public function __construct($auth, $sessionId, $file)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->file = $file;
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
     * @return UploadTranscript
     */
    public function setAuth($auth): UploadTranscript
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
     * @return UploadTranscript
     */
    public function setSessionId($sessionId): UploadTranscript
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     * @return UploadTranscript
     */
    public function setFile($file): UploadTranscript
    {
        $this->file = $file;
        return $this;
    }

}
