<?php

namespace Panopto\AccessManagement;

class AccessManagement extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static array $classmap = array (
      'ArrayOfguid' => 'Panopto\\AccessManagement\\ArrayOfguid',
      'AuthenticationInfo' => 'Panopto\\AccessManagement\\AuthenticationInfo',
      'UserAccessDetails' => 'Panopto\\AccessManagement\\UserAccessDetails',
      'ArrayOfGroupAccessDetails' => 'Panopto\\AccessManagement\\ArrayOfGroupAccessDetails',
      'GroupAccessDetails' => 'Panopto\\AccessManagement\\GroupAccessDetails',
      'SessionAccessDetails' => 'Panopto\\AccessManagement\\SessionAccessDetails',
      'FolderAccessDetails' => 'Panopto\\AccessManagement\\FolderAccessDetails',
      'GetUserAccessDetails' => 'Panopto\\AccessManagement\\GetUserAccessDetails',
      'GetUserAccessDetailsResponse' => 'Panopto\\AccessManagement\\GetUserAccessDetailsResponse',
      'GetSelfUserAccessDetails' => 'Panopto\\AccessManagement\\GetSelfUserAccessDetails',
      'GetSelfUserAccessDetailsResponse' => 'Panopto\\AccessManagement\\GetSelfUserAccessDetailsResponse',
      'GetSessionAccessDetails' => 'Panopto\\AccessManagement\\GetSessionAccessDetails',
      'GetSessionAccessDetailsResponse' => 'Panopto\\AccessManagement\\GetSessionAccessDetailsResponse',
      'GetFolderAccessDetails' => 'Panopto\\AccessManagement\\GetFolderAccessDetails',
      'GetFolderAccessDetailsResponse' => 'Panopto\\AccessManagement\\GetFolderAccessDetailsResponse',
      'GetGroupAccessDetails' => 'Panopto\\AccessManagement\\GetGroupAccessDetails',
      'GetGroupAccessDetailsResponse' => 'Panopto\\AccessManagement\\GetGroupAccessDetailsResponse',
      'GrantUsersAccessToFolder' => 'Panopto\\AccessManagement\\GrantUsersAccessToFolder',
      'GrantUsersAccessToFolderResponse' => 'Panopto\\AccessManagement\\GrantUsersAccessToFolderResponse',
      'GrantUsersViewerAccessToSession' => 'Panopto\\AccessManagement\\GrantUsersViewerAccessToSession',
      'GrantUsersViewerAccessToSessionResponse' => 'Panopto\\AccessManagement\\GrantUsersViewerAccessToSessionResponse',
      'GrantGroupAccessToFolder' => 'Panopto\\AccessManagement\\GrantGroupAccessToFolder',
      'GrantGroupAccessToFolderResponse' => 'Panopto\\AccessManagement\\GrantGroupAccessToFolderResponse',
      'GrantGroupViewerAccessToSession' => 'Panopto\\AccessManagement\\GrantGroupViewerAccessToSession',
      'GrantGroupViewerAccessToSessionResponse' => 'Panopto\\AccessManagement\\GrantGroupViewerAccessToSessionResponse',
      'GrantAllAuthenticatedUsersGroupAccessToFolder' => 'Panopto\\AccessManagement\\GrantAllAuthenticatedUsersGroupAccessToFolder',
      'GrantAllAuthenticatedUsersGroupAccessToFolderResponse' => 'Panopto\\AccessManagement\\GrantAllAuthenticatedUsersGroupAccessToFolderResponse',
      'GrantAllAuthenticatedUsersGroupAccessToSession' => 'Panopto\\AccessManagement\\GrantAllAuthenticatedUsersGroupAccessToSession',
      'GrantAllAuthenticatedUsersGroupAccessToSessionResponse' => 'Panopto\\AccessManagement\\GrantAllAuthenticatedUsersGroupAccessToSessionResponse',
      'GrantPublicGroupAccessToFolder' => 'Panopto\\AccessManagement\\GrantPublicGroupAccessToFolder',
      'GrantPublicGroupAccessToFolderResponse' => 'Panopto\\AccessManagement\\GrantPublicGroupAccessToFolderResponse',
      'GrantPublicGroupAccessToSession' => 'Panopto\\AccessManagement\\GrantPublicGroupAccessToSession',
      'GrantPublicGroupAccessToSessionResponse' => 'Panopto\\AccessManagement\\GrantPublicGroupAccessToSessionResponse',
      'RevokeAllImplicitGroupAccessToFolder' => 'Panopto\\AccessManagement\\RevokeAllImplicitGroupAccessToFolder',
      'RevokeAllImplicitGroupAccessToFolderResponse' => 'Panopto\\AccessManagement\\RevokeAllImplicitGroupAccessToFolderResponse',
      'RevokeAllImplicitGroupAccessToSession' => 'Panopto\\AccessManagement\\RevokeAllImplicitGroupAccessToSession',
      'RevokeAllImplicitGroupAccessToSessionResponse' => 'Panopto\\AccessManagement\\RevokeAllImplicitGroupAccessToSessionResponse',
      'UpdateFolderIsPublic' => 'Panopto\\AccessManagement\\UpdateFolderIsPublic',
      'UpdateFolderIsPublicResponse' => 'Panopto\\AccessManagement\\UpdateFolderIsPublicResponse',
      'UpdateSessionIsPublic' => 'Panopto\\AccessManagement\\UpdateSessionIsPublic',
      'UpdateSessionIsPublicResponse' => 'Panopto\\AccessManagement\\UpdateSessionIsPublicResponse',
      'UpdateSessionInheritViewerAccess' => 'Panopto\\AccessManagement\\UpdateSessionInheritViewerAccess',
      'UpdateSessionInheritViewerAccessResponse' => 'Panopto\\AccessManagement\\UpdateSessionInheritViewerAccessResponse',
      'RevokeUsersAccessFromFolder' => 'Panopto\\AccessManagement\\RevokeUsersAccessFromFolder',
      'RevokeUsersAccessFromFolderResponse' => 'Panopto\\AccessManagement\\RevokeUsersAccessFromFolderResponse',
      'RevokeUsersViewerAccessFromSession' => 'Panopto\\AccessManagement\\RevokeUsersViewerAccessFromSession',
      'RevokeUsersViewerAccessFromSessionResponse' => 'Panopto\\AccessManagement\\RevokeUsersViewerAccessFromSessionResponse',
      'RevokeGroupAccessFromFolder' => 'Panopto\\AccessManagement\\RevokeGroupAccessFromFolder',
      'RevokeGroupAccessFromFolderResponse' => 'Panopto\\AccessManagement\\RevokeGroupAccessFromFolderResponse',
      'RevokeGroupViewerAccessFromSession' => 'Panopto\\AccessManagement\\RevokeGroupViewerAccessFromSession',
      'RevokeGroupViewerAccessFromSessionResponse' => 'Panopto\\AccessManagement\\RevokeGroupViewerAccessFromSessionResponse',
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
        $wsdl = 'https://demo.hosted.panopto.com/Panopto/PublicAPI/4.6/AccessManagement.svc?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param GetUserAccessDetails $parameters
     * @return GetUserAccessDetailsResponse
     */
    public function GetUserAccessDetails(GetUserAccessDetails $parameters): GetUserAccessDetailsResponse
    {
      return $this->__soapCall('GetUserAccessDetails', array($parameters));
    }

    /**
     * @param GetSelfUserAccessDetails $parameters
     * @return GetSelfUserAccessDetailsResponse
     */
    public function GetSelfUserAccessDetails(GetSelfUserAccessDetails $parameters): GetSelfUserAccessDetailsResponse
    {
      return $this->__soapCall('GetSelfUserAccessDetails', array($parameters));
    }

    /**
     * @param GetSessionAccessDetails $parameters
     * @return GetSessionAccessDetailsResponse
     */
    public function GetSessionAccessDetails(GetSessionAccessDetails $parameters): GetSessionAccessDetailsResponse
    {
      return $this->__soapCall('GetSessionAccessDetails', array($parameters));
    }

    /**
     * @param GetFolderAccessDetails $parameters
     * @return GetFolderAccessDetailsResponse
     */
    public function GetFolderAccessDetails(GetFolderAccessDetails $parameters): GetFolderAccessDetailsResponse
    {
      return $this->__soapCall('GetFolderAccessDetails', array($parameters));
    }

    /**
     * @param GetGroupAccessDetails $parameters
     * @return GetGroupAccessDetailsResponse
     */
    public function GetGroupAccessDetails(GetGroupAccessDetails $parameters): GetGroupAccessDetailsResponse
    {
      return $this->__soapCall('GetGroupAccessDetails', array($parameters));
    }

    /**
     * @param GrantUsersAccessToFolder $parameters
     * @return GrantUsersAccessToFolderResponse
     */
    public function GrantUsersAccessToFolder(GrantUsersAccessToFolder $parameters): GrantUsersAccessToFolderResponse
    {
      return $this->__soapCall('GrantUsersAccessToFolder', array($parameters));
    }

    /**
     * @param GrantUsersViewerAccessToSession $parameters
     * @return GrantUsersViewerAccessToSessionResponse
     */
    public function GrantUsersViewerAccessToSession(GrantUsersViewerAccessToSession $parameters): GrantUsersViewerAccessToSessionResponse
    {
      return $this->__soapCall('GrantUsersViewerAccessToSession', array($parameters));
    }

    /**
     * @param GrantGroupAccessToFolder $parameters
     * @return GrantGroupAccessToFolderResponse
     */
    public function GrantGroupAccessToFolder(GrantGroupAccessToFolder $parameters): GrantGroupAccessToFolderResponse
    {
      return $this->__soapCall('GrantGroupAccessToFolder', array($parameters));
    }

    /**
     * @param GrantGroupViewerAccessToSession $parameters
     * @return GrantGroupViewerAccessToSessionResponse
     */
    public function GrantGroupViewerAccessToSession(GrantGroupViewerAccessToSession $parameters): GrantGroupViewerAccessToSessionResponse
    {
      return $this->__soapCall('GrantGroupViewerAccessToSession', array($parameters));
    }

    /**
     * @param GrantAllAuthenticatedUsersGroupAccessToFolder $parameters
     * @return GrantAllAuthenticatedUsersGroupAccessToFolderResponse
     */
    public function GrantAllAuthenticatedUsersGroupAccessToFolder(GrantAllAuthenticatedUsersGroupAccessToFolder $parameters): GrantAllAuthenticatedUsersGroupAccessToFolderResponse
    {
      return $this->__soapCall('GrantAllAuthenticatedUsersGroupAccessToFolder', array($parameters));
    }

    /**
     * @param GrantAllAuthenticatedUsersGroupAccessToSession $parameters
     * @return GrantAllAuthenticatedUsersGroupAccessToSessionResponse
     */
    public function GrantAllAuthenticatedUsersGroupAccessToSession(GrantAllAuthenticatedUsersGroupAccessToSession $parameters): GrantAllAuthenticatedUsersGroupAccessToSessionResponse
    {
      return $this->__soapCall('GrantAllAuthenticatedUsersGroupAccessToSession', array($parameters));
    }

    /**
     * @param GrantPublicGroupAccessToFolder $parameters
     * @return GrantPublicGroupAccessToFolderResponse
     */
    public function GrantPublicGroupAccessToFolder(GrantPublicGroupAccessToFolder $parameters): GrantPublicGroupAccessToFolderResponse
    {
      return $this->__soapCall('GrantPublicGroupAccessToFolder', array($parameters));
    }

    /**
     * @param GrantPublicGroupAccessToSession $parameters
     * @return GrantPublicGroupAccessToSessionResponse
     */
    public function GrantPublicGroupAccessToSession(GrantPublicGroupAccessToSession $parameters): GrantPublicGroupAccessToSessionResponse
    {
      return $this->__soapCall('GrantPublicGroupAccessToSession', array($parameters));
    }

    /**
     * @param RevokeAllImplicitGroupAccessToFolder $parameters
     * @return RevokeAllImplicitGroupAccessToFolderResponse
     */
    public function RevokeAllImplicitGroupAccessToFolder(RevokeAllImplicitGroupAccessToFolder $parameters): RevokeAllImplicitGroupAccessToFolderResponse
    {
      return $this->__soapCall('RevokeAllImplicitGroupAccessToFolder', array($parameters));
    }

    /**
     * @param RevokeAllImplicitGroupAccessToSession $parameters
     * @return RevokeAllImplicitGroupAccessToSessionResponse
     */
    public function RevokeAllImplicitGroupAccessToSession(RevokeAllImplicitGroupAccessToSession $parameters): RevokeAllImplicitGroupAccessToSessionResponse
    {
      return $this->__soapCall('RevokeAllImplicitGroupAccessToSession', array($parameters));
    }

    /**
     * @param UpdateFolderIsPublic $parameters
     * @return UpdateFolderIsPublicResponse
     */
    public function UpdateFolderIsPublic(UpdateFolderIsPublic $parameters): UpdateFolderIsPublicResponse
    {
      return $this->__soapCall('UpdateFolderIsPublic', array($parameters));
    }

    /**
     * @param UpdateSessionIsPublic $parameters
     * @return UpdateSessionIsPublicResponse
     */
    public function UpdateSessionIsPublic(UpdateSessionIsPublic $parameters): UpdateSessionIsPublicResponse
    {
      return $this->__soapCall('UpdateSessionIsPublic', array($parameters));
    }

    /**
     * @param UpdateSessionInheritViewerAccess $parameters
     * @return UpdateSessionInheritViewerAccessResponse
     */
    public function UpdateSessionInheritViewerAccess(UpdateSessionInheritViewerAccess $parameters): UpdateSessionInheritViewerAccessResponse
    {
      return $this->__soapCall('UpdateSessionInheritViewerAccess', array($parameters));
    }

    /**
     * @param RevokeUsersAccessFromFolder $parameters
     * @return RevokeUsersAccessFromFolderResponse
     */
    public function RevokeUsersAccessFromFolder(RevokeUsersAccessFromFolder $parameters): RevokeUsersAccessFromFolderResponse
    {
      return $this->__soapCall('RevokeUsersAccessFromFolder', array($parameters));
    }

    /**
     * @param RevokeUsersViewerAccessFromSession $parameters
     * @return RevokeUsersViewerAccessFromSessionResponse
     */
    public function RevokeUsersViewerAccessFromSession(RevokeUsersViewerAccessFromSession $parameters): RevokeUsersViewerAccessFromSessionResponse
    {
      return $this->__soapCall('RevokeUsersViewerAccessFromSession', array($parameters));
    }

    /**
     * @param RevokeGroupAccessFromFolder $parameters
     * @return RevokeGroupAccessFromFolderResponse
     */
    public function RevokeGroupAccessFromFolder(RevokeGroupAccessFromFolder $parameters): RevokeGroupAccessFromFolderResponse
    {
      return $this->__soapCall('RevokeGroupAccessFromFolder', array($parameters));
    }

    /**
     * @param RevokeGroupViewerAccessFromSession $parameters
     * @return RevokeGroupViewerAccessFromSessionResponse
     */
    public function RevokeGroupViewerAccessFromSession(RevokeGroupViewerAccessFromSession $parameters): RevokeGroupViewerAccessFromSessionResponse
    {
      return $this->__soapCall('RevokeGroupViewerAccessFromSession', array($parameters));
    }

}
