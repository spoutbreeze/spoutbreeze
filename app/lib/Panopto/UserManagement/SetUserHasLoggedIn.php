<?php

namespace Panopto\UserManagement;

class SetUserHasLoggedIn
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
     * @return SetUserHasLoggedIn
     */
    public function setAuth($auth): SetUserHasLoggedIn
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
     * @return SetUserHasLoggedIn
     */
    public function setUserId($userId): SetUserHasLoggedIn
    {
        $this->userId = $userId;
        return $this;
    }

}
