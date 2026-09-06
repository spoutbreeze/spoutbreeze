<?php

namespace Panopto\RemoteRecorderManagement;

class GetRemoteRecordersByExternalId
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ArrayOfstring|null $externalIds
     */
    protected $externalIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfstring $externalIds
     */
    public function __construct($auth, $externalIds)
    {
      $this->auth = $auth;
      $this->externalIds = $externalIds;
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
     * @return GetRemoteRecordersByExternalId
     */
    public function setAuth($auth): GetRemoteRecordersByExternalId
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getExternalIds()
    {
        return $this->externalIds;
    }

    /**
     * @param ArrayOfstring $externalIds
     * @return GetRemoteRecordersByExternalId
     */
    public function setExternalIds($externalIds): GetRemoteRecordersByExternalId
    {
        $this->externalIds = $externalIds;
        return $this;
    }

}
