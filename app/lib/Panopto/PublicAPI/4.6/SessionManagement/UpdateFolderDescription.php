<?php

namespace Panopto\SessionManagement;

class UpdateFolderDescription
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
     * @var string|null $description
     */
    protected $description = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $folderId
     * @param string $description
     */
    public function __construct($auth, $folderId, $description)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
      $this->description = $description;
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
     * @return UpdateFolderDescription
     */
    public function setAuth($auth): UpdateFolderDescription
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
     * @return UpdateFolderDescription
     */
    public function setFolderId($folderId): UpdateFolderDescription
    {
        $this->folderId = $folderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return UpdateFolderDescription
     */
    public function setDescription($description): UpdateFolderDescription
    {
        $this->description = $description;
        return $this;
    }

}
