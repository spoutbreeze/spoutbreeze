<?php

namespace Panopto\UserManagement;

class GetGroupResponse
{

    /**
     * @var Group|null $GetGroupResult
     */
    protected $GetGroupResult = null;

    /**
     * @param Group $GetGroupResult
     */
    public function __construct($GetGroupResult)
    {
      $this->GetGroupResult = $GetGroupResult;
    }

    /**
     * @return Group
     */
    public function getGetGroupResult()
    {
        return $this->GetGroupResult;
    }

    /**
     * @param Group $GetGroupResult
     * @return GetGroupResponse
     */
    public function setGetGroupResult($GetGroupResult): GetGroupResponse
    {
        $this->GetGroupResult = $GetGroupResult;
        return $this;
    }

}
