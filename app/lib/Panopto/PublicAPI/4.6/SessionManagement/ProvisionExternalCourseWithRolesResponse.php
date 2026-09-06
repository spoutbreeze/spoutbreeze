<?php

namespace Panopto\SessionManagement;

class ProvisionExternalCourseWithRolesResponse
{

    /**
     * @var Folder|null $ProvisionExternalCourseWithRolesResult
     */
    protected $ProvisionExternalCourseWithRolesResult = null;

    /**
     * @param Folder $ProvisionExternalCourseWithRolesResult
     */
    public function __construct($ProvisionExternalCourseWithRolesResult)
    {
      $this->ProvisionExternalCourseWithRolesResult = $ProvisionExternalCourseWithRolesResult;
    }

    /**
     * @return Folder
     */
    public function getProvisionExternalCourseWithRolesResult()
    {
        return $this->ProvisionExternalCourseWithRolesResult;
    }

    /**
     * @param Folder $ProvisionExternalCourseWithRolesResult
     * @return ProvisionExternalCourseWithRolesResponse
     */
    public function setProvisionExternalCourseWithRolesResult($ProvisionExternalCourseWithRolesResult): ProvisionExternalCourseWithRolesResponse
    {
        $this->ProvisionExternalCourseWithRolesResult = $ProvisionExternalCourseWithRolesResult;
        return $this;
    }

}
