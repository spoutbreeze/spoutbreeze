<?php

namespace Panopto\RemoteRecorderManagement;

class GetMachineSidForRecorder
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
     * @return GetMachineSidForRecorder
     */
    public function setAuth($auth): GetMachineSidForRecorder
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
     * @return GetMachineSidForRecorder
     */
    public function setRemoteRecorderId($remoteRecorderId): GetMachineSidForRecorder
    {
        $this->remoteRecorderId = $remoteRecorderId;
        return $this;
    }

}
