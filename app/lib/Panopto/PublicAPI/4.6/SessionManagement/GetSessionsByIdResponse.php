<?php

namespace Panopto\SessionManagement;

class GetSessionsByIdResponse
{

    /**
     * @var ArrayOfSession|null $GetSessionsByIdResult
     */
    protected $GetSessionsByIdResult = null;

    /**
     * @param ArrayOfSession $GetSessionsByIdResult
     */
    public function __construct($GetSessionsByIdResult)
    {
      $this->GetSessionsByIdResult = $GetSessionsByIdResult;
    }

    /**
     * @return ArrayOfSession
     */
    public function getGetSessionsByIdResult()
    {
        return $this->GetSessionsByIdResult;
    }

    /**
     * @param ArrayOfSession $GetSessionsByIdResult
     * @return GetSessionsByIdResponse
     */
    public function setGetSessionsByIdResult($GetSessionsByIdResult): GetSessionsByIdResponse
    {
        $this->GetSessionsByIdResult = $GetSessionsByIdResult;
        return $this;
    }

}
