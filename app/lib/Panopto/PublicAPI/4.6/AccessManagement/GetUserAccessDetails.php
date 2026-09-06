<?php

namespace Panopto\AccessManagement;

class GetUserAccessDetails
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
     * @return GetUserAccessDetails
     */
    public function setAuth($auth): GetUserAccessDetails
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
     * @return GetUserAccessDetails
     */
    public function setUserId($userId): GetUserAccessDetails
    {
        $this->userId = $userId;
        return $this;
    }

}
