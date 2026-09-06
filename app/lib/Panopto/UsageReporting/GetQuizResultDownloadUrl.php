<?php

namespace Panopto\UsageReporting;

class GetQuizResultDownloadUrl
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
     * @var QuizResultReportType|null $quizResultReportType
     */
    protected $quizResultReportType = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param QuizResultReportType $quizResultReportType
     */
    public function __construct($auth, $sessionId, $quizResultReportType)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->quizResultReportType = $quizResultReportType;
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
     * @return GetQuizResultDownloadUrl
     */
    public function setAuth($auth): GetQuizResultDownloadUrl
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
     * @return GetQuizResultDownloadUrl
     */
    public function setSessionId($sessionId): GetQuizResultDownloadUrl
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return QuizResultReportType
     */
    public function getQuizResultReportType()
    {
        return $this->quizResultReportType;
    }

    /**
     * @param QuizResultReportType $quizResultReportType
     * @return GetQuizResultDownloadUrl
     */
    public function setQuizResultReportType($quizResultReportType): GetQuizResultDownloadUrl
    {
        $this->quizResultReportType = $quizResultReportType;
        return $this;
    }

}
