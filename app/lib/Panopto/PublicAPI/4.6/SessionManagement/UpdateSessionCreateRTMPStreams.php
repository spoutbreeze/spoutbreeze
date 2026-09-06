<?php

namespace Panopto\SessionManagement;

class UpdateSessionCreateRTMPStreams
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
     * @var int|null $countToAdd
     */
    protected $countToAdd = null;

    /**
     * @var bool|null $arePrimaries
     */
    protected $arePrimaries = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param int $countToAdd
     * @param bool $arePrimaries
     */
    public function __construct($auth, $sessionId, $countToAdd, $arePrimaries)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->countToAdd = $countToAdd;
      $this->arePrimaries = $arePrimaries;
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
     * @return UpdateSessionCreateRTMPStreams
     */
    public function setAuth($auth): UpdateSessionCreateRTMPStreams
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
     * @return UpdateSessionCreateRTMPStreams
     */
    public function setSessionId($sessionId): UpdateSessionCreateRTMPStreams
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCountToAdd()
    {
        return $this->countToAdd;
    }

    /**
     * @param int $countToAdd
     * @return UpdateSessionCreateRTMPStreams
     */
    public function setCountToAdd($countToAdd): UpdateSessionCreateRTMPStreams
    {
        $this->countToAdd = $countToAdd;
        return $this;
    }

    /**
     * @return bool
     */
    public function getArePrimaries()
    {
        return $this->arePrimaries;
    }

    /**
     * @param bool $arePrimaries
     * @return UpdateSessionCreateRTMPStreams
     */
    public function setArePrimaries($arePrimaries): UpdateSessionCreateRTMPStreams
    {
        $this->arePrimaries = $arePrimaries;
        return $this;
    }

}
