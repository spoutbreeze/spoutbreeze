<?php

namespace Panopto\UsageReporting;

class UsageReporting extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static array $classmap = array (
      'AuthenticationInfo' => 'Panopto\\UsageReporting\\AuthenticationInfo',
      'ArrayOfSummaryUsageResponseItem' => 'Panopto\\UsageReporting\\ArrayOfSummaryUsageResponseItem',
      'SummaryUsageResponseItem' => 'Panopto\\UsageReporting\\SummaryUsageResponseItem',
      'Pagination' => 'Panopto\\UsageReporting\\Pagination',
      'DetailedUsageResponse' => 'Panopto\\UsageReporting\\DetailedUsageResponse',
      'ArrayOfDetailedUsageResponseItem' => 'Panopto\\UsageReporting\\ArrayOfDetailedUsageResponseItem',
      'DetailedUsageResponseItem' => 'Panopto\\UsageReporting\\DetailedUsageResponseItem',
      'ExtendedDetailedUsageResponse' => 'Panopto\\UsageReporting\\ExtendedDetailedUsageResponse',
      'ArrayOfExtendedDetailedUsageResponseItem' => 'Panopto\\UsageReporting\\ArrayOfExtendedDetailedUsageResponseItem',
      'ExtendedDetailedUsageResponseItem' => 'Panopto\\UsageReporting\\ExtendedDetailedUsageResponseItem',
      'ArrayOfStatsReportType' => 'Panopto\\UsageReporting\\ArrayOfStatsReportType',
      'ArrayOfStatsReportStatus' => 'Panopto\\UsageReporting\\ArrayOfStatsReportStatus',
      'StatsReportStatus' => 'Panopto\\UsageReporting\\StatsReportStatus',
      'ArrayOfRecurringStatsReportDefinition' => 'Panopto\\UsageReporting\\ArrayOfRecurringStatsReportDefinition',
      'RecurringStatsReportDefinition' => 'Panopto\\UsageReporting\\RecurringStatsReportDefinition',
      'ArrayOfstring' => 'Panopto\\UsageReporting\\ArrayOfstring',
      'GetSystemSummaryUsage' => 'Panopto\\UsageReporting\\GetSystemSummaryUsage',
      'GetSystemSummaryUsageResponse' => 'Panopto\\UsageReporting\\GetSystemSummaryUsageResponse',
      'GetFolderSummaryUsage' => 'Panopto\\UsageReporting\\GetFolderSummaryUsage',
      'GetFolderSummaryUsageResponse' => 'Panopto\\UsageReporting\\GetFolderSummaryUsageResponse',
      'GetSessionSummaryUsage' => 'Panopto\\UsageReporting\\GetSessionSummaryUsage',
      'GetSessionSummaryUsageResponse' => 'Panopto\\UsageReporting\\GetSessionSummaryUsageResponse',
      'GetSessionDetailedUsage' => 'Panopto\\UsageReporting\\GetSessionDetailedUsage',
      'GetSessionDetailedUsageResponse' => 'Panopto\\UsageReporting\\GetSessionDetailedUsageResponse',
      'GetSessionExtendedDetailedUsage' => 'Panopto\\UsageReporting\\GetSessionExtendedDetailedUsage',
      'GetSessionExtendedDetailedUsageResponse' => 'Panopto\\UsageReporting\\GetSessionExtendedDetailedUsageResponse',
      'GetUserDetailedUsage' => 'Panopto\\UsageReporting\\GetUserDetailedUsage',
      'GetUserDetailedUsageResponse' => 'Panopto\\UsageReporting\\GetUserDetailedUsageResponse',
      'GetUserExtendedDetailedUsage' => 'Panopto\\UsageReporting\\GetUserExtendedDetailedUsage',
      'GetUserExtendedDetailedUsageResponse' => 'Panopto\\UsageReporting\\GetUserExtendedDetailedUsageResponse',
      'GetSessionUserDetailedUsage' => 'Panopto\\UsageReporting\\GetSessionUserDetailedUsage',
      'GetSessionUserDetailedUsageResponse' => 'Panopto\\UsageReporting\\GetSessionUserDetailedUsageResponse',
      'GetSessionUserExtendedDetailedUsage' => 'Panopto\\UsageReporting\\GetSessionUserExtendedDetailedUsage',
      'GetSessionUserExtendedDetailedUsageResponse' => 'Panopto\\UsageReporting\\GetSessionUserExtendedDetailedUsageResponse',
      'DescribeReportTypes' => 'Panopto\\UsageReporting\\DescribeReportTypes',
      'DescribeReportTypesResponse' => 'Panopto\\UsageReporting\\DescribeReportTypesResponse',
      'DescribeReportType' => 'Panopto\\UsageReporting\\DescribeReportType',
      'DescribeReportTypeResponse' => 'Panopto\\UsageReporting\\DescribeReportTypeResponse',
      'GetRecentReports' => 'Panopto\\UsageReporting\\GetRecentReports',
      'GetRecentReportsResponse' => 'Panopto\\UsageReporting\\GetRecentReportsResponse',
      'QueueReport' => 'Panopto\\UsageReporting\\QueueReport',
      'QueueReportResponse' => 'Panopto\\UsageReporting\\QueueReportResponse',
      'GetReport' => 'Panopto\\UsageReporting\\GetReport',
      'GetReportResponse' => 'Panopto\\UsageReporting\\GetReportResponse',
      'CancelReport' => 'Panopto\\UsageReporting\\CancelReport',
      'CancelReportResponse' => 'Panopto\\UsageReporting\\CancelReportResponse',
      'CreateRecurringReport' => 'Panopto\\UsageReporting\\CreateRecurringReport',
      'CreateRecurringReportResponse' => 'Panopto\\UsageReporting\\CreateRecurringReportResponse',
      'DeleteRecurringReport' => 'Panopto\\UsageReporting\\DeleteRecurringReport',
      'DeleteRecurringReportResponse' => 'Panopto\\UsageReporting\\DeleteRecurringReportResponse',
      'GetRecurringReports' => 'Panopto\\UsageReporting\\GetRecurringReports',
      'GetRecurringReportsResponse' => 'Panopto\\UsageReporting\\GetRecurringReportsResponse',
      'GetQuizResultDownloadUrl' => 'Panopto\\UsageReporting\\GetQuizResultDownloadUrl',
      'GetQuizResultDownloadUrlResponse' => 'Panopto\\UsageReporting\\GetQuizResultDownloadUrlResponse',
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
        $wsdl = 'https://demo.hosted.panopto.com/Panopto/PublicAPI/4.6/UsageReporting.svc?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param GetSystemSummaryUsage $parameters
     * @return GetSystemSummaryUsageResponse
     */
    public function GetSystemSummaryUsage(GetSystemSummaryUsage $parameters): GetSystemSummaryUsageResponse
    {
      return $this->__soapCall('GetSystemSummaryUsage', array($parameters));
    }

    /**
     * @param GetFolderSummaryUsage $parameters
     * @return GetFolderSummaryUsageResponse
     */
    public function GetFolderSummaryUsage(GetFolderSummaryUsage $parameters): GetFolderSummaryUsageResponse
    {
      return $this->__soapCall('GetFolderSummaryUsage', array($parameters));
    }

    /**
     * @param GetSessionSummaryUsage $parameters
     * @return GetSessionSummaryUsageResponse
     */
    public function GetSessionSummaryUsage(GetSessionSummaryUsage $parameters): GetSessionSummaryUsageResponse
    {
      return $this->__soapCall('GetSessionSummaryUsage', array($parameters));
    }

    /**
     * @param GetSessionDetailedUsage $parameters
     * @return GetSessionDetailedUsageResponse
     */
    public function GetSessionDetailedUsage(GetSessionDetailedUsage $parameters): GetSessionDetailedUsageResponse
    {
      return $this->__soapCall('GetSessionDetailedUsage', array($parameters));
    }

    /**
     * @param GetSessionExtendedDetailedUsage $parameters
     * @return GetSessionExtendedDetailedUsageResponse
     */
    public function GetSessionExtendedDetailedUsage(GetSessionExtendedDetailedUsage $parameters): GetSessionExtendedDetailedUsageResponse
    {
      return $this->__soapCall('GetSessionExtendedDetailedUsage', array($parameters));
    }

    /**
     * @param GetUserDetailedUsage $parameters
     * @return GetUserDetailedUsageResponse
     */
    public function GetUserDetailedUsage(GetUserDetailedUsage $parameters): GetUserDetailedUsageResponse
    {
      return $this->__soapCall('GetUserDetailedUsage', array($parameters));
    }

    /**
     * @param GetUserExtendedDetailedUsage $parameters
     * @return GetUserExtendedDetailedUsageResponse
     */
    public function GetUserExtendedDetailedUsage(GetUserExtendedDetailedUsage $parameters): GetUserExtendedDetailedUsageResponse
    {
      return $this->__soapCall('GetUserExtendedDetailedUsage', array($parameters));
    }

    /**
     * @param GetSessionUserDetailedUsage $parameters
     * @return GetSessionUserDetailedUsageResponse
     */
    public function GetSessionUserDetailedUsage(GetSessionUserDetailedUsage $parameters): GetSessionUserDetailedUsageResponse
    {
      return $this->__soapCall('GetSessionUserDetailedUsage', array($parameters));
    }

    /**
     * @param GetSessionUserExtendedDetailedUsage $parameters
     * @return GetSessionUserExtendedDetailedUsageResponse
     */
    public function GetSessionUserExtendedDetailedUsage(GetSessionUserExtendedDetailedUsage $parameters): GetSessionUserExtendedDetailedUsageResponse
    {
      return $this->__soapCall('GetSessionUserExtendedDetailedUsage', array($parameters));
    }

    /**
     * @param DescribeReportTypes $parameters
     * @return DescribeReportTypesResponse
     */
    public function DescribeReportTypes(DescribeReportTypes $parameters): DescribeReportTypesResponse
    {
      return $this->__soapCall('DescribeReportTypes', array($parameters));
    }

    /**
     * @param DescribeReportType $parameters
     * @return DescribeReportTypeResponse
     */
    public function DescribeReportType(DescribeReportType $parameters): DescribeReportTypeResponse
    {
      return $this->__soapCall('DescribeReportType', array($parameters));
    }

    /**
     * @param GetRecentReports $parameters
     * @return GetRecentReportsResponse
     */
    public function GetRecentReports(GetRecentReports $parameters): GetRecentReportsResponse
    {
      return $this->__soapCall('GetRecentReports', array($parameters));
    }

    /**
     * @param QueueReport $parameters
     * @return QueueReportResponse
     */
    public function QueueReport(QueueReport $parameters): QueueReportResponse
    {
      return $this->__soapCall('QueueReport', array($parameters));
    }

    /**
     * @param GetReport $parameters
     * @return GetReportResponse
     */
    public function GetReport(GetReport $parameters): GetReportResponse
    {
      return $this->__soapCall('GetReport', array($parameters));
    }

    /**
     * @param CancelReport $parameters
     * @return CancelReportResponse
     */
    public function CancelReport(CancelReport $parameters): CancelReportResponse
    {
      return $this->__soapCall('CancelReport', array($parameters));
    }

    /**
     * @param CreateRecurringReport $parameters
     * @return CreateRecurringReportResponse
     */
    public function CreateRecurringReport(CreateRecurringReport $parameters): CreateRecurringReportResponse
    {
      return $this->__soapCall('CreateRecurringReport', array($parameters));
    }

    /**
     * @param DeleteRecurringReport $parameters
     * @return DeleteRecurringReportResponse
     */
    public function DeleteRecurringReport(DeleteRecurringReport $parameters): DeleteRecurringReportResponse
    {
      return $this->__soapCall('DeleteRecurringReport', array($parameters));
    }

    /**
     * @param GetRecurringReports $parameters
     * @return GetRecurringReportsResponse
     */
    public function GetRecurringReports(GetRecurringReports $parameters): GetRecurringReportsResponse
    {
      return $this->__soapCall('GetRecurringReports', array($parameters));
    }

    /**
     * @param GetQuizResultDownloadUrl $parameters
     * @return GetQuizResultDownloadUrlResponse
     */
    public function GetQuizResultDownloadUrl(GetQuizResultDownloadUrl $parameters): GetQuizResultDownloadUrlResponse
    {
      return $this->__soapCall('GetQuizResultDownloadUrl', array($parameters));
    }

}
