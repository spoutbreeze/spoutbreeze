<?php

namespace Panopto\UsageReporting;

class GetUserExtendedDetailedUsage
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
     * @var \DateTime|string|null $beginRange
     */
    protected \DateTime|string|null $beginRange = null;

    /**
     * @var \DateTime|string|null $endRange
     */
    protected \DateTime|string|null $endRange = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $userId
     * @param Pagination $pagination
     * @param \DateTime $beginRange
     * @param \DateTime $endRange
     */
    public function __construct($auth, $userId, $pagination, \DateTime $beginRange, \DateTime $endRange)
    {
      $this->auth = $auth;
      $this->userId = $userId;
      $this->pagination = $pagination;
      $this->beginRange = $beginRange->format(\DateTime::ATOM);
      $this->endRange = $endRange->format(\DateTime::ATOM);
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
     * @return GetUserExtendedDetailedUsage
     */
    public function setAuth($auth): GetUserExtendedDetailedUsage
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
     * @return GetUserExtendedDetailedUsage
     */
    public function setUserId($userId): GetUserExtendedDetailedUsage
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
     * @return GetUserExtendedDetailedUsage
     */
    public function setPagination($pagination): GetUserExtendedDetailedUsage
    {
        $this->pagination = $pagination;
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getBeginRange(): \DateTime|bool|null
    {
        if ($this->beginRange == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->beginRange);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime $beginRange
     * @return GetUserExtendedDetailedUsage
     */
    public function setBeginRange(\DateTime $beginRange): GetUserExtendedDetailedUsage
    {
        $this->beginRange = $beginRange->format(\DateTime::ATOM);
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getEndRange(): \DateTime|bool|null
    {
        if ($this->endRange == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->endRange);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime $endRange
     * @return GetUserExtendedDetailedUsage
     */
    public function setEndRange(\DateTime $endRange): GetUserExtendedDetailedUsage
    {
        $this->endRange = $endRange->format(\DateTime::ATOM);
        return $this;
    }

}
