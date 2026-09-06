<?php

namespace Panopto\AccessManagement;

class RevokeUsersViewerAccessFromSession
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
     * @return RevokeUsersViewerAccessFromSession
     */
    public function setAuth($auth): RevokeUsersViewerAccessFromSession
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
     * @return RevokeUsersViewerAccessFromSession
     */
    public function setSessionId($sessionId): RevokeUsersViewerAccessFromSession
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
     * @return RevokeUsersViewerAccessFromSession
     */
    public function setUserIds($userIds): RevokeUsersViewerAccessFromSession
    {
        $this->userIds = $userIds;
        return $this;
    }

}
