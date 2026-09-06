<?php

namespace Panopto\AccessManagement;

class UserAccessDetails
{

    /**
     * @var ArrayOfguid|null $FoldersWithCreatorAccess
     */
    protected $FoldersWithCreatorAccess = null;

    /**
     * @var ArrayOfguid|null $FoldersWithPublisherAccess
     */
    protected $FoldersWithPublisherAccess = null;

    /**
     * @var ArrayOfguid|null $FoldersWithViewerAccess
     */
    protected $FoldersWithViewerAccess = null;

    /**
     * @var ArrayOfGroupAccessDetails|null $GroupMembershipAccess
     */
    protected $GroupMembershipAccess = null;

    /**
     * @var ArrayOfguid|null $SessionsWithViewerAccess
     */
    protected $SessionsWithViewerAccess = null;

    /**
     * @var SystemRole|null $SystemRole
     */
    protected $SystemRole = null;

    /**
     * @var string|null $UserId
     */
    protected $UserId = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ArrayOfguid
     */
    public function getFoldersWithCreatorAccess()
    {
        return $this->FoldersWithCreatorAccess;
    }

    /**
     * @param ArrayOfguid $FoldersWithCreatorAccess
     * @return UserAccessDetails
     */
    public function setFoldersWithCreatorAccess($FoldersWithCreatorAccess): UserAccessDetails
    {
        $this->FoldersWithCreatorAccess = $FoldersWithCreatorAccess;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getFoldersWithPublisherAccess()
    {
        return $this->FoldersWithPublisherAccess;
    }

    /**
     * @param ArrayOfguid $FoldersWithPublisherAccess
     * @return UserAccessDetails
     */
    public function setFoldersWithPublisherAccess($FoldersWithPublisherAccess): UserAccessDetails
    {
        $this->FoldersWithPublisherAccess = $FoldersWithPublisherAccess;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getFoldersWithViewerAccess()
    {
        return $this->FoldersWithViewerAccess;
    }

    /**
     * @param ArrayOfguid $FoldersWithViewerAccess
     * @return UserAccessDetails
     */
    public function setFoldersWithViewerAccess($FoldersWithViewerAccess): UserAccessDetails
    {
        $this->FoldersWithViewerAccess = $FoldersWithViewerAccess;
        return $this;
    }

    /**
     * @return ArrayOfGroupAccessDetails
     */
    public function getGroupMembershipAccess()
    {
        return $this->GroupMembershipAccess;
    }

    /**
     * @param ArrayOfGroupAccessDetails $GroupMembershipAccess
     * @return UserAccessDetails
     */
    public function setGroupMembershipAccess($GroupMembershipAccess): UserAccessDetails
    {
        $this->GroupMembershipAccess = $GroupMembershipAccess;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getSessionsWithViewerAccess()
    {
        return $this->SessionsWithViewerAccess;
    }

    /**
     * @param ArrayOfguid $SessionsWithViewerAccess
     * @return UserAccessDetails
     */
    public function setSessionsWithViewerAccess($SessionsWithViewerAccess): UserAccessDetails
    {
        $this->SessionsWithViewerAccess = $SessionsWithViewerAccess;
        return $this;
    }

    /**
     * @return SystemRole
     */
    public function getSystemRole()
    {
        return $this->SystemRole;
    }

    /**
     * @param SystemRole $SystemRole
     * @return UserAccessDetails
     */
    public function setSystemRole($SystemRole): UserAccessDetails
    {
        $this->SystemRole = $SystemRole;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * @param string $UserId
     * @return UserAccessDetails
     */
    public function setUserId($UserId): UserAccessDetails
    {
        $this->UserId = $UserId;
        return $this;
    }

}
