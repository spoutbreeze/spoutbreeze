<?php

namespace Panopto\UserManagement;

class UpdatePassword
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $userId
     */
    protected $userId = null;

    /**
     * @var string|null $newPassword
     */
    protected $newPassword = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $userId
     * @param string $newPassword
     */
    public function __construct($auth, $userId, $newPassword)
    {
      $this->auth = $auth;
      $this->userId = $userId;
      $this->newPassword = $newPassword;
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
     * @return UpdatePassword
     */
    public function setAuth($auth): UpdatePassword
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return UpdatePassword
     */
    public function setUserId($userId): UpdatePassword
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getNewPassword()
    {
        return $this->newPassword;
    }

    /**
     * @param string $newPassword
     * @return UpdatePassword
     */
    public function setNewPassword($newPassword): UpdatePassword
    {
        $this->newPassword = $newPassword;
        return $this;
    }

}
