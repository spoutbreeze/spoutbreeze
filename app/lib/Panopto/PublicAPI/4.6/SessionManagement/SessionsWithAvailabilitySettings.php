<?php

namespace Panopto\SessionManagement;

class SessionsWithAvailabilitySettings
{

    /**
     * @var ArrayOfSessionAvailabilitySettings|null $Results
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
     * @return ArrayOfSessionAvailabilitySettings
     */
    public function getResults()
    {
        return $this->Results;
    }

    /**
     * @param ArrayOfSessionAvailabilitySettings $Results
     * @return SessionsWithAvailabilitySettings
     */
    public function setResults($Results): SessionsWithAvailabilitySettings
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
     * @return SessionsWithAvailabilitySettings
     */
    public function setTotalNumberResults($TotalNumberResults): SessionsWithAvailabilitySettings
    {
        $this->TotalNumberResults = $TotalNumberResults;
        return $this;
    }

}
