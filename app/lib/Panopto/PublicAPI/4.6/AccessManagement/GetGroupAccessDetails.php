<?php

namespace Panopto\AccessManagement;

class GetGroupAccessDetails
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
     * @return GetGroupAccessDetails
     */
    public function setAuth($auth): GetGroupAccessDetails
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
     * @return GetGroupAccessDetails
     */
    public function setGroupId($groupId): GetGroupAccessDetails
    {
        $this->groupId = $groupId;
        return $this;
    }

}
