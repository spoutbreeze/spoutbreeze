<?php

namespace Panopto\UsageReporting;

class GetFolderSummaryUsage
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $folderId
     */
    protected $folderId = null;

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
     * @param string $folderId
     * @param \DateTime $beginRange
     * @param \DateTime $endRange
     * @param UsageGranularity $granularity
     */
    public function __construct($auth, $folderId, \DateTime $beginRange, \DateTime $endRange, $granularity)
    {
      $this->auth = $auth;
      $this->folderId = $folderId;
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
     * @return GetFolderSummaryUsage
     */
    public function setAuth($auth): GetFolderSummaryUsage
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getFolderId()
    {
        return $this->folderId;
    }

    /**
     * @param string $folderId
     * @return GetFolderSummaryUsage
     */
    public function setFolderId($folderId): GetFolderSummaryUsage
    {
        $this->folderId = $folderId;
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
     * @return GetFolderSummaryUsage
     */
    public function setBeginRange(\DateTime $beginRange): GetFolderSummaryUsage
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
     * @return GetFolderSummaryUsage
     */
    public function setEndRange(\DateTime $endRange): GetFolderSummaryUsage
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
     * @return GetFolderSummaryUsage
     */
    public function setGranularity($granularity): GetFolderSummaryUsage
    {
        $this->granularity = $granularity;
        return $this;
    }

}
