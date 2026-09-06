<?php

namespace Panopto\UserManagement;

class GetGroupsByName
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $groupName
     */
    protected $groupName = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $groupName
     */
    public function __construct($auth, $groupName)
    {
      $this->auth = $auth;
      $this->groupName = $groupName;
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
     * @return GetGroupsByName
     */
    public function setAuth($auth): GetGroupsByName
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * @param string $groupName
     * @return GetGroupsByName
     */
    public function setGroupName($groupName): GetGroupsByName
    {
        $this->groupName = $groupName;
        return $this;
    }

}
