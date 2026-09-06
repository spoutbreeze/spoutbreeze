<?php

namespace Panopto\SessionManagement;

class AddFolderResponse
{

    /**
     * @var Folder|null $AddFolderResult
     */
    protected $AddFolderResult = null;

    /**
     * @param Folder $AddFolderResult
     */
    public function __construct($AddFolderResult)
    {
      $this->AddFolderResult = $AddFolderResult;
    }

    /**
     * @return Folder
     */
    public function getAddFolderResult()
    {
        return $this->AddFolderResult;
    }

    /**
     * @param Folder $AddFolderResult
     * @return AddFolderResponse
     */
    public function setAddFolderResult($AddFolderResult): AddFolderResponse
    {
        $this->AddFolderResult = $AddFolderResult;
        return $this;
    }

}
