<?php

namespace Panopto\UsageReporting;

class GetSessionSummaryUsage
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
     * @var \DateTime|string|null $beginRange
     */
    protected \DateTime|string|null $beginRange = null;

    /**
     * @var \DateTime|string|null $endRange
     */
    protected \DateTime|string|null $endRange = null;

    /**
     * @var UsageGranularity|null $granularity
     */
    protected $granularity = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param \DateTime $beginRange
     * @param \DateTime $endRange
     * @param UsageGranularity $granularity
     */
    public function __construct($auth, $sessionId, \DateTime $beginRange, \DateTime $endRange, $granularity)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->beginRange = $beginRange->format(\DateTime::ATOM);
      $this->endRange = $endRange->format(\DateTime::ATOM);
      $this->granularity = $granularity;
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
     * @return GetSessionSummaryUsage
     */
    public function setAuth($auth): GetSessionSummaryUsage
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
     * @return GetSessionSummaryUsage
     */
    public function setSessionId($sessionId): GetSessionSummaryUsage
    {
        $this->sessionId = $sessionId;
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
     * @return GetSessionSummaryUsage
     */
    public function setBeginRange(\DateTime $beginRange): GetSessionSummaryUsage
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
     * @return GetSessionSummaryUsage
     */
    public function setEndRange(\DateTime $endRange): GetSessionSummaryUsage
    {
        $this->endRange = $endRange->format(\DateTime::ATOM);
        return $this;
    }

    /**
     * @return UsageGranularity
     */
    public function getGranularity()
    {
        return $this->granularity;
    }

    /**
     * @param UsageGranularity $granularity
     * @return GetSessionSummaryUsage
     */
    public function setGranularity($granularity): GetSessionSummaryUsage
    {
        $this->granularity = $granularity;
        return $this;
    }

}
