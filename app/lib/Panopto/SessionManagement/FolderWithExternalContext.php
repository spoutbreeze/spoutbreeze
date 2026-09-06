<?php

namespace Panopto\SessionManagement;

class FolderWithExternalContext extends FolderBase
{

    /**
     * @var ArrayOfstring|null $ExternalIds
     */
    protected $ExternalIds = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return ArrayOfstring
     */
    public function getExternalIds()
    {
        return $this->ExternalIds;
    }

    /**
     * @param ArrayOfstring $ExternalIds
     * @return FolderWithExternalContext
     */
    public function setExternalIds($ExternalIds): FolderWithExternalContext
    {
        $this->ExternalIds = $ExternalIds;
        return $this;
    }

}
