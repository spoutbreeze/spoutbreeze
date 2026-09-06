<?php

namespace Panopto\SessionManagement;

class GetPersonalFolderForUser
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
     * @var bool|null $allowCreation
     */
    protected $allowCreation = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $userId
     * @param bool $allowCreation
     */
    public function __construct($auth, $userId, $allowCreation)
    {
      $this->auth = $auth;
      $this->userId = $userId;
      $this->allowCreation = $allowCreation;
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
     * @return GetPersonalFolderForUser
     */
    public function setAuth($auth): GetPersonalFolderForUser
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
     * @return GetPersonalFolderForUser
     */
    public function setUserId($userId): GetPersonalFolderForUser
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAllowCreation()
    {
        return $this->allowCreation;
    }

    /**
     * @param bool $allowCreation
     * @return GetPersonalFolderForUser
     */
    public function setAllowCreation($allowCreation): GetPersonalFolderForUser
    {
        $this->allowCreation = $allowCreation;
        return $this;
    }

}
