<?php

namespace Panopto\SessionManagement;

class GetFoldersWithExternalContextById
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
     * @return GetFoldersWithExternalContextById
     */
    public function setAuth($auth): GetFoldersWithExternalContextById
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
     * @return GetFoldersWithExternalContextById
     */
    public function setFolderIds($folderIds): GetFoldersWithExternalContextById
    {
        $this->folderIds = $folderIds;
        return $this;
    }

}
