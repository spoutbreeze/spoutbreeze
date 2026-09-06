<?php

namespace Panopto\RemoteRecorderManagement;

class UpdateRecordingTimeResponse
{

    /**
     * @var ScheduledRecordingResult|null $UpdateRecordingTimeResult
     */
    protected $UpdateRecordingTimeResult = null;

    /**
     * @param ScheduledRecordingResult $UpdateRecordingTimeResult
     */
    public function __construct($UpdateRecordingTimeResult)
    {
      $this->UpdateRecordingTimeResult = $UpdateRecordingTimeResult;
    }

    /**
     * @return ScheduledRecordingResult
     */
    public function getUpdateRecordingTimeResult()
    {
        return $this->UpdateRecordingTimeResult;
    }

    /**
     * @param ScheduledRecordingResult $UpdateRecordingTimeResult
     * @return UpdateRecordingTimeResponse
     */
    public function setUpdateRecordingTimeResult($UpdateRecordingTimeResult): UpdateRecordingTimeResponse
    {
        $this->UpdateRecordingTimeResult = $UpdateRecordingTimeResult;
        return $this;
    }

}
