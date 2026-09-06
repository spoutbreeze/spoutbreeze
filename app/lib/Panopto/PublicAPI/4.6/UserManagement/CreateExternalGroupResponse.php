<?php

namespace Panopto\UserManagement;

class CreateExternalGroupResponse
{

    /**
     * @var Group|null $CreateExternalGroupResult
     */
    protected $CreateExternalGroupResult = null;

    /**
     * @param Group $CreateExternalGroupResult
     */
    public function __construct($CreateExternalGroupResult)
    {
      $this->CreateExternalGroupResult = $CreateExternalGroupResult;
    }

    /**
     * @return Group
     */
    public function getCreateExternalGroupResult()
    {
        return $this->CreateExternalGroupResult;
    }

    /**
     * @param Group $CreateExternalGroupResult
     * @return CreateExternalGroupResponse
     */
    public function setCreateExternalGroupResult($CreateExternalGroupResult): CreateExternalGroupResponse
    {
        $this->CreateExternalGroupResult = $CreateExternalGroupResult;
        return $this;
    }

}
