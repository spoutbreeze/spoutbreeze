<?php

namespace Panopto\UserManagement;

class GetUserMeetingsRecordingFolderIdForUserResponse
{

    /**
     * @var string|null $GetUserMeetingsRecordingFolderIdForUserResult
     */
    protected $GetUserMeetingsRecordingFolderIdForUserResult = null;

    /**
     * @param string $GetUserMeetingsRecordingFolderIdForUserResult
     */
    public function __construct($GetUserMeetingsRecordingFolderIdForUserResult)
    {
      $this->GetUserMeetingsRecordingFolderIdForUserResult = $GetUserMeetingsRecordingFolderIdForUserResult;
    }

    /**
     * @return string
     */
    public function getGetUserMeetingsRecordingFolderIdForUserResult()
    {
        return $this->GetUserMeetingsRecordingFolderIdForUserResult;
    }

    /**
     * @param string $GetUserMeetingsRecordingFolderIdForUserResult
     * @return GetUserMeetingsRecordingFolderIdForUserResponse
     */
    public function setGetUserMeetingsRecordingFolderIdForUserResult($GetUserMeetingsRecordingFolderIdForUserResult): GetUserMeetingsRecordingFolderIdForUserResponse
    {
        $this->GetUserMeetingsRecordingFolderIdForUserResult = $GetUserMeetingsRecordingFolderIdForUserResult;
        return $this;
    }

}
