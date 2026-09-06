<?php

namespace Panopto\SessionManagement;

class UpdateSessionExternalId
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
     * @var string|null $externalId
     */
    protected $externalId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param string $externalId
     */
    public function __construct($auth, $sessionId, $externalId)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
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
     * @return UpdateSessionExternalId
     */
    public function setAuth($auth): UpdateSessionExternalId
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
     * @return UpdateSessionExternalId
     */
    public function setSessionId($sessionId): UpdateSessionExternalId
    {
        $this->sessionId = $sessionId;
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
     * @return UpdateSessionExternalId
     */
    public function setExternalId($externalId): UpdateSessionExternalId
    {
        $this->externalId = $externalId;
        return $this;
    }

}
