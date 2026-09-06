<?php

namespace Panopto\SessionManagement;

class SetCopiedExternalCourseAccessResponse
{

    /**
     * @var ArrayOfFolder|null $SetCopiedExternalCourseAccessResult
     */
    protected $SetCopiedExternalCourseAccessResult = null;

    /**
     * @param ArrayOfFolder $SetCopiedExternalCourseAccessResult
     */
    public function __construct($SetCopiedExternalCourseAccessResult)
    {
      $this->SetCopiedExternalCourseAccessResult = $SetCopiedExternalCourseAccessResult;
    }

    /**
     * @return ArrayOfFolder
     */
    public function getSetCopiedExternalCourseAccessResult()
    {
        return $this->SetCopiedExternalCourseAccessResult;
    }

    /**
     * @param ArrayOfFolder $SetCopiedExternalCourseAccessResult
     * @return SetCopiedExternalCourseAccessResponse
     */
    public function setSetCopiedExternalCourseAccessResult($SetCopiedExternalCourseAccessResult): SetCopiedExternalCourseAccessResponse
    {
        $this->SetCopiedExternalCourseAccessResult = $SetCopiedExternalCourseAccessResult;
        return $this;
    }

}
