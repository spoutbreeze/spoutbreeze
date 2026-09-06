<?php

namespace Panopto\RemoteRecorderManagement;

class ScheduledRecordingResult
{

    /**
     * @var ArrayOfScheduledRecordingInfo|null $ConflictingSessions
     */
    protected $ConflictingSessions = null;

    /**
     * @var bool|null $ConflictsExist
     */
    protected $ConflictsExist = null;

    /**
     * @var ArrayOfguid|null $SessionIDs
     */
    protected $SessionIDs = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ArrayOfScheduledRecordingInfo
     */
    public function getConflictingSessions()
    {
        return $this->ConflictingSessions;
    }

    /**
     * @param ArrayOfScheduledRecordingInfo $ConflictingSessions
     * @return ScheduledRecordingResult
     */
    public function setConflictingSessions($ConflictingSessions): ScheduledRecordingResult
    {
        $this->ConflictingSessions = $ConflictingSessions;
        return $this;
    }

    /**
     * @return bool
     */
    public function getConflictsExist()
    {
        return $this->ConflictsExist;
    }

    /**
     * @param bool $ConflictsExist
     * @return ScheduledRecordingResult
     */
    public function setConflictsExist($ConflictsExist): ScheduledRecordingResult
    {
        $this->ConflictsExist = $ConflictsExist;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getSessionIDs()
    {
        return $this->SessionIDs;
    }

    /**
     * @param ArrayOfguid $SessionIDs
     * @return ScheduledRecordingResult
     */
    public function setSessionIDs($SessionIDs): ScheduledRecordingResult
    {
        $this->SessionIDs = $SessionIDs;
        return $this;
    }

}
