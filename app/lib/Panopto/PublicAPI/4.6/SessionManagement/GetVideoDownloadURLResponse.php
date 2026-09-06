<?php

namespace Panopto\SessionManagement;

class GetVideoDownloadURLResponse
{

    /**
     * @var string|null $GetVideoDownloadURLResult
     */
    protected $GetVideoDownloadURLResult = null;

    /**
     * @param string $GetVideoDownloadURLResult
     */
    public function __construct($GetVideoDownloadURLResult)
    {
      $this->GetVideoDownloadURLResult = $GetVideoDownloadURLResult;
    }

    /**
     * @return string
     */
    public function getGetVideoDownloadURLResult()
    {
        return $this->GetVideoDownloadURLResult;
    }

    /**
     * @param string $GetVideoDownloadURLResult
     * @return GetVideoDownloadURLResponse
     */
    public function setGetVideoDownloadURLResult($GetVideoDownloadURLResult): GetVideoDownloadURLResponse
    {
        $this->GetVideoDownloadURLResult = $GetVideoDownloadURLResult;
        return $this;
    }

}
