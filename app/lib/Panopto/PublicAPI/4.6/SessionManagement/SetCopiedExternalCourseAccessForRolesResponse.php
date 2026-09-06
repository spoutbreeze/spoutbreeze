<?php

namespace Panopto\SessionManagement;

class SetCopiedExternalCourseAccessForRolesResponse
{

    /**
     * @var ArrayOfFolder|null $SetCopiedExternalCourseAccessForRolesResult
     */
    protected $SetCopiedExternalCourseAccessForRolesResult = null;

    /**
     * @param ArrayOfFolder $SetCopiedExternalCourseAccessForRolesResult
     */
    public function __construct($SetCopiedExternalCourseAccessForRolesResult)
    {
      $this->SetCopiedExternalCourseAccessForRolesResult = $SetCopiedExternalCourseAccessForRolesResult;
    }

    /**
     * @return ArrayOfFolder
     */
    public function getSetCopiedExternalCourseAccessForRolesResult()
    {
        return $this->SetCopiedExternalCourseAccessForRolesResult;
    }

    /**
     * @param ArrayOfFolder $SetCopiedExternalCourseAccessForRolesResult
     * @return SetCopiedExternalCourseAccessForRolesResponse
     */
    public function setSetCopiedExternalCourseAccessForRolesResult($SetCopiedExternalCourseAccessForRolesResult): SetCopiedExternalCourseAccessForRolesResponse
    {
        $this->SetCopiedExternalCourseAccessForRolesResult = $SetCopiedExternalCourseAccessForRolesResult;
        return $this;
    }

}
