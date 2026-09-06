<?php

namespace Panopto\SessionManagement;

class CreateNoteByAbsoluteTimeResponse
{

    /**
     * @var string|null $CreateNoteByAbsoluteTimeResult
     */
    protected $CreateNoteByAbsoluteTimeResult = null;

    /**
     * @param string $CreateNoteByAbsoluteTimeResult
     */
    public function __construct($CreateNoteByAbsoluteTimeResult)
    {
      $this->CreateNoteByAbsoluteTimeResult = $CreateNoteByAbsoluteTimeResult;
    }

    /**
     * @return string
     */
    public function getCreateNoteByAbsoluteTimeResult()
    {
        return $this->CreateNoteByAbsoluteTimeResult;
    }

    /**
     * @param string $CreateNoteByAbsoluteTimeResult
     * @return CreateNoteByAbsoluteTimeResponse
     */
    public function setCreateNoteByAbsoluteTimeResult($CreateNoteByAbsoluteTimeResult): CreateNoteByAbsoluteTimeResponse
    {
        $this->CreateNoteByAbsoluteTimeResult = $CreateNoteByAbsoluteTimeResult;
        return $this;
    }

}
