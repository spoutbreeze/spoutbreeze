<?php

namespace Panopto\UserManagement;

class RemoveMembersFromInternalGroup
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
     * @return RemoveMembersFromInternalGroup
     */
    public function setAuth($auth): RemoveMembersFromInternalGroup
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
     * @return RemoveMembersFromInternalGroup
     */
    public function setGroupId($groupId): RemoveMembersFromInternalGroup
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
     * @return RemoveMembersFromInternalGroup
     */
    public function setMemberIds($memberIds): RemoveMembersFromInternalGroup
    {
        $this->memberIds = $memberIds;
        return $this;
    }

}
