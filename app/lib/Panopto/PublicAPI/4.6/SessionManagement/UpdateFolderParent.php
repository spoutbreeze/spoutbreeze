<?php

namespace Panopto\SessionManagement;

class UpdateFolderParent
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
     * @var string|null $parentId
     */
    protected $parentId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $folderId
     * @param string $parentId
     */
    public function __construct($auth, $folderId, $parentId)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
      $this->parentId = $parentId;
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
     * @return UpdateFolderParent
     */
    public function setAuth($auth): UpdateFolderParent
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
     * @return UpdateFolderParent
     */
    public function setFolderId($folderId): UpdateFolderParent
    {
        $this->folderId = $folderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param string $parentId
     * @return UpdateFolderParent
     */
    public function setParentId($parentId): UpdateFolderParent
    {
        $this->parentId = $parentId;
        return $this;
    }

}
