<?php

namespace Panopto\SessionManagement;

class UnprovisionExternalCourseResponse
{

    /**
     * @var bool|null $UnprovisionExternalCourseResult
     */
    protected $UnprovisionExternalCourseResult = null;

    /**
     * @param bool $UnprovisionExternalCourseResult
     */
    public function __construct($UnprovisionExternalCourseResult)
    {
      $this->UnprovisionExternalCourseResult = $UnprovisionExternalCourseResult;
    }

    /**
     * @return bool
     */
    public function getUnprovisionExternalCourseResult()
    {
        return $this->UnprovisionExternalCourseResult;
    }

    /**
     * @param bool $UnprovisionExternalCourseResult
     * @return UnprovisionExternalCourseResponse
     */
    public function setUnprovisionExternalCourseResult($UnprovisionExternalCourseResult): UnprovisionExternalCourseResponse
    {
        $this->UnprovisionExternalCourseResult = $UnprovisionExternalCourseResult;
        return $this;
    }

}
