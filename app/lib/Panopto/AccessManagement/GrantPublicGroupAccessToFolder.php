<?php

namespace Panopto\AccessManagement;

class GrantPublicGroupAccessToFolder
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
     * @return GrantPublicGroupAccessToFolder
     */
    public function setAuth($auth): GrantPublicGroupAccessToFolder
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
     * @return GrantPublicGroupAccessToFolder
     */
    public function setFolderId($folderId): GrantPublicGroupAccessToFolder
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
     * @return GrantPublicGroupAccessToFolder
     */
    public function setRole($role): GrantPublicGroupAccessToFolder
    {
        $this->role = $role;
        return $this;
    }

}
