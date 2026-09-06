<?php

namespace Panopto\UserManagement;

class GetGroupIsPublicResponse
{

    /**
     * @var bool|null $GetGroupIsPublicResult
     */
    protected $GetGroupIsPublicResult = null;

    /**
     * @param bool $GetGroupIsPublicResult
     */
    public function __construct($GetGroupIsPublicResult)
    {
      $this->GetGroupIsPublicResult = $GetGroupIsPublicResult;
    }

    /**
     * @return bool
     */
    public function getGetGroupIsPublicResult()
    {
        return $this->GetGroupIsPublicResult;
    }

    /**
     * @param bool $GetGroupIsPublicResult
     * @return GetGroupIsPublicResponse
     */
    public function setGetGroupIsPublicResult($GetGroupIsPublicResult): GetGroupIsPublicResponse
    {
        $this->GetGroupIsPublicResult = $GetGroupIsPublicResult;
        return $this;
    }

}
