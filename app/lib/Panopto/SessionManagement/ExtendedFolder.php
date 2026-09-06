<?php

namespace Panopto\SessionManagement;

class ExtendedFolder extends FolderBase
{

    /**
     * @var bool|null $IsAssignmentFolder
     */
    protected $IsAssignmentFolder = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return bool
     */
    public function getIsAssignmentFolder()
    {
        return $this->IsAssignmentFolder;
    }

    /**
     * @param bool $IsAssignmentFolder
     * @return ExtendedFolder
     */
    public function setIsAssignmentFolder($IsAssignmentFolder): ExtendedFolder
    {
        $this->IsAssignmentFolder = $IsAssignmentFolder;
        return $this;
    }

}
