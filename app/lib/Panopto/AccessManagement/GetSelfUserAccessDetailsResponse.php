<?php

namespace Panopto\AccessManagement;

class GetSelfUserAccessDetailsResponse
{

    /**
     * @var UserAccessDetails|null $GetSelfUserAccessDetailsResult
     */
    protected $GetSelfUserAccessDetailsResult = null;

    /**
     * @param UserAccessDetails $GetSelfUserAccessDetailsResult
     */
    public function __construct($GetSelfUserAccessDetailsResult)
    {
      $this->GetSelfUserAccessDetailsResult = $GetSelfUserAccessDetailsResult;
    }

    /**
     * @return UserAccessDetails
     */
    public function getGetSelfUserAccessDetailsResult()
    {
        return $this->GetSelfUserAccessDetailsResult;
    }

    /**
     * @param UserAccessDetails $GetSelfUserAccessDetailsResult
     * @return GetSelfUserAccessDetailsResponse
     */
    public function setGetSelfUserAccessDetailsResult($GetSelfUserAccessDetailsResult): GetSelfUserAccessDetailsResponse
    {
        $this->GetSelfUserAccessDetailsResult = $GetSelfUserAccessDetailsResult;
        return $this;
    }

}
