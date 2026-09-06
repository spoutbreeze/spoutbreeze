<?php

namespace Panopto\SessionManagement;

class GetFoldersAvailabilitySettings
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ArrayOfguid|null $folderIds
     */
    protected $folderIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfguid $folderIds
     */
    public function __construct($auth, $folderIds)
    {
      $this->auth = $auth;
      $this->folderIds = $folderIds;
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
     * @return GetFoldersAvailabilitySettings
     */
    public function setAuth($auth): GetFoldersAvailabilitySettings
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getFolderIds()
    {
        return $this->folderIds;
    }

    /**
     * @param ArrayOfguid $folderIds
     * @return GetFoldersAvailabilitySettings
     */
    public function setFolderIds($folderIds): GetFoldersAvailabilitySettings
    {
        $this->folderIds = $folderIds;
        return $this;
    }

}
