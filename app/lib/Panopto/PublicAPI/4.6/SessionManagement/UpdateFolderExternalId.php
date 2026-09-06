<?php

namespace Panopto\SessionManagement;

class UpdateFolderExternalId
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
     * @var string|null $externalId
     */
    protected $externalId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $folderId
     * @param string $externalId
     */
    public function __construct($auth, $folderId, $externalId)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
      $this->externalId = $externalId;
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
     * @return UpdateFolderExternalId
     */
    public function setAuth($auth): UpdateFolderExternalId
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
     * @return UpdateFolderExternalId
     */
    public function setFolderId($folderId): UpdateFolderExternalId
    {
        $this->folderId = $folderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     * @return UpdateFolderExternalId
     */
    public function setExternalId($externalId): UpdateFolderExternalId
    {
        $this->externalId = $externalId;
        return $this;
    }

}
