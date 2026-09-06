<?php

namespace Panopto\RemoteRecorderManagement;

class ScheduleRecurringRecordingResponse
{

    /**
     * @var ScheduledRecordingResult|null $ScheduleRecurringRecordingResult
     */
    protected $ScheduleRecurringRecordingResult = null;

    /**
     * @param ScheduledRecordingResult $ScheduleRecurringRecordingResult
     */
    public function __construct($ScheduleRecurringRecordingResult)
    {
      $this->ScheduleRecurringRecordingResult = $ScheduleRecurringRecordingResult;
    }

    /**
     * @return ScheduledRecordingResult
     */
    public function getScheduleRecurringRecordingResult()
    {
        return $this->ScheduleRecurringRecordingResult;
    }

    /**
     * @param ScheduledRecordingResult $ScheduleRecurringRecordingResult
     * @return ScheduleRecurringRecordingResponse
     */
    public function setScheduleRecurringRecordingResult($ScheduleRecurringRecordingResult): ScheduleRecurringRecordingResponse
    {
        $this->ScheduleRecurringRecordingResult = $ScheduleRecurringRecordingResult;
        return $this;
    }

}
