<?php

namespace Panopto\SessionManagement;

class GetFoldersByExternalId
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
     * @return GetFoldersByExternalId
     */
    public function setAuth($auth): GetFoldersByExternalId
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
     * @return GetFoldersByExternalId
     */
    public function setFolderExternalIds($folderExternalIds): GetFoldersByExternalId
    {
        $this->folderExternalIds = $folderExternalIds;
        return $this;
    }

}
