<?php

namespace Panopto\SessionManagement;

class GetCreatorFoldersList
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ListFoldersRequest|null $request
     */
    protected $request = null;

    /**
     * @var string|null $searchQuery
     */
    protected $searchQuery = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ListFoldersRequest $request
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
     * @return GetCreatorFoldersList
     */
    public function setAuth($auth): GetCreatorFoldersList
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ListFoldersRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param ListFoldersRequest $request
     * @return GetCreatorFoldersList
     */
    public function setRequest($request): GetCreatorFoldersList
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
     * @return GetCreatorFoldersList
     */
    public function setSearchQuery($searchQuery): GetCreatorFoldersList
    {
        $this->searchQuery = $searchQuery;
        return $this;
    }

}
