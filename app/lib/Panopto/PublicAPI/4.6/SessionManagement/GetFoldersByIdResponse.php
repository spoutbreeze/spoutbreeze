<?php

namespace Panopto\SessionManagement;

class GetFoldersByIdResponse
{

    /**
     * @var ArrayOfFolder|null $GetFoldersByIdResult
     */
    protected $GetFoldersByIdResult = null;

    /**
     * @param ArrayOfFolder $GetFoldersByIdResult
     */
    public function __construct($GetFoldersByIdResult)
    {
      $this->GetFoldersByIdResult = $GetFoldersByIdResult;
    }

    /**
     * @return ArrayOfFolder
     */
    public function getGetFoldersByIdResult()
    {
        return $this->GetFoldersByIdResult;
    }

    /**
     * @param ArrayOfFolder $GetFoldersByIdResult
     * @return GetFoldersByIdResponse
     */
    public function setGetFoldersByIdResult($GetFoldersByIdResult): GetFoldersByIdResponse
    {
        $this->GetFoldersByIdResult = $GetFoldersByIdResult;
        return $this;
    }

}
