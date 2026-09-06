<?php

namespace Panopto\UserManagement;

class GetUserMeetingsRecordingFolderIdForUser
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
     * @param AuthenticationInfo $auth
     * @param string $userKey
     */
    public function __construct($auth, $userKey)
    {
      $this->auth = $auth;
      $this->userKey = $userKey;
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
     * @return GetUserMeetingsRecordingFolderIdForUser
     */
    public function setAuth($auth): GetUserMeetingsRecordingFolderIdForUser
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
     * @return GetUserMeetingsRecordingFolderIdForUser
     */
    public function setUserKey($userKey): GetUserMeetingsRecordingFolderIdForUser
    {
        $this->userKey = $userKey;
        return $this;
    }

}
