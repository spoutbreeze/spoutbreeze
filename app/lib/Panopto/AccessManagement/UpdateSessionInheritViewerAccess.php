<?php

namespace Panopto\AccessManagement;

class UpdateSessionInheritViewerAccess
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
     * @var bool|null $inheritViewerAccess
     */
    protected $inheritViewerAccess = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param bool $inheritViewerAccess
     */
    public function __construct($auth, $sessionId, $inheritViewerAccess)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->inheritViewerAccess = $inheritViewerAccess;
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
     * @return UpdateSessionInheritViewerAccess
     */
    public function setAuth($auth): UpdateSessionInheritViewerAccess
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
     * @return UpdateSessionInheritViewerAccess
     */
    public function setSessionId($sessionId): UpdateSessionInheritViewerAccess
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getInheritViewerAccess()
    {
        return $this->inheritViewerAccess;
    }

    /**
     * @param bool $inheritViewerAccess
     * @return UpdateSessionInheritViewerAccess
     */
    public function setInheritViewerAccess($inheritViewerAccess): UpdateSessionInheritViewerAccess
    {
        $this->inheritViewerAccess = $inheritViewerAccess;
        return $this;
    }

}
