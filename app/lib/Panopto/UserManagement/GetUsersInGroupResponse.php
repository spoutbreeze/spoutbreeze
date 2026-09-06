<?php

namespace Panopto\UserManagement;

class GetUsersInGroupResponse
{

    /**
     * @var ArrayOfguid|null $GetUsersInGroupResult
     */
    protected $GetUsersInGroupResult = null;

    /**
     * @param ArrayOfguid $GetUsersInGroupResult
     */
    public function __construct($GetUsersInGroupResult)
    {
      $this->GetUsersInGroupResult = $GetUsersInGroupResult;
    }

    /**
     * @return ArrayOfguid
     */
    public function getGetUsersInGroupResult()
    {
        return $this->GetUsersInGroupResult;
    }

    /**
     * @param ArrayOfguid $GetUsersInGroupResult
     * @return GetUsersInGroupResponse
     */
    public function setGetUsersInGroupResult($GetUsersInGroupResult): GetUsersInGroupResponse
    {
        $this->GetUsersInGroupResult = $GetUsersInGroupResult;
        return $this;
    }

}
