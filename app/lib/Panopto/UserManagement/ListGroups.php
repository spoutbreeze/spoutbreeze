<?php

namespace Panopto\UserManagement;

class ListGroups
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
     * @param AuthenticationInfo $auth
     * @param Pagination $pagination
     */
    public function __construct($auth, $pagination)
    {
      $this->auth = $auth;
      $this->pagination = $pagination;
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
     * @return ListGroups
     */
    public function setAuth($auth): ListGroups
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
     * @return ListGroups
     */
    public function setPagination($pagination): ListGroups
    {
        $this->pagination = $pagination;
        return $this;
    }

}
