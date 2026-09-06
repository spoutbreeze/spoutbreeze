<?php

namespace Panopto\AccessManagement;

class RevokeAllImplicitGroupAccessToFolder
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
     * @param AuthenticationInfo $auth
     * @param string $folderId
     */
    public function __construct($auth, $folderId)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
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
     * @return RevokeAllImplicitGroupAccessToFolder
     */
    public function setAuth($auth): RevokeAllImplicitGroupAccessToFolder
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
     * @return RevokeAllImplicitGroupAccessToFolder
     */
    public function setFolderId($folderId): RevokeAllImplicitGroupAccessToFolder
    {
        $this->folderId = $folderId;
        return $this;
    }

}
