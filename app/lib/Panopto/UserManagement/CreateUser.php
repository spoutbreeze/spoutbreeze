<?php

namespace Panopto\UserManagement;

class CreateUser
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var User|null $user
     */
    protected $user = null;

    /**
     * @var string|null $initialPassword
     */
    protected $initialPassword = null;

    /**
     * @param AuthenticationInfo $auth
     * @param User $user
     * @param string $initialPassword
     */
    public function __construct($auth, $user, $initialPassword)
    {
      $this->auth = $auth;
      $this->user = $user;
      $this->initialPassword = $initialPassword;
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
     * @return CreateUser
     */
    public function setAuth($auth): CreateUser
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return CreateUser
     */
    public function setUser($user): CreateUser
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getInitialPassword()
    {
        return $this->initialPassword;
    }

    /**
     * @param string $initialPassword
     * @return CreateUser
     */
    public function setInitialPassword($initialPassword): CreateUser
    {
        $this->initialPassword = $initialPassword;
        return $this;
    }

}
