<?php


 function autoload_66c23a8ce5a49ca9cd6737d94693e740($class): void
{
    $classes = array(
        'Panopto\AccessManagement\AccessManagement' => __DIR__ .'/AccessManagement.php',
        'Panopto\AccessManagement\ArrayOfguid' => __DIR__ .'/ArrayOfguid.php',
        'Panopto\AccessManagement\AuthenticationInfo' => __DIR__ .'/AuthenticationInfo.php',
        'Panopto\AccessManagement\UserAccessDetails' => __DIR__ .'/UserAccessDetails.php',
        'Panopto\AccessManagement\ArrayOfGroupAccessDetails' => __DIR__ .'/ArrayOfGroupAccessDetails.php',
        'Panopto\AccessManagement\GroupAccessDetails' => __DIR__ .'/GroupAccessDetails.php',
        'Panopto\AccessManagement\SystemRole' => __DIR__ .'/SystemRole.php',
        'Panopto\AccessManagement\SessionAccessDetails' => __DIR__ .'/SessionAccessDetails.php',
        'Panopto\AccessManagement\FolderAccessDetails' => __DIR__ .'/FolderAccessDetails.php',
        'Panopto\AccessManagement\AccessRole' => __DIR__ .'/AccessRole.php',
        'Panopto\AccessManagement\GetUserAccessDetails' => __DIR__ .'/GetUserAccessDetails.php',
        'Panopto\AccessManagement\GetUserAccessDetailsResponse' => __DIR__ .'/GetUserAccessDetailsResponse.php',
        'Panopto\AccessManagement\GetSelfUserAccessDetails' => __DIR__ .'/GetSelfUserAccessDetails.php',
        'Panopto\AccessManagement\GetSelfUserAccessDetailsResponse' => __DIR__ .'/GetSelfUserAccessDetailsResponse.php',
        'Panopto\AccessManagement\GetSessionAccessDetails' => __DIR__ .'/GetSessionAccessDetails.php',
        'Panopto\AccessManagement\GetSessionAccessDetailsResponse' => __DIR__ .'/GetSessionAccessDetailsResponse.php',
        'Panopto\AccessManagement\GetFolderAccessDetails' => __DIR__ .'/GetFolderAccessDetails.php',
        'Panopto\AccessManagement\GetFolderAccessDetailsResponse' => __DIR__ .'/GetFolderAccessDetailsResponse.php',
        'Panopto\AccessManagement\GetGroupAccessDetails' => __DIR__ .'/GetGroupAccessDetails.php',
        'Panopto\AccessManagement\GetGroupAccessDetailsResponse' => __DIR__ .'/GetGroupAccessDetailsResponse.php',
        'Panopto\AccessManagement\GrantUsersAccessToFolder' => __DIR__ .'/GrantUsersAccessToFolder.php',
        'Panopto\AccessManagement\GrantUsersAccessToFolderResponse' => __DIR__ .'/GrantUsersAccessToFolderResponse.php',
        'Panopto\AccessManagement\GrantUsersViewerAccessToSession' => __DIR__ .'/GrantUsersViewerAccessToSession.php',
        'Panopto\AccessManagement\GrantUsersViewerAccessToSessionResponse' => __DIR__ .'/GrantUsersViewerAccessToSessionResponse.php',
        'Panopto\AccessManagement\GrantGroupAccessToFolder' => __DIR__ .'/GrantGroupAccessToFolder.php',
        'Panopto\AccessManagement\GrantGroupAccessToFolderResponse' => __DIR__ .'/GrantGroupAccessToFolderResponse.php',
        'Panopto\AccessManagement\GrantGroupViewerAccessToSession' => __DIR__ .'/GrantGroupViewerAccessToSession.php',
        'Panopto\AccessManagement\GrantGroupViewerAccessToSessionResponse' => __DIR__ .'/GrantGroupViewerAccessToSessionResponse.php',
        'Panopto\AccessManagement\GrantAllAuthenticatedUsersGroupAccessToFolder' => __DIR__ .'/GrantAllAuthenticatedUsersGroupAccessToFolder.php',
        'Panopto\AccessManagement\GrantAllAuthenticatedUsersGroupAccessToFolderResponse' => __DIR__ .'/GrantAllAuthenticatedUsersGroupAccessToFolderResponse.php',
        'Panopto\AccessManagement\GrantAllAuthenticatedUsersGroupAccessToSession' => __DIR__ .'/GrantAllAuthenticatedUsersGroupAccessToSession.php',
        'Panopto\AccessManagement\GrantAllAuthenticatedUsersGroupAccessToSessionResponse' => __DIR__ .'/GrantAllAuthenticatedUsersGroupAccessToSessionResponse.php',
        'Panopto\AccessManagement\GrantPublicGroupAccessToFolder' => __DIR__ .'/GrantPublicGroupAccessToFolder.php',
        'Panopto\AccessManagement\GrantPublicGroupAccessToFolderResponse' => __DIR__ .'/GrantPublicGroupAccessToFolderResponse.php',
        'Panopto\AccessManagement\GrantPublicGroupAccessToSession' => __DIR__ .'/GrantPublicGroupAccessToSession.php',
        'Panopto\AccessManagement\GrantPublicGroupAccessToSessionResponse' => __DIR__ .'/GrantPublicGroupAccessToSessionResponse.php',
        'Panopto\AccessManagement\RevokeAllImplicitGroupAccessToFolder' => __DIR__ .'/RevokeAllImplicitGroupAccessToFolder.php',
        'Panopto\AccessManagement\RevokeAllImplicitGroupAccessToFolderResponse' => __DIR__ .'/RevokeAllImplicitGroupAccessToFolderResponse.php',
        'Panopto\AccessManagement\RevokeAllImplicitGroupAccessToSession' => __DIR__ .'/RevokeAllImplicitGroupAccessToSession.php',
        'Panopto\AccessManagement\RevokeAllImplicitGroupAccessToSessionResponse' => __DIR__ .'/RevokeAllImplicitGroupAccessToSessionResponse.php',
        'Panopto\AccessManagement\UpdateFolderIsPublic' => __DIR__ .'/UpdateFolderIsPublic.php',
        'Panopto\AccessManagement\UpdateFolderIsPublicResponse' => __DIR__ .'/UpdateFolderIsPublicResponse.php',
        'Panopto\AccessManagement\UpdateSessionIsPublic' => __DIR__ .'/UpdateSessionIsPublic.php',
        'Panopto\AccessManagement\UpdateSessionIsPublicResponse' => __DIR__ .'/UpdateSessionIsPublicResponse.php',
        'Panopto\AccessManagement\UpdateSessionInheritViewerAccess' => __DIR__ .'/UpdateSessionInheritViewerAccess.php',
        'Panopto\AccessManagement\UpdateSessionInheritViewerAccessResponse' => __DIR__ .'/UpdateSessionInheritViewerAccessResponse.php',
        'Panopto\AccessManagement\RevokeUsersAccessFromFolder' => __DIR__ .'/RevokeUsersAccessFromFolder.php',
        'Panopto\AccessManagement\RevokeUsersAccessFromFolderResponse' => __DIR__ .'/RevokeUsersAccessFromFolderResponse.php',
        'Panopto\AccessManagement\RevokeUsersViewerAccessFromSession' => __DIR__ .'/RevokeUsersViewerAccessFromSession.php',
        'Panopto\AccessManagement\RevokeUsersViewerAccessFromSessionResponse' => __DIR__ .'/RevokeUsersViewerAccessFromSessionResponse.php',
        'Panopto\AccessManagement\RevokeGroupAccessFromFolder' => __DIR__ .'/RevokeGroupAccessFromFolder.php',
        'Panopto\AccessManagement\RevokeGroupAccessFromFolderResponse' => __DIR__ .'/RevokeGroupAccessFromFolderResponse.php',
        'Panopto\AccessManagement\RevokeGroupViewerAccessFromSession' => __DIR__ .'/RevokeGroupViewerAccessFromSession.php',
        'Panopto\AccessManagement\RevokeGroupViewerAccessFromSessionResponse' => __DIR__ .'/RevokeGroupViewerAccessFromSessionResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    }
}

spl_autoload_register('autoload_66c23a8ce5a49ca9cd6737d94693e740');

// Do nothing. The rest is just leftovers from the code generation.
{
}
