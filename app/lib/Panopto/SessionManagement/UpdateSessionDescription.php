<?php

namespace Panopto\SessionManagement;

class UpdateSessionDescription
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
     * @var string|null $description
     */
    protected $description = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param string $description
     */
    public function __construct($auth, $sessionId, $description)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->description = $description;
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
     * @return UpdateSessionDescription
     */
    public function setAuth($auth): UpdateSessionDescription
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
     * @return UpdateSessionDescription
     */
    public function setSessionId($sessionId): UpdateSessionDescription
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return UpdateSessionDescription
     */
    public function setDescription($description): UpdateSessionDescription
    {
        $this->description = $description;
        return $this;
    }

}
