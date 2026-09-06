<?php

namespace Panopto\SessionManagement;

class SetExternalCourseAccessResponse
{

    /**
     * @var ArrayOfFolder|null $SetExternalCourseAccessResult
     */
    protected $SetExternalCourseAccessResult = null;

    /**
     * @param ArrayOfFolder $SetExternalCourseAccessResult
     */
    public function __construct($SetExternalCourseAccessResult)
    {
      $this->SetExternalCourseAccessResult = $SetExternalCourseAccessResult;
    }

    /**
     * @return ArrayOfFolder
     */
    public function getSetExternalCourseAccessResult()
    {
        return $this->SetExternalCourseAccessResult;
    }

    /**
     * @param ArrayOfFolder $SetExternalCourseAccessResult
     * @return SetExternalCourseAccessResponse
     */
    public function setSetExternalCourseAccessResult($SetExternalCourseAccessResult): SetExternalCourseAccessResponse
    {
        $this->SetExternalCourseAccessResult = $SetExternalCourseAccessResult;
        return $this;
    }

}
