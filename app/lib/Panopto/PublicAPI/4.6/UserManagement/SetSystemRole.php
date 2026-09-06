<?php

namespace Panopto\UserManagement;

class SetSystemRole
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
     * @var SystemRole|null $role
     */
    protected $role = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $userId
     * @param SystemRole $role
     */
    public function __construct($auth, $userId, $role)
    {
      $this->auth = $auth;
      $this->userId = $userId;
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
     * @return SetSystemRole
     */
    public function setAuth($auth): SetSystemRole
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
     * @return SetSystemRole
     */
    public function setUserId($userId): SetSystemRole
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return SystemRole
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param SystemRole $role
     * @return SetSystemRole
     */
    public function setRole($role): SetSystemRole
    {
        $this->role = $role;
        return $this;
    }

}
