<?php

namespace Panopto\AccessManagement;

class GroupAccessDetails
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
     * @var string|null $GroupId
     */
    protected $GroupId = null;

    /**
     * @var ArrayOfguid|null $SessionsWithViewerAccess
     */
    protected $SessionsWithViewerAccess = null;

    /**
     * @var SystemRole|null $SystemRole
     */
    protected $SystemRole = null;

    
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
     * @return GroupAccessDetails
     */
    public function setFoldersWithCreatorAccess($FoldersWithCreatorAccess): GroupAccessDetails
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
     * @return GroupAccessDetails
     */
    public function setFoldersWithPublisherAccess($FoldersWithPublisherAccess): GroupAccessDetails
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
     * @return GroupAccessDetails
     */
    public function setFoldersWithViewerAccess($FoldersWithViewerAccess): GroupAccessDetails
    {
        $this->FoldersWithViewerAccess = $FoldersWithViewerAccess;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->GroupId;
    }

    /**
     * @param string $GroupId
     * @return GroupAccessDetails
     */
    public function setGroupId($GroupId): GroupAccessDetails
    {
        $this->GroupId = $GroupId;
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
     * @return GroupAccessDetails
     */
    public function setSessionsWithViewerAccess($SessionsWithViewerAccess): GroupAccessDetails
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
     * @return GroupAccessDetails
     */
    public function setSystemRole($SystemRole): GroupAccessDetails
    {
        $this->SystemRole = $SystemRole;
        return $this;
    }

}
