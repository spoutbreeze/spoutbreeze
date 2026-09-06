<?php

namespace Panopto\SessionManagement;

class ListFoldersResponse
{

    /**
     * @var ArrayOfFolder|null $Results
     */
    protected $Results = null;

    /**
     * @var int|null $TotalNumberResults
     */
    protected $TotalNumberResults = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ArrayOfFolder
     */
    public function getResults()
    {
        return $this->Results;
    }

    /**
     * @param ArrayOfFolder $Results
     * @return ListFoldersResponse
     */
    public function setResults($Results): ListFoldersResponse
    {
        $this->Results = $Results;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalNumberResults()
    {
        return $this->TotalNumberResults;
    }

    /**
     * @param int $TotalNumberResults
     * @return ListFoldersResponse
     */
    public function setTotalNumberResults($TotalNumberResults): ListFoldersResponse
    {
        $this->TotalNumberResults = $TotalNumberResults;
        return $this;
    }

}
