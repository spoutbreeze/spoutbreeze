<?php

namespace Panopto\AccessManagement;

class FolderAccessDetails
{

    /**
     * @var string|null $FolderId
     */
    protected $FolderId = null;

    /**
     * @var ArrayOfguid|null $GroupsWithCreatorAccess
     */
    protected $GroupsWithCreatorAccess = null;

    /**
     * @var ArrayOfguid|null $GroupsWithPublisherAccess
     */
    protected $GroupsWithPublisherAccess = null;

    /**
     * @var ArrayOfguid|null $GroupsWithViewerAccess
     */
    protected $GroupsWithViewerAccess = null;

    /**
     * @var bool|null $IsPublic
     */
    protected $IsPublic = null;

    /**
     * @var ArrayOfguid|null $UsersWithCreatorAccess
     */
    protected $UsersWithCreatorAccess = null;

    /**
     * @var ArrayOfguid|null $UsersWithPublisherAccess
     */
    protected $UsersWithPublisherAccess = null;

    /**
     * @var ArrayOfguid|null $UsersWithViewerAccess
     */
    protected $UsersWithViewerAccess = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getFolderId()
    {
        return $this->FolderId;
    }

    /**
     * @param string $FolderId
     * @return FolderAccessDetails
     */
    public function setFolderId($FolderId): FolderAccessDetails
    {
        $this->FolderId = $FolderId;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getGroupsWithCreatorAccess()
    {
        return $this->GroupsWithCreatorAccess;
    }

    /**
     * @param ArrayOfguid $GroupsWithCreatorAccess
     * @return FolderAccessDetails
     */
    public function setGroupsWithCreatorAccess($GroupsWithCreatorAccess): FolderAccessDetails
    {
        $this->GroupsWithCreatorAccess = $GroupsWithCreatorAccess;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getGroupsWithPublisherAccess()
    {
        return $this->GroupsWithPublisherAccess;
    }

    /**
     * @param ArrayOfguid $GroupsWithPublisherAccess
     * @return FolderAccessDetails
     */
    public function setGroupsWithPublisherAccess($GroupsWithPublisherAccess): FolderAccessDetails
    {
        $this->GroupsWithPublisherAccess = $GroupsWithPublisherAccess;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getGroupsWithViewerAccess()
    {
        return $this->GroupsWithViewerAccess;
    }

    /**
     * @param ArrayOfguid $GroupsWithViewerAccess
     * @return FolderAccessDetails
     */
    public function setGroupsWithViewerAccess($GroupsWithViewerAccess): FolderAccessDetails
    {
        $this->GroupsWithViewerAccess = $GroupsWithViewerAccess;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPublic()
    {
        return $this->IsPublic;
    }

    /**
     * @param bool $IsPublic
     * @return FolderAccessDetails
     */
    public function setIsPublic($IsPublic): FolderAccessDetails
    {
        $this->IsPublic = $IsPublic;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getUsersWithCreatorAccess()
    {
        return $this->UsersWithCreatorAccess;
    }

    /**
     * @param ArrayOfguid $UsersWithCreatorAccess
     * @return FolderAccessDetails
     */
    public function setUsersWithCreatorAccess($UsersWithCreatorAccess): FolderAccessDetails
    {
        $this->UsersWithCreatorAccess = $UsersWithCreatorAccess;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getUsersWithPublisherAccess()
    {
        return $this->UsersWithPublisherAccess;
    }

    /**
     * @param ArrayOfguid $UsersWithPublisherAccess
     * @return FolderAccessDetails
     */
    public function setUsersWithPublisherAccess($UsersWithPublisherAccess): FolderAccessDetails
    {
        $this->UsersWithPublisherAccess = $UsersWithPublisherAccess;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getUsersWithViewerAccess()
    {
        return $this->UsersWithViewerAccess;
    }

    /**
     * @param ArrayOfguid $UsersWithViewerAccess
     * @return FolderAccessDetails
     */
    public function setUsersWithViewerAccess($UsersWithViewerAccess): FolderAccessDetails
    {
        $this->UsersWithViewerAccess = $UsersWithViewerAccess;
        return $this;
    }

}
