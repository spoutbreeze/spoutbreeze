<?php

namespace Panopto\SessionManagement;

class FolderBase
{

    /**
     * @var bool|null $AllowPublicNotes
     */
    protected $AllowPublicNotes = null;

    /**
     * @var bool|null $AllowSessionDownload
     */
    protected $AllowSessionDownload = null;

    /**
     * @var string|null $AudioPodcastITunesUrl
     */
    protected $AudioPodcastITunesUrl = null;

    /**
     * @var string|null $AudioRssUrl
     */
    protected $AudioRssUrl = null;

    /**
     * @var ArrayOfguid|null $ChildFolders
     */
    protected $ChildFolders = null;

    /**
     * @var bool|null $DeliveriesHaveSpecifiedOrder
     */
    protected $DeliveriesHaveSpecifiedOrder = null;

    /**
     * @var string|null $Description
     */
    protected $Description = null;

    /**
     * @var string|null $EmbedUploaderUrl
     */
    protected $EmbedUploaderUrl = null;

    /**
     * @var string|null $EmbedUrl
     */
    protected $EmbedUrl = null;

    /**
     * @var bool|null $EnablePodcast
     */
    protected $EnablePodcast = null;

    /**
     * @var string|null $Id
     */
    protected $Id = null;

    /**
     * @var bool|null $IsPublic
     */
    protected $IsPublic = null;

    /**
     * @var string|null $ListUrl
     */
    protected $ListUrl = null;

    /**
     * @var string|null $Name
     */
    protected $Name = null;

    /**
     * @var string|null $ParentFolder
     */
    protected $ParentFolder = null;

    /**
     * @var ArrayOfstring|null $Presenters
     */
    protected $Presenters = null;

    /**
     * @var ArrayOfguid|null $Sessions
     */
    protected $Sessions = null;

    /**
     * @var string|null $SettingsUrl
     */
    protected $SettingsUrl = null;

    /**
     * @var string|null $VideoPodcastITunesUrl
     */
    protected $VideoPodcastITunesUrl = null;

    /**
     * @var string|null $VideoRssUrl
     */
    protected $VideoRssUrl = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return bool
     */
    public function getAllowPublicNotes()
    {
        return $this->AllowPublicNotes;
    }

