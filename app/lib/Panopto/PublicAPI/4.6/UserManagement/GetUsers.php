<?php

namespace Panopto\UserManagement;

class GetUsers
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ArrayOfguid|null $userIds
     */
    protected $userIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfguid $userIds
     */
    public function __construct($auth, $userIds)
    {
      $this->auth = $auth;
      $this->userIds = $userIds;
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
     * @return GetUsers
     */
    public function setAuth($auth): GetUsers
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getUserIds()
    {
        return $this->userIds;
    }

    /**
     * @param ArrayOfguid $userIds
     * @return GetUsers
     */
    public function setUserIds($userIds): GetUsers
    {
        $this->userIds = $userIds;
        return $this;
    }

}
