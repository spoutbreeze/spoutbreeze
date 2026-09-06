<?php

namespace Panopto\SessionManagement;

class SetExternalCourseAccessForRolesResponse
{

    /**
     * @var ArrayOfFolder|null $SetExternalCourseAccessForRolesResult
     */
    protected $SetExternalCourseAccessForRolesResult = null;

    /**
     * @param ArrayOfFolder $SetExternalCourseAccessForRolesResult
     */
    public function __construct($SetExternalCourseAccessForRolesResult)
    {
      $this->SetExternalCourseAccessForRolesResult = $SetExternalCourseAccessForRolesResult;
    }

    /**
     * @return ArrayOfFolder
     */
    public function getSetExternalCourseAccessForRolesResult()
    {
        return $this->SetExternalCourseAccessForRolesResult;
    }

    /**
     * @param ArrayOfFolder $SetExternalCourseAccessForRolesResult
     * @return SetExternalCourseAccessForRolesResponse
     */
    public function setSetExternalCourseAccessForRolesResult($SetExternalCourseAccessForRolesResult): SetExternalCourseAccessForRolesResponse
    {
        $this->SetExternalCourseAccessForRolesResult = $SetExternalCourseAccessForRolesResult;
        return $this;
    }

}
