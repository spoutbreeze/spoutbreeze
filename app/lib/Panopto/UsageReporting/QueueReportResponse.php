<?php

namespace Panopto\UsageReporting;

class QueueReportResponse
{

    /**
     * @var string|null $QueueReportResult
     */
    protected $QueueReportResult = null;

    /**
     * @param string $QueueReportResult
     */
    public function __construct($QueueReportResult)
    {
      $this->QueueReportResult = $QueueReportResult;
    }

    /**
     * @return string
     */
    public function getQueueReportResult()
    {
        return $this->QueueReportResult;
    }

    /**
     * @param string $QueueReportResult
     * @return QueueReportResponse
     */
    public function setQueueReportResult($QueueReportResult): QueueReportResponse
    {
        $this->QueueReportResult = $QueueReportResult;
        return $this;
    }

}
