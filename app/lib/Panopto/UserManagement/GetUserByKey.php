<?php

namespace Panopto\UserManagement;

class GetUserByKey
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $userKey
     */
    protected $userKey = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $userKey
     */
    public function __construct($auth, $userKey)
    {
      $this->auth = $auth;
      $this->userKey = $userKey;
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
     * @return GetUserByKey
     */
    public function setAuth($auth): GetUserByKey
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserKey()
    {
        return $this->userKey;
    }

    /**
     * @param string $userKey
     * @return GetUserByKey
     */
    public function setUserKey($userKey): GetUserByKey
    {
        $this->userKey = $userKey;
        return $this;
    }

}
