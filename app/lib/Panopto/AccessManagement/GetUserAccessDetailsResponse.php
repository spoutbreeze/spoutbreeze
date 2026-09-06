<?php

namespace Panopto\AccessManagement;

class GetUserAccessDetailsResponse
{

    /**
     * @var UserAccessDetails|null $GetUserAccessDetailsResult
     */
    protected $GetUserAccessDetailsResult = null;

    /**
     * @param UserAccessDetails $GetUserAccessDetailsResult
     */
    public function __construct($GetUserAccessDetailsResult)
    {
      $this->GetUserAccessDetailsResult = $GetUserAccessDetailsResult;
    }

    /**
     * @return UserAccessDetails
     */
    public function getGetUserAccessDetailsResult()
    {
        return $this->GetUserAccessDetailsResult;
    }

    /**
     * @param UserAccessDetails $GetUserAccessDetailsResult
     * @return GetUserAccessDetailsResponse
     */
    public function setGetUserAccessDetailsResult($GetUserAccessDetailsResult): GetUserAccessDetailsResponse
    {
        $this->GetUserAccessDetailsResult = $GetUserAccessDetailsResult;
        return $this;
    }

}
