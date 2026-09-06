<?php

namespace Panopto\RemoteRecorderManagement;

class UpdateRecordingTime
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
     * @var \DateTime|string|null $start
     */
    protected \DateTime|string|null $start = null;

    /**
     * @var \DateTime|string|null $end
     */
    protected \DateTime|string|null $end = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param \DateTime $start
     * @param \DateTime $end
     */
    public function __construct($auth, $sessionId, \DateTime $start, \DateTime $end)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->start = $start->format(\DateTime::ATOM);
      $this->end = $end->format(\DateTime::ATOM);
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
     * @return UpdateRecordingTime
     */
    public function setAuth($auth): UpdateRecordingTime
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
     * @return UpdateRecordingTime
     */
    public function setSessionId($sessionId): UpdateRecordingTime
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getStart(): \DateTime|bool|null
    {
        if ($this->start == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->start);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime $start
     * @return UpdateRecordingTime
     */
    public function setStart(\DateTime $start): UpdateRecordingTime
    {
        $this->start = $start->format(\DateTime::ATOM);
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getEnd(): \DateTime|bool|null
    {
        if ($this->end == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->end);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime $end
     * @return UpdateRecordingTime
     */
    public function setEnd(\DateTime $end): UpdateRecordingTime
    {
        $this->end = $end->format(\DateTime::ATOM);
        return $this;
    }

}
