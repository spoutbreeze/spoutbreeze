<?php

namespace Panopto\SessionManagement;

class GetAllFoldersWithExternalContextByExternalId
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
     * @var ArrayOfstring|null $providerNames
     */
    protected $providerNames = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfstring $folderExternalIds
     * @param ArrayOfstring $providerNames
     */
    public function __construct($auth, $folderExternalIds, $providerNames)
    {
      $this->auth = $auth;
      $this->folderExternalIds = $folderExternalIds;
      $this->providerNames = $providerNames;
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
     * @return GetAllFoldersWithExternalContextByExternalId
     */
    public function setAuth($auth): GetAllFoldersWithExternalContextByExternalId
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
     * @return GetAllFoldersWithExternalContextByExternalId
     */
    public function setFolderExternalIds($folderExternalIds): GetAllFoldersWithExternalContextByExternalId
    {
        $this->folderExternalIds = $folderExternalIds;
        return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getProviderNames()
    {
        return $this->providerNames;
    }

    /**
     * @param ArrayOfstring $providerNames
     * @return GetAllFoldersWithExternalContextByExternalId
     */
    public function setProviderNames($providerNames): GetAllFoldersWithExternalContextByExternalId
    {
        $this->providerNames = $providerNames;
        return $this;
    }

}
