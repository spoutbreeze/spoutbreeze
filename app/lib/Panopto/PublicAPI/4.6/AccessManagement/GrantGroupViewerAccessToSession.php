<?php

namespace Panopto\AccessManagement;

class GrantGroupViewerAccessToSession
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
     * @return GrantGroupViewerAccessToSession
     */
    public function setAuth($auth): GrantGroupViewerAccessToSession
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
     * @return GrantGroupViewerAccessToSession
     */
    public function setSessionId($sessionId): GrantGroupViewerAccessToSession
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
     * @return GrantGroupViewerAccessToSession
     */
    public function setGroupId($groupId): GrantGroupViewerAccessToSession
    {
        $this->groupId = $groupId;
        return $this;
    }

}
