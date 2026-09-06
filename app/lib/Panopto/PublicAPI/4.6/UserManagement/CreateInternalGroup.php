<?php

namespace Panopto\UserManagement;

class CreateInternalGroup
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
     * @var ArrayOfguid|null $memberIds
     */
    protected $memberIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $groupName
     * @param ArrayOfguid $memberIds
     */
    public function __construct($auth, $groupName, $memberIds)
    {
      $this->auth = $auth;
      $this->groupName = $groupName;
      $this->memberIds = $memberIds;
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
     * @return CreateInternalGroup
     */
    public function setAuth($auth): CreateInternalGroup
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
     * @return CreateInternalGroup
     */
    public function setGroupName($groupName): CreateInternalGroup
    {
        $this->groupName = $groupName;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getMemberIds()
    {
        return $this->memberIds;
    }

    /**
     * @param ArrayOfguid $memberIds
     * @return CreateInternalGroup
     */
    public function setMemberIds($memberIds): CreateInternalGroup
    {
        $this->memberIds = $memberIds;
        return $this;
    }

}
