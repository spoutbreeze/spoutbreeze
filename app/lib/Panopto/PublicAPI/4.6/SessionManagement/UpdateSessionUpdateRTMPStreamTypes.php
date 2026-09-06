<?php

namespace Panopto\SessionManagement;

class UpdateSessionUpdateRTMPStreamTypes
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
     * @var ArrayOfstring|null $streamKeys
     */
    protected $streamKeys = null;

    /**
     * @var bool|null $setAsPrimaries
     */
    protected $setAsPrimaries = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param ArrayOfstring $streamKeys
     * @param bool $setAsPrimaries
     */
    public function __construct($auth, $sessionId, $streamKeys, $setAsPrimaries)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->streamKeys = $streamKeys;
      $this->setAsPrimaries = $setAsPrimaries;
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
     * @return UpdateSessionUpdateRTMPStreamTypes
     */
    public function setAuth($auth): UpdateSessionUpdateRTMPStreamTypes
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
     * @return UpdateSessionUpdateRTMPStreamTypes
     */
    public function setSessionId($sessionId): UpdateSessionUpdateRTMPStreamTypes
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getStreamKeys()
    {
        return $this->streamKeys;
    }

    /**
     * @param ArrayOfstring $streamKeys
     * @return UpdateSessionUpdateRTMPStreamTypes
     */
    public function setStreamKeys($streamKeys): UpdateSessionUpdateRTMPStreamTypes
    {
        $this->streamKeys = $streamKeys;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSetAsPrimaries()
    {
        return $this->setAsPrimaries;
    }

    /**
     * @param bool $setAsPrimaries
     * @return UpdateSessionUpdateRTMPStreamTypes
     */
    public function setSetAsPrimaries($setAsPrimaries): UpdateSessionUpdateRTMPStreamTypes
    {
        $this->setAsPrimaries = $setAsPrimaries;
        return $this;
    }

}
