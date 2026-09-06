<?php

namespace Panopto\UsageReporting;

class GetSessionDetailedUsage
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
     * @return GetSessionDetailedUsage
     */
    public function setAuth($auth): GetSessionDetailedUsage
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
     * @return GetSessionDetailedUsage
     */
    public function setSessionId($sessionId): GetSessionDetailedUsage
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
     * @return GetSessionDetailedUsage
     */
    public function setPagination($pagination): GetSessionDetailedUsage
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
     * @return GetSessionDetailedUsage
     */
    public function setBeginRange(\DateTime $beginRange): GetSessionDetailedUsage
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
     * @return GetSessionDetailedUsage
     */
    public function setEndRange(\DateTime $endRange): GetSessionDetailedUsage
    {
        $this->endRange = $endRange->format(\DateTime::ATOM);
        return $this;
    }

}
