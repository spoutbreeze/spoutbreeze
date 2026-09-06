<?php

namespace Panopto\SessionManagement;

class UpdateFolderExternalIdWithProvider
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
     * @var string|null $SiteMembershipProviderName
     */
    protected $SiteMembershipProviderName = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $folderId
     * @param string $externalId
     * @param string $SiteMembershipProviderName
     */
    public function __construct($auth, $folderId, $externalId, $SiteMembershipProviderName)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
      $this->externalId = $externalId;
      $this->SiteMembershipProviderName = $SiteMembershipProviderName;
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
     * @return UpdateFolderExternalIdWithProvider
     */
    public function setAuth($auth): UpdateFolderExternalIdWithProvider
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
     * @return UpdateFolderExternalIdWithProvider
     */
    public function setFolderId($folderId): UpdateFolderExternalIdWithProvider
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
     * @return UpdateFolderExternalIdWithProvider
     */
    public function setExternalId($externalId): UpdateFolderExternalIdWithProvider
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSiteMembershipProviderName()
    {
        return $this->SiteMembershipProviderName;
    }

    /**
     * @param string $SiteMembershipProviderName
     * @return UpdateFolderExternalIdWithProvider
     */
    public function setSiteMembershipProviderName($SiteMembershipProviderName): UpdateFolderExternalIdWithProvider
    {
        $this->SiteMembershipProviderName = $SiteMembershipProviderName;
        return $this;
    }

}
