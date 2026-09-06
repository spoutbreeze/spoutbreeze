<?php

namespace Panopto\SessionManagement;

class GetRecorderDownloadUrlsResponse
{

    /**
     * @var RecorderDownloadUrlResponse|null $GetRecorderDownloadUrlsResult
     */
    protected $GetRecorderDownloadUrlsResult = null;

    /**
     * @param RecorderDownloadUrlResponse $GetRecorderDownloadUrlsResult
     */
    public function __construct($GetRecorderDownloadUrlsResult)
    {
      $this->GetRecorderDownloadUrlsResult = $GetRecorderDownloadUrlsResult;
    }

    /**
     * @return RecorderDownloadUrlResponse
     */
    public function getGetRecorderDownloadUrlsResult()
    {
        return $this->GetRecorderDownloadUrlsResult;
    }

    /**
     * @param RecorderDownloadUrlResponse $GetRecorderDownloadUrlsResult
     * @return GetRecorderDownloadUrlsResponse
     */
    public function setGetRecorderDownloadUrlsResult($GetRecorderDownloadUrlsResult): GetRecorderDownloadUrlsResponse
    {
        $this->GetRecorderDownloadUrlsResult = $GetRecorderDownloadUrlsResult;
        return $this;
    }

}
