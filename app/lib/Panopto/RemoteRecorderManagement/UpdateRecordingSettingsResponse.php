<?php

namespace Panopto\RemoteRecorderManagement;

class UpdateRecordingSettingsResponse
{

    /**
     * @var ScheduledRecordingResult|null $UpdateRecordingSettingsResult
     */
    protected $UpdateRecordingSettingsResult = null;

    /**
     * @param ScheduledRecordingResult $UpdateRecordingSettingsResult
     */
    public function __construct($UpdateRecordingSettingsResult)
    {
      $this->UpdateRecordingSettingsResult = $UpdateRecordingSettingsResult;
    }

    /**
     * @return ScheduledRecordingResult
     */
    public function getUpdateRecordingSettingsResult()
    {
        return $this->UpdateRecordingSettingsResult;
    }

    /**
     * @param ScheduledRecordingResult $UpdateRecordingSettingsResult
     * @return UpdateRecordingSettingsResponse
     */
    public function setUpdateRecordingSettingsResult($UpdateRecordingSettingsResult): UpdateRecordingSettingsResponse
    {
        $this->UpdateRecordingSettingsResult = $UpdateRecordingSettingsResult;
        return $this;
    }

}
