<?php

namespace Panopto\SessionManagement;

class AddSessionResponse
{

    /**
     * @var Session|null $AddSessionResult
     */
    protected $AddSessionResult = null;

    /**
     * @param Session $AddSessionResult
     */
    public function __construct($AddSessionResult)
    {
      $this->AddSessionResult = $AddSessionResult;
    }

    /**
     * @return Session
     */
    public function getAddSessionResult()
    {
        return $this->AddSessionResult;
    }

    /**
     * @param Session $AddSessionResult
     * @return AddSessionResponse
     */
    public function setAddSessionResult($AddSessionResult): AddSessionResponse
    {
        $this->AddSessionResult = $AddSessionResult;
        return $this;
    }

}
