<?php

namespace Panopto\AccessManagement;

class GrantUsersAccessToFolder
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
     * @var ArrayOfguid|null $userIds
     */
    protected $userIds = null;

    /**
     * @var AccessRole|null $role
     */
    protected $role = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $folderId
     * @param ArrayOfguid $userIds
     * @param AccessRole $role
     */
    public function __construct($auth, $folderId, $userIds, $role)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
      $this->userIds = $userIds;
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
     * @return GrantUsersAccessToFolder
     */
    public function setAuth($auth): GrantUsersAccessToFolder
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
     * @return GrantUsersAccessToFolder
     */
    public function setFolderId($folderId): GrantUsersAccessToFolder
    {
        $this->folderId = $folderId;
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
     * @return GrantUsersAccessToFolder
     */
    public function setUserIds($userIds): GrantUsersAccessToFolder
    {
        $this->userIds = $userIds;
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
     * @return GrantUsersAccessToFolder
     */
    public function setRole($role): GrantUsersAccessToFolder
    {
        $this->role = $role;
        return $this;
    }

}
