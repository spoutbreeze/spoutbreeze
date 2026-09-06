<?php

namespace Panopto\SessionManagement;

class GetFoldersListResponse
{

    /**
     * @var ListFoldersResponse|null $GetFoldersListResult
     */
    protected $GetFoldersListResult = null;

    /**
     * @param ListFoldersResponse $GetFoldersListResult
     */
    public function __construct($GetFoldersListResult)
    {
      $this->GetFoldersListResult = $GetFoldersListResult;
    }

    /**
     * @return ListFoldersResponse
     */
    public function getGetFoldersListResult()
    {
        return $this->GetFoldersListResult;
    }

    /**
     * @param ListFoldersResponse $GetFoldersListResult
     * @return GetFoldersListResponse
     */
    public function setGetFoldersListResult($GetFoldersListResult): GetFoldersListResponse
    {
        $this->GetFoldersListResult = $GetFoldersListResult;
        return $this;
    }

}
