<?php

namespace Panopto\RemoteRecorderManagement;

class ListRecorders
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var Pagination|null $pagination
     */
    protected $pagination = null;

    /**
     * @var RecorderSortField|null $sortBy
     */
    protected $sortBy = null;

    /**
     * @param AuthenticationInfo $auth
     * @param Pagination $pagination
     * @param RecorderSortField $sortBy
     */
    public function __construct($auth, $pagination, $sortBy)
    {
      $this->auth = $auth;
      $this->pagination = $pagination;
      $this->sortBy = $sortBy;
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
     * @return ListRecorders
     */
    public function setAuth($auth): ListRecorders
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return Pagination
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * @param Pagination $pagination
     * @return ListRecorders
     */
    public function setPagination($pagination): ListRecorders
    {
        $this->pagination = $pagination;
        return $this;
    }

    /**
     * @return RecorderSortField
     */
    public function getSortBy()
    {
        return $this->sortBy;
    }

    /**
     * @param RecorderSortField $sortBy
     * @return ListRecorders
     */
    public function setSortBy($sortBy): ListRecorders
    {
        $this->sortBy = $sortBy;
        return $this;
    }

}
