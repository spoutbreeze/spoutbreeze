<?php

namespace Panopto\SessionManagement;

class GetCreatorFoldersListResponse
{

    /**
     * @var ListFoldersResponse|null $GetCreatorFoldersListResult
     */
    protected $GetCreatorFoldersListResult = null;

    /**
     * @param ListFoldersResponse $GetCreatorFoldersListResult
     */
    public function __construct($GetCreatorFoldersListResult)
    {
      $this->GetCreatorFoldersListResult = $GetCreatorFoldersListResult;
    }

    /**
     * @return ListFoldersResponse
     */
    public function getGetCreatorFoldersListResult()
    {
        return $this->GetCreatorFoldersListResult;
    }

    /**
     * @param ListFoldersResponse $GetCreatorFoldersListResult
     * @return GetCreatorFoldersListResponse
     */
    public function setGetCreatorFoldersListResult($GetCreatorFoldersListResult): GetCreatorFoldersListResponse
    {
        $this->GetCreatorFoldersListResult = $GetCreatorFoldersListResult;
        return $this;
    }

}
