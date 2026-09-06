<?php

namespace Panopto\UserManagement;

class ListUsersRequest
{

    /**
     * @var Pagination|null $Pagination
     */
    protected $Pagination = null;

    /**
     * @var UserSortField|null $SortBy
     */
    protected $SortBy = null;

    /**
     * @var bool|null $SortIncreasing
     */
    protected $SortIncreasing = null;

    
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
     * @return ListUsersRequest
     */
    public function setPagination($Pagination): ListUsersRequest
    {
        $this->Pagination = $Pagination;
        return $this;
    }

    /**
     * @return UserSortField
     */
    public function getSortBy()
    {
        return $this->SortBy;
    }

    /**
     * @param UserSortField $SortBy
     * @return ListUsersRequest
     */
    public function setSortBy($SortBy): ListUsersRequest
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
     * @return ListUsersRequest
     */
    public function setSortIncreasing($SortIncreasing): ListUsersRequest
    {
        $this->SortIncreasing = $SortIncreasing;
        return $this;
    }

}
