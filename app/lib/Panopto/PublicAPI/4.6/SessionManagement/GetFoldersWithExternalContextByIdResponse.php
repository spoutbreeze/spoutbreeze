<?php

namespace Panopto\SessionManagement;

class GetFoldersWithExternalContextByIdResponse
{

    /**
     * @var ArrayOfFolderWithExternalContext|null $GetFoldersWithExternalContextByIdResult
     */
    protected $GetFoldersWithExternalContextByIdResult = null;

    /**
     * @param ArrayOfFolderWithExternalContext $GetFoldersWithExternalContextByIdResult
     */
    public function __construct($GetFoldersWithExternalContextByIdResult)
    {
      $this->GetFoldersWithExternalContextByIdResult = $GetFoldersWithExternalContextByIdResult;
    }

    /**
     * @return ArrayOfFolderWithExternalContext
     */
    public function getGetFoldersWithExternalContextByIdResult()
    {
        return $this->GetFoldersWithExternalContextByIdResult;
    }

    /**
     * @param ArrayOfFolderWithExternalContext $GetFoldersWithExternalContextByIdResult
     * @return GetFoldersWithExternalContextByIdResponse
     */
    public function setGetFoldersWithExternalContextByIdResult($GetFoldersWithExternalContextByIdResult): GetFoldersWithExternalContextByIdResponse
    {
        $this->GetFoldersWithExternalContextByIdResult = $GetFoldersWithExternalContextByIdResult;
        return $this;
    }

}
