<?php

namespace Panopto\SessionManagement;

class UpdateSessionName
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
     * @var string|null $name
     */
    protected $name = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param string $name
     */
    public function __construct($auth, $sessionId, $name)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->name = $name;
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
     * @return UpdateSessionName
     */
    public function setAuth($auth): UpdateSessionName
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
     * @return UpdateSessionName
     */
    public function setSessionId($sessionId): UpdateSessionName
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UpdateSessionName
     */
    public function setName($name): UpdateSessionName
    {
        $this->name = $name;
        return $this;
    }

}
