<?php

namespace Panopto\UsageReporting;

class GetSessionUserDetailedUsage
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
     * @var string|null $userId
     */
    protected $userId = null;

    /**
     * @var Pagination|null $pagination
     */
    protected $pagination = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param string $userId
     * @param Pagination $pagination
     */
    public function __construct($auth, $sessionId, $userId, $pagination)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
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
     * @return GetSessionUserDetailedUsage
     */
    public function setAuth($auth): GetSessionUserDetailedUsage
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
     * @return GetSessionUserDetailedUsage
     */
    public function setSessionId($sessionId): GetSessionUserDetailedUsage
    {
        $this->sessionId = $sessionId;
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
     * @return GetSessionUserDetailedUsage
     */
    public function setUserId($userId): GetSessionUserDetailedUsage
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
     * @return GetSessionUserDetailedUsage
     */
    public function setPagination($pagination): GetSessionUserDetailedUsage
    {
        $this->pagination = $pagination;
        return $this;
    }

}
