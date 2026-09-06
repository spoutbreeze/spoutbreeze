<?php


 function autoload_e5b4eba96e32c1535fca9125bc268bc6($class): void
{
    $classes = array(
        'Panopto\Auth\Auth' => __DIR__ .'/Auth.php',
        'Panopto\Auth\AuthenticationInfo' => __DIR__ .'/AuthenticationInfo.php',
        'Panopto\Auth\LogOnWithPassword' => __DIR__ .'/LogOnWithPassword.php',
        'Panopto\Auth\LogOnWithPasswordResponse' => __DIR__ .'/LogOnWithPasswordResponse.php',
        'Panopto\Auth\LogOnWithExternalProvider' => __DIR__ .'/LogOnWithExternalProvider.php',
        'Panopto\Auth\LogOnWithExternalProviderResponse' => __DIR__ .'/LogOnWithExternalProviderResponse.php',
        'Panopto\Auth\GetServerVersion' => __DIR__ .'/GetServerVersion.php',
        'Panopto\Auth\GetServerVersionResponse' => __DIR__ .'/GetServerVersionResponse.php',
        'Panopto\Auth\GetAuthenticatedUrl' => __DIR__ .'/GetAuthenticatedUrl.php',
        'Panopto\Auth\GetAuthenticatedUrlResponse' => __DIR__ .'/GetAuthenticatedUrlResponse.php',
        'Panopto\Auth\ReportIntegrationInfo' => __DIR__ .'/ReportIntegrationInfo.php',
        'Panopto\Auth\ReportIntegrationInfoResponse' => __DIR__ .'/ReportIntegrationInfoResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    }
}

spl_autoload_register('autoload_e5b4eba96e32c1535fca9125bc268bc6');

// Do nothing. The rest is just leftovers from the code generation.
{
}
