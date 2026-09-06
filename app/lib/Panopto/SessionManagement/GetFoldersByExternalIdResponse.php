<?php

namespace Panopto\SessionManagement;

class GetFoldersByExternalIdResponse
{

    /**
     * @var ArrayOfFolder|null $GetFoldersByExternalIdResult
     */
    protected $GetFoldersByExternalIdResult = null;

    /**
     * @param ArrayOfFolder $GetFoldersByExternalIdResult
     */
    public function __construct($GetFoldersByExternalIdResult)
    {
      $this->GetFoldersByExternalIdResult = $GetFoldersByExternalIdResult;
    }

    /**
     * @return ArrayOfFolder
     */
    public function getGetFoldersByExternalIdResult()
    {
        return $this->GetFoldersByExternalIdResult;
    }

    /**
     * @param ArrayOfFolder $GetFoldersByExternalIdResult
     * @return GetFoldersByExternalIdResponse
     */
    public function setGetFoldersByExternalIdResult($GetFoldersByExternalIdResult): GetFoldersByExternalIdResponse
    {
        $this->GetFoldersByExternalIdResult = $GetFoldersByExternalIdResult;
        return $this;
    }

}
