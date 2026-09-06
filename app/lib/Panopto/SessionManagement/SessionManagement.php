<?php

namespace Panopto\SessionManagement;

class SessionManagement extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static array $classmap = array (
      'AuthenticationInfo' => 'Panopto\\SessionManagement\\AuthenticationInfo',
      'ListSessionsRequest' => 'Panopto\\SessionManagement\\ListSessionsRequest',
      'Pagination' => 'Panopto\\SessionManagement\\Pagination',
      'ArrayOfSessionState' => 'Panopto\\SessionManagement\\ArrayOfSessionState',
      'ListFoldersRequest' => 'Panopto\\SessionManagement\\ListFoldersRequest',
      'ArrayOfAccessRole' => 'Panopto\\SessionManagement\\ArrayOfAccessRole',
      'RecorderDownloadUrlResponse' => 'Panopto\\SessionManagement\\RecorderDownloadUrlResponse',
      'Note' => 'Panopto\\SessionManagement\\Note',
      'ListNotesResponse' => 'Panopto\\SessionManagement\\ListNotesResponse',
      'ArrayOfNote' => 'Panopto\\SessionManagement\\ArrayOfNote',
      'ArrayOfguid' => 'Panopto\\SessionManagement\\ArrayOfguid',
      'ArrayOfstring' => 'Panopto\\SessionManagement\\ArrayOfstring',
      'Session' => 'Panopto\\SessionManagement\\Session',
      'ArrayOfSession' => 'Panopto\\SessionManagement\\ArrayOfSession',
      'ArrayOfFolderWithExternalContext' => 'Panopto\\SessionManagement\\ArrayOfFolderWithExternalContext',
      'FolderWithExternalContext' => 'Panopto\\SessionManagement\\FolderWithExternalContext',
      'DateTimeOffset' => 'Panopto\\SessionManagement\\DateTimeOffset',
      'Folder' => 'Panopto\\SessionManagement\\Folder',
      'FolderBase' => 'Panopto\\SessionManagement\\FolderBase',
      'ArrayOfFolder' => 'Panopto\\SessionManagement\\ArrayOfFolder',
      'ListSessionsResponse' => 'Panopto\\SessionManagement\\ListSessionsResponse',
      'ListFoldersResponse' => 'Panopto\\SessionManagement\\ListFoldersResponse',
      'ListFoldersResponseWithExternalContext' => 'Panopto\\SessionManagement\\ListFoldersResponseWithExternalContext',
      'ListExtendedFoldersResponse' => 'Panopto\\SessionManagement\\ListExtendedFoldersResponse',
      'ArrayOfExtendedFolder' => 'Panopto\\SessionManagement\\ArrayOfExtendedFolder',
      'ExtendedFolder' => 'Panopto\\SessionManagement\\ExtendedFolder',
      'ArrayOfListSessionRTMPStreamKeysResponse' => 'Panopto\\SessionManagement\\ArrayOfListSessionRTMPStreamKeysResponse',
      'ListSessionRTMPStreamKeysResponse' => 'Panopto\\SessionManagement\\ListSessionRTMPStreamKeysResponse',
      'ArrayOfExternalHierarchyInfo' => 'Panopto\\SessionManagement\\ArrayOfExternalHierarchyInfo',
      'ExternalHierarchyInfo' => 'Panopto\\SessionManagement\\ExternalHierarchyInfo',
      'FoldersWithAvailabilitySettings' => 'Panopto\\SessionManagement\\FoldersWithAvailabilitySettings',
      'ArrayOfFolderAvailabilitySettings' => 'Panopto\\SessionManagement\\ArrayOfFolderAvailabilitySettings',
      'FolderAvailabilitySettings' => 'Panopto\\SessionManagement\\FolderAvailabilitySettings',
      'SessionsWithAvailabilitySettings' => 'Panopto\\SessionManagement\\SessionsWithAvailabilitySettings',
      'ArrayOfSessionAvailabilitySettings' => 'Panopto\\SessionManagement\\ArrayOfSessionAvailabilitySettings',
      'SessionAvailabilitySettings' => 'Panopto\\SessionManagement\\SessionAvailabilitySettings',
      'AddFolder' => 'Panopto\\SessionManagement\\AddFolder',
      'AddFolderResponse' => 'Panopto\\SessionManagement\\AddFolderResponse',
      'AddSession' => 'Panopto\\SessionManagement\\AddSession',
      'AddSessionResponse' => 'Panopto\\SessionManagement\\AddSessionResponse',
      'GetFoldersById' => 'Panopto\\SessionManagement\\GetFoldersById',
      'GetFoldersByIdResponse' => 'Panopto\\SessionManagement\\GetFoldersByIdResponse',
      'GetFoldersWithExternalContextById' => 'Panopto\\SessionManagement\\GetFoldersWithExternalContextById',
      'GetFoldersWithExternalContextByIdResponse' => 'Panopto\\SessionManagement\\GetFoldersWithExternalContextByIdResponse',
      'GetFoldersByExternalId' => 'Panopto\\SessionManagement\\GetFoldersByExternalId',
      'GetFoldersByExternalIdResponse' => 'Panopto\\SessionManagement\\GetFoldersByExternalIdResponse',
      'GetFoldersWithExternalContextByExternalId' => 'Panopto\\SessionManagement\\GetFoldersWithExternalContextByExternalId',
      'GetFoldersWithExternalContextByExternalIdResponse' => 'Panopto\\SessionManagement\\GetFoldersWithExternalContextByExternalIdResponse',
      'GetAllFoldersByExternalId' => 'Panopto\\SessionManagement\\GetAllFoldersByExternalId',
      'GetAllFoldersByExternalIdResponse' => 'Panopto\\SessionManagement\\GetAllFoldersByExternalIdResponse',
      'GetAllFoldersWithExternalContextByExternalId' => 'Panopto\\SessionManagement\\GetAllFoldersWithExternalContextByExternalId',
      'GetAllFoldersWithExternalContextByExternalIdResponse' => 'Panopto\\SessionManagement\\GetAllFoldersWithExternalContextByExternalIdResponse',
      'GetSessionsById' => 'Panopto\\SessionManagement\\GetSessionsById',
      'GetSessionsByIdResponse' => 'Panopto\\SessionManagement\\GetSessionsByIdResponse',
      'GetSessionsByExternalId' => 'Panopto\\SessionManagement\\GetSessionsByExternalId',
      'GetSessionsByExternalIdResponse' => 'Panopto\\SessionManagement\\GetSessionsByExternalIdResponse',
      'GetSessionsList' => 'Panopto\\SessionManagement\\GetSessionsList',
      'GetSessionsListResponse' => 'Panopto\\SessionManagement\\GetSessionsListResponse',
      'GetFoldersList' => 'Panopto\\SessionManagement\\GetFoldersList',
      'GetFoldersListResponse' => 'Panopto\\SessionManagement\\GetFoldersListResponse',
      'GetFoldersWithExternalContextList' => 'Panopto\\SessionManagement\\GetFoldersWithExternalContextList',
      'GetFoldersWithExternalContextListResponse' => 'Panopto\\SessionManagement\\GetFoldersWithExternalContextListResponse',
      'GetCreatorFoldersList' => 'Panopto\\SessionManagement\\GetCreatorFoldersList',
      'GetCreatorFoldersListResponse' => 'Panopto\\SessionManagement\\GetCreatorFoldersListResponse',
      'GetExtendedCreatorFoldersList' => 'Panopto\\SessionManagement\\GetExtendedCreatorFoldersList',
      'GetExtendedCreatorFoldersListResponse' => 'Panopto\\SessionManagement\\GetExtendedCreatorFoldersListResponse',
      'GetCreatorFoldersWithExternalContextList' => 'Panopto\\SessionManagement\\GetCreatorFoldersWithExternalContextList',
      'GetCreatorFoldersWithExternalContextListResponse' => 'Panopto\\SessionManagement\\GetCreatorFoldersWithExternalContextListResponse',
      'UpdateSessionName' => 'Panopto\\SessionManagement\\UpdateSessionName',
      'UpdateSessionNameResponse' => 'Panopto\\SessionManagement\\UpdateSessionNameResponse',
      'UpdateSessionDescription' => 'Panopto\\SessionManagement\\UpdateSessionDescription',
      'UpdateSessionDescriptionResponse' => 'Panopto\\SessionManagement\\UpdateSessionDescriptionResponse',
      'UpdateSessionIsBroadcast' => 'Panopto\\SessionManagement\\UpdateSessionIsBroadcast',
      'UpdateSessionIsBroadcastResponse' => 'Panopto\\SessionManagement\\UpdateSessionIsBroadcastResponse',
      'UpdateSessionSetPanoptoBroadcast' => 'Panopto\\SessionManagement\\UpdateSessionSetPanoptoBroadcast',
      'UpdateSessionSetPanoptoBroadcastResponse' => 'Panopto\\SessionManagement\\UpdateSessionSetPanoptoBroadcastResponse',
      'UpdateSessionSetRTMPBroadcast' => 'Panopto\\SessionManagement\\UpdateSessionSetRTMPBroadcast',
      'UpdateSessionSetRTMPBroadcastResponse' => 'Panopto\\SessionManagement\\UpdateSessionSetRTMPBroadcastResponse',
      'UpdateSessionCreateRTMPStreams' => 'Panopto\\SessionManagement\\UpdateSessionCreateRTMPStreams',
      'UpdateSessionCreateRTMPStreamsResponse' => 'Panopto\\SessionManagement\\UpdateSessionCreateRTMPStreamsResponse',
      'UpdateSessionUpdateRTMPStreamTypes' => 'Panopto\\SessionManagement\\UpdateSessionUpdateRTMPStreamTypes',
      'UpdateSessionUpdateRTMPStreamTypesResponse' => 'Panopto\\SessionManagement\\UpdateSessionUpdateRTMPStreamTypesResponse',
      'UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand' => 'Panopto\\SessionManagement\\UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand',
      'UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemandResponse' => 'Panopto\\SessionManagement\\UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemandResponse',
      'ListSessionRTMPStreamKeys' => 'Panopto\\SessionManagement\\ListSessionRTMPStreamKeys',
      'UpdateSessionOwner' => 'Panopto\\SessionManagement\\UpdateSessionOwner',
      'UpdateSessionOwnerResponse' => 'Panopto\\SessionManagement\\UpdateSessionOwnerResponse',
      'MoveSessions' => 'Panopto\\SessionManagement\\MoveSessions',
      'MoveSessionsResponse' => 'Panopto\\SessionManagement\\MoveSessionsResponse',
      'UpdateSessionExternalId' => 'Panopto\\SessionManagement\\UpdateSessionExternalId',
      'UpdateSessionExternalIdResponse' => 'Panopto\\SessionManagement\\UpdateSessionExternalIdResponse',
      'UpdateFolderName' => 'Panopto\\SessionManagement\\UpdateFolderName',
      'UpdateFolderNameResponse' => 'Panopto\\SessionManagement\\UpdateFolderNameResponse',
      'UpdateFolderDescription' => 'Panopto\\SessionManagement\\UpdateFolderDescription',
      'UpdateFolderDescriptionResponse' => 'Panopto\\SessionManagement\\UpdateFolderDescriptionResponse',
      'UpdateFolderEnablePodcast' => 'Panopto\\SessionManagement\\UpdateFolderEnablePodcast',
      'UpdateFolderEnablePodcastResponse' => 'Panopto\\SessionManagement\\UpdateFolderEnablePodcastResponse',
      'UpdateFolderAllowPublicNotes' => 'Panopto\\SessionManagement\\UpdateFolderAllowPublicNotes',
      'UpdateFolderAllowPublicNotesResponse' => 'Panopto\\SessionManagement\\UpdateFolderAllowPublicNotesResponse',
      'UpdateFolderAllowSessionDownload' => 'Panopto\\SessionManagement\\UpdateFolderAllowSessionDownload',
      'UpdateFolderAllowSessionDownloadResponse' => 'Panopto\\SessionManagement\\UpdateFolderAllowSessionDownloadResponse',
      'UpdateFolderParent' => 'Panopto\\SessionManagement\\UpdateFolderParent',
      'UpdateFolderParentResponse' => 'Panopto\\SessionManagement\\UpdateFolderParentResponse',
      'UpdateFolderExternalId' => 'Panopto\\SessionManagement\\UpdateFolderExternalId',
      'UpdateFolderExternalIdResponse' => 'Panopto\\SessionManagement\\UpdateFolderExternalIdResponse',
      'UpdateFolderExternalIdWithProvider' => 'Panopto\\SessionManagement\\UpdateFolderExternalIdWithProvider',
      'UpdateFolderExternalIdWithProviderResponse' => 'Panopto\\SessionManagement\\UpdateFolderExternalIdWithProviderResponse',
      'DeleteSessions' => 'Panopto\\SessionManagement\\DeleteSessions',
      'DeleteSessionsResponse' => 'Panopto\\SessionManagement\\DeleteSessionsResponse',
      'DeleteFolders' => 'Panopto\\SessionManagement\\DeleteFolders',
      'DeleteFoldersResponse' => 'Panopto\\SessionManagement\\DeleteFoldersResponse',
      'ProvisionExternalCourse' => 'Panopto\\SessionManagement\\ProvisionExternalCourse',
      'ProvisionExternalCourseResponse' => 'Panopto\\SessionManagement\\ProvisionExternalCourseResponse',
      'EnsureExternalHierarchyBranch' => 'Panopto\\SessionManagement\\EnsureExternalHierarchyBranch',
      'EnsureExternalHierarchyBranchResponse' => 'Panopto\\SessionManagement\\EnsureExternalHierarchyBranchResponse',
      'ProvisionExternalCourseWithRoles' => 'Panopto\\SessionManagement\\ProvisionExternalCourseWithRoles',
      'ProvisionExternalCourseWithRolesResponse' => 'Panopto\\SessionManagement\\ProvisionExternalCourseWithRolesResponse',
      'SetExternalCourseAccess' => 'Panopto\\SessionManagement\\SetExternalCourseAccess',
      'SetExternalCourseAccessResponse' => 'Panopto\\SessionManagement\\SetExternalCourseAccessResponse',
      'SetExternalCourseAccessForRoles' => 'Panopto\\SessionManagement\\SetExternalCourseAccessForRoles',
      'SetExternalCourseAccessForRolesResponse' => 'Panopto\\SessionManagement\\SetExternalCourseAccessForRolesResponse',
      'SetCopiedExternalCourseAccess' => 'Panopto\\SessionManagement\\SetCopiedExternalCourseAccess',
      'SetCopiedExternalCourseAccessResponse' => 'Panopto\\SessionManagement\\SetCopiedExternalCourseAccessResponse',
      'SetCopiedExternalCourseAccessForRoles' => 'Panopto\\SessionManagement\\SetCopiedExternalCourseAccessForRoles',
      'SetCopiedExternalCourseAccessForRolesResponse' => 'Panopto\\SessionManagement\\SetCopiedExternalCourseAccessForRolesResponse',
      'GetRecorderDownloadUrls' => 'Panopto\\SessionManagement\\GetRecorderDownloadUrls',
      'GetRecorderDownloadUrlsResponse' => 'Panopto\\SessionManagement\\GetRecorderDownloadUrlsResponse',
      'CreateNoteByRelativeTime' => 'Panopto\\SessionManagement\\CreateNoteByRelativeTime',
      'CreateNoteByRelativeTimeResponse' => 'Panopto\\SessionManagement\\CreateNoteByRelativeTimeResponse',
      'CreateNoteByAbsoluteTime' => 'Panopto\\SessionManagement\\CreateNoteByAbsoluteTime',
      'CreateNoteByAbsoluteTimeResponse' => 'Panopto\\SessionManagement\\CreateNoteByAbsoluteTimeResponse',
      'EditNote' => 'Panopto\\SessionManagement\\EditNote',
      'EditNoteResponse' => 'Panopto\\SessionManagement\\EditNoteResponse',
      'DeleteNote' => 'Panopto\\SessionManagement\\DeleteNote',
      'DeleteNoteResponse' => 'Panopto\\SessionManagement\\DeleteNoteResponse',
      'GetNote' => 'Panopto\\SessionManagement\\GetNote',
      'GetNoteResponse' => 'Panopto\\SessionManagement\\GetNoteResponse',
      'ListNotes' => 'Panopto\\SessionManagement\\ListNotes',
      'AreUsersNotesPublic' => 'Panopto\\SessionManagement\\AreUsersNotesPublic',
      'AreUsersNotesPublicResponse' => 'Panopto\\SessionManagement\\AreUsersNotesPublicResponse',
      'SetNotesPublic' => 'Panopto\\SessionManagement\\SetNotesPublic',
      'SetNotesPublicResponse' => 'Panopto\\SessionManagement\\SetNotesPublicResponse',
      'IsDropbox' => 'Panopto\\SessionManagement\\IsDropbox',
      'IsDropboxResponse' => 'Panopto\\SessionManagement\\IsDropboxResponse',
      'CreateCaptionByRelativeTime' => 'Panopto\\SessionManagement\\CreateCaptionByRelativeTime',
      'CreateCaptionByRelativeTimeResponse' => 'Panopto\\SessionManagement\\CreateCaptionByRelativeTimeResponse',
      'CreateCaptionByAbsoluteTime' => 'Panopto\\SessionManagement\\CreateCaptionByAbsoluteTime',
      'CreateCaptionByAbsoluteTimeResponse' => 'Panopto\\SessionManagement\\CreateCaptionByAbsoluteTimeResponse',
      'UploadTranscript' => 'Panopto\\SessionManagement\\UploadTranscript',
      'UploadTranscriptResponse' => 'Panopto\\SessionManagement\\UploadTranscriptResponse',
      'ReplaceMachineCaptionsAndUploadTranscript' => 'Panopto\\SessionManagement\\ReplaceMachineCaptionsAndUploadTranscript',
      'ReplaceMachineCaptionsAndUploadTranscriptResponse' => 'Panopto\\SessionManagement\\ReplaceMachineCaptionsAndUploadTranscriptResponse',
      'GetFoldersAvailabilitySettings' => 'Panopto\\SessionManagement\\GetFoldersAvailabilitySettings',
      'GetFoldersAvailabilitySettingsResponse' => 'Panopto\\SessionManagement\\GetFoldersAvailabilitySettingsResponse',
      'GetSessionsAvailabilitySettings' => 'Panopto\\SessionManagement\\GetSessionsAvailabilitySettings',
      'GetSessionsAvailabilitySettingsResponse' => 'Panopto\\SessionManagement\\GetSessionsAvailabilitySettingsResponse',
      'UpdateFoldersAvailabilityStartSettings' => 'Panopto\\SessionManagement\\UpdateFoldersAvailabilityStartSettings',
      'UpdateFoldersAvailabilityStartSettingsResponse' => 'Panopto\\SessionManagement\\UpdateFoldersAvailabilityStartSettingsResponse',
      'UpdateFoldersAvailabilityEndSettings' => 'Panopto\\SessionManagement\\UpdateFoldersAvailabilityEndSettings',
      'UpdateFoldersAvailabilityEndSettingsResponse' => 'Panopto\\SessionManagement\\UpdateFoldersAvailabilityEndSettingsResponse',
      'UpdateSessionsAvailabilityStartSettings' => 'Panopto\\SessionManagement\\UpdateSessionsAvailabilityStartSettings',
      'UpdateSessionsAvailabilityStartSettingsResponse' => 'Panopto\\SessionManagement\\UpdateSessionsAvailabilityStartSettingsResponse',
      'UpdateSessionsAvailabilityEndSettings' => 'Panopto\\SessionManagement\\UpdateSessionsAvailabilityEndSettings',
      'UpdateSessionsAvailabilityEndSettingsResponse' => 'Panopto\\SessionManagement\\UpdateSessionsAvailabilityEndSettingsResponse',
      'GetPersonalFolderForUser' => 'Panopto\\SessionManagement\\GetPersonalFolderForUser',
      'GetPersonalFolderForUserResponse' => 'Panopto\\SessionManagement\\GetPersonalFolderForUserResponse',
      'GetVideoDownloadURL' => 'Panopto\\SessionManagement\\GetVideoDownloadURL',
      'GetVideoDownloadURLResponse' => 'Panopto\\SessionManagement\\GetVideoDownloadURLResponse',
      'GetAudioDownloadURL' => 'Panopto\\SessionManagement\\GetAudioDownloadURL',
      'GetAudioDownloadURLResponse' => 'Panopto\\SessionManagement\\GetAudioDownloadURLResponse',
      'UnprovisionExternalCourse' => 'Panopto\\SessionManagement\\UnprovisionExternalCourse',
      'UnprovisionExternalCourseResponse' => 'Panopto\\SessionManagement\\UnprovisionExternalCourseResponse',
    );

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = null)
    {
      foreach (self::$classmap as $key => $value) {
        if (!isset($options['classmap'][$key])) {
          $options['classmap'][$key] = $value;
        }
      }
      $options = array_merge(array (
      'features' => 1,
    ), $options);
      if (!$wsdl) {
        $wsdl = 'https://demo.hosted.panopto.com/Panopto/PublicAPI/4.6/SessionManagement.svc?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param AddFolder $parameters
     * @return AddFolderResponse
     */
    public function AddFolder(AddFolder $parameters): AddFolderResponse
    {
      return $this->__soapCall('AddFolder', array($parameters));
    }

    /**
     * @param AddSession $parameters
     * @return AddSessionResponse
     */
    public function AddSession(AddSession $parameters): AddSessionResponse
    {
      return $this->__soapCall('AddSession', array($parameters));
    }

    /**
     * @param GetFoldersById $parameters
     * @return GetFoldersByIdResponse
     */
    public function GetFoldersById(GetFoldersById $parameters): GetFoldersByIdResponse
    {
      return $this->__soapCall('GetFoldersById', array($parameters));
    }

    /**
     * @param GetFoldersWithExternalContextById $parameters
     * @return GetFoldersWithExternalContextByIdResponse
     */
    public function GetFoldersWithExternalContextById(GetFoldersWithExternalContextById $parameters): GetFoldersWithExternalContextByIdResponse
    {
      return $this->__soapCall('GetFoldersWithExternalContextById', array($parameters));
    }

    /**
     * @param GetFoldersByExternalId $parameters
     * @return GetFoldersByExternalIdResponse
     */
    public function GetFoldersByExternalId(GetFoldersByExternalId $parameters): GetFoldersByExternalIdResponse
    {
      return $this->__soapCall('GetFoldersByExternalId', array($parameters));
    }

    /**
     * @param GetFoldersWithExternalContextByExternalId $parameters
     * @return GetFoldersWithExternalContextByExternalIdResponse
     */
    public function GetFoldersWithExternalContextByExternalId(GetFoldersWithExternalContextByExternalId $parameters): GetFoldersWithExternalContextByExternalIdResponse
    {
      return $this->__soapCall('GetFoldersWithExternalContextByExternalId', array($parameters));
    }

    /**
     * @param GetAllFoldersByExternalId $parameters
     * @return GetAllFoldersByExternalIdResponse
     */
    public function GetAllFoldersByExternalId(GetAllFoldersByExternalId $parameters): GetAllFoldersByExternalIdResponse
    {
      return $this->__soapCall('GetAllFoldersByExternalId', array($parameters));
    }

    /**
     * @param GetAllFoldersWithExternalContextByExternalId $parameters
     * @return GetAllFoldersWithExternalContextByExternalIdResponse
     */
    public function GetAllFoldersWithExternalContextByExternalId(GetAllFoldersWithExternalContextByExternalId $parameters): GetAllFoldersWithExternalContextByExternalIdResponse
    {
      return $this->__soapCall('GetAllFoldersWithExternalContextByExternalId', array($parameters));
    }

    /**
     * @param GetSessionsById $parameters
     * @return GetSessionsByIdResponse
     */
    public function GetSessionsById(GetSessionsById $parameters): GetSessionsByIdResponse
    {
      return $this->__soapCall('GetSessionsById', array($parameters));
    }

    /**
     * @param GetSessionsByExternalId $parameters
     * @return GetSessionsByExternalIdResponse
     */
    public function GetSessionsByExternalId(GetSessionsByExternalId $parameters): GetSessionsByExternalIdResponse
    {
      return $this->__soapCall('GetSessionsByExternalId', array($parameters));
    }

    /**
     * @param GetSessionsList $parameters
     * @return GetSessionsListResponse
     */
    public function GetSessionsList(GetSessionsList $parameters): GetSessionsListResponse
    {
      return $this->__soapCall('GetSessionsList', array($parameters));
    }

    /**
     * @param GetFoldersList $parameters
     * @return GetFoldersListResponse
     */
    public function GetFoldersList(GetFoldersList $parameters): GetFoldersListResponse
    {
      return $this->__soapCall('GetFoldersList', array($parameters));
    }

    /**
     * @param GetFoldersWithExternalContextList $parameters
     * @return GetFoldersWithExternalContextListResponse
     */
    public function GetFoldersWithExternalContextList(GetFoldersWithExternalContextList $parameters): GetFoldersWithExternalContextListResponse
    {
      return $this->__soapCall('GetFoldersWithExternalContextList', array($parameters));
    }

    /**
     * @param GetCreatorFoldersList $parameters
     * @return GetCreatorFoldersListResponse
     */
    public function GetCreatorFoldersList(GetCreatorFoldersList $parameters): GetCreatorFoldersListResponse
    {
      return $this->__soapCall('GetCreatorFoldersList', array($parameters));
    }

    /**
     * @param GetExtendedCreatorFoldersList $parameters
     * @return GetExtendedCreatorFoldersListResponse
     */
    public function GetExtendedCreatorFoldersList(GetExtendedCreatorFoldersList $parameters): GetExtendedCreatorFoldersListResponse
    {
      return $this->__soapCall('GetExtendedCreatorFoldersList', array($parameters));
    }

    /**
     * @param GetCreatorFoldersWithExternalContextList $parameters
     * @return GetCreatorFoldersWithExternalContextListResponse
     */
    public function GetCreatorFoldersWithExternalContextList(GetCreatorFoldersWithExternalContextList $parameters): GetCreatorFoldersWithExternalContextListResponse
    {
      return $this->__soapCall('GetCreatorFoldersWithExternalContextList', array($parameters));
    }

    /**
     * @param UpdateSessionName $parameters
     * @return UpdateSessionNameResponse
     */
    public function UpdateSessionName(UpdateSessionName $parameters): UpdateSessionNameResponse
    {
      return $this->__soapCall('UpdateSessionName', array($parameters));
    }

    /**
     * @param UpdateSessionDescription $parameters
     * @return UpdateSessionDescriptionResponse
     */
    public function UpdateSessionDescription(UpdateSessionDescription $parameters): UpdateSessionDescriptionResponse
    {
      return $this->__soapCall('UpdateSessionDescription', array($parameters));
    }

    /**
     * @param UpdateSessionIsBroadcast $parameters
     * @return UpdateSessionIsBroadcastResponse
     */
    public function UpdateSessionIsBroadcast(UpdateSessionIsBroadcast $parameters): UpdateSessionIsBroadcastResponse
    {
      return $this->__soapCall('UpdateSessionIsBroadcast', array($parameters));
    }

    /**
     * @param UpdateSessionSetPanoptoBroadcast $parameters
     * @return UpdateSessionSetPanoptoBroadcastResponse
     */
    public function UpdateSessionSetPanoptoBroadcast(UpdateSessionSetPanoptoBroadcast $parameters): UpdateSessionSetPanoptoBroadcastResponse
    {
      return $this->__soapCall('UpdateSessionSetPanoptoBroadcast', array($parameters));
    }

    /**
     * @param UpdateSessionSetRTMPBroadcast $parameters
     * @return UpdateSessionSetRTMPBroadcastResponse
     */
    public function UpdateSessionSetRTMPBroadcast(UpdateSessionSetRTMPBroadcast $parameters): UpdateSessionSetRTMPBroadcastResponse
    {
      return $this->__soapCall('UpdateSessionSetRTMPBroadcast', array($parameters));
    }

    /**
     * @param UpdateSessionCreateRTMPStreams $parameters
     * @return UpdateSessionCreateRTMPStreamsResponse
     */
    public function UpdateSessionCreateRTMPStreams(UpdateSessionCreateRTMPStreams $parameters): UpdateSessionCreateRTMPStreamsResponse
    {
      return $this->__soapCall('UpdateSessionCreateRTMPStreams', array($parameters));
    }

    /**
     * @param UpdateSessionUpdateRTMPStreamTypes $parameters
     * @return UpdateSessionUpdateRTMPStreamTypesResponse
     */
    public function UpdateSessionUpdateRTMPStreamTypes(UpdateSessionUpdateRTMPStreamTypes $parameters): UpdateSessionUpdateRTMPStreamTypesResponse
    {
      return $this->__soapCall('UpdateSessionUpdateRTMPStreamTypes', array($parameters));
    }

    /**
     * @param UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand $parameters
     * @return UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemandResponse
     */
    public function UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand(UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand $parameters): UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemandResponse
    {
      return $this->__soapCall('UpdateSessionUpdateRTMPStreamSetShouldConvertToOnDemand', array($parameters));
    }

    /**
     * @param ListSessionRTMPStreamKeys $parameters
     * @return ListSessionRTMPStreamKeysResponse
     */
    public function ListSessionRTMPStreamKeys(ListSessionRTMPStreamKeys $parameters): ListSessionRTMPStreamKeysResponse
    {
      return $this->__soapCall('ListSessionRTMPStreamKeys', array($parameters));
    }

    /**
     * @param UpdateSessionOwner $parameters
     * @return UpdateSessionOwnerResponse
     */
    public function UpdateSessionOwner(UpdateSessionOwner $parameters): UpdateSessionOwnerResponse
    {
      return $this->__soapCall('UpdateSessionOwner', array($parameters));
    }

    /**
     * @param MoveSessions $parameters
     * @return MoveSessionsResponse
     */
    public function MoveSessions(MoveSessions $parameters): MoveSessionsResponse
    {
      return $this->__soapCall('MoveSessions', array($parameters));
    }

    /**
     * @param UpdateSessionExternalId $parameters
     * @return UpdateSessionExternalIdResponse
     */
    public function UpdateSessionExternalId(UpdateSessionExternalId $parameters): UpdateSessionExternalIdResponse
    {
      return $this->__soapCall('UpdateSessionExternalId', array($parameters));
    }

    /**
     * @param UpdateFolderName $parameters
     * @return UpdateFolderNameResponse
     */
    public function UpdateFolderName(UpdateFolderName $parameters): UpdateFolderNameResponse
    {
      return $this->__soapCall('UpdateFolderName', array($parameters));
    }

    /**
     * @param UpdateFolderDescription $parameters
     * @return UpdateFolderDescriptionResponse
     */
    public function UpdateFolderDescription(UpdateFolderDescription $parameters): UpdateFolderDescriptionResponse
    {
      return $this->__soapCall('UpdateFolderDescription', array($parameters));
    }

    /**
     * @param UpdateFolderEnablePodcast $parameters
     * @return UpdateFolderEnablePodcastResponse
     */
    public function UpdateFolderEnablePodcast(UpdateFolderEnablePodcast $parameters): UpdateFolderEnablePodcastResponse
    {
      return $this->__soapCall('UpdateFolderEnablePodcast', array($parameters));
    }

    /**
     * @param UpdateFolderAllowPublicNotes $parameters
     * @return UpdateFolderAllowPublicNotesResponse
     */
    public function UpdateFolderAllowPublicNotes(UpdateFolderAllowPublicNotes $parameters): UpdateFolderAllowPublicNotesResponse
    {
      return $this->__soapCall('UpdateFolderAllowPublicNotes', array($parameters));
    }

    /**
     * @param UpdateFolderAllowSessionDownload $parameters
     * @return UpdateFolderAllowSessionDownloadResponse
     */
    public function UpdateFolderAllowSessionDownload(UpdateFolderAllowSessionDownload $parameters): UpdateFolderAllowSessionDownloadResponse
    {
      return $this->__soapCall('UpdateFolderAllowSessionDownload', array($parameters));
    }

    /**
     * @param UpdateFolderParent $parameters
     * @return UpdateFolderParentResponse
     */
    public function UpdateFolderParent(UpdateFolderParent $parameters): UpdateFolderParentResponse
    {
      return $this->__soapCall('UpdateFolderParent', array($parameters));
    }

    /**
     * @param UpdateFolderExternalId $parameters
     * @return UpdateFolderExternalIdResponse
     */
    public function UpdateFolderExternalId(UpdateFolderExternalId $parameters): UpdateFolderExternalIdResponse
    {
      return $this->__soapCall('UpdateFolderExternalId', array($parameters));
    }

    /**
     * @param UpdateFolderExternalIdWithProvider $parameters
     * @return UpdateFolderExternalIdWithProviderResponse
     */
    public function UpdateFolderExternalIdWithProvider(UpdateFolderExternalIdWithProvider $parameters): UpdateFolderExternalIdWithProviderResponse
    {
      return $this->__soapCall('UpdateFolderExternalIdWithProvider', array($parameters));
    }

    /**
     * @param DeleteSessions $parameters
     * @return DeleteSessionsResponse
     */
    public function DeleteSessions(DeleteSessions $parameters): DeleteSessionsResponse
    {
      return $this->__soapCall('DeleteSessions', array($parameters));
    }

    /**
     * @param DeleteFolders $parameters
     * @return DeleteFoldersResponse
     */
    public function DeleteFolders(DeleteFolders $parameters): DeleteFoldersResponse
    {
      return $this->__soapCall('DeleteFolders', array($parameters));
    }

    /**
     * @param ProvisionExternalCourse $parameters
     * @return ProvisionExternalCourseResponse
     */
    public function ProvisionExternalCourse(ProvisionExternalCourse $parameters): ProvisionExternalCourseResponse
    {
      return $this->__soapCall('ProvisionExternalCourse', array($parameters));
    }

    /**
     * @param EnsureExternalHierarchyBranch $parameters
     * @return EnsureExternalHierarchyBranchResponse
     */
    public function EnsureExternalHierarchyBranch(EnsureExternalHierarchyBranch $parameters): EnsureExternalHierarchyBranchResponse
    {
      return $this->__soapCall('EnsureExternalHierarchyBranch', array($parameters));
    }

    /**
     * @param ProvisionExternalCourseWithRoles $parameters
     * @return ProvisionExternalCourseWithRolesResponse
     */
    public function ProvisionExternalCourseWithRoles(ProvisionExternalCourseWithRoles $parameters): ProvisionExternalCourseWithRolesResponse
    {
      return $this->__soapCall('ProvisionExternalCourseWithRoles', array($parameters));
    }

    /**
     * @param SetExternalCourseAccess $parameters
     * @return SetExternalCourseAccessResponse
     */
    public function SetExternalCourseAccess(SetExternalCourseAccess $parameters): SetExternalCourseAccessResponse
    {
      return $this->__soapCall('SetExternalCourseAccess', array($parameters));
    }

    /**
     * @param SetExternalCourseAccessForRoles $parameters
     * @return SetExternalCourseAccessForRolesResponse
     */
    public function SetExternalCourseAccessForRoles(SetExternalCourseAccessForRoles $parameters): SetExternalCourseAccessForRolesResponse
    {
      return $this->__soapCall('SetExternalCourseAccessForRoles', array($parameters));
    }

    /**
     * @param SetCopiedExternalCourseAccess $parameters
     * @return SetCopiedExternalCourseAccessResponse
     */
    public function SetCopiedExternalCourseAccess(SetCopiedExternalCourseAccess $parameters): SetCopiedExternalCourseAccessResponse
    {
      return $this->__soapCall('SetCopiedExternalCourseAccess', array($parameters));
    }

    /**
     * @param SetCopiedExternalCourseAccessForRoles $parameters
     * @return SetCopiedExternalCourseAccessForRolesResponse
     */
    public function SetCopiedExternalCourseAccessForRoles(SetCopiedExternalCourseAccessForRoles $parameters): SetCopiedExternalCourseAccessForRolesResponse
    {
      return $this->__soapCall('SetCopiedExternalCourseAccessForRoles', array($parameters));
    }

    /**
     * @param GetRecorderDownloadUrls $parameters
     * @return GetRecorderDownloadUrlsResponse
     */
    public function GetRecorderDownloadUrls(GetRecorderDownloadUrls $parameters): GetRecorderDownloadUrlsResponse
    {
      return $this->__soapCall('GetRecorderDownloadUrls', array($parameters));
    }

    /**
     * @param CreateNoteByRelativeTime $parameters
     * @return CreateNoteByRelativeTimeResponse
     */
    public function CreateNoteByRelativeTime(CreateNoteByRelativeTime $parameters): CreateNoteByRelativeTimeResponse
    {
      return $this->__soapCall('CreateNoteByRelativeTime', array($parameters));
    }

    /**
     * @param CreateNoteByAbsoluteTime $parameters
     * @return CreateNoteByAbsoluteTimeResponse
     */
    public function CreateNoteByAbsoluteTime(CreateNoteByAbsoluteTime $parameters): CreateNoteByAbsoluteTimeResponse
    {
      return $this->__soapCall('CreateNoteByAbsoluteTime', array($parameters));
    }

    /**
     * @param EditNote $parameters
     * @return EditNoteResponse
     */
    public function EditNote(EditNote $parameters): EditNoteResponse
    {
      return $this->__soapCall('EditNote', array($parameters));
    }

    /**
     * @param DeleteNote $parameters
     * @return DeleteNoteResponse
     */
    public function DeleteNote(DeleteNote $parameters): DeleteNoteResponse
    {
      return $this->__soapCall('DeleteNote', array($parameters));
    }

    /**
     * @param GetNote $parameters
     * @return GetNoteResponse
     */
    public function GetNote(GetNote $parameters): GetNoteResponse
    {
      return $this->__soapCall('GetNote', array($parameters));
    }

    /**
     * @param ListNotes $parameters
     * @return ListNotesResponse
     */
    public function ListNotes(ListNotes $parameters): ListNotesResponse
    {
      return $this->__soapCall('ListNotes', array($parameters));
    }

    /**
     * @param AreUsersNotesPublic $parameters
     * @return AreUsersNotesPublicResponse
     */
    public function AreUsersNotesPublic(AreUsersNotesPublic $parameters): AreUsersNotesPublicResponse
    {
      return $this->__soapCall('AreUsersNotesPublic', array($parameters));
    }

    /**
     * @param SetNotesPublic $parameters
     * @return SetNotesPublicResponse
     */
    public function SetNotesPublic(SetNotesPublic $parameters): SetNotesPublicResponse
    {
      return $this->__soapCall('SetNotesPublic', array($parameters));
    }

    /**
     * @param IsDropbox $parameters
     * @return IsDropboxResponse
     */
    public function IsDropbox(IsDropbox $parameters): IsDropboxResponse
    {
      return $this->__soapCall('IsDropbox', array($parameters));
    }

    /**
     * @param CreateCaptionByRelativeTime $parameters
     * @return CreateCaptionByRelativeTimeResponse
     */
    public function CreateCaptionByRelativeTime(CreateCaptionByRelativeTime $parameters): CreateCaptionByRelativeTimeResponse
    {
      return $this->__soapCall('CreateCaptionByRelativeTime', array($parameters));
    }

    /**
     * @param CreateCaptionByAbsoluteTime $parameters
     * @return CreateCaptionByAbsoluteTimeResponse
     */
    public function CreateCaptionByAbsoluteTime(CreateCaptionByAbsoluteTime $parameters): CreateCaptionByAbsoluteTimeResponse
    {
      return $this->__soapCall('CreateCaptionByAbsoluteTime', array($parameters));
    }

    /**
     * @param UploadTranscript $parameters
     * @return UploadTranscriptResponse
     */
    public function UploadTranscript(UploadTranscript $parameters): UploadTranscriptResponse
    {
      return $this->__soapCall('UploadTranscript', array($parameters));
    }

    /**
     * @param ReplaceMachineCaptionsAndUploadTranscript $parameters
     * @return ReplaceMachineCaptionsAndUploadTranscriptResponse
     */
    public function ReplaceMachineCaptionsAndUploadTranscript(ReplaceMachineCaptionsAndUploadTranscript $parameters): ReplaceMachineCaptionsAndUploadTranscriptResponse
    {
      return $this->__soapCall('ReplaceMachineCaptionsAndUploadTranscript', array($parameters));
    }

    /**
     * @param GetFoldersAvailabilitySettings $parameters
     * @return GetFoldersAvailabilitySettingsResponse
     */
    public function GetFoldersAvailabilitySettings(GetFoldersAvailabilitySettings $parameters): GetFoldersAvailabilitySettingsResponse
    {
      return $this->__soapCall('GetFoldersAvailabilitySettings', array($parameters));
    }

    /**
     * @param GetSessionsAvailabilitySettings $parameters
     * @return GetSessionsAvailabilitySettingsResponse
     */
    public function GetSessionsAvailabilitySettings(GetSessionsAvailabilitySettings $parameters): GetSessionsAvailabilitySettingsResponse
    {
      return $this->__soapCall('GetSessionsAvailabilitySettings', array($parameters));
    }

    /**
     * @param UpdateFoldersAvailabilityStartSettings $parameters
     * @return UpdateFoldersAvailabilityStartSettingsResponse
     */
    public function UpdateFoldersAvailabilityStartSettings(UpdateFoldersAvailabilityStartSettings $parameters): UpdateFoldersAvailabilityStartSettingsResponse
    {
      return $this->__soapCall('UpdateFoldersAvailabilityStartSettings', array($parameters));
    }

    /**
     * @param UpdateFoldersAvailabilityEndSettings $parameters
     * @return UpdateFoldersAvailabilityEndSettingsResponse
     */
    public function UpdateFoldersAvailabilityEndSettings(UpdateFoldersAvailabilityEndSettings $parameters): UpdateFoldersAvailabilityEndSettingsResponse
    {
      return $this->__soapCall('UpdateFoldersAvailabilityEndSettings', array($parameters));
    }

    /**
     * @param UpdateSessionsAvailabilityStartSettings $parameters
     * @return UpdateSessionsAvailabilityStartSettingsResponse
     */
    public function UpdateSessionsAvailabilityStartSettings(UpdateSessionsAvailabilityStartSettings $parameters): UpdateSessionsAvailabilityStartSettingsResponse
    {
      return $this->__soapCall('UpdateSessionsAvailabilityStartSettings', array($parameters));
    }

    /**
     * @param UpdateSessionsAvailabilityEndSettings $parameters
     * @return UpdateSessionsAvailabilityEndSettingsResponse
     */
    public function UpdateSessionsAvailabilityEndSettings(UpdateSessionsAvailabilityEndSettings $parameters): UpdateSessionsAvailabilityEndSettingsResponse
    {
      return $this->__soapCall('UpdateSessionsAvailabilityEndSettings', array($parameters));
    }

    /**
     * @param GetPersonalFolderForUser $parameters
     * @return GetPersonalFolderForUserResponse
     */
    public function GetPersonalFolderForUser(GetPersonalFolderForUser $parameters): GetPersonalFolderForUserResponse
    {
      return $this->__soapCall('GetPersonalFolderForUser', array($parameters));
    }

    /**
     * @param GetVideoDownloadURL $parameters
     * @return GetVideoDownloadURLResponse
     */
    public function GetVideoDownloadURL(GetVideoDownloadURL $parameters): GetVideoDownloadURLResponse
    {
      return $this->__soapCall('GetVideoDownloadURL', array($parameters));
    }

    /**
     * @param GetAudioDownloadURL $parameters
     * @return GetAudioDownloadURLResponse
     */
    public function GetAudioDownloadURL(GetAudioDownloadURL $parameters): GetAudioDownloadURLResponse
    {
      return $this->__soapCall('GetAudioDownloadURL', array($parameters));
    }

    /**
     * @param UnprovisionExternalCourse $parameters
     * @return UnprovisionExternalCourseResponse
     */
    public function UnprovisionExternalCourse(UnprovisionExternalCourse $parameters): UnprovisionExternalCourseResponse
    {
      return $this->__soapCall('UnprovisionExternalCourse', array($parameters));
    }

}
