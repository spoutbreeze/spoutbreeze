<?php

namespace Panopto\SessionManagement;

class UpdateFolderEnablePodcast
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
     * @var bool|null $enablePodcast
     */
    protected $enablePodcast = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $folderId
     * @param bool $enablePodcast
     */
    public function __construct($auth, $folderId, $enablePodcast)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
      $this->enablePodcast = $enablePodcast;
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
     * @return UpdateFolderEnablePodcast
     */
    public function setAuth($auth): UpdateFolderEnablePodcast
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
     * @return UpdateFolderEnablePodcast
     */
    public function setFolderId($folderId): UpdateFolderEnablePodcast
    {
        $this->folderId = $folderId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getEnablePodcast()
    {
        return $this->enablePodcast;
    }

    /**
     * @param bool $enablePodcast
     * @return UpdateFolderEnablePodcast
     */
    public function setEnablePodcast($enablePodcast): UpdateFolderEnablePodcast
    {
        $this->enablePodcast = $enablePodcast;
        return $this;
    }

}
