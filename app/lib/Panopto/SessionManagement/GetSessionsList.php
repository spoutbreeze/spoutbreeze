<?php

namespace Panopto\SessionManagement;

class GetSessionsList
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ListSessionsRequest|null $request
     */
    protected $request = null;

    /**
     * @var string|null $searchQuery
     */
    protected $searchQuery = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ListSessionsRequest $request
     * @param string $searchQuery
     */
    public function __construct($auth, $request, $searchQuery)
    {
      $this->auth = $auth;
      $this->request = $request;
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
     * @return GetSessionsList
     */
    public function setAuth($auth): GetSessionsList
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ListSessionsRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param ListSessionsRequest $request
     * @return GetSessionsList
     */
    public function setRequest($request): GetSessionsList
    {
        $this->request = $request;
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
     * @return GetSessionsList
     */
    public function setSearchQuery($searchQuery): GetSessionsList
    {
        $this->searchQuery = $searchQuery;
        return $this;
    }

}
