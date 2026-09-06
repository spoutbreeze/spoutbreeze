<?php

namespace Panopto\SessionManagement;

class CreateCaptionByAbsoluteTime
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
     * @var \DateTime|string|null $timestamp
     */
    protected \DateTime|string|null $timestamp = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param string $text
     * @param \DateTime $timestamp
     */
    public function __construct($auth, $sessionId, $text, \DateTime $timestamp)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->text = $text;
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
     * @return CreateCaptionByAbsoluteTime
     */
    public function setAuth($auth): CreateCaptionByAbsoluteTime
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
     * @return CreateCaptionByAbsoluteTime
     */
    public function setSessionId($sessionId): CreateCaptionByAbsoluteTime
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
     * @return CreateCaptionByAbsoluteTime
     */
    public function setText($text): CreateCaptionByAbsoluteTime
    {
        $this->text = $text;
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
     * @return CreateCaptionByAbsoluteTime
     */
    public function setTimestamp(\DateTime $timestamp): CreateCaptionByAbsoluteTime
    {
        $this->timestamp = $timestamp->format(\DateTime::ATOM);
        return $this;
    }

}
