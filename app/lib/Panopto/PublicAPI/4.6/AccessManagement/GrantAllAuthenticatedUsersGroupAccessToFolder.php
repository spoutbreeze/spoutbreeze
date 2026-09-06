<?php

namespace Panopto\AccessManagement;

class GrantAllAuthenticatedUsersGroupAccessToFolder
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
     * @var AccessRole|null $role
     */
    protected $role = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $folderId
     * @param AccessRole $role
     */
    public function __construct($auth, $folderId, $role)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
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
     * @return GrantAllAuthenticatedUsersGroupAccessToFolder
     */
    public function setAuth($auth): GrantAllAuthenticatedUsersGroupAccessToFolder
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
     * @return GrantAllAuthenticatedUsersGroupAccessToFolder
     */
    public function setFolderId($folderId): GrantAllAuthenticatedUsersGroupAccessToFolder
    {
        $this->folderId = $folderId;
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
     * @return GrantAllAuthenticatedUsersGroupAccessToFolder
     */
    public function setRole($role): GrantAllAuthenticatedUsersGroupAccessToFolder
    {
        $this->role = $role;
        return $this;
    }

}
