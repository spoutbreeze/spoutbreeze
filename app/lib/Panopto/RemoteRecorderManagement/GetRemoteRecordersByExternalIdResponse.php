<?php

namespace Panopto\RemoteRecorderManagement;

class GetRemoteRecordersByExternalIdResponse
{

    /**
     * @var ArrayOfRemoteRecorder|null $GetRemoteRecordersByExternalIdResult
     */
    protected $GetRemoteRecordersByExternalIdResult = null;

    /**
     * @param ArrayOfRemoteRecorder $GetRemoteRecordersByExternalIdResult
     */
    public function __construct($GetRemoteRecordersByExternalIdResult)
    {
      $this->GetRemoteRecordersByExternalIdResult = $GetRemoteRecordersByExternalIdResult;
    }

    /**
     * @return ArrayOfRemoteRecorder
     */
    public function getGetRemoteRecordersByExternalIdResult()
    {
        return $this->GetRemoteRecordersByExternalIdResult;
    }

    /**
     * @param ArrayOfRemoteRecorder $GetRemoteRecordersByExternalIdResult
     * @return GetRemoteRecordersByExternalIdResponse
     */
    public function setGetRemoteRecordersByExternalIdResult($GetRemoteRecordersByExternalIdResult): GetRemoteRecordersByExternalIdResponse
    {
        $this->GetRemoteRecordersByExternalIdResult = $GetRemoteRecordersByExternalIdResult;
        return $this;
    }

}
