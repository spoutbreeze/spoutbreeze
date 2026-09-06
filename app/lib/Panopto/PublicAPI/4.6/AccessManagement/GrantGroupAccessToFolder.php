<?php

namespace Panopto\AccessManagement;

class GrantGroupAccessToFolder
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $folderId
     */
    protected $folderId = null;

    /**
     * @var string|null $groupId
     */
    protected $groupId = null;

    /**
     * @var AccessRole|null $role
     */
    protected $role = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $folderId
     * @param string $groupId
     * @param AccessRole $role
     */
    public function __construct($auth, $folderId, $groupId, $role)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
      $this->groupId = $groupId;
      $this->role = $role;
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
     * @return GrantGroupAccessToFolder
     */
    public function setAuth($auth): GrantGroupAccessToFolder
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getFolderId()
    {
        return $this->folderId;
    }

    /**
     * @param string $folderId
     * @return GrantGroupAccessToFolder
     */
    public function setFolderId($folderId): GrantGroupAccessToFolder
    {
        $this->folderId = $folderId;
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
     * @return GrantGroupAccessToFolder
     */
    public function setGroupId($groupId): GrantGroupAccessToFolder
    {
        $this->groupId = $groupId;
        return $this;
    }

    /**
     * @return AccessRole
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param AccessRole $role
     * @return GrantGroupAccessToFolder
     */
    public function setRole($role): GrantGroupAccessToFolder
    {
        $this->role = $role;
        return $this;
    }

}
