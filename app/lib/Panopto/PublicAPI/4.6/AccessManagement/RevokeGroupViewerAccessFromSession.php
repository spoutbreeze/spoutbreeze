<?php

namespace Panopto\AccessManagement;

class RevokeGroupViewerAccessFromSession
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
     * @var string|null $groupId
     */
    protected $groupId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param string $groupId
     */
    public function __construct($auth, $sessionId, $groupId)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->groupId = $groupId;
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
     * @return RevokeGroupViewerAccessFromSession
     */
    public function setAuth($auth): RevokeGroupViewerAccessFromSession
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
     * @return RevokeGroupViewerAccessFromSession
     */
    public function setSessionId($sessionId): RevokeGroupViewerAccessFromSession
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param string $groupId
     * @return RevokeGroupViewerAccessFromSession
     */
    public function setGroupId($groupId): RevokeGroupViewerAccessFromSession
    {
        $this->groupId = $groupId;
        return $this;
    }

}
