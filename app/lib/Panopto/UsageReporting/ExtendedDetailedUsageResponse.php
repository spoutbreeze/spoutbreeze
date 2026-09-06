<?php

namespace Panopto\UsageReporting;

class ExtendedDetailedUsageResponse
{

    /**
     * @var ArrayOfExtendedDetailedUsageResponseItem|null $PagedResponses
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
     * @return ArrayOfExtendedDetailedUsageResponseItem
     */
    public function getPagedResponses()
    {
        return $this->PagedResponses;
    }

    /**
     * @param ArrayOfExtendedDetailedUsageResponseItem $PagedResponses
     * @return ExtendedDetailedUsageResponse
     */
    public function setPagedResponses($PagedResponses): ExtendedDetailedUsageResponse
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
     * @return ExtendedDetailedUsageResponse
     */
    public function setTotalNumberResponses($TotalNumberResponses): ExtendedDetailedUsageResponse
    {
        $this->TotalNumberResponses = $TotalNumberResponses;
        return $this;
    }

}
