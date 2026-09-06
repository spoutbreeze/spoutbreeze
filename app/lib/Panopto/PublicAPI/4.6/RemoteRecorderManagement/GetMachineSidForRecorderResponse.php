<?php

namespace Panopto\RemoteRecorderManagement;

class GetMachineSidForRecorderResponse
{

    /**
     * @var string|null $GetMachineSidForRecorderResult
     */
    protected $GetMachineSidForRecorderResult = null;

    /**
     * @param string $GetMachineSidForRecorderResult
     */
    public function __construct($GetMachineSidForRecorderResult)
    {
      $this->GetMachineSidForRecorderResult = $GetMachineSidForRecorderResult;
    }

    /**
     * @return string
     */
    public function getGetMachineSidForRecorderResult()
    {
        return $this->GetMachineSidForRecorderResult;
    }

    /**
     * @param string $GetMachineSidForRecorderResult
     * @return GetMachineSidForRecorderResponse
     */
    public function setGetMachineSidForRecorderResult($GetMachineSidForRecorderResult): GetMachineSidForRecorderResponse
    {
        $this->GetMachineSidForRecorderResult = $GetMachineSidForRecorderResult;
        return $this;
    }

}