    /**
     * @param bool $AllowPublicNotes
     * @return FolderBase
     */
    public function setAllowPublicNotes($AllowPublicNotes): FolderBase
    {
        $this->AllowPublicNotes = $AllowPublicNotes;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAllowSessionDownload()
    {
        return $this->AllowSessionDownload;
    }

    /**
     * @param bool $AllowSessionDownload
     * @return FolderBase
     */
    public function setAllowSessionDownload($AllowSessionDownload): FolderBase
    {
        $this->AllowSessionDownload = $AllowSessionDownload;
        return $this;
    }

    /**
     * @return string
     */
    public function getAudioPodcastITunesUrl()
    {
        return $this->AudioPodcastITunesUrl;
    }

    /**
     * @param string $AudioPodcastITunesUrl
     * @return FolderBase
     */
    public function setAudioPodcastITunesUrl($AudioPodcastITunesUrl): FolderBase
    {
        $this->AudioPodcastITunesUrl = $AudioPodcastITunesUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getAudioRssUrl()
    {
        return $this->AudioRssUrl;
    }

    /**
     * @param string $AudioRssUrl
     * @return FolderBase
     */
    public function setAudioRssUrl($AudioRssUrl): FolderBase
    {
        $this->AudioRssUrl = $AudioRssUrl;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getChildFolders()
    {
        return $this->ChildFolders;
    }

    /**
     * @param ArrayOfguid $ChildFolders
     * @return FolderBase
     */
    public function setChildFolders($ChildFolders): FolderBase
    {
        $this->ChildFolders = $ChildFolders;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDeliveriesHaveSpecifiedOrder()
    {
        return $this->DeliveriesHaveSpecifiedOrder;
    }

    /**
     * @param bool $DeliveriesHaveSpecifiedOrder
     * @return FolderBase
     */
    public function setDeliveriesHaveSpecifiedOrder($DeliveriesHaveSpecifiedOrder): FolderBase
    {
        $this->DeliveriesHaveSpecifiedOrder = $DeliveriesHaveSpecifiedOrder;
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
     * @return FolderBase
     */
    public function setDescription($Description): FolderBase
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmbedUploaderUrl()
    {
        return $this->EmbedUploaderUrl;
    }

    /**
     * @param string $EmbedUploaderUrl
     * @return FolderBase
     */
    public function setEmbedUploaderUrl($EmbedUploaderUrl): FolderBase
    {
        $this->EmbedUploaderUrl = $EmbedUploaderUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmbedUrl()
    {
        return $this->EmbedUrl;
    }

    /**
     * @param string $EmbedUrl
     * @return FolderBase
     */
    public function setEmbedUrl($EmbedUrl): FolderBase
    {
        $this->EmbedUrl = $EmbedUrl;
        return $this;
    }

    /**
     * @return bool
     */
    public function getEnablePodcast()
    {
        return $this->EnablePodcast;
    }

    /**
     * @param bool $EnablePodcast
     * @return FolderBase
     */
    public function setEnablePodcast($EnablePodcast): FolderBase
    {
        $this->EnablePodcast = $EnablePodcast;
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
     * @return FolderBase
     */
    public function setId($Id): FolderBase
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPublic()
    {
        return $this->IsPublic;
    }

    /**
     * @param bool $IsPublic
     * @return FolderBase
     */
    public function setIsPublic($IsPublic): FolderBase
    {
        $this->IsPublic = $IsPublic;
        return $this;
    }

    /**
     * @return string
     */
    public function getListUrl()
    {
        return $this->ListUrl;
    }

    /**
     * @param string $ListUrl
     * @return FolderBase
     */
    public function setListUrl($ListUrl): FolderBase
    {
        $this->ListUrl = $ListUrl;
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
     * @return FolderBase
     */
    public function setName($Name): FolderBase
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * @return string
     */
    public function getParentFolder()
    {
        return $this->ParentFolder;
    }

    /**
     * @param string $ParentFolder
     * @return FolderBase
     */
    public function setParentFolder($ParentFolder): FolderBase
    {
        $this->ParentFolder = $ParentFolder;
        return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getPresenters()
    {
        return $this->Presenters;
    }

    /**
     * @param ArrayOfstring $Presenters
     * @return FolderBase
     */
    public function setPresenters($Presenters): FolderBase
    {
        $this->Presenters = $Presenters;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getSessions()
    {
        return $this->Sessions;
    }

    /**
     * @param ArrayOfguid $Sessions
     * @return FolderBase
     */
    public function setSessions($Sessions): FolderBase
    {
        $this->Sessions = $Sessions;
        return $this;
    }

    /**
     * @return string
     */
    public function getSettingsUrl()
    {
        return $this->SettingsUrl;
    }

    /**
     * @param string $SettingsUrl
     * @return FolderBase
     */
    public function setSettingsUrl($SettingsUrl): FolderBase
    {
        $this->SettingsUrl = $SettingsUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getVideoPodcastITunesUrl()
    {
        return $this->VideoPodcastITunesUrl;
    }

    /**
     * @param string $VideoPodcastITunesUrl
     * @return FolderBase
     */
    public function setVideoPodcastITunesUrl($VideoPodcastITunesUrl): FolderBase
    {
        $this->VideoPodcastITunesUrl = $VideoPodcastITunesUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getVideoRssUrl()
    {
        return $this->VideoRssUrl;
    }

    /**
     * @param string $VideoRssUrl
     * @return FolderBase
     */
    public function setVideoRssUrl($VideoRssUrl): FolderBase
    {
        $this->VideoRssUrl = $VideoRssUrl;
        return $this;
    }

}
