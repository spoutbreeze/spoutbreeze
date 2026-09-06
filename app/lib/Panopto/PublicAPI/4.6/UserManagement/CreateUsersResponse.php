<?php

namespace Panopto\UserManagement;

class CreateUsersResponse
{

    /**
     * @var ArrayOfUser|null $CreateUsersResult
     */
    protected $CreateUsersResult = null;

    /**
     * @param ArrayOfUser $CreateUsersResult
     */
    public function __construct($CreateUsersResult)
    {
      $this->CreateUsersResult = $CreateUsersResult;
    }

    /**
     * @return ArrayOfUser
     */
    public function getCreateUsersResult()
    {
        return $this->CreateUsersResult;
    }

    /**
     * @param ArrayOfUser $CreateUsersResult
     * @return CreateUsersResponse
     */
    public function setCreateUsersResult($CreateUsersResult): CreateUsersResponse
    {
        $this->CreateUsersResult = $CreateUsersResult;
        return $this;
    }

}
