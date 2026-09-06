<?php

namespace Panopto\SessionManagement;

class AreUsersNotesPublic
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $userId
     */
    protected $userId = null;

    /**
     * @var string|null $sessionId
     */
    protected $sessionId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $userId
     * @param string $sessionId
     */
    public function __construct($auth, $userId, $sessionId)
    {
      $this->auth = $auth;
      $this->userId = $userId;
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
     * @return AreUsersNotesPublic
     */
    public function setAuth($auth): AreUsersNotesPublic
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return AreUsersNotesPublic
     */
    public function setUserId($userId): AreUsersNotesPublic
    {
        $this->userId = $userId;
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
     * @return AreUsersNotesPublic
     */
    public function setSessionId($sessionId): AreUsersNotesPublic
    {
        $this->sessionId = $sessionId;
        return $this;
    }

}
