<?php

namespace Panopto\SessionManagement;

class EnsureExternalHierarchyBranch
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var ArrayOfExternalHierarchyInfo|null $externalHierarchyBranch
     */
    protected $externalHierarchyBranch = null;

    /**
     * @param AuthenticationInfo $auth
     * @param ArrayOfExternalHierarchyInfo $externalHierarchyBranch
     */
    public function __construct($auth, $externalHierarchyBranch)
    {
      $this->auth = $auth;
      $this->externalHierarchyBranch = $externalHierarchyBranch;
    }

    /**
     * @return AuthenticationInfo
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param AuthenticationInfo $auth
     * @return EnsureExternalHierarchyBranch
     */
    public function setAuth($auth): EnsureExternalHierarchyBranch
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return ArrayOfExternalHierarchyInfo
     */
    public function getExternalHierarchyBranch()
    {
        return $this->externalHierarchyBranch;
    }

    /**
     * @param ArrayOfExternalHierarchyInfo $externalHierarchyBranch
     * @return EnsureExternalHierarchyBranch
     */
    public function setExternalHierarchyBranch($externalHierarchyBranch): EnsureExternalHierarchyBranch
    {
        $this->externalHierarchyBranch = $externalHierarchyBranch;
        return $this;
    }

}
