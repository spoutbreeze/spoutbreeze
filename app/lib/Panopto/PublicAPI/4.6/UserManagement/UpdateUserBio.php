<?php

namespace Panopto\UserManagement;

class UpdateUserBio
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
     * @var string|null $bio
     */
    protected $bio = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $userId
     * @param string $bio
     */
    public function __construct($auth, $userId, $bio)
    {
      $this->auth = $auth;
      $this->userId = $userId;
      $this->bio = $bio;
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
     * @return UpdateUserBio
     */
    public function setAuth($auth): UpdateUserBio
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
     * @return UpdateUserBio
     */
    public function setUserId($userId): UpdateUserBio
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param string $bio
     * @return UpdateUserBio
     */
    public function setBio($bio): UpdateUserBio
    {
        $this->bio = $bio;
        return $this;
    }

}
