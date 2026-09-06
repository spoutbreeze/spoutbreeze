<?php

namespace Panopto\SessionManagement;

class ReplaceMachineCaptionsAndUploadTranscript
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
     * @return ReplaceMachineCaptionsAndUploadTranscript
     */
    public function setAuth($auth): ReplaceMachineCaptionsAndUploadTranscript
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
     * @return ReplaceMachineCaptionsAndUploadTranscript
     */
    public function setSessionId($sessionId): ReplaceMachineCaptionsAndUploadTranscript
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
     * @return ReplaceMachineCaptionsAndUploadTranscript
     */
    public function setFile($file): ReplaceMachineCaptionsAndUploadTranscript
    {
        $this->file = $file;
        return $this;
    }

}
