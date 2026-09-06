<?php

namespace Panopto\SessionManagement;

class GetSessionsByExternalId
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ArrayOfstring|null $sessionExternalIds
     */
    protected $sessionExternalIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfstring $sessionExternalIds
     */
    public function __construct($auth, $sessionExternalIds)
    {
      $this->auth = $auth;
      $this->sessionExternalIds = $sessionExternalIds;
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
     * @return GetSessionsByExternalId
     */
    public function setAuth($auth): GetSessionsByExternalId
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getSessionExternalIds()
    {
        return $this->sessionExternalIds;
    }

    /**
     * @param ArrayOfstring $sessionExternalIds
     * @return GetSessionsByExternalId
     */
    public function setSessionExternalIds($sessionExternalIds): GetSessionsByExternalId
    {
        $this->sessionExternalIds = $sessionExternalIds;
        return $this;
    }

}
