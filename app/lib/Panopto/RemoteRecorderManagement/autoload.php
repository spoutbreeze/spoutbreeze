<?php


 function autoload_245e14180df06cf455e7e671ed387763($class): void
{
    $classes = array(
        'Panopto\RemoteRecorderManagement\RemoteRecorderManagement' => __DIR__ .'/RemoteRecorderManagement.php',
        'Panopto\RemoteRecorderManagement\AuthenticationInfo' => __DIR__ .'/AuthenticationInfo.php',
        'Panopto\RemoteRecorderManagement\ArrayOfRemoteRecorderDevice' => __DIR__ .'/ArrayOfRemoteRecorderDevice.php',
        'Panopto\RemoteRecorderManagement\RemoteRecorderDevice' => __DIR__ .'/RemoteRecorderDevice.php',
        'Panopto\RemoteRecorderManagement\RemoteRecorderDeviceType' => __DIR__ .'/RemoteRecorderDeviceType.php',
        'Panopto\RemoteRecorderManagement\RemoteRecorderState' => __DIR__ .'/RemoteRecorderState.php',
        'Panopto\RemoteRecorderManagement\Pagination' => __DIR__ .'/Pagination.php',
        'Panopto\RemoteRecorderManagement\RecorderSortField' => __DIR__ .'/RecorderSortField.php',
        'Panopto\RemoteRecorderManagement\ArrayOfRecorderSettings' => __DIR__ .'/ArrayOfRecorderSettings.php',
        'Panopto\RemoteRecorderManagement\RecorderSettings' => __DIR__ .'/RecorderSettings.php',
        'Panopto\RemoteRecorderManagement\ArrayOfguid' => __DIR__ .'/ArrayOfguid.php',
        'Panopto\RemoteRecorderManagement\ArrayOfstring' => __DIR__ .'/ArrayOfstring.php',
        'Panopto\RemoteRecorderManagement\ArrayOfRemoteRecorder' => __DIR__ .'/ArrayOfRemoteRecorder.php',
        'Panopto\RemoteRecorderManagement\RemoteRecorder' => __DIR__ .'/RemoteRecorder.php',
        'Panopto\RemoteRecorderManagement\ListRecordersResponse' => __DIR__ .'/ListRecordersResponse.php',
        'Panopto\RemoteRecorderManagement\ScheduledRecordingResult' => __DIR__ .'/ScheduledRecordingResult.php',
        'Panopto\RemoteRecorderManagement\ArrayOfScheduledRecordingInfo' => __DIR__ .'/ArrayOfScheduledRecordingInfo.php',
        'Panopto\RemoteRecorderManagement\ScheduledRecordingInfo' => __DIR__ .'/ScheduledRecordingInfo.php',
        'Panopto\RemoteRecorderManagement\ArrayOfDayOfWeek' => __DIR__ .'/ArrayOfDayOfWeek.php',
        'Panopto\RemoteRecorderManagement\DayOfWeek' => __DIR__ .'/DayOfWeek.php',
        'Panopto\RemoteRecorderManagement\GetRemoteRecordersById' => __DIR__ .'/GetRemoteRecordersById.php',
        'Panopto\RemoteRecorderManagement\GetRemoteRecordersByIdResponse' => __DIR__ .'/GetRemoteRecordersByIdResponse.php',
        'Panopto\RemoteRecorderManagement\GetRemoteRecordersByExternalId' => __DIR__ .'/GetRemoteRecordersByExternalId.php',
        'Panopto\RemoteRecorderManagement\GetRemoteRecordersByExternalIdResponse' => __DIR__ .'/GetRemoteRecordersByExternalIdResponse.php',
        'Panopto\RemoteRecorderManagement\UpdateRemoteRecorderExternalId' => __DIR__ .'/UpdateRemoteRecorderExternalId.php',
        'Panopto\RemoteRecorderManagement\UpdateRemoteRecorderExternalIdResponse' => __DIR__ .'/UpdateRemoteRecorderExternalIdResponse.php',
        'Panopto\RemoteRecorderManagement\ListRecorders' => __DIR__ .'/ListRecorders.php',
        'Panopto\RemoteRecorderManagement\ScheduleRecording' => __DIR__ .'/ScheduleRecording.php',
        'Panopto\RemoteRecorderManagement\ScheduleRecordingResponse' => __DIR__ .'/ScheduleRecordingResponse.php',
        'Panopto\RemoteRecorderManagement\ScheduleRecurringRecording' => __DIR__ .'/ScheduleRecurringRecording.php',
        'Panopto\RemoteRecorderManagement\ScheduleRecurringRecordingResponse' => __DIR__ .'/ScheduleRecurringRecordingResponse.php',
        'Panopto\RemoteRecorderManagement\UpdateRecordingTime' => __DIR__ .'/UpdateRecordingTime.php',
        'Panopto\RemoteRecorderManagement\UpdateRecordingTimeResponse' => __DIR__ .'/UpdateRecordingTimeResponse.php',
        'Panopto\RemoteRecorderManagement\UpdateRecordingSettings' => __DIR__ .'/UpdateRecordingSettings.php',
        'Panopto\RemoteRecorderManagement\UpdateRecordingSettingsResponse' => __DIR__ .'/UpdateRecordingSettingsResponse.php',
        'Panopto\RemoteRecorderManagement\GetDefaultFolderForRecorder' => __DIR__ .'/GetDefaultFolderForRecorder.php',
        'Panopto\RemoteRecorderManagement\GetDefaultFolderForRecorderResponse' => __DIR__ .'/GetDefaultFolderForRecorderResponse.php',
        'Panopto\RemoteRecorderManagement\GetMachineSidForRecorder' => __DIR__ .'/GetMachineSidForRecorder.php',
        'Panopto\RemoteRecorderManagement\GetMachineSidForRecorderResponse' => __DIR__ .'/GetMachineSidForRecorderResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    }
}

spl_autoload_register('autoload_245e14180df06cf455e7e671ed387763');

// Do nothing. The rest is just leftovers from the code generation.
{
}
