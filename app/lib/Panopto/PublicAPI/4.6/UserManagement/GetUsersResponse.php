<?php

namespace Panopto\UserManagement;

class GetUsersResponse
{

    /**
     * @var ArrayOfUser|null $GetUsersResult
     */
    protected $GetUsersResult = null;

    /**
     * @param ArrayOfUser $GetUsersResult
     */
    public function __construct($GetUsersResult)
    {
      $this->GetUsersResult = $GetUsersResult;
    }

    /**
     * @return ArrayOfUser
     */
    public function getGetUsersResult()
    {
        return $this->GetUsersResult;
    }

    /**
     * @param ArrayOfUser $GetUsersResult
     * @return GetUsersResponse
     */
    public function setGetUsersResult($GetUsersResult): GetUsersResponse
    {
        $this->GetUsersResult = $GetUsersResult;
        return $this;
    }

}
