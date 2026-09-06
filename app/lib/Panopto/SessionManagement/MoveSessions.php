<?php

namespace Panopto\SessionManagement;

class MoveSessions
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ArrayOfguid|null $sessionIds
     */
    protected $sessionIds = null;

    /**
     * @var string|null $folderId
     */
    protected $folderId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfguid $sessionIds
     * @param string $folderId
     */
    public function __construct($auth, $sessionIds, $folderId)
    {
      $this->auth = $auth;
      $this->sessionIds = $sessionIds;
      $this->folderId = $folderId;
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
     * @return MoveSessions
     */
    public function setAuth($auth): MoveSessions
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getSessionIds()
    {
        return $this->sessionIds;
    }

    /**
     * @param ArrayOfguid $sessionIds
     * @return MoveSessions
     */
    public function setSessionIds($sessionIds): MoveSessions
    {
        $this->sessionIds = $sessionIds;
        return $this;
    }

    /**
     * @return string
     */
    public function getFolderId()
    {
        return $this->folderId;
    }

    /**
     * @param string $folderId
     * @return MoveSessions
     */
    public function setFolderId($folderId): MoveSessions
    {
        $this->folderId = $folderId;
        return $this;
    }

}
