<?php

namespace Panopto\SessionManagement;

class CreateNoteByRelativeTime
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
     * @var float|null $timestamp
     */
    protected $timestamp = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param string $text
     * @param string $channel
     * @param float $timestamp
     */
    public function __construct($auth, $sessionId, $text, $channel, $timestamp)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->text = $text;
      $this->channel = $channel;
      $this->timestamp = $timestamp;
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
     * @return CreateNoteByRelativeTime
     */
    public function setAuth($auth): CreateNoteByRelativeTime
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
     * @return CreateNoteByRelativeTime
     */
    public function setSessionId($sessionId): CreateNoteByRelativeTime
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
     * @return CreateNoteByRelativeTime
     */
    public function setText($text): CreateNoteByRelativeTime
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
     * @return CreateNoteByRelativeTime
     */
    public function setChannel($channel): CreateNoteByRelativeTime
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * @return float
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param float $timestamp
     * @return CreateNoteByRelativeTime
     */
    public function setTimestamp($timestamp): CreateNoteByRelativeTime
    {
        $this->timestamp = $timestamp;
        return $this;
    }

}
