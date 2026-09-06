<?php

namespace Panopto\SessionManagement;

class GetNoteResponse
{

    /**
     * @var Note|null $GetNoteResult
     */
    protected $GetNoteResult = null;

    /**
     * @param Note $GetNoteResult
     */
    public function __construct($GetNoteResult)
    {
      $this->GetNoteResult = $GetNoteResult;
    }

    /**
     * @return Note
     */
    public function getGetNoteResult()
    {
        return $this->GetNoteResult;
    }

    /**
     * @param Note $GetNoteResult
     * @return GetNoteResponse
     */
    public function setGetNoteResult($GetNoteResult): GetNoteResponse
    {
        $this->GetNoteResult = $GetNoteResult;
        return $this;
    }

}
