<?php

namespace Panopto\AccessManagement;

class UpdateSessionIsPublic
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
     * @var bool|null $isPublic
     */
    protected $isPublic = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param bool $isPublic
     */
    public function __construct($auth, $sessionId, $isPublic)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->isPublic = $isPublic;
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
     * @return UpdateSessionIsPublic
     */
    public function setAuth($auth): UpdateSessionIsPublic
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
     * @return UpdateSessionIsPublic
     */
    public function setSessionId($sessionId): UpdateSessionIsPublic
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * @param bool $isPublic
     * @return UpdateSessionIsPublic
     */
    public function setIsPublic($isPublic): UpdateSessionIsPublic
    {
        $this->isPublic = $isPublic;
        return $this;
    }

}
