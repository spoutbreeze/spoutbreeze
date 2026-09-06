<?php

namespace Panopto\Auth;

class Auth extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static array $classmap = array (
      'AuthenticationInfo' => 'Panopto\\Auth\\AuthenticationInfo',
      'LogOnWithPassword' => 'Panopto\\Auth\\LogOnWithPassword',
      'LogOnWithPasswordResponse' => 'Panopto\\Auth\\LogOnWithPasswordResponse',
      'LogOnWithExternalProvider' => 'Panopto\\Auth\\LogOnWithExternalProvider',
      'LogOnWithExternalProviderResponse' => 'Panopto\\Auth\\LogOnWithExternalProviderResponse',
      'GetServerVersion' => 'Panopto\\Auth\\GetServerVersion',
      'GetServerVersionResponse' => 'Panopto\\Auth\\GetServerVersionResponse',
      'GetAuthenticatedUrl' => 'Panopto\\Auth\\GetAuthenticatedUrl',
      'GetAuthenticatedUrlResponse' => 'Panopto\\Auth\\GetAuthenticatedUrlResponse',
      'ReportIntegrationInfo' => 'Panopto\\Auth\\ReportIntegrationInfo',
      'ReportIntegrationInfoResponse' => 'Panopto\\Auth\\ReportIntegrationInfoResponse',
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
        $wsdl = 'https://demo.hosted.panopto.com/Panopto/PublicAPI/4.6/Auth.svc?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param LogOnWithPassword $parameters
     * @return LogOnWithPasswordResponse
     */
    public function LogOnWithPassword(LogOnWithPassword $parameters): LogOnWithPasswordResponse
    {
      return $this->__soapCall('LogOnWithPassword', array($parameters));
    }

    /**
     * @param LogOnWithExternalProvider $parameters
     * @return LogOnWithExternalProviderResponse
     */
    public function LogOnWithExternalProvider(LogOnWithExternalProvider $parameters): LogOnWithExternalProviderResponse
    {
      return $this->__soapCall('LogOnWithExternalProvider', array($parameters));
    }

    /**
     * @param GetServerVersion $parameters
     * @return GetServerVersionResponse
     */
    public function GetServerVersion(GetServerVersion $parameters): GetServerVersionResponse
    {
      return $this->__soapCall('GetServerVersion', array($parameters));
    }

    /**
     * @param GetAuthenticatedUrl $parameters
     * @return GetAuthenticatedUrlResponse
     */
    public function GetAuthenticatedUrl(GetAuthenticatedUrl $parameters): GetAuthenticatedUrlResponse
    {
      return $this->__soapCall('GetAuthenticatedUrl', array($parameters));
    }

    /**
     * @param ReportIntegrationInfo $parameters
     * @return ReportIntegrationInfoResponse
     */
    public function ReportIntegrationInfo(ReportIntegrationInfo $parameters): ReportIntegrationInfoResponse
    {
      return $this->__soapCall('ReportIntegrationInfo', array($parameters));
    }

}
