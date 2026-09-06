<?php

namespace Panopto\UsageReporting;

class DescribeReportTypeResponse
{

    /**
     * @var ArrayOfstring|null $DescribeReportTypeResult
     */
    protected $DescribeReportTypeResult = null;

    /**
     * @param ArrayOfstring $DescribeReportTypeResult
     */
    public function __construct($DescribeReportTypeResult)
    {
      $this->DescribeReportTypeResult = $DescribeReportTypeResult;
    }

    /**
     * @return ArrayOfstring
     */
    public function getDescribeReportTypeResult()
    {
        return $this->DescribeReportTypeResult;
    }

    /**
     * @param ArrayOfstring $DescribeReportTypeResult
     * @return DescribeReportTypeResponse
     */
    public function setDescribeReportTypeResult($DescribeReportTypeResult): DescribeReportTypeResponse
    {
        $this->DescribeReportTypeResult = $DescribeReportTypeResult;
        return $this;
    }

}
