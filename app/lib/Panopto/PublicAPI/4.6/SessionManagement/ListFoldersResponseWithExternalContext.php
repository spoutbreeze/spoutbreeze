<?php

namespace Panopto\SessionManagement;

class ListFoldersResponseWithExternalContext
{

    /**
     * @var ArrayOfFolderWithExternalContext|null $Results
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
     * @return ArrayOfFolderWithExternalContext
     */
    public function getResults()
    {
        return $this->Results;
    }

    /**
     * @param ArrayOfFolderWithExternalContext $Results
     * @return ListFoldersResponseWithExternalContext
     */
    public function setResults($Results): ListFoldersResponseWithExternalContext
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
     * @return ListFoldersResponseWithExternalContext
     */
    public function setTotalNumberResults($TotalNumberResults): ListFoldersResponseWithExternalContext
    {
        $this->TotalNumberResults = $TotalNumberResults;
        return $this;
    }

}
