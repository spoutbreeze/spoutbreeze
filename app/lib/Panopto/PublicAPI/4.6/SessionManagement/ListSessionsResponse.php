<?php

namespace Panopto\SessionManagement;

class ListSessionsResponse
{

    /**
     * @var ArrayOfSession|null $Results
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
     * @return ArrayOfSession
     */
    public function getResults()
    {
        return $this->Results;
    }

    /**
     * @param ArrayOfSession $Results
     * @return ListSessionsResponse
     */
    public function setResults($Results): ListSessionsResponse
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
     * @return ListSessionsResponse
     */
    public function setTotalNumberResults($TotalNumberResults): ListSessionsResponse
    {
        $this->TotalNumberResults = $TotalNumberResults;
        return $this;
    }

}
