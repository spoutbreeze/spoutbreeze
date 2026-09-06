<?php

namespace Panopto\UserManagement;

class DeleteUsers
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
     * @return DeleteUsers
     */
    public function setAuth($auth): DeleteUsers
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
     * @return DeleteUsers
     */
    public function setUserIds($userIds): DeleteUsers
    {
        $this->userIds = $userIds;
        return $this;
    }

}
