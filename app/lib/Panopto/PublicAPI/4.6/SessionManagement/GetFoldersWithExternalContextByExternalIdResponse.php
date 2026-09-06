<?php

namespace Panopto\SessionManagement;

class GetFoldersWithExternalContextByExternalIdResponse
{

    /**
     * @var ArrayOfFolderWithExternalContext|null $GetFoldersWithExternalContextByExternalIdResult
     */
    protected $GetFoldersWithExternalContextByExternalIdResult = null;

    /**
     * @param ArrayOfFolderWithExternalContext $GetFoldersWithExternalContextByExternalIdResult
     */
    public function __construct($GetFoldersWithExternalContextByExternalIdResult)
    {
      $this->GetFoldersWithExternalContextByExternalIdResult = $GetFoldersWithExternalContextByExternalIdResult;
    }

    /**
     * @return ArrayOfFolderWithExternalContext
     */
    public function getGetFoldersWithExternalContextByExternalIdResult()
    {
        return $this->GetFoldersWithExternalContextByExternalIdResult;
    }

    /**
     * @param ArrayOfFolderWithExternalContext $GetFoldersWithExternalContextByExternalIdResult
     * @return GetFoldersWithExternalContextByExternalIdResponse
     */
    public function setGetFoldersWithExternalContextByExternalIdResult($GetFoldersWithExternalContextByExternalIdResult): GetFoldersWithExternalContextByExternalIdResponse
    {
        $this->GetFoldersWithExternalContextByExternalIdResult = $GetFoldersWithExternalContextByExternalIdResult;
        return $this;
    }

}
