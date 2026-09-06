<?php

namespace Panopto\AccessManagement;

class GetSelfUserAccessDetails
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @param AuthenticationInfo $auth
     */
    public function __construct($auth)
    {
      $this->auth = $auth;
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
     * @return GetSelfUserAccessDetails
     */
    public function setAuth($auth): GetSelfUserAccessDetails
    {
        $this->auth = $auth;
        return $this;
    }

}
