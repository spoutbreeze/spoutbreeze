<?php

namespace Panopto\SessionManagement;

class Pagination
{

    /**
     * @var int|null $MaxNumberResults
     */
    protected $MaxNumberResults = null;

    /**
     * @var int|null $PageNumber
     */
    protected $PageNumber = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getMaxNumberResults()
    {
        return $this->MaxNumberResults;
    }

    /**
     * @param int $MaxNumberResults
     * @return Pagination
     */
    public function setMaxNumberResults($MaxNumberResults): Pagination
    {
        $this->MaxNumberResults = $MaxNumberResults;
        return $this;
    }

    /**
     * @return int
     */
    public function getPageNumber()
    {
        return $this->PageNumber;
    }

    /**
     * @param int $PageNumber
     * @return Pagination
     */
    public function setPageNumber($PageNumber): Pagination
    {
        $this->PageNumber = $PageNumber;
        return $this;
    }

}
