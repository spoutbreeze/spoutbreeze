<?php

namespace Panopto\SessionManagement;

class ListSessionRTMPStreamKeysResponse
{

    /**
     * @var ArrayOfListSessionRTMPStreamKeysResponse|null $ListSessionRTMPStreamKeysResult
     */
    protected $ListSessionRTMPStreamKeysResult = null;

    /**
     * @param ArrayOfListSessionRTMPStreamKeysResponse $ListSessionRTMPStreamKeysResult
     */
    public function __construct($ListSessionRTMPStreamKeysResult)
    {
      $this->ListSessionRTMPStreamKeysResult = $ListSessionRTMPStreamKeysResult;
    }

    /**
     * @return ArrayOfListSessionRTMPStreamKeysResponse
     */
    public function getListSessionRTMPStreamKeysResult()
    {
        return $this->ListSessionRTMPStreamKeysResult;
    }

    /**
     * @param ArrayOfListSessionRTMPStreamKeysResponse $ListSessionRTMPStreamKeysResult
     * @return ListSessionRTMPStreamKeysResponse
     */
    public function setListSessionRTMPStreamKeysResult($ListSessionRTMPStreamKeysResult): ListSessionRTMPStreamKeysResponse
    {
        $this->ListSessionRTMPStreamKeysResult = $ListSessionRTMPStreamKeysResult;
        return $this;
    }

}
