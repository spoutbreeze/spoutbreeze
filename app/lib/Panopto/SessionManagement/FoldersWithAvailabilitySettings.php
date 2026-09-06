<?php

namespace Panopto\SessionManagement;

class FoldersWithAvailabilitySettings
{

    /**
     * @var ArrayOfFolderAvailabilitySettings|null $Results
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
     * @return ArrayOfFolderAvailabilitySettings
     */
    public function getResults()
    {
        return $this->Results;
    }

    /**
     * @param ArrayOfFolderAvailabilitySettings $Results
     * @return FoldersWithAvailabilitySettings
     */
    public function setResults($Results): FoldersWithAvailabilitySettings
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
     * @return FoldersWithAvailabilitySettings
     */
    public function setTotalNumberResults($TotalNumberResults): FoldersWithAvailabilitySettings
    {
        $this->TotalNumberResults = $TotalNumberResults;
        return $this;
    }

}
