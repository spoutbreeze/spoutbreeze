<?php

namespace Panopto\SessionManagement;

class GetSessionsByExternalIdResponse
{

    /**
     * @var ArrayOfSession|null $GetSessionsByExternalIdResult
     */
    protected $GetSessionsByExternalIdResult = null;

    /**
     * @param ArrayOfSession $GetSessionsByExternalIdResult
     */
    public function __construct($GetSessionsByExternalIdResult)
    {
      $this->GetSessionsByExternalIdResult = $GetSessionsByExternalIdResult;
    }

    /**
     * @return ArrayOfSession
     */
    public function getGetSessionsByExternalIdResult()
    {
        return $this->GetSessionsByExternalIdResult;
    }

    /**
     * @param ArrayOfSession $GetSessionsByExternalIdResult
     * @return GetSessionsByExternalIdResponse
     */
    public function setGetSessionsByExternalIdResult($GetSessionsByExternalIdResult): GetSessionsByExternalIdResponse
    {
        $this->GetSessionsByExternalIdResult = $GetSessionsByExternalIdResult;
        return $this;
    }

}
