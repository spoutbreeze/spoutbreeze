<?php

namespace Panopto\UsageReporting;

class GetUserDetailedUsage
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
     * @var Pagination|null $pagination
     */
    protected $pagination = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $userId
     * @param Pagination $pagination
     */
    public function __construct($auth, $userId, $pagination)
    {
      $this->auth = $auth;
      $this->userId = $userId;
      $this->pagination = $pagination;
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
     * @return GetUserDetailedUsage
     */
    public function setAuth($auth): GetUserDetailedUsage
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
     * @return GetUserDetailedUsage
     */
    public function setUserId($userId): GetUserDetailedUsage
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return Pagination
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * @param Pagination $pagination
     * @return GetUserDetailedUsage
     */
    public function setPagination($pagination): GetUserDetailedUsage
    {
        $this->pagination = $pagination;
        return $this;
    }

}
