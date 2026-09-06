<?php

namespace Panopto\SessionManagement;

class DeleteSessions
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ArrayOfguid|null $sessionIds
     */
    protected $sessionIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfguid $sessionIds
     */
    public function __construct($auth, $sessionIds)
    {
      $this->auth = $auth;
      $this->sessionIds = $sessionIds;
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
     * @return DeleteSessions
     */
    public function setAuth($auth): DeleteSessions
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getSessionIds()
    {
        return $this->sessionIds;
    }

    /**
     * @param ArrayOfguid $sessionIds
     * @return DeleteSessions
     */
    public function setSessionIds($sessionIds): DeleteSessions
    {
        $this->sessionIds = $sessionIds;
        return $this;
    }

}
