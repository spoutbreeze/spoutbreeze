<?php

namespace Panopto\SessionManagement;

class CreateNoteByAbsoluteTime
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
     * @var string|null $text
     */
    protected $text = null;

    /**
     * @var string|null $channel
     */
    protected $channel = null;

    /**
     * @var \DateTime|string|null $timestamp
     */
    protected \DateTime|string|null $timestamp = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param string $text
     * @param string $channel
     * @param \DateTime $timestamp
     */
    public function __construct($auth, $sessionId, $text, $channel, \DateTime $timestamp)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->text = $text;
      $this->channel = $channel;
      $this->timestamp = $timestamp->format(\DateTime::ATOM);
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
     * @return CreateNoteByAbsoluteTime
     */
    public function setAuth($auth): CreateNoteByAbsoluteTime
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
     * @return CreateNoteByAbsoluteTime
     */
    public function setSessionId($sessionId): CreateNoteByAbsoluteTime
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return CreateNoteByAbsoluteTime
     */
    public function setText($text): CreateNoteByAbsoluteTime
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param string $channel
     * @return CreateNoteByAbsoluteTime
     */
    public function setChannel($channel): CreateNoteByAbsoluteTime
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getTimestamp(): \DateTime|bool|null
    {
        if ($this->timestamp == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->timestamp);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime $timestamp
     * @return CreateNoteByAbsoluteTime
     */
    public function setTimestamp(\DateTime $timestamp): CreateNoteByAbsoluteTime
    {
        $this->timestamp = $timestamp->format(\DateTime::ATOM);
        return $this;
    }

}
