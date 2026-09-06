<?php

namespace Panopto\UserManagement;

class GetUsersInGroup
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $groupId
     */
    protected $groupId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $groupId
     */
    public function __construct($auth, $groupId)
    {
      $this->auth = $auth;
      $this->groupId = $groupId;
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
     * @return GetUsersInGroup
     */
    public function setAuth($auth): GetUsersInGroup
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param string $groupId
     * @return GetUsersInGroup
     */
    public function setGroupId($groupId): GetUsersInGroup
    {
        $this->groupId = $groupId;
        return $this;
    }

}
