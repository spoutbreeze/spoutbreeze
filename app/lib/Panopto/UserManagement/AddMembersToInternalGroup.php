<?php

namespace Panopto\UserManagement;

class AddMembersToInternalGroup
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
     * @var ArrayOfguid|null $memberIds
     */
    protected $memberIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $groupId
     * @param ArrayOfguid $memberIds
     */
    public function __construct($auth, $groupId, $memberIds)
    {
      $this->auth = $auth;
      $this->groupId = $groupId;
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
     * @return AddMembersToInternalGroup
     */
    public function setAuth($auth): AddMembersToInternalGroup
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
     * @return AddMembersToInternalGroup
     */
    public function setGroupId($groupId): AddMembersToInternalGroup
    {
        $this->groupId = $groupId;
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
     * @return AddMembersToInternalGroup
     */
    public function setMemberIds($memberIds): AddMembersToInternalGroup
    {
        $this->memberIds = $memberIds;
        return $this;
    }

}
