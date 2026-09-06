<?php

namespace Panopto\SessionManagement;

class IsDropbox
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
     * @return IsDropbox
     */
    public function setAuth($auth): IsDropbox
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
     * @return IsDropbox
     */
    public function setFolderId($folderId): IsDropbox
    {
        $this->folderId = $folderId;
        return $this;
    }

}
