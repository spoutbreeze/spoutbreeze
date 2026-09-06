<?php

namespace Panopto\SessionManagement;

class UpdateSessionCreateRTMPStreamsResponse
{

    /**
     * @var ArrayOfstring|null $UpdateSessionCreateRTMPStreamsResult
     */
    protected $UpdateSessionCreateRTMPStreamsResult = null;

    /**
     * @param ArrayOfstring $UpdateSessionCreateRTMPStreamsResult
     */
    public function __construct($UpdateSessionCreateRTMPStreamsResult)
    {
      $this->UpdateSessionCreateRTMPStreamsResult = $UpdateSessionCreateRTMPStreamsResult;
    }

    /**
     * @return ArrayOfstring
     */
    public function getUpdateSessionCreateRTMPStreamsResult()
    {
        return $this->UpdateSessionCreateRTMPStreamsResult;
    }

    /**
     * @param ArrayOfstring $UpdateSessionCreateRTMPStreamsResult
     * @return UpdateSessionCreateRTMPStreamsResponse
     */
    public function setUpdateSessionCreateRTMPStreamsResult($UpdateSessionCreateRTMPStreamsResult): UpdateSessionCreateRTMPStreamsResponse
    {
        $this->UpdateSessionCreateRTMPStreamsResult = $UpdateSessionCreateRTMPStreamsResult;
        return $this;
    }

}
