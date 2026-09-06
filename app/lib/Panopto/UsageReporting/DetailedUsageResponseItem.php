<?php

namespace Panopto\UsageReporting;

class DetailedUsageResponseItem
{

    /**
     * @var float|null $SecondsViewed
     */
    protected $SecondsViewed = null;

    /**
     * @var string|null $SessionId
     */
    protected $SessionId = null;

    /**
     * @var float|null $StartPosition
     */
    protected $StartPosition = null;

    /**
     * @var \DateTime|string|null $Time
     */
    protected \DateTime|string|null $Time = null;

    /**
     * @var string|null $UserId
     */
    protected $UserId = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return float
     */
    public function getSecondsViewed()
    {
        return $this->SecondsViewed;
    }

    /**
     * @param float $SecondsViewed
     * @return DetailedUsageResponseItem
     */
    public function setSecondsViewed($SecondsViewed): DetailedUsageResponseItem
    {
        $this->SecondsViewed = $SecondsViewed;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->SessionId;
    }

    /**
     * @param string $SessionId
     * @return DetailedUsageResponseItem
     */
    public function setSessionId($SessionId): DetailedUsageResponseItem
    {
        $this->SessionId = $SessionId;
        return $this;
    }

    /**
     * @return float
     */
    public function getStartPosition()
    {
        return $this->StartPosition;
    }

    /**
     * @param float $StartPosition
     * @return DetailedUsageResponseItem
     */
    public function setStartPosition($StartPosition): DetailedUsageResponseItem
    {
        $this->StartPosition = $StartPosition;
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getTime(): \DateTime|bool|null
    {
        if ($this->Time == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->Time);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime|null $Time
     * @return DetailedUsageResponseItem
     */
    public function setTime(?\DateTime $Time = null): DetailedUsageResponseItem
    {
        if ($Time == null) {
            $this->Time = null;
        } else {
            $this->Time = $Time->format(\DateTime::ATOM);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * @param string $UserId
     * @return DetailedUsageResponseItem
     */
    public function setUserId($UserId): DetailedUsageResponseItem
    {
        $this->UserId = $UserId;
        return $this;
    }

}
