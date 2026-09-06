<?php

namespace Panopto\SessionManagement;

class SetNotesPublic
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
     * @var bool|null $areNotesPublic
     */
    protected $areNotesPublic = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param bool $areNotesPublic
     */
    public function __construct($auth, $sessionId, $areNotesPublic)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->areNotesPublic = $areNotesPublic;
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
     * @return SetNotesPublic
     */
    public function setAuth($auth): SetNotesPublic
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
     * @return SetNotesPublic
     */
    public function setSessionId($sessionId): SetNotesPublic
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAreNotesPublic()
    {
        return $this->areNotesPublic;
    }

    /**
     * @param bool $areNotesPublic
     * @return SetNotesPublic
     */
    public function setAreNotesPublic($areNotesPublic): SetNotesPublic
    {
        $this->areNotesPublic = $areNotesPublic;
        return $this;
    }

}
