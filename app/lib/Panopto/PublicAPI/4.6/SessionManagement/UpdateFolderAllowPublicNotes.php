<?php

namespace Panopto\SessionManagement;

class UpdateFolderAllowPublicNotes
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
     * @var bool|null $allowPublicNotes
     */
    protected $allowPublicNotes = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $folderId
     * @param bool $allowPublicNotes
     */
    public function __construct($auth, $folderId, $allowPublicNotes)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
      $this->allowPublicNotes = $allowPublicNotes;
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
     * @return UpdateFolderAllowPublicNotes
     */
    public function setAuth($auth): UpdateFolderAllowPublicNotes
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
     * @return UpdateFolderAllowPublicNotes
     */
    public function setFolderId($folderId): UpdateFolderAllowPublicNotes
    {
        $this->folderId = $folderId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAllowPublicNotes()
    {
        return $this->allowPublicNotes;
    }

    /**
     * @param bool $allowPublicNotes
     * @return UpdateFolderAllowPublicNotes
     */
    public function setAllowPublicNotes($allowPublicNotes): UpdateFolderAllowPublicNotes
    {
        $this->allowPublicNotes = $allowPublicNotes;
        return $this;
    }

}
