<?php

namespace Panopto\SessionManagement;

class Session
{

    /**
     * @var string|null $CreatorId
     */
    protected $CreatorId = null;

    /**
     * @var string|null $Description
     */
    protected $Description = null;

    /**
     * @var float|null $Duration
     */
    protected $Duration = null;

    /**
     * @var string|null $EditorUrl
     */
    protected $EditorUrl = null;

    /**
     * @var string|null $ExternalId
     */
    protected $ExternalId = null;

    /**
     * @var string|null $FolderId
     */
    protected $FolderId = null;

    /**
     * @var string|null $FolderName
     */
    protected $FolderName = null;

    /**
     * @var string|null $Id
     */
    protected $Id = null;

    /**
     * @var string|null $IosVideoUrl
     */
    protected $IosVideoUrl = null;

    /**
     * @var bool|null $IsBroadcast
     */
    protected $IsBroadcast = null;

    /**
     * @var bool|null $IsDownloadable
     */
    protected $IsDownloadable = null;

    /**
     * @var string|null $MP3Url
     */
    protected $MP3Url = null;

    /**
     * @var string|null $MP4Url
     */
    protected $MP4Url = null;

    /**
     * @var string|null $Name
     */
    protected $Name = null;

    /**
     * @var string|null $NotesURL
     */
    protected $NotesURL = null;

    /**
     * @var string|null $OutputsPageUrl
     */
    protected $OutputsPageUrl = null;

    /**
     * @var ArrayOfguid|null $RemoteRecorderIds
     */
    protected $RemoteRecorderIds = null;

    /**
     * @var string|null $SharePageUrl
     */
    protected $SharePageUrl = null;

    /**
     * @var \DateTime|string|null $StartTime
     */
    protected \DateTime|string|null $StartTime = null;

    /**
     * @var SessionState|null $State
     */
    protected $State = null;

    /**
     * @var string|null $StatusMessage
     */
    protected $StatusMessage = null;

    /**
     * @var string|null $ThumbUrl
     */
    protected $ThumbUrl = null;

    /**
     * @var string|null $ViewerUrl
     */
    protected $ViewerUrl = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getCreatorId()
    {
        return $this->CreatorId;
    }

    /**
     * @param string $CreatorId
     * @return Session
     */
    public function setCreatorId($CreatorId): Session
    {
        $this->CreatorId = $CreatorId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     * @return Session
     */
    public function setDescription($Description): Session
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * @return float
     */
    public function getDuration()
    {
        return $this->Duration;
    }

    /**
     * @param float $Duration
     * @return Session
     */
    public function setDuration($Duration): Session
    {
        $this->Duration = $Duration;
        return $this;
    }

    /**
     * @return string
     */
    public function getEditorUrl()
    {
        return $this->EditorUrl;
    }

    /**
     * @param string $EditorUrl
     * @return Session
     */
    public function setEditorUrl($EditorUrl): Session
    {
        $this->EditorUrl = $EditorUrl;
        return $this;
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
     * @return Session
     */
    public function setExternalId($ExternalId): Session
    {
        $this->ExternalId = $ExternalId;
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
     * @return Session
     */
    public function setFolderId($FolderId): Session
    {
        $this->FolderId = $FolderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getFolderName()
    {
        return $this->FolderName;
    }

    /**
     * @param string $FolderName
     * @return Session
     */
    public function setFolderName($FolderName): Session
    {
        $this->FolderName = $FolderName;
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param string $Id
     * @return Session
     */
    public function setId($Id): Session
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return string
     */
    public function getIosVideoUrl()
    {
        return $this->IosVideoUrl;
    }

    /**
     * @param string $IosVideoUrl
     * @return Session
     */
    public function setIosVideoUrl($IosVideoUrl): Session
    {
        $this->IosVideoUrl = $IosVideoUrl;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsBroadcast()
    {
        return $this->IsBroadcast;
    }

    /**
     * @param bool $IsBroadcast
     * @return Session
     */
    public function setIsBroadcast($IsBroadcast): Session
    {
        $this->IsBroadcast = $IsBroadcast;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsDownloadable()
    {
        return $this->IsDownloadable;
    }

    /**
     * @param bool $IsDownloadable
     * @return Session
     */
    public function setIsDownloadable($IsDownloadable): Session
    {
        $this->IsDownloadable = $IsDownloadable;
        return $this;
    }

    /**
     * @return string
     */
    public function getMP3Url()
    {
        return $this->MP3Url;
    }

    /**
     * @param string $MP3Url
     * @return Session
     */
    public function setMP3Url($MP3Url): Session
    {
        $this->MP3Url = $MP3Url;
        return $this;
    }

    /**
     * @return string
     */
    public function getMP4Url()
    {
        return $this->MP4Url;
    }

    /**
     * @param string $MP4Url
     * @return Session
     */
    public function setMP4Url($MP4Url): Session
    {
        $this->MP4Url = $MP4Url;
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
     * @return Session
     */
    public function setName($Name): Session
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotesURL()
    {
        return $this->NotesURL;
    }

    /**
     * @param string $NotesURL
     * @return Session
     */
    public function setNotesURL($NotesURL): Session
    {
        $this->NotesURL = $NotesURL;
        return $this;
    }

    /**
     * @return string
     */
    public function getOutputsPageUrl()
    {
        return $this->OutputsPageUrl;
    }

    /**
     * @param string $OutputsPageUrl
     * @return Session
     */
    public function setOutputsPageUrl($OutputsPageUrl): Session
    {
        $this->OutputsPageUrl = $OutputsPageUrl;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getRemoteRecorderIds()
    {
        return $this->RemoteRecorderIds;
    }

    /**
     * @param ArrayOfguid $RemoteRecorderIds
     * @return Session
     */
    public function setRemoteRecorderIds($RemoteRecorderIds): Session
    {
        $this->RemoteRecorderIds = $RemoteRecorderIds;
        return $this;
    }

    /**
     * @return string
     */
    public function getSharePageUrl()
    {
        return $this->SharePageUrl;
    }

    /**
     * @param string $SharePageUrl
     * @return Session
     */
    public function setSharePageUrl($SharePageUrl): Session
    {
        $this->SharePageUrl = $SharePageUrl;
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getStartTime(): \DateTime|bool|null
    {
        if ($this->StartTime == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->StartTime);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime|null $StartTime
     * @return Session
     */
    public function setStartTime(?\DateTime $StartTime = null): Session
    {
        if ($StartTime == null) {
            $this->StartTime = null;
        } else {
            $this->StartTime = $StartTime->format(\DateTime::ATOM);
        }
        return $this;
    }

    /**
     * @return SessionState
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * @param SessionState $State
     * @return Session
     */
    public function setState($State): Session
    {
        $this->State = $State;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusMessage()
    {
        return $this->StatusMessage;
    }

    /**
     * @param string $StatusMessage
     * @return Session
     */
    public function setStatusMessage($StatusMessage): Session
    {
        $this->StatusMessage = $StatusMessage;
        return $this;
    }

    /**
     * @return string
     */
    public function getThumbUrl()
    {
        return $this->ThumbUrl;
    }

    /**
     * @param string $ThumbUrl
     * @return Session
     */
    public function setThumbUrl($ThumbUrl): Session
    {
        $this->ThumbUrl = $ThumbUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getViewerUrl()
    {
        return $this->ViewerUrl;
    }

    /**
     * @param string $ViewerUrl
     * @return Session
     */
    public function setViewerUrl($ViewerUrl): Session
    {
        $this->ViewerUrl = $ViewerUrl;
        return $this;
    }

}
