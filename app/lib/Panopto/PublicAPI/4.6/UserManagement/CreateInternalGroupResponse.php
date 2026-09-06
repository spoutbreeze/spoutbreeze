<?php

namespace Panopto\UserManagement;

class CreateInternalGroupResponse
{

    /**
     * @var Group|null $CreateInternalGroupResult
     */
    protected $CreateInternalGroupResult = null;

    /**
     * @param Group $CreateInternalGroupResult
     */
    public function __construct($CreateInternalGroupResult)
    {
      $this->CreateInternalGroupResult = $CreateInternalGroupResult;
    }

    /**
     * @return Group
     */
    public function getCreateInternalGroupResult()
    {
        return $this->CreateInternalGroupResult;
    }

    /**
     * @param Group $CreateInternalGroupResult
     * @return CreateInternalGroupResponse
     */
    public function setCreateInternalGroupResult($CreateInternalGroupResult): CreateInternalGroupResponse
    {
        $this->CreateInternalGroupResult = $CreateInternalGroupResult;
        return $this;
    }

}
