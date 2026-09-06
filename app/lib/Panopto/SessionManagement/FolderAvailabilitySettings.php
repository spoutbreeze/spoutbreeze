<?php

namespace Panopto\SessionManagement;

class FolderAvailabilitySettings
{

    /**
     * @var DateTimeOffset|null $EndSettingDate
     */
    protected $EndSettingDate = null;

    /**
     * @var FolderEndSettingType|null $EndSettingType
     */
    protected $EndSettingType = null;

    /**
     * @var string|null $FolderId
     */
    protected $FolderId = null;

    /**
     * @var DateTimeOffset|null $StartSettingDate
     */
    protected $StartSettingDate = null;

    /**
     * @var FolderStartSettingType|null $StartSettingType
     */
    protected $StartSettingType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return DateTimeOffset
     */
    public function getEndSettingDate()
    {
        return $this->EndSettingDate;
    }

    /**
     * @param DateTimeOffset $EndSettingDate
     * @return FolderAvailabilitySettings
     */
    public function setEndSettingDate($EndSettingDate): FolderAvailabilitySettings
    {
        $this->EndSettingDate = $EndSettingDate;
        return $this;
    }

    /**
     * @return FolderEndSettingType
     */
    public function getEndSettingType()
    {
        return $this->EndSettingType;
    }

    /**
     * @param FolderEndSettingType $EndSettingType
     * @return FolderAvailabilitySettings
     */
    public function setEndSettingType($EndSettingType): FolderAvailabilitySettings
    {
        $this->EndSettingType = $EndSettingType;
        return $this;
    }

    /**
     * @return string
     */
    public function getFolderId()
    {
        return $this->FolderId;
    }

    /**
     * @param string $FolderId
     * @return FolderAvailabilitySettings
     */
    public function setFolderId($FolderId): FolderAvailabilitySettings
    {
        $this->FolderId = $FolderId;
        return $this;
    }

    /**
     * @return DateTimeOffset
     */
    public function getStartSettingDate()
    {
        return $this->StartSettingDate;
    }

    /**
     * @param DateTimeOffset $StartSettingDate
     * @return FolderAvailabilitySettings
     */
    public function setStartSettingDate($StartSettingDate): FolderAvailabilitySettings
    {
        $this->StartSettingDate = $StartSettingDate;
        return $this;
    }

    /**
     * @return FolderStartSettingType
     */
    public function getStartSettingType()
    {
        return $this->StartSettingType;
    }

    /**
     * @param FolderStartSettingType $StartSettingType
     * @return FolderAvailabilitySettings
     */
    public function setStartSettingType($StartSettingType): FolderAvailabilitySettings
    {
        $this->StartSettingType = $StartSettingType;
        return $this;
    }

}
