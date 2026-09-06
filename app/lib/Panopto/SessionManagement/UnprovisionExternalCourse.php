<?php

namespace Panopto\SessionManagement;

class UnprovisionExternalCourse
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $externalContextId
     */
    protected $externalContextId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $externalContextId
     */
    public function __construct($auth, $externalContextId)
    {
      $this->auth = $auth;
      $this->externalContextId = $externalContextId;
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
     * @return UnprovisionExternalCourse
     */
    public function setAuth($auth): UnprovisionExternalCourse
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalContextId()
    {
        return $this->externalContextId;
    }

    /**
     * @param string $externalContextId
     * @return UnprovisionExternalCourse
     */
    public function setExternalContextId($externalContextId): UnprovisionExternalCourse
    {
        $this->externalContextId = $externalContextId;
        return $this;
    }

}
