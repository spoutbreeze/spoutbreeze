<?php

namespace Panopto\UsageReporting;

class GetSystemSummaryUsage
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

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
     * @param \DateTime $beginRange
     * @param \DateTime $endRange
     * @param UsageGranularity $granularity
     */
    public function __construct($auth, \DateTime $beginRange, \DateTime $endRange, $granularity)
    {
      $this->auth = $auth;
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
     * @return GetSystemSummaryUsage
     */
    public function setAuth($auth): GetSystemSummaryUsage
    {
        $this->auth = $auth;
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
     * @return GetSystemSummaryUsage
     */
    public function setBeginRange(\DateTime $beginRange): GetSystemSummaryUsage
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
     * @return GetSystemSummaryUsage
     */
    public function setEndRange(\DateTime $endRange): GetSystemSummaryUsage
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
     * @return GetSystemSummaryUsage
     */
    public function setGranularity($granularity): GetSystemSummaryUsage
    {
        $this->granularity = $granularity;
        return $this;
    }

}
