<?php


 function autoload_d2d5248853c5b185d5a650a0dcdc77a7($class): void
{
    $classes = array(
        'Panopto\UsageReporting\UsageReporting' => __DIR__ .'/UsageReporting.php',
        'Panopto\UsageReporting\AuthenticationInfo' => __DIR__ .'/AuthenticationInfo.php',
        'Panopto\UsageReporting\UsageGranularity' => __DIR__ .'/UsageGranularity.php',
        'Panopto\UsageReporting\ArrayOfSummaryUsageResponseItem' => __DIR__ .'/ArrayOfSummaryUsageResponseItem.php',
        'Panopto\UsageReporting\SummaryUsageResponseItem' => __DIR__ .'/SummaryUsageResponseItem.php',
        'Panopto\UsageReporting\Pagination' => __DIR__ .'/Pagination.php',
        'Panopto\UsageReporting\DetailedUsageResponse' => __DIR__ .'/DetailedUsageResponse.php',
        'Panopto\UsageReporting\ArrayOfDetailedUsageResponseItem' => __DIR__ .'/ArrayOfDetailedUsageResponseItem.php',
        'Panopto\UsageReporting\DetailedUsageResponseItem' => __DIR__ .'/DetailedUsageResponseItem.php',
        'Panopto\UsageReporting\ExtendedDetailedUsageResponse' => __DIR__ .'/ExtendedDetailedUsageResponse.php',
        'Panopto\UsageReporting\ArrayOfExtendedDetailedUsageResponseItem' => __DIR__ .'/ArrayOfExtendedDetailedUsageResponseItem.php',
        'Panopto\UsageReporting\ExtendedDetailedUsageResponseItem' => __DIR__ .'/ExtendedDetailedUsageResponseItem.php',
        'Panopto\UsageReporting\ExtendedDetailedUsageResponseItemStartReasons' => __DIR__ .'/ExtendedDetailedUsageResponseItemStartReasons.php',
        'Panopto\UsageReporting\ExtendedDetailedUsageResponseItemStopReasons' => __DIR__ .'/ExtendedDetailedUsageResponseItemStopReasons.php',
        'Panopto\UsageReporting\ArrayOfStatsReportType' => __DIR__ .'/ArrayOfStatsReportType.php',
        'Panopto\UsageReporting\StatsReportType' => __DIR__ .'/StatsReportType.php',
        'Panopto\UsageReporting\ArrayOfStatsReportStatus' => __DIR__ .'/ArrayOfStatsReportStatus.php',
        'Panopto\UsageReporting\StatsReportStatus' => __DIR__ .'/StatsReportStatus.php',
        'Panopto\UsageReporting\RecurringReportCadence' => __DIR__ .'/RecurringReportCadence.php',
        'Panopto\UsageReporting\ArrayOfRecurringStatsReportDefinition' => __DIR__ .'/ArrayOfRecurringStatsReportDefinition.php',
        'Panopto\UsageReporting\RecurringStatsReportDefinition' => __DIR__ .'/RecurringStatsReportDefinition.php',
        'Panopto\UsageReporting\QuizResultReportType' => __DIR__ .'/QuizResultReportType.php',
        'Panopto\UsageReporting\ArrayOfstring' => __DIR__ .'/ArrayOfstring.php',
        'Panopto\UsageReporting\GetSystemSummaryUsage' => __DIR__ .'/GetSystemSummaryUsage.php',
        'Panopto\UsageReporting\GetSystemSummaryUsageResponse' => __DIR__ .'/GetSystemSummaryUsageResponse.php',
        'Panopto\UsageReporting\GetFolderSummaryUsage' => __DIR__ .'/GetFolderSummaryUsage.php',
        'Panopto\UsageReporting\GetFolderSummaryUsageResponse' => __DIR__ .'/GetFolderSummaryUsageResponse.php',
        'Panopto\UsageReporting\GetSessionSummaryUsage' => __DIR__ .'/GetSessionSummaryUsage.php',
        'Panopto\UsageReporting\GetSessionSummaryUsageResponse' => __DIR__ .'/GetSessionSummaryUsageResponse.php',
        'Panopto\UsageReporting\GetSessionDetailedUsage' => __DIR__ .'/GetSessionDetailedUsage.php',
        'Panopto\UsageReporting\GetSessionDetailedUsageResponse' => __DIR__ .'/GetSessionDetailedUsageResponse.php',
        'Panopto\UsageReporting\GetSessionExtendedDetailedUsage' => __DIR__ .'/GetSessionExtendedDetailedUsage.php',
        'Panopto\UsageReporting\GetSessionExtendedDetailedUsageResponse' => __DIR__ .'/GetSessionExtendedDetailedUsageResponse.php',
        'Panopto\UsageReporting\GetUserDetailedUsage' => __DIR__ .'/GetUserDetailedUsage.php',
        'Panopto\UsageReporting\GetUserDetailedUsageResponse' => __DIR__ .'/GetUserDetailedUsageResponse.php',
        'Panopto\UsageReporting\GetUserExtendedDetailedUsage' => __DIR__ .'/GetUserExtendedDetailedUsage.php',
        'Panopto\UsageReporting\GetUserExtendedDetailedUsageResponse' => __DIR__ .'/GetUserExtendedDetailedUsageResponse.php',
        'Panopto\UsageReporting\GetSessionUserDetailedUsage' => __DIR__ .'/GetSessionUserDetailedUsage.php',
        'Panopto\UsageReporting\GetSessionUserDetailedUsageResponse' => __DIR__ .'/GetSessionUserDetailedUsageResponse.php',
        'Panopto\UsageReporting\GetSessionUserExtendedDetailedUsage' => __DIR__ .'/GetSessionUserExtendedDetailedUsage.php',
        'Panopto\UsageReporting\GetSessionUserExtendedDetailedUsageResponse' => __DIR__ .'/GetSessionUserExtendedDetailedUsageResponse.php',
        'Panopto\UsageReporting\DescribeReportTypes' => __DIR__ .'/DescribeReportTypes.php',
        'Panopto\UsageReporting\DescribeReportTypesResponse' => __DIR__ .'/DescribeReportTypesResponse.php',
        'Panopto\UsageReporting\DescribeReportType' => __DIR__ .'/DescribeReportType.php',
        'Panopto\UsageReporting\DescribeReportTypeResponse' => __DIR__ .'/DescribeReportTypeResponse.php',
        'Panopto\UsageReporting\GetRecentReports' => __DIR__ .'/GetRecentReports.php',
        'Panopto\UsageReporting\GetRecentReportsResponse' => __DIR__ .'/GetRecentReportsResponse.php',
        'Panopto\UsageReporting\QueueReport' => __DIR__ .'/QueueReport.php',
        'Panopto\UsageReporting\QueueReportResponse' => __DIR__ .'/QueueReportResponse.php',
        'Panopto\UsageReporting\GetReport' => __DIR__ .'/GetReport.php',
        'Panopto\UsageReporting\GetReportResponse' => __DIR__ .'/GetReportResponse.php',
        'Panopto\UsageReporting\CancelReport' => __DIR__ .'/CancelReport.php',
        'Panopto\UsageReporting\CancelReportResponse' => __DIR__ .'/CancelReportResponse.php',
        'Panopto\UsageReporting\CreateRecurringReport' => __DIR__ .'/CreateRecurringReport.php',
        'Panopto\UsageReporting\CreateRecurringReportResponse' => __DIR__ .'/CreateRecurringReportResponse.php',
        'Panopto\UsageReporting\DeleteRecurringReport' => __DIR__ .'/DeleteRecurringReport.php',
        'Panopto\UsageReporting\DeleteRecurringReportResponse' => __DIR__ .'/DeleteRecurringReportResponse.php',
        'Panopto\UsageReporting\GetRecurringReports' => __DIR__ .'/GetRecurringReports.php',
        'Panopto\UsageReporting\GetRecurringReportsResponse' => __DIR__ .'/GetRecurringReportsResponse.php',
        'Panopto\UsageReporting\GetQuizResultDownloadUrl' => __DIR__ .'/GetQuizResultDownloadUrl.php',
        'Panopto\UsageReporting\GetQuizResultDownloadUrlResponse' => __DIR__ .'/GetQuizResultDownloadUrlResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    }
}

spl_autoload_register('autoload_d2d5248853c5b185d5a650a0dcdc77a7');

// Do nothing. The rest is just leftovers from the code generation.
{
}
