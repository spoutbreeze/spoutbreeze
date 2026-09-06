<?php

namespace Panopto\UserManagement;

class SetUserMeetingsRecordingFolderIdForUser
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $userKey
     */
    protected $userKey = null;

    /**
     * @var string|null $meetingsFolderId
     */
    protected $meetingsFolderId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $userKey
     * @param string $meetingsFolderId
     */
    public function __construct($auth, $userKey, $meetingsFolderId)
    {
      $this->auth = $auth;
      $this->userKey = $userKey;
      $this->meetingsFolderId = $meetingsFolderId;
    }

    /**
     * @return AuthenticationInfo
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param AuthenticationInfo $auth
     * @return SetUserMeetingsRecordingFolderIdForUser
     */
    public function setAuth($auth): SetUserMeetingsRecordingFolderIdForUser
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserKey()
    {
        return $this->userKey;
    }

    /**
     * @param string $userKey
     * @return SetUserMeetingsRecordingFolderIdForUser
     */
    public function setUserKey($userKey): SetUserMeetingsRecordingFolderIdForUser
    {
        $this->userKey = $userKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getMeetingsFolderId()
    {
        return $this->meetingsFolderId;
    }

    /**
     * @param string $meetingsFolderId
     * @return SetUserMeetingsRecordingFolderIdForUser
     */
    public function setMeetingsFolderId($meetingsFolderId): SetUserMeetingsRecordingFolderIdForUser
    {
        $this->meetingsFolderId = $meetingsFolderId;
        return $this;
    }

}
