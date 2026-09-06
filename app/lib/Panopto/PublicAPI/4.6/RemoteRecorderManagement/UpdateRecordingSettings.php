<?php

namespace Panopto\RemoteRecorderManagement;

class UpdateRecordingSettings
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
     * @var ArrayOfRecorderSettings|null $recorderSettings
     */
    protected $recorderSettings = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param ArrayOfRecorderSettings $recorderSettings
     */
    public function __construct($auth, $sessionId, $recorderSettings)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->recorderSettings = $recorderSettings;
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
     * @return UpdateRecordingSettings
     */
    public function setAuth($auth): UpdateRecordingSettings
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
     * @return UpdateRecordingSettings
     */
    public function setSessionId($sessionId): UpdateRecordingSettings
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return ArrayOfRecorderSettings
     */
    public function getRecorderSettings()
    {
        return $this->recorderSettings;
    }

    /**
     * @param ArrayOfRecorderSettings $recorderSettings
     * @return UpdateRecordingSettings
     */
    public function setRecorderSettings($recorderSettings): UpdateRecordingSettings
    {
        $this->recorderSettings = $recorderSettings;
        return $this;
    }

}
