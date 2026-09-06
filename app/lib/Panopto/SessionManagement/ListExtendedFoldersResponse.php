<?php

namespace Panopto\SessionManagement;

class ListExtendedFoldersResponse
{

    /**
     * @var ArrayOfExtendedFolder|null $Results
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
     * @return ArrayOfExtendedFolder
     */
    public function getResults()
    {
        return $this->Results;
    }

    /**
     * @param ArrayOfExtendedFolder $Results
     * @return ListExtendedFoldersResponse
     */
    public function setResults($Results): ListExtendedFoldersResponse
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
     * @return ListExtendedFoldersResponse
     */
    public function setTotalNumberResults($TotalNumberResults): ListExtendedFoldersResponse
    {
        $this->TotalNumberResults = $TotalNumberResults;
        return $this;
    }

}
