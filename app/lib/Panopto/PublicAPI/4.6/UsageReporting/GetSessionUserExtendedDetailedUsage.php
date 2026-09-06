<?php

namespace Panopto\UsageReporting;

class GetSessionUserExtendedDetailedUsage
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
     * @return GetSessionUserExtendedDetailedUsage
     */
    public function setAuth($auth): GetSessionUserExtendedDetailedUsage
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
     * @return GetSessionUserExtendedDetailedUsage
     */
    public function setSessionId($sessionId): GetSessionUserExtendedDetailedUsage
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
     * @return GetSessionUserExtendedDetailedUsage
     */
    public function setUserId($userId): GetSessionUserExtendedDetailedUsage
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
     * @return GetSessionUserExtendedDetailedUsage
     */
    public function setPagination($pagination): GetSessionUserExtendedDetailedUsage
    {
        $this->pagination = $pagination;
        return $this;
    }

}
