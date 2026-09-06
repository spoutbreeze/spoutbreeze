<?php

namespace Panopto\SessionManagement;

class UpdateSessionSetRTMPBroadcastResponse
{

    /**
     * @var ArrayOfstring|null $UpdateSessionSetRTMPBroadcastResult
     */
    protected $UpdateSessionSetRTMPBroadcastResult = null;

    /**
     * @param ArrayOfstring $UpdateSessionSetRTMPBroadcastResult
     */
    public function __construct($UpdateSessionSetRTMPBroadcastResult)
    {
      $this->UpdateSessionSetRTMPBroadcastResult = $UpdateSessionSetRTMPBroadcastResult;
    }

    /**
     * @return ArrayOfstring
     */
    public function getUpdateSessionSetRTMPBroadcastResult()
    {
        return $this->UpdateSessionSetRTMPBroadcastResult;
    }

    /**
     * @param ArrayOfstring $UpdateSessionSetRTMPBroadcastResult
     * @return UpdateSessionSetRTMPBroadcastResponse
     */
    public function setUpdateSessionSetRTMPBroadcastResult($UpdateSessionSetRTMPBroadcastResult): UpdateSessionSetRTMPBroadcastResponse
    {
        $this->UpdateSessionSetRTMPBroadcastResult = $UpdateSessionSetRTMPBroadcastResult;
        return $this;
    }

}
