<?php

namespace Panopto\RemoteRecorderManagement;

class GetRemoteRecordersByIdResponse
{

    /**
     * @var ArrayOfRemoteRecorder|null $GetRemoteRecordersByIdResult
     */
    protected $GetRemoteRecordersByIdResult = null;

    /**
     * @param ArrayOfRemoteRecorder $GetRemoteRecordersByIdResult
     */
    public function __construct($GetRemoteRecordersByIdResult)
    {
      $this->GetRemoteRecordersByIdResult = $GetRemoteRecordersByIdResult;
    }

    /**
     * @return ArrayOfRemoteRecorder
     */
    public function getGetRemoteRecordersByIdResult()
    {
        return $this->GetRemoteRecordersByIdResult;
    }

    /**
     * @param ArrayOfRemoteRecorder $GetRemoteRecordersByIdResult
     * @return GetRemoteRecordersByIdResponse
     */
    public function setGetRemoteRecordersByIdResult($GetRemoteRecordersByIdResult): GetRemoteRecordersByIdResponse
    {
        $this->GetRemoteRecordersByIdResult = $GetRemoteRecordersByIdResult;
        return $this;
    }

}
