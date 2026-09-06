<?php

namespace Panopto\SessionManagement;

class GetSessionsListResponse
{

    /**
     * @var ListSessionsResponse|null $GetSessionsListResult
     */
    protected $GetSessionsListResult = null;

    /**
     * @param ListSessionsResponse $GetSessionsListResult
     */
    public function __construct($GetSessionsListResult)
    {
      $this->GetSessionsListResult = $GetSessionsListResult;
    }

    /**
     * @return ListSessionsResponse
     */
    public function getGetSessionsListResult()
    {
        return $this->GetSessionsListResult;
    }

    /**
     * @param ListSessionsResponse $GetSessionsListResult
     * @return GetSessionsListResponse
     */
    public function setGetSessionsListResult($GetSessionsListResult): GetSessionsListResponse
    {
        $this->GetSessionsListResult = $GetSessionsListResult;
        return $this;
    }

}
