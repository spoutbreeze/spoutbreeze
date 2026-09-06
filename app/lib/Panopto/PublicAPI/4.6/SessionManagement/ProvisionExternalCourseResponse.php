<?php

namespace Panopto\SessionManagement;

class ProvisionExternalCourseResponse
{

    /**
     * @var Folder|null $ProvisionExternalCourseResult
     */
    protected $ProvisionExternalCourseResult = null;

    /**
     * @param Folder $ProvisionExternalCourseResult
     */
    public function __construct($ProvisionExternalCourseResult)
    {
      $this->ProvisionExternalCourseResult = $ProvisionExternalCourseResult;
    }

    /**
     * @return Folder
     */
    public function getProvisionExternalCourseResult()
    {
        return $this->ProvisionExternalCourseResult;
    }

    /**
     * @param Folder $ProvisionExternalCourseResult
     * @return ProvisionExternalCourseResponse
     */
    public function setProvisionExternalCourseResult($ProvisionExternalCourseResult): ProvisionExternalCourseResponse
    {
        $this->ProvisionExternalCourseResult = $ProvisionExternalCourseResult;
        return $this;
    }

}
