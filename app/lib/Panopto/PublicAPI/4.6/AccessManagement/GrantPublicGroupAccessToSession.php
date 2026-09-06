<?php

namespace Panopto\AccessManagement;

class GrantPublicGroupAccessToSession
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
     * @var AccessRole|null $role
     */
    protected $role = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param AccessRole $role
     */
    public function __construct($auth, $sessionId, $role)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->role = $role;
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
     * @return GrantPublicGroupAccessToSession
     */
    public function setAuth($auth): GrantPublicGroupAccessToSession
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
     * @return GrantPublicGroupAccessToSession
     */
    public function setSessionId($sessionId): GrantPublicGroupAccessToSession
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return AccessRole
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param AccessRole $role
     * @return GrantPublicGroupAccessToSession
     */
    public function setRole($role): GrantPublicGroupAccessToSession
    {
        $this->role = $role;
        return $this;
    }

}
