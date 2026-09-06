<?php

namespace Panopto\UserManagement;

class CreateUsers
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ArrayOfUser|null $users
     */
    protected $users = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfUser $users
     */
    public function __construct($auth, $users)
    {
      $this->auth = $auth;
      $this->users = $users;
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
     * @return CreateUsers
     */
    public function setAuth($auth): CreateUsers
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ArrayOfUser
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param ArrayOfUser $users
     * @return CreateUsers
     */
    public function setUsers($users): CreateUsers
    {
        $this->users = $users;
        return $this;
    }

}
