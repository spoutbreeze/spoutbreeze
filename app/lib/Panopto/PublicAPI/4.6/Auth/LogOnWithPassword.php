<?php

namespace Panopto\Auth;

class LogOnWithPassword
{

    /**
     * @var string|null $userKey
     */
    protected $userKey = null;

    /**
     * @var string|null $password
     */
    protected $password = null;

    /**
     * @param string $userKey
     * @param string $password
     */
    public function __construct($userKey, $password)
    {
      $this->userKey = $userKey;
      $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUserKey()
    {
        return $this->userKey;
    }

    /**
     * @param string $userKey
     * @return LogOnWithPassword
     */
    public function setUserKey($userKey): LogOnWithPassword
    {
        $this->userKey = $userKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return LogOnWithPassword
     */
    public function setPassword($password): LogOnWithPassword
    {
        $this->password = $password;
        return $this;
    }

}
