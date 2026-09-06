<?php

namespace Panopto\SessionManagement;

class CreateNoteByRelativeTimeResponse
{

    /**
     * @var string|null $CreateNoteByRelativeTimeResult
     */
    protected $CreateNoteByRelativeTimeResult = null;

    /**
     * @param string $CreateNoteByRelativeTimeResult
     */
    public function __construct($CreateNoteByRelativeTimeResult)
    {
      $this->CreateNoteByRelativeTimeResult = $CreateNoteByRelativeTimeResult;
    }

    /**
     * @return string
     */
    public function getCreateNoteByRelativeTimeResult()
    {
        return $this->CreateNoteByRelativeTimeResult;
    }

    /**
     * @param string $CreateNoteByRelativeTimeResult
     * @return CreateNoteByRelativeTimeResponse
     */
    public function setCreateNoteByRelativeTimeResult($CreateNoteByRelativeTimeResult): CreateNoteByRelativeTimeResponse
    {
        $this->CreateNoteByRelativeTimeResult = $CreateNoteByRelativeTimeResult;
        return $this;
    }

}
