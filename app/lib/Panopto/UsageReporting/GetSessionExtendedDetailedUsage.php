<?php

namespace Panopto\UsageReporting;

class GetSessionExtendedDetailedUsage
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
     * @param string $sessionId
     * @param Pagination $pagination
     * @param \DateTime $beginRange
     * @param \DateTime $endRange
     */
    public function __construct($auth, $sessionId, $pagination, \DateTime $beginRange, \DateTime $endRange)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
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
     * @return GetSessionExtendedDetailedUsage
     */
    public function setAuth($auth): GetSessionExtendedDetailedUsage
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
     * @return GetSessionExtendedDetailedUsage
     */
    public function setSessionId($sessionId): GetSessionExtendedDetailedUsage
    {
        $this->sessionId = $sessionId;
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
     * @return GetSessionExtendedDetailedUsage
     */
    public function setPagination($pagination): GetSessionExtendedDetailedUsage
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
     * @return GetSessionExtendedDetailedUsage
     */
    public function setBeginRange(\DateTime $beginRange): GetSessionExtendedDetailedUsage
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
     * @return GetSessionExtendedDetailedUsage
     */
    public function setEndRange(\DateTime $endRange): GetSessionExtendedDetailedUsage
    {
        $this->endRange = $endRange->format(\DateTime::ATOM);
        return $this;
    }

}
