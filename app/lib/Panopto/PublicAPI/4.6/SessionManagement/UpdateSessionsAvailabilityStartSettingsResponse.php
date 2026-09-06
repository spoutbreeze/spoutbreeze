<?php

namespace Panopto\SessionManagement;

class UpdateSessionsAvailabilityStartSettingsResponse
{

    /**
     * @var bool|null $UpdateSessionsAvailabilityStartSettingsResult
     */
    protected $UpdateSessionsAvailabilityStartSettingsResult = null;

    /**
     * @param bool $UpdateSessionsAvailabilityStartSettingsResult
     */
    public function __construct($UpdateSessionsAvailabilityStartSettingsResult)
    {
      $this->UpdateSessionsAvailabilityStartSettingsResult = $UpdateSessionsAvailabilityStartSettingsResult;
    }

    /**
     * @return bool
     */
    public function getUpdateSessionsAvailabilityStartSettingsResult()
    {
        return $this->UpdateSessionsAvailabilityStartSettingsResult;
    }

    /**
     * @param bool $UpdateSessionsAvailabilityStartSettingsResult
     * @return UpdateSessionsAvailabilityStartSettingsResponse
     */
    public function setUpdateSessionsAvailabilityStartSettingsResult($UpdateSessionsAvailabilityStartSettingsResult): UpdateSessionsAvailabilityStartSettingsResponse
    {
        $this->UpdateSessionsAvailabilityStartSettingsResult = $UpdateSessionsAvailabilityStartSettingsResult;
        return $this;
    }

}
