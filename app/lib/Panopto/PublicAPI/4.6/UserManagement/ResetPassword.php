<?php

namespace Panopto\UserManagement;

class ResetPassword
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
     * @param AuthenticationInfo $auth
     * @param string $userId
     */
    public function __construct($auth, $userId)
    {
      $this->auth = $auth;
      $this->userId = $userId;
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
     * @return ResetPassword
     */
    public function setAuth($auth): ResetPassword
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
     * @return ResetPassword
     */
    public function setUserId($userId): ResetPassword
    {
        $this->userId = $userId;
        return $this;
    }

}
