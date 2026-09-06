<?php

namespace Panopto\AccessManagement;

class GetFolderAccessDetailsResponse
{

    /**
     * @var FolderAccessDetails|null $GetFolderAccessDetailsResult
     */
    protected $GetFolderAccessDetailsResult = null;

    /**
     * @param FolderAccessDetails $GetFolderAccessDetailsResult
     */
    public function __construct($GetFolderAccessDetailsResult)
    {
      $this->GetFolderAccessDetailsResult = $GetFolderAccessDetailsResult;
    }

    /**
     * @return FolderAccessDetails
     */
    public function getGetFolderAccessDetailsResult()
    {
        return $this->GetFolderAccessDetailsResult;
    }

    /**
     * @param FolderAccessDetails $GetFolderAccessDetailsResult
     * @return GetFolderAccessDetailsResponse
     */
    public function setGetFolderAccessDetailsResult($GetFolderAccessDetailsResult): GetFolderAccessDetailsResponse
    {
        $this->GetFolderAccessDetailsResult = $GetFolderAccessDetailsResult;
        return $this;
    }

}
