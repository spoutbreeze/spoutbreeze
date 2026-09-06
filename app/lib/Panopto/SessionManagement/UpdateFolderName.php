<?php

namespace Panopto\SessionManagement;

class UpdateFolderName
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
     * @var string|null $name
     */
    protected $name = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $folderId
     * @param string $name
     */
    public function __construct($auth, $folderId, $name)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
      $this->name = $name;
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
     * @return UpdateFolderName
     */
    public function setAuth($auth): UpdateFolderName
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
     * @return UpdateFolderName
     */
    public function setFolderId($folderId): UpdateFolderName
    {
        $this->folderId = $folderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UpdateFolderName
     */
    public function setName($name): UpdateFolderName
    {
        $this->name = $name;
        return $this;
    }

}
