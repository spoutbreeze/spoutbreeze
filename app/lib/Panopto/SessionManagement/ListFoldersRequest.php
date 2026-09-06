<?php

namespace Panopto\SessionManagement;

class ListFoldersRequest
{

    /**
     * @var Pagination|null $Pagination
     */
    protected $Pagination = null;

    /**
     * @var string|null $ParentFolderId
     */
    protected $ParentFolderId = null;

    /**
     * @var bool|null $PublicOnly
     */
    protected $PublicOnly = null;

    /**
     * @var FolderSortField|null $SortBy
     */
    protected $SortBy = null;

    /**
     * @var bool|null $SortIncreasing
     */
    protected $SortIncreasing = null;

    /**
     * @var bool|null $UnmappedOnly
     */
    protected $UnmappedOnly = null;

    /**
     * @var bool|null $WildcardSearchNameOnly
     */
    protected $WildcardSearchNameOnly = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Pagination
     */
    public function getPagination()
    {
        return $this->Pagination;
    }

    /**
     * @param Pagination $Pagination
     * @return ListFoldersRequest
     */
    public function setPagination($Pagination): ListFoldersRequest
    {
        $this->Pagination = $Pagination;
        return $this;
    }

    /**
     * @return string
     */
    public function getParentFolderId()
    {
        return $this->ParentFolderId;
    }

    /**
     * @param string $ParentFolderId
     * @return ListFoldersRequest
     */
    public function setParentFolderId($ParentFolderId): ListFoldersRequest
    {
        $this->ParentFolderId = $ParentFolderId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getPublicOnly()
    {
        return $this->PublicOnly;
    }

    /**
     * @param bool $PublicOnly
     * @return ListFoldersRequest
     */
    public function setPublicOnly($PublicOnly): ListFoldersRequest
    {
        $this->PublicOnly = $PublicOnly;
        return $this;
    }

    /**
     * @return FolderSortField
     */
    public function getSortBy()
    {
        return $this->SortBy;
    }

    /**
     * @param FolderSortField $SortBy
     * @return ListFoldersRequest
     */
    public function setSortBy($SortBy): ListFoldersRequest
    {
        $this->SortBy = $SortBy;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSortIncreasing()
    {
        return $this->SortIncreasing;
    }

    /**
     * @param bool $SortIncreasing
     * @return ListFoldersRequest
     */
    public function setSortIncreasing($SortIncreasing): ListFoldersRequest
    {
        $this->SortIncreasing = $SortIncreasing;
        return $this;
    }

    /**
     * @return bool
     */
    public function getUnmappedOnly()
    {
        return $this->UnmappedOnly;
    }

    /**
     * @param bool $UnmappedOnly
     * @return ListFoldersRequest
     */
    public function setUnmappedOnly($UnmappedOnly): ListFoldersRequest
    {
        $this->UnmappedOnly = $UnmappedOnly;
        return $this;
    }

    /**
     * @return bool
     */
    public function getWildcardSearchNameOnly()
    {
        return $this->WildcardSearchNameOnly;
    }

    /**
     * @param bool $WildcardSearchNameOnly
     * @return ListFoldersRequest
     */
    public function setWildcardSearchNameOnly($WildcardSearchNameOnly): ListFoldersRequest
    {
        $this->WildcardSearchNameOnly = $WildcardSearchNameOnly;
        return $this;
    }

}
