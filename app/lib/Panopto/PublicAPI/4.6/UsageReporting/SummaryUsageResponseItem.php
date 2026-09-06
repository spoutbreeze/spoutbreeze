<?php

namespace Panopto\UsageReporting;

class SummaryUsageResponseItem
{

    /**
     * @var float|null $MinutesViewed
     */
    protected $MinutesViewed = null;

    /**
     * @var \DateTime|string|null $Time
     */
    protected \DateTime|string|null $Time = null;

    /**
     * @var int|null $UniqueUsers
     */
    protected $UniqueUsers = null;

    /**
     * @var int|null $Views
     */
    protected $Views = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return float
     */
    public function getMinutesViewed()
    {
        return $this->MinutesViewed;
    }

    /**
     * @param float $MinutesViewed
     * @return SummaryUsageResponseItem
     */
    public function setMinutesViewed($MinutesViewed): SummaryUsageResponseItem
    {
        $this->MinutesViewed = $MinutesViewed;
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
     * @return SummaryUsageResponseItem
     */
    public function setTime(?\DateTime $Time = null): SummaryUsageResponseItem
    {
        if ($Time == null) {
            $this->Time = null;
        } else {
            $this->Time = $Time->format(\DateTime::ATOM);
        }
        return $this;
    }

    /**
     * @return int
     */
    public function getUniqueUsers()
    {
        return $this->UniqueUsers;
    }

    /**
     * @param int $UniqueUsers
     * @return SummaryUsageResponseItem
     */
    public function setUniqueUsers($UniqueUsers): SummaryUsageResponseItem
    {
        $this->UniqueUsers = $UniqueUsers;
        return $this;
    }

    /**
     * @return int
     */
    public function getViews()
    {
        return $this->Views;
    }

    /**
     * @param int $Views
     * @return SummaryUsageResponseItem
     */
    public function setViews($Views): SummaryUsageResponseItem
    {
        $this->Views = $Views;
        return $this;
    }

}
