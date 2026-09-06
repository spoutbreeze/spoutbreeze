<?php

namespace Panopto\SessionManagement;

class EnsureExternalHierarchyBranchResponse
{

    /**
     * @var ListFoldersResponseWithExternalContext|null $EnsureExternalHierarchyBranchResult
     */
    protected $EnsureExternalHierarchyBranchResult = null;

    /**
     * @param ListFoldersResponseWithExternalContext $EnsureExternalHierarchyBranchResult
     */
    public function __construct($EnsureExternalHierarchyBranchResult)
    {
      $this->EnsureExternalHierarchyBranchResult = $EnsureExternalHierarchyBranchResult;
    }

    /**
     * @return ListFoldersResponseWithExternalContext
     */
    public function getEnsureExternalHierarchyBranchResult()
    {
        return $this->EnsureExternalHierarchyBranchResult;
    }

    /**
     * @param ListFoldersResponseWithExternalContext $EnsureExternalHierarchyBranchResult
     * @return EnsureExternalHierarchyBranchResponse
     */
    public function setEnsureExternalHierarchyBranchResult($EnsureExternalHierarchyBranchResult): EnsureExternalHierarchyBranchResponse
    {
        $this->EnsureExternalHierarchyBranchResult = $EnsureExternalHierarchyBranchResult;
        return $this;
    }

}
