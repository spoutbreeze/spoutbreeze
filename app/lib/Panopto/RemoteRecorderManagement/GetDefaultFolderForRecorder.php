<?php

namespace Panopto\RemoteRecorderManagement;

class GetDefaultFolderForRecorder
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $remoteRecorderId
     */
    protected $remoteRecorderId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $remoteRecorderId
     */
    public function __construct($auth, $remoteRecorderId)
    {
      $this->auth = $auth;
      $this->remoteRecorderId = $remoteRecorderId;
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
     * @return GetDefaultFolderForRecorder
     */
    public function setAuth($auth): GetDefaultFolderForRecorder
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemoteRecorderId()
    {
        return $this->remoteRecorderId;
    }

    /**
     * @param string $remoteRecorderId
     * @return GetDefaultFolderForRecorder
     */
    public function setRemoteRecorderId($remoteRecorderId): GetDefaultFolderForRecorder
    {
        $this->remoteRecorderId = $remoteRecorderId;
        return $this;
    }

}
