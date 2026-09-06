<?php

namespace Panopto\RemoteRecorderManagement;

class UpdateRemoteRecorderExternalId
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
     * @var string|null $externalId
     */
    protected $externalId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $remoteRecorderId
     * @param string $externalId
     */
    public function __construct($auth, $remoteRecorderId, $externalId)
    {
      $this->auth = $auth;
      $this->remoteRecorderId = $remoteRecorderId;
      $this->externalId = $externalId;
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
     * @return UpdateRemoteRecorderExternalId
     */
    public function setAuth($auth): UpdateRemoteRecorderExternalId
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
     * @return UpdateRemoteRecorderExternalId
     */
    public function setRemoteRecorderId($remoteRecorderId): UpdateRemoteRecorderExternalId
    {
        $this->remoteRecorderId = $remoteRecorderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     * @return UpdateRemoteRecorderExternalId
     */
    public function setExternalId($externalId): UpdateRemoteRecorderExternalId
    {
        $this->externalId = $externalId;
        return $this;
    }

}
