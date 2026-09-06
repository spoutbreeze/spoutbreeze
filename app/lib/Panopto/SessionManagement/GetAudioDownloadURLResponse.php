<?php

namespace Panopto\SessionManagement;

class GetAudioDownloadURLResponse
{

    /**
     * @var string|null $GetAudioDownloadURLResult
     */
    protected $GetAudioDownloadURLResult = null;

    /**
     * @param string $GetAudioDownloadURLResult
     */
    public function __construct($GetAudioDownloadURLResult)
    {
      $this->GetAudioDownloadURLResult = $GetAudioDownloadURLResult;
    }

    /**
     * @return string
     */
    public function getGetAudioDownloadURLResult()
    {
        return $this->GetAudioDownloadURLResult;
    }

    /**
     * @param string $GetAudioDownloadURLResult
     * @return GetAudioDownloadURLResponse
     */
    public function setGetAudioDownloadURLResult($GetAudioDownloadURLResult): GetAudioDownloadURLResponse
    {
        $this->GetAudioDownloadURLResult = $GetAudioDownloadURLResult;
        return $this;
    }

}
