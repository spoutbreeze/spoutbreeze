<?php

namespace Panopto\SessionManagement;

class CreateCaptionByRelativeTime
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
     * @var float|null $timestamp
     */
    protected $timestamp = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param string $text
     * @param float $timestamp
     */
    public function __construct($auth, $sessionId, $text, $timestamp)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->text = $text;
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
     * @return CreateCaptionByRelativeTime
     */
    public function setAuth($auth): CreateCaptionByRelativeTime
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
     * @return CreateCaptionByRelativeTime
     */
    public function setSessionId($sessionId): CreateCaptionByRelativeTime
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
     * @return CreateCaptionByRelativeTime
     */
    public function setText($text): CreateCaptionByRelativeTime
    {
        $this->text = $text;
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
     * @return CreateCaptionByRelativeTime
     */
    public function setTimestamp($timestamp): CreateCaptionByRelativeTime
    {
        $this->timestamp = $timestamp;
        return $this;
    }

}
