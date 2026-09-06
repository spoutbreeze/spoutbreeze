<?php

namespace Panopto\AccessManagement;

class AuthenticationInfo
{

    /**
     * @var string|null $AuthCode
     */
    protected $AuthCode = null;

    /**
     * @var string|null $Password
     */
    protected $Password = null;

    /**
     * @var string|null $UserKey
     */
    protected $UserKey = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getAuthCode()
    {
        return $this->AuthCode;
    }

    /**
     * @param string $AuthCode
     * @return AuthenticationInfo
     */
    public function setAuthCode($AuthCode): AuthenticationInfo
    {
        $this->AuthCode = $AuthCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param string $Password
     * @return AuthenticationInfo
     */
    public function setPassword($Password): AuthenticationInfo
    {
        $this->Password = $Password;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserKey()
    {
        return $this->UserKey;
    }

    /**
     * @param string $UserKey
     * @return AuthenticationInfo
     */
    public function setUserKey($UserKey): AuthenticationInfo
    {
        $this->UserKey = $UserKey;
        return $this;
    }

}
