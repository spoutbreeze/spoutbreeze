<?php

namespace Panopto\SessionManagement;

class Folder extends FolderBase
{

    /**
     * @var string|null $ExternalId
     */
    protected $ExternalId = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->ExternalId;
    }

    /**
     * @param string $ExternalId
     * @return Folder
     */
    public function setExternalId($ExternalId): Folder
    {
        $this->ExternalId = $ExternalId;
        return $this;
    }

}
