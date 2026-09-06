<?php

namespace Panopto\AccessManagement;

class RevokeUsersAccessFromFolder
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
     * @return RevokeUsersAccessFromFolder
     */
    public function setAuth($auth): RevokeUsersAccessFromFolder
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
     * @return RevokeUsersAccessFromFolder
     */
    public function setFolderId($folderId): RevokeUsersAccessFromFolder
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
     * @return RevokeUsersAccessFromFolder
     */
    public function setUserIds($userIds): RevokeUsersAccessFromFolder
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
     * @return RevokeUsersAccessFromFolder
     */
    public function setRole($role): RevokeUsersAccessFromFolder
    {
        $this->role = $role;
        return $this;
    }

}
