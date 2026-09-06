<?php

namespace Panopto\SessionManagement;

class GetAllFoldersByExternalIdResponse
{

    /**
     * @var ArrayOfFolder|null $GetAllFoldersByExternalIdResult
     */
    protected $GetAllFoldersByExternalIdResult = null;

    /**
     * @param ArrayOfFolder $GetAllFoldersByExternalIdResult
     */
    public function __construct($GetAllFoldersByExternalIdResult)
    {
      $this->GetAllFoldersByExternalIdResult = $GetAllFoldersByExternalIdResult;
    }

    /**
     * @return ArrayOfFolder
     */
    public function getGetAllFoldersByExternalIdResult()
    {
        return $this->GetAllFoldersByExternalIdResult;
    }

    /**
     * @param ArrayOfFolder $GetAllFoldersByExternalIdResult
     * @return GetAllFoldersByExternalIdResponse
     */
    public function setGetAllFoldersByExternalIdResult($GetAllFoldersByExternalIdResult): GetAllFoldersByExternalIdResponse
    {
        $this->GetAllFoldersByExternalIdResult = $GetAllFoldersByExternalIdResult;
        return $this;
    }

}
