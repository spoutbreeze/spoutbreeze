<?php

namespace Panopto\SessionManagement;

class GetCreatorFoldersWithExternalContextListResponse
{

    /**
     * @var ListFoldersResponseWithExternalContext|null $GetCreatorFoldersWithExternalContextListResult
     */
    protected $GetCreatorFoldersWithExternalContextListResult = null;

    /**
     * @param ListFoldersResponseWithExternalContext $GetCreatorFoldersWithExternalContextListResult
     */
    public function __construct($GetCreatorFoldersWithExternalContextListResult)
    {
      $this->GetCreatorFoldersWithExternalContextListResult = $GetCreatorFoldersWithExternalContextListResult;
    }

    /**
     * @return ListFoldersResponseWithExternalContext
     */
    public function getGetCreatorFoldersWithExternalContextListResult()
    {
        return $this->GetCreatorFoldersWithExternalContextListResult;
    }

    /**
     * @param ListFoldersResponseWithExternalContext $GetCreatorFoldersWithExternalContextListResult
     * @return GetCreatorFoldersWithExternalContextListResponse
     */
    public function setGetCreatorFoldersWithExternalContextListResult($GetCreatorFoldersWithExternalContextListResult): GetCreatorFoldersWithExternalContextListResponse
    {
        $this->GetCreatorFoldersWithExternalContextListResult = $GetCreatorFoldersWithExternalContextListResult;
        return $this;
    }

}
