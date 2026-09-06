<?php

namespace Panopto\SessionManagement;

class GetExtendedCreatorFoldersListResponse
{

    /**
     * @var ListExtendedFoldersResponse|null $GetExtendedCreatorFoldersListResult
     */
    protected $GetExtendedCreatorFoldersListResult = null;

    /**
     * @param ListExtendedFoldersResponse $GetExtendedCreatorFoldersListResult
     */
    public function __construct($GetExtendedCreatorFoldersListResult)
    {
      $this->GetExtendedCreatorFoldersListResult = $GetExtendedCreatorFoldersListResult;
    }

    /**
     * @return ListExtendedFoldersResponse
     */
    public function getGetExtendedCreatorFoldersListResult()
    {
        return $this->GetExtendedCreatorFoldersListResult;
    }

    /**
     * @param ListExtendedFoldersResponse $GetExtendedCreatorFoldersListResult
     * @return GetExtendedCreatorFoldersListResponse
     */
    public function setGetExtendedCreatorFoldersListResult($GetExtendedCreatorFoldersListResult): GetExtendedCreatorFoldersListResponse
    {
        $this->GetExtendedCreatorFoldersListResult = $GetExtendedCreatorFoldersListResult;
        return $this;
    }

}
