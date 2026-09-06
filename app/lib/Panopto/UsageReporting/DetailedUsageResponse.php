<?php

namespace Panopto\UsageReporting;

class DetailedUsageResponse
{

    /**
     * @var ArrayOfDetailedUsageResponseItem|null $PagedResponses
     */
    protected $PagedResponses = null;

    /**
     * @var int|null $TotalNumberResponses
     */
    protected $TotalNumberResponses = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ArrayOfDetailedUsageResponseItem
     */
    public function getPagedResponses()
    {
        return $this->PagedResponses;
    }

    /**
     * @param ArrayOfDetailedUsageResponseItem $PagedResponses
     * @return DetailedUsageResponse
     */
    public function setPagedResponses($PagedResponses): DetailedUsageResponse
    {
        $this->PagedResponses = $PagedResponses;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalNumberResponses()
    {
        return $this->TotalNumberResponses;
    }

    /**
     * @param int $TotalNumberResponses
     * @return DetailedUsageResponse
     */
    public function setTotalNumberResponses($TotalNumberResponses): DetailedUsageResponse
    {
        $this->TotalNumberResponses = $TotalNumberResponses;
        return $this;
    }

}
