<?php

namespace Panopto\SessionManagement;

class GetFoldersWithExternalContextByExternalId
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ArrayOfstring|null $folderExternalIds
     */
    protected $folderExternalIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfstring $folderExternalIds
     */
    public function __construct($auth, $folderExternalIds)
    {
      $this->auth = $auth;
      $this->folderExternalIds = $folderExternalIds;
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
     * @return GetFoldersWithExternalContextByExternalId
     */
    public function setAuth($auth): GetFoldersWithExternalContextByExternalId
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getFolderExternalIds()
    {
        return $this->folderExternalIds;
    }

    /**
     * @param ArrayOfstring $folderExternalIds
     * @return GetFoldersWithExternalContextByExternalId
     */
    public function setFolderExternalIds($folderExternalIds): GetFoldersWithExternalContextByExternalId
    {
        $this->folderExternalIds = $folderExternalIds;
        return $this;
    }

}
