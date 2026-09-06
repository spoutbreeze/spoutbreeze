<?php

namespace Panopto\AccessManagement;

class GetFolderAccessDetails
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
     * @return GetFolderAccessDetails
     */
    public function setAuth($auth): GetFolderAccessDetails
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
     * @return GetFolderAccessDetails
     */
    public function setFolderId($folderId): GetFolderAccessDetails
    {
        $this->folderId = $folderId;
        return $this;
    }

}
