<?php

namespace Panopto\SessionManagement;

class UpdateSessionIsBroadcast
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
     * @var bool|null $isBroadcast
     */
    protected $isBroadcast = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param bool $isBroadcast
     */
    public function __construct($auth, $sessionId, $isBroadcast)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->isBroadcast = $isBroadcast;
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
     * @return UpdateSessionIsBroadcast
     */
    public function setAuth($auth): UpdateSessionIsBroadcast
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
     * @return UpdateSessionIsBroadcast
     */
    public function setSessionId($sessionId): UpdateSessionIsBroadcast
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsBroadcast()
    {
        return $this->isBroadcast;
    }

    /**
     * @param bool $isBroadcast
     * @return UpdateSessionIsBroadcast
     */
    public function setIsBroadcast($isBroadcast): UpdateSessionIsBroadcast
    {
        $this->isBroadcast = $isBroadcast;
        return $this;
    }

}
