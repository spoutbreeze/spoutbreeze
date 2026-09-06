<?php

namespace Panopto\SessionManagement;

class UpdateSessionSetPanoptoBroadcast
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $sessionId
     */
    protected $sessionId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     */
    public function __construct($auth, $sessionId)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
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
     * @return UpdateSessionSetPanoptoBroadcast
     */
    public function setAuth($auth): UpdateSessionSetPanoptoBroadcast
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     * @return UpdateSessionSetPanoptoBroadcast
     */
    public function setSessionId($sessionId): UpdateSessionSetPanoptoBroadcast
    {
        $this->sessionId = $sessionId;
        return $this;
    }

}
