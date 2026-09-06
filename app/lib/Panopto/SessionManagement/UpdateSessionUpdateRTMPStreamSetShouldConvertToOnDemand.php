<?php

namespace Panopto\SessionManagement;

class UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand
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
     * @var bool|null $enabled
     */
    protected $enabled = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param ArrayOfstring $streamKeys
     * @param bool $enabled
     */
    public function __construct($auth, $sessionId, $streamKeys, $enabled)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->streamKeys = $streamKeys;
      $this->enabled = $enabled;
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
     * @return UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand
     */
    public function setAuth($auth): UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand
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
     * @return UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand
     */
    public function setSessionId($sessionId): UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand
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
     * @return UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand
     */
    public function setStreamKeys($streamKeys): UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand
    {
        $this->streamKeys = $streamKeys;
        return $this;
    }

    /**
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     * @return UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand
     */
    public function setEnabled($enabled): UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand
    {
        $this->enabled = $enabled;
        return $this;
    }

}
