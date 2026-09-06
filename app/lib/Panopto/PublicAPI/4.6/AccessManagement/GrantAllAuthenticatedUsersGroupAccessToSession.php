<?php

namespace Panopto\AccessManagement;

class GrantAllAuthenticatedUsersGroupAccessToSession
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
     * @return GrantAllAuthenticatedUsersGroupAccessToSession
     */
    public function setAuth($auth): GrantAllAuthenticatedUsersGroupAccessToSession
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
     * @return GrantAllAuthenticatedUsersGroupAccessToSession
     */
    public function setSessionId($sessionId): GrantAllAuthenticatedUsersGroupAccessToSession
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
     * @return GrantAllAuthenticatedUsersGroupAccessToSession
     */
    public function setRole($role): GrantAllAuthenticatedUsersGroupAccessToSession
    {
        $this->role = $role;
        return $this;
    }

}
