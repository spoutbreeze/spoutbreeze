<?php

namespace Panopto\SessionManagement;

class ExternalHierarchyInfo
{

    /**
     * @var string|null $ExternalId
     */
    protected $ExternalId = null;

    /**
     * @var bool|null $IsCourse
     */
    protected $IsCourse = null;

    /**
     * @var string|null $Name
     */
    protected $Name = null;

    
    public function __construct()
    {
    
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
     * @return ExternalHierarchyInfo
     */
    public function setExternalId($ExternalId): ExternalHierarchyInfo
    {
        $this->ExternalId = $ExternalId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsCourse()
    {
        return $this->IsCourse;
    }

    /**
     * @param bool $IsCourse
     * @return ExternalHierarchyInfo
     */
    public function setIsCourse($IsCourse): ExternalHierarchyInfo
    {
        $this->IsCourse = $IsCourse;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     * @return ExternalHierarchyInfo
     */
    public function setName($Name): ExternalHierarchyInfo
    {
        $this->Name = $Name;
        return $this;
    }

}
