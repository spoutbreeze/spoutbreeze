<?php

namespace Panopto\RemoteRecorderManagement;

class ListRecordersResponse
{

    /**
     * @var ListRecordersResponse|null $ListRecordersResult
     */
    protected $ListRecordersResult = null;

    /**
     * @param ListRecordersResponse $ListRecordersResult
     */
    public function __construct($ListRecordersResult)
    {
      $this->ListRecordersResult = $ListRecordersResult;
    }

    /**
     * @return ListRecordersResponse
     */
    public function getListRecordersResult()
    {
        return $this->ListRecordersResult;
    }

    /**
     * @param ListRecordersResponse $ListRecordersResult
     * @return ListRecordersResponse
     */
    public function setListRecordersResult($ListRecordersResult): ListRecordersResponse
    {
        $this->ListRecordersResult = $ListRecordersResult;
        return $this;
    }

}
