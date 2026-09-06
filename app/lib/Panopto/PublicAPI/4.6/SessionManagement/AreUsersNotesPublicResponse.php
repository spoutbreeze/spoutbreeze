<?php

namespace Panopto\SessionManagement;

class AreUsersNotesPublicResponse
{

    /**
     * @var bool|null $AreUsersNotesPublicResult
     */
    protected $AreUsersNotesPublicResult = null;

    /**
     * @param bool $AreUsersNotesPublicResult
     */
    public function __construct($AreUsersNotesPublicResult)
    {
      $this->AreUsersNotesPublicResult = $AreUsersNotesPublicResult;
    }

    /**
     * @return bool
     */
    public function getAreUsersNotesPublicResult()
    {
        return $this->AreUsersNotesPublicResult;
    }

    /**
     * @param bool $AreUsersNotesPublicResult
     * @return AreUsersNotesPublicResponse
     */
    public function setAreUsersNotesPublicResult($AreUsersNotesPublicResult): AreUsersNotesPublicResponse
    {
        $this->AreUsersNotesPublicResult = $AreUsersNotesPublicResult;
        return $this;
    }

}
