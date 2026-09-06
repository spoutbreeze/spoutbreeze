<?php

namespace Panopto\AccessManagement;

class UpdateFolderIsPublic
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
     * @var bool|null $isPublic
     */
    protected $isPublic = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $folderId
     * @param bool $isPublic
     */
    public function __construct($auth, $folderId, $isPublic)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
      $this->isPublic = $isPublic;
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
     * @return UpdateFolderIsPublic
     */
    public function setAuth($auth): UpdateFolderIsPublic
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
     * @return UpdateFolderIsPublic
     */
    public function setFolderId($folderId): UpdateFolderIsPublic
    {
        $this->folderId = $folderId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * @param bool $isPublic
     * @return UpdateFolderIsPublic
     */
    public function setIsPublic($isPublic): UpdateFolderIsPublic
    {
        $this->isPublic = $isPublic;
        return $this;
    }

}
