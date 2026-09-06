<?php

namespace Panopto\SessionManagement;

class UpdateSessionOwner
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
     * @var string|null $newOwnerUserKey
     */
    protected $newOwnerUserKey = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfguid $sessionIds
     * @param string $newOwnerUserKey
     */
    public function __construct($auth, $sessionIds, $newOwnerUserKey)
    {
      $this->auth = $auth;
      $this->sessionIds = $sessionIds;
      $this->newOwnerUserKey = $newOwnerUserKey;
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
     * @return UpdateSessionOwner
     */
    public function setAuth($auth): UpdateSessionOwner
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
     * @return UpdateSessionOwner
     */
    public function setSessionIds($sessionIds): UpdateSessionOwner
    {
        $this->sessionIds = $sessionIds;
        return $this;
    }

    /**
     * @return string
     */
    public function getNewOwnerUserKey()
    {
        return $this->newOwnerUserKey;
    }

    /**
     * @param string $newOwnerUserKey
     * @return UpdateSessionOwner
     */
    public function setNewOwnerUserKey($newOwnerUserKey): UpdateSessionOwner
    {
        $this->newOwnerUserKey = $newOwnerUserKey;
        return $this;
    }

}
