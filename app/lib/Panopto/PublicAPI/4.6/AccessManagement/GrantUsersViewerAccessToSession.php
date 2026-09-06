<?php

namespace Panopto\AccessManagement;

class GrantUsersViewerAccessToSession
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
     * @var ArrayOfguid|null $userIds
     */
    protected $userIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param ArrayOfguid $userIds
     */
    public function __construct($auth, $sessionId, $userIds)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->userIds = $userIds;
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
     * @return GrantUsersViewerAccessToSession
     */
    public function setAuth($auth): GrantUsersViewerAccessToSession
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
     * @return GrantUsersViewerAccessToSession
     */
    public function setSessionId($sessionId): GrantUsersViewerAccessToSession
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getUserIds()
    {
        return $this->userIds;
    }

    /**
     * @param ArrayOfguid $userIds
     * @return GrantUsersViewerAccessToSession
     */
    public function setUserIds($userIds): GrantUsersViewerAccessToSession
    {
        $this->userIds = $userIds;
        return $this;
    }

}
