<?php

namespace Panopto\RemoteRecorderManagement;

class ScheduleRecordingResponse
{

    /**
     * @var ScheduledRecordingResult|null $ScheduleRecordingResult
     */
    protected $ScheduleRecordingResult = null;

    /**
     * @param ScheduledRecordingResult $ScheduleRecordingResult
     */
    public function __construct($ScheduleRecordingResult)
    {
      $this->ScheduleRecordingResult = $ScheduleRecordingResult;
    }

    /**
     * @return ScheduledRecordingResult
     */
    public function getScheduleRecordingResult()
    {
        return $this->ScheduleRecordingResult;
    }

    /**
     * @param ScheduledRecordingResult $ScheduleRecordingResult
     * @return ScheduleRecordingResponse
     */
    public function setScheduleRecordingResult($ScheduleRecordingResult): ScheduleRecordingResponse
    {
        $this->ScheduleRecordingResult = $ScheduleRecordingResult;
        return $this;
    }

}
