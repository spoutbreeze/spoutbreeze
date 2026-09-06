<?php

namespace Panopto\SessionManagement;

class DateTimeOffset
{

    /**
     * @var \DateTime|string|null $DateTime
     */
    protected \DateTime|string|null $DateTime = null;

    /**
     * @var int|null $OffsetMinutes
     */
    protected $OffsetMinutes = null;

    /**
     * @param \DateTime $DateTime
     * @param int $OffsetMinutes
     */
    public function __construct(\DateTime $DateTime, $OffsetMinutes)
    {
      $this->DateTime = $DateTime->format(\DateTime::ATOM);
      $this->OffsetMinutes = $OffsetMinutes;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getDateTime(): \DateTime|bool|null
    {
        if ($this->DateTime == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->DateTime);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime $DateTime
     * @return DateTimeOffset
     */
    public function setDateTime(\DateTime $DateTime): DateTimeOffset
    {
        $this->DateTime = $DateTime->format(\DateTime::ATOM);
        return $this;
    }

    /**
     * @return int
     */
    public function getOffsetMinutes()
    {
        return $this->OffsetMinutes;
    }

    /**
     * @param int $OffsetMinutes
     * @return DateTimeOffset
     */
    public function setOffsetMinutes($OffsetMinutes): DateTimeOffset
    {
        $this->OffsetMinutes = $OffsetMinutes;
        return $this;
    }

}
