<?php

namespace Panopto\UserManagement;

class GetGroupsByNameResponse
{

    /**
     * @var ArrayOfGroup|null $GetGroupsByNameResult
     */
    protected $GetGroupsByNameResult = null;

    /**
     * @param ArrayOfGroup $GetGroupsByNameResult
     */
    public function __construct($GetGroupsByNameResult)
    {
      $this->GetGroupsByNameResult = $GetGroupsByNameResult;
    }

    /**
     * @return ArrayOfGroup
     */
    public function getGetGroupsByNameResult()
    {
        return $this->GetGroupsByNameResult;
    }

    /**
     * @param ArrayOfGroup $GetGroupsByNameResult
     * @return GetGroupsByNameResponse
     */
    public function setGetGroupsByNameResult($GetGroupsByNameResult): GetGroupsByNameResponse
    {
        $this->GetGroupsByNameResult = $GetGroupsByNameResult;
        return $this;
    }

}
