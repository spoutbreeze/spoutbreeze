<?php

namespace Panopto\SessionManagement;

class UpdateSessionsAvailabilityEndSettingsResponse
{

    /**
     * @var bool|null $UpdateSessionsAvailabilityEndSettingsResult
     */
    protected $UpdateSessionsAvailabilityEndSettingsResult = null;

    /**
     * @param bool $UpdateSessionsAvailabilityEndSettingsResult
     */
    public function __construct($UpdateSessionsAvailabilityEndSettingsResult)
    {
      $this->UpdateSessionsAvailabilityEndSettingsResult = $UpdateSessionsAvailabilityEndSettingsResult;
    }

    /**
     * @return bool
     */
    public function getUpdateSessionsAvailabilityEndSettingsResult()
    {
        return $this->UpdateSessionsAvailabilityEndSettingsResult;
    }

    /**
     * @param bool $UpdateSessionsAvailabilityEndSettingsResult
     * @return UpdateSessionsAvailabilityEndSettingsResponse
     */
    public function setUpdateSessionsAvailabilityEndSettingsResult($UpdateSessionsAvailabilityEndSettingsResult): UpdateSessionsAvailabilityEndSettingsResponse
    {
        $this->UpdateSessionsAvailabilityEndSettingsResult = $UpdateSessionsAvailabilityEndSettingsResult;
        return $this;
    }

}
