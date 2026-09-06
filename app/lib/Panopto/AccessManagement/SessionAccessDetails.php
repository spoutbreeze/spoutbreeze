<?php

namespace Panopto\AccessManagement;

class SessionAccessDetails
{

    /**
     * @var FolderAccessDetails|null $FolderAccess
     */
    protected $FolderAccess = null;

    /**
     * @var ArrayOfguid|null $GroupsWithDirectViewerAccess
     */
    protected $GroupsWithDirectViewerAccess = null;

    /**
     * @var bool|null $InheritViewerAccess
     */
    protected $InheritViewerAccess = null;

    /**
     * @var bool|null $IsPublic
     */
    protected $IsPublic = null;

    /**
     * @var string|null $SessionId
     */
    protected $SessionId = null;

    /**
     * @var ArrayOfguid|null $UsersWithDirectViewerAccess
     */
    protected $UsersWithDirectViewerAccess = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return FolderAccessDetails
     */
    public function getFolderAccess()
    {
        return $this->FolderAccess;
    }

    /**
     * @param FolderAccessDetails $FolderAccess
     * @return SessionAccessDetails
     */
    public function setFolderAccess($FolderAccess): SessionAccessDetails
    {
        $this->FolderAccess = $FolderAccess;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getGroupsWithDirectViewerAccess()
    {
        return $this->GroupsWithDirectViewerAccess;
    }

    /**
     * @param ArrayOfguid $GroupsWithDirectViewerAccess
     * @return SessionAccessDetails
     */
    public function setGroupsWithDirectViewerAccess($GroupsWithDirectViewerAccess): SessionAccessDetails
    {
        $this->GroupsWithDirectViewerAccess = $GroupsWithDirectViewerAccess;
        return $this;
    }

    /**
     * @return bool
     */
    public function getInheritViewerAccess()
    {
        return $this->InheritViewerAccess;
    }

    /**
     * @param bool $InheritViewerAccess
     * @return SessionAccessDetails
     */
    public function setInheritViewerAccess($InheritViewerAccess): SessionAccessDetails
    {
        $this->InheritViewerAccess = $InheritViewerAccess;
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
     * @return SessionAccessDetails
     */
    public function setIsPublic($IsPublic): SessionAccessDetails
    {
        $this->IsPublic = $IsPublic;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->SessionId;
    }

    /**
     * @param string $SessionId
     * @return SessionAccessDetails
     */
    public function setSessionId($SessionId): SessionAccessDetails
    {
        $this->SessionId = $SessionId;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getUsersWithDirectViewerAccess()
    {
        return $this->UsersWithDirectViewerAccess;
    }

    /**
     * @param ArrayOfguid $UsersWithDirectViewerAccess
     * @return SessionAccessDetails
     */
    public function setUsersWithDirectViewerAccess($UsersWithDirectViewerAccess): SessionAccessDetails
    {
        $this->UsersWithDirectViewerAccess = $UsersWithDirectViewerAccess;
        return $this;
    }

}
