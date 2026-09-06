<?php

namespace Panopto\UsageReporting;

class GetQuizResultDownloadUrlResponse
{

    /**
     * @var string|null $GetQuizResultDownloadUrlResult
     */
    protected $GetQuizResultDownloadUrlResult = null;

    /**
     * @param string $GetQuizResultDownloadUrlResult
     */
    public function __construct($GetQuizResultDownloadUrlResult)
    {
      $this->GetQuizResultDownloadUrlResult = $GetQuizResultDownloadUrlResult;
    }

    /**
     * @return string
     */
    public function getGetQuizResultDownloadUrlResult()
    {
        return $this->GetQuizResultDownloadUrlResult;
    }

    /**
     * @param string $GetQuizResultDownloadUrlResult
     * @return GetQuizResultDownloadUrlResponse
     */
    public function setGetQuizResultDownloadUrlResult($GetQuizResultDownloadUrlResult): GetQuizResultDownloadUrlResponse
    {
        $this->GetQuizResultDownloadUrlResult = $GetQuizResultDownloadUrlResult;
        return $this;
    }

}
