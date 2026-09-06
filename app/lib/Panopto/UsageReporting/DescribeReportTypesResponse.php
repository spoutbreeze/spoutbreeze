<?php

namespace Panopto\UsageReporting;

class DescribeReportTypesResponse
{

    /**
     * @var ArrayOfStatsReportType|null $DescribeReportTypesResult
     */
    protected $DescribeReportTypesResult = null;

    /**
     * @param ArrayOfStatsReportType $DescribeReportTypesResult
     */
    public function __construct($DescribeReportTypesResult)
    {
      $this->DescribeReportTypesResult = $DescribeReportTypesResult;
    }

    /**
     * @return ArrayOfStatsReportType
     */
    public function getDescribeReportTypesResult()
    {
        return $this->DescribeReportTypesResult;
    }

    /**
     * @param ArrayOfStatsReportType $DescribeReportTypesResult
     * @return DescribeReportTypesResponse
     */
    public function setDescribeReportTypesResult($DescribeReportTypesResult): DescribeReportTypesResponse
    {
        $this->DescribeReportTypesResult = $DescribeReportTypesResult;
        return $this;
    }

}
