<?php

namespace Panopto\RemoteRecorderManagement;

class GetDefaultFolderForRecorderResponse
{

    /**
     * @var string|null $GetDefaultFolderForRecorderResult
     */
    protected $GetDefaultFolderForRecorderResult = null;

    /**
     * @param string $GetDefaultFolderForRecorderResult
     */
    public function __construct($GetDefaultFolderForRecorderResult)
    {
      $this->GetDefaultFolderForRecorderResult = $GetDefaultFolderForRecorderResult;
    }

    /**
     * @return string
     */
    public function getGetDefaultFolderForRecorderResult()
    {
        return $this->GetDefaultFolderForRecorderResult;
    }

    /**
     * @param string $GetDefaultFolderForRecorderResult
     * @return GetDefaultFolderForRecorderResponse
     */
    public function setGetDefaultFolderForRecorderResult($GetDefaultFolderForRecorderResult): GetDefaultFolderForRecorderResponse
    {
        $this->GetDefaultFolderForRecorderResult = $GetDefaultFolderForRecorderResult;
        return $this;
    }

}
