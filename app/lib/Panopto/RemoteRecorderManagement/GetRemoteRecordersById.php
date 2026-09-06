<?php

namespace Panopto\RemoteRecorderManagement;

class GetRemoteRecordersById
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ArrayOfguid|null $remoteRecorderIds
     */
    protected $remoteRecorderIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfguid $remoteRecorderIds
     */
    public function __construct($auth, $remoteRecorderIds)
    {
      $this->auth = $auth;
      $this->remoteRecorderIds = $remoteRecorderIds;
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
     * @return GetRemoteRecordersById
     */
    public function setAuth($auth): GetRemoteRecordersById
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getRemoteRecorderIds()
    {
        return $this->remoteRecorderIds;
    }

    /**
     * @param ArrayOfguid $remoteRecorderIds
     * @return GetRemoteRecordersById
     */
    public function setRemoteRecorderIds($remoteRecorderIds): GetRemoteRecordersById
    {
        $this->remoteRecorderIds = $remoteRecorderIds;
        return $this;
    }

}
