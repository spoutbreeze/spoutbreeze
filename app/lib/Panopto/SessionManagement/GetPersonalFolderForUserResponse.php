<?php

namespace Panopto\SessionManagement;

class GetPersonalFolderForUserResponse
{

    /**
     * @var Folder|null $GetPersonalFolderForUserResult
     */
    protected $GetPersonalFolderForUserResult = null;

    /**
     * @param Folder $GetPersonalFolderForUserResult
     */
    public function __construct($GetPersonalFolderForUserResult)
    {
      $this->GetPersonalFolderForUserResult = $GetPersonalFolderForUserResult;
    }

    /**
     * @return Folder
     */
    public function getGetPersonalFolderForUserResult()
    {
        return $this->GetPersonalFolderForUserResult;
    }

    /**
     * @param Folder $GetPersonalFolderForUserResult
     * @return GetPersonalFolderForUserResponse
     */
    public function setGetPersonalFolderForUserResult($GetPersonalFolderForUserResult): GetPersonalFolderForUserResponse
    {
        $this->GetPersonalFolderForUserResult = $GetPersonalFolderForUserResult;
        return $this;
    }

}
