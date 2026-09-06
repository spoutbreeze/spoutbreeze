<?php

namespace Panopto\SessionManagement;

class UpdateFolderAllowSessionDownload
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
     * @var bool|null $allowSessionDownload
     */
    protected $allowSessionDownload = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $folderId
     * @param bool $allowSessionDownload
     */
    public function __construct($auth, $folderId, $allowSessionDownload)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
      $this->allowSessionDownload = $allowSessionDownload;
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
     * @return UpdateFolderAllowSessionDownload
     */
    public function setAuth($auth): UpdateFolderAllowSessionDownload
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
     * @return UpdateFolderAllowSessionDownload
     */
    public function setFolderId($folderId): UpdateFolderAllowSessionDownload
    {
        $this->folderId = $folderId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAllowSessionDownload()
    {
        return $this->allowSessionDownload;
    }

    /**
     * @param bool $allowSessionDownload
     * @return UpdateFolderAllowSessionDownload
     */
    public function setAllowSessionDownload($allowSessionDownload): UpdateFolderAllowSessionDownload
    {
        $this->allowSessionDownload = $allowSessionDownload;
        return $this;
    }

}
