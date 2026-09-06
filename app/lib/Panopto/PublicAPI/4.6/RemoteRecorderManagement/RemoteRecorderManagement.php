<?php

namespace Panopto\RemoteRecorderManagement;

class RemoteRecorderManagement extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static array $classmap = array (
      'AuthenticationInfo' => 'Panopto\\RemoteRecorderManagement\\AuthenticationInfo',
      'ArrayOfRemoteRecorderDevice' => 'Panopto\\RemoteRecorderManagement\\ArrayOfRemoteRecorderDevice',
      'RemoteRecorderDevice' => 'Panopto\\RemoteRecorderManagement\\RemoteRecorderDevice',
      'Pagination' => 'Panopto\\RemoteRecorderManagement\\Pagination',
      'ArrayOfRecorderSettings' => 'Panopto\\RemoteRecorderManagement\\ArrayOfRecorderSettings',
      'RecorderSettings' => 'Panopto\\RemoteRecorderManagement\\RecorderSettings',
      'ArrayOfguid' => 'Panopto\\RemoteRecorderManagement\\ArrayOfguid',
      'ArrayOfstring' => 'Panopto\\RemoteRecorderManagement\\ArrayOfstring',
      'ArrayOfRemoteRecorder' => 'Panopto\\RemoteRecorderManagement\\ArrayOfRemoteRecorder',
      'RemoteRecorder' => 'Panopto\\RemoteRecorderManagement\\RemoteRecorder',
      'ListRecordersResponse' => 'Panopto\\RemoteRecorderManagement\\ListRecordersResponse',
      'ScheduledRecordingResult' => 'Panopto\\RemoteRecorderManagement\\ScheduledRecordingResult',
      'ArrayOfScheduledRecordingInfo' => 'Panopto\\RemoteRecorderManagement\\ArrayOfScheduledRecordingInfo',
      'ScheduledRecordingInfo' => 'Panopto\\RemoteRecorderManagement\\ScheduledRecordingInfo',
      'ArrayOfDayOfWeek' => 'Panopto\\RemoteRecorderManagement\\ArrayOfDayOfWeek',
      'GetRemoteRecordersById' => 'Panopto\\RemoteRecorderManagement\\GetRemoteRecordersById',
      'GetRemoteRecordersByIdResponse' => 'Panopto\\RemoteRecorderManagement\\GetRemoteRecordersByIdResponse',
      'GetRemoteRecordersByExternalId' => 'Panopto\\RemoteRecorderManagement\\GetRemoteRecordersByExternalId',
      'GetRemoteRecordersByExternalIdResponse' => 'Panopto\\RemoteRecorderManagement\\GetRemoteRecordersByExternalIdResponse',
      'UpdateRemoteRecorderExternalId' => 'Panopto\\RemoteRecorderManagement\\UpdateRemoteRecorderExternalId',
      'UpdateRemoteRecorderExternalIdResponse' => 'Panopto\\RemoteRecorderManagement\\UpdateRemoteRecorderExternalIdResponse',
      'ListRecorders' => 'Panopto\\RemoteRecorderManagement\\ListRecorders',
      'ScheduleRecording' => 'Panopto\\RemoteRecorderManagement\\ScheduleRecording',
      'ScheduleRecordingResponse' => 'Panopto\\RemoteRecorderManagement\\ScheduleRecordingResponse',
      'ScheduleRecurringRecording' => 'Panopto\\RemoteRecorderManagement\\ScheduleRecurringRecording',
      'ScheduleRecurringRecordingResponse' => 'Panopto\\RemoteRecorderManagement\\ScheduleRecurringRecordingResponse',
      'UpdateRecordingTime' => 'Panopto\\RemoteRecorderManagement\\UpdateRecordingTime',
      'UpdateRecordingTimeResponse' => 'Panopto\\RemoteRecorderManagement\\UpdateRecordingTimeResponse',
      'UpdateRecordingSettings' => 'Panopto\\RemoteRecorderManagement\\UpdateRecordingSettings',
      'UpdateRecordingSettingsResponse' => 'Panopto\\RemoteRecorderManagement\\UpdateRecordingSettingsResponse',
      'GetDefaultFolderForRecorder' => 'Panopto\\RemoteRecorderManagement\\GetDefaultFolderForRecorder',
      'GetDefaultFolderForRecorderResponse' => 'Panopto\\RemoteRecorderManagement\\GetDefaultFolderForRecorderResponse',
      'GetMachineSidForRecorder' => 'Panopto\\RemoteRecorderManagement\\GetMachineSidForRecorder',
      'GetMachineSidForRecorderResponse' => 'Panopto\\RemoteRecorderManagement\\GetMachineSidForRecorderResponse',
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
        $wsdl = 'https://demo.hosted.panopto.com/Panopto/PublicAPI/4.6/RemoteRecorderManagement.svc?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param GetRemoteRecordersById $parameters
     * @return GetRemoteRecordersByIdResponse
     */
    public function GetRemoteRecordersById(GetRemoteRecordersById $parameters): GetRemoteRecordersByIdResponse
    {
      return $this->__soapCall('GetRemoteRecordersById', array($parameters));
    }

    /**
     * @param GetRemoteRecordersByExternalId $parameters
     * @return GetRemoteRecordersByExternalIdResponse
     */
    public function GetRemoteRecordersByExternalId(GetRemoteRecordersByExternalId $parameters): GetRemoteRecordersByExternalIdResponse
    {
      return $this->__soapCall('GetRemoteRecordersByExternalId', array($parameters));
    }

    /**
     * @param UpdateRemoteRecorderExternalId $parameters
     * @return UpdateRemoteRecorderExternalIdResponse
     */
    public function UpdateRemoteRecorderExternalId(UpdateRemoteRecorderExternalId $parameters): UpdateRemoteRecorderExternalIdResponse
    {
      return $this->__soapCall('UpdateRemoteRecorderExternalId', array($parameters));
    }

    /**
     * @param ListRecorders $parameters
     * @return ListRecordersResponse
     */
    public function ListRecorders(ListRecorders $parameters): ListRecordersResponse
    {
      return $this->__soapCall('ListRecorders', array($parameters));
    }

    /**
     * @param ScheduleRecording $parameters
     * @return ScheduleRecordingResponse
     */
    public function ScheduleRecording(ScheduleRecording $parameters): ScheduleRecordingResponse
    {
      return $this->__soapCall('ScheduleRecording', array($parameters));
    }

    /**
     * @param ScheduleRecurringRecording $parameters
     * @return ScheduleRecurringRecordingResponse
     */
    public function ScheduleRecurringRecording(ScheduleRecurringRecording $parameters): ScheduleRecurringRecordingResponse
    {
      return $this->__soapCall('ScheduleRecurringRecording', array($parameters));
    }

    /**
     * @param UpdateRecordingTime $parameters
     * @return UpdateRecordingTimeResponse
     */
    public function UpdateRecordingTime(UpdateRecordingTime $parameters): UpdateRecordingTimeResponse
    {
      return $this->__soapCall('UpdateRecordingTime', array($parameters));
    }

    /**
     * @param UpdateRecordingSettings $parameters
     * @return UpdateRecordingSettingsResponse
     */
    public function UpdateRecordingSettings(UpdateRecordingSettings $parameters): UpdateRecordingSettingsResponse
    {
      return $this->__soapCall('UpdateRecordingSettings', array($parameters));
    }

    /**
     * @param GetDefaultFolderForRecorder $parameters
     * @return GetDefaultFolderForRecorderResponse
     */
    public function GetDefaultFolderForRecorder(GetDefaultFolderForRecorder $parameters): GetDefaultFolderForRecorderResponse
    {
      return $this->__soapCall('GetDefaultFolderForRecorder', array($parameters));
    }

    /**
     * @param GetMachineSidForRecorder $parameters
     * @return GetMachineSidForRecorderResponse
     */
    public function GetMachineSidForRecorder(GetMachineSidForRecorder $parameters): GetMachineSidForRecorderResponse
    {
      return $this->__soapCall('GetMachineSidForRecorder', array($parameters));
    }

}
