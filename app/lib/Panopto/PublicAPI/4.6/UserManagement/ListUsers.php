<?php

namespace Panopto\UserManagement;

class ListUsers
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ListUsersRequest|null $parameters
     */
    protected $parameters = null;

    /**
     * @var string|null $searchQuery
     */
    protected $searchQuery = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ListUsersRequest $parameters
     * @param string $searchQuery
     */
    public function __construct($auth, $parameters, $searchQuery)
    {
      $this->auth = $auth;
      $this->parameters = $parameters;
      $this->searchQuery = $searchQuery;
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
     * @return ListUsers
     */
    public function setAuth($auth): ListUsers
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ListUsersRequest
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param ListUsersRequest $parameters
     * @return ListUsers
     */
    public function setParameters($parameters): ListUsers
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearchQuery()
    {
        return $this->searchQuery;
    }

    /**
     * @param string $searchQuery
     * @return ListUsers
     */
    public function setSearchQuery($searchQuery): ListUsers
    {
        $this->searchQuery = $searchQuery;
        return $this;
    }

}
