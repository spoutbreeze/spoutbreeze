<?php

namespace Panopto\UserManagement;

class ListUsersResponse
{

    /**
     * @var ListUsersResponse|null $ListUsersResult
     */
    protected $ListUsersResult = null;

    /**
     * @param ListUsersResponse $ListUsersResult
     */
    public function __construct($ListUsersResult)
    {
      $this->ListUsersResult = $ListUsersResult;
    }

    /**
     * @return ListUsersResponse
     */
    public function getListUsersResult()
    {
        return $this->ListUsersResult;
    }

    /**
     * @param ListUsersResponse $ListUsersResult
     * @return ListUsersResponse
     */
    public function setListUsersResult($ListUsersResult): ListUsersResponse
    {
        $this->ListUsersResult = $ListUsersResult;
        return $this;
    }

}
