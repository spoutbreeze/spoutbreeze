<?php


 function autoload_ce096417baeee140338215f53f5a5487($class): void
{
    $classes = array(
        'Panopto\UserManagement\UserManagement' => __DIR__ .'/UserManagement.php',
        'Panopto\UserManagement\ArrayOfguid' => __DIR__ .'/ArrayOfguid.php',
        'Panopto\UserManagement\ArrayOfstring' => __DIR__ .'/ArrayOfstring.php',
        'Panopto\UserManagement\AuthenticationInfo' => __DIR__ .'/AuthenticationInfo.php',
        'Panopto\UserManagement\User' => __DIR__ .'/User.php',
        'Panopto\UserManagement\SystemRole' => __DIR__ .'/SystemRole.php',
        'Panopto\UserManagement\ArrayOfUser' => __DIR__ .'/ArrayOfUser.php',
        'Panopto\UserManagement\ListUsersRequest' => __DIR__ .'/ListUsersRequest.php',
        'Panopto\UserManagement\Pagination' => __DIR__ .'/Pagination.php',
        'Panopto\UserManagement\UserSortField' => __DIR__ .'/UserSortField.php',
        'Panopto\UserManagement\ListUsersResponse' => __DIR__ .'/ListUsersResponse.php',
        'Panopto\UserManagement\Group' => __DIR__ .'/Group.php',
        'Panopto\UserManagement\GroupType' => __DIR__ .'/GroupType.php',
        'Panopto\UserManagement\ListGroupsResponse' => __DIR__ .'/ListGroupsResponse.php',
        'Panopto\UserManagement\ArrayOfGroup' => __DIR__ .'/ArrayOfGroup.php',
        'Panopto\UserManagement\CreateUser' => __DIR__ .'/CreateUser.php',
        'Panopto\UserManagement\CreateUserResponse' => __DIR__ .'/CreateUserResponse.php',
        'Panopto\UserManagement\CreateUsers' => __DIR__ .'/CreateUsers.php',
        'Panopto\UserManagement\CreateUsersResponse' => __DIR__ .'/CreateUsersResponse.php',
        'Panopto\UserManagement\GetUserByKey' => __DIR__ .'/GetUserByKey.php',
        'Panopto\UserManagement\GetUserByKeyResponse' => __DIR__ .'/GetUserByKeyResponse.php',
        'Panopto\UserManagement\GetUsers' => __DIR__ .'/GetUsers.php',
        'Panopto\UserManagement\GetUsersResponse' => __DIR__ .'/GetUsersResponse.php',
        'Panopto\UserManagement\ListUsers' => __DIR__ .'/ListUsers.php',
        'Panopto\UserManagement\UpdateContactInfo' => __DIR__ .'/UpdateContactInfo.php',
        'Panopto\UserManagement\UpdateContactInfoResponse' => __DIR__ .'/UpdateContactInfoResponse.php',
        'Panopto\UserManagement\UpdateUserBio' => __DIR__ .'/UpdateUserBio.php',
        'Panopto\UserManagement\UpdateUserBioResponse' => __DIR__ .'/UpdateUserBioResponse.php',
        'Panopto\UserManagement\UpdatePassword' => __DIR__ .'/UpdatePassword.php',
        'Panopto\UserManagement\UpdatePasswordResponse' => __DIR__ .'/UpdatePasswordResponse.php',
        'Panopto\UserManagement\ResetPassword' => __DIR__ .'/ResetPassword.php',
        'Panopto\UserManagement\ResetPasswordResponse' => __DIR__ .'/ResetPasswordResponse.php',
        'Panopto\UserManagement\UnlockAccount' => __DIR__ .'/UnlockAccount.php',
        'Panopto\UserManagement\UnlockAccountResponse' => __DIR__ .'/UnlockAccountResponse.php',
        'Panopto\UserManagement\SetSystemRole' => __DIR__ .'/SetSystemRole.php',
        'Panopto\UserManagement\SetSystemRoleResponse' => __DIR__ .'/SetSystemRoleResponse.php',
        'Panopto\UserManagement\DeleteUsers' => __DIR__ .'/DeleteUsers.php',
        'Panopto\UserManagement\DeleteUsersResponse' => __DIR__ .'/DeleteUsersResponse.php',
        'Panopto\UserManagement\CreateInternalGroup' => __DIR__ .'/CreateInternalGroup.php',
        'Panopto\UserManagement\CreateInternalGroupResponse' => __DIR__ .'/CreateInternalGroupResponse.php',
        'Panopto\UserManagement\GetGroupIsPublic' => __DIR__ .'/GetGroupIsPublic.php',
        'Panopto\UserManagement\GetGroupIsPublicResponse' => __DIR__ .'/GetGroupIsPublicResponse.php',
        'Panopto\UserManagement\SetGroupIsPublic' => __DIR__ .'/SetGroupIsPublic.php',
        'Panopto\UserManagement\SetGroupIsPublicResponse' => __DIR__ .'/SetGroupIsPublicResponse.php',
        'Panopto\UserManagement\CreateExternalGroup' => __DIR__ .'/CreateExternalGroup.php',
        'Panopto\UserManagement\CreateExternalGroupResponse' => __DIR__ .'/CreateExternalGroupResponse.php',
        'Panopto\UserManagement\AddMembersToInternalGroup' => __DIR__ .'/AddMembersToInternalGroup.php',
        'Panopto\UserManagement\AddMembersToInternalGroupResponse' => __DIR__ .'/AddMembersToInternalGroupResponse.php',
        'Panopto\UserManagement\RemoveMembersFromInternalGroup' => __DIR__ .'/RemoveMembersFromInternalGroup.php',
        'Panopto\UserManagement\RemoveMembersFromInternalGroupResponse' => __DIR__ .'/RemoveMembersFromInternalGroupResponse.php',
        'Panopto\UserManagement\AddMembersToExternalGroup' => __DIR__ .'/AddMembersToExternalGroup.php',
        'Panopto\UserManagement\AddMembersToExternalGroupResponse' => __DIR__ .'/AddMembersToExternalGroupResponse.php',
        'Panopto\UserManagement\RemoveMembersFromExternalGroup' => __DIR__ .'/RemoveMembersFromExternalGroup.php',
        'Panopto\UserManagement\RemoveMembersFromExternalGroupResponse' => __DIR__ .'/RemoveMembersFromExternalGroupResponse.php',
        'Panopto\UserManagement\SyncExternalUser' => __DIR__ .'/SyncExternalUser.php',
        'Panopto\UserManagement\SyncExternalUserResponse' => __DIR__ .'/SyncExternalUserResponse.php',
        'Panopto\UserManagement\DeleteGroup' => __DIR__ .'/DeleteGroup.php',
        'Panopto\UserManagement\DeleteGroupResponse' => __DIR__ .'/DeleteGroupResponse.php',
        'Panopto\UserManagement\GetGroup' => __DIR__ .'/GetGroup.php',
        'Panopto\UserManagement\GetGroupResponse' => __DIR__ .'/GetGroupResponse.php',
        'Panopto\UserManagement\ListGroups' => __DIR__ .'/ListGroups.php',
        'Panopto\UserManagement\GetGroupsByName' => __DIR__ .'/GetGroupsByName.php',
        'Panopto\UserManagement\GetGroupsByNameResponse' => __DIR__ .'/GetGroupsByNameResponse.php',
        'Panopto\UserManagement\GetUsersInGroup' => __DIR__ .'/GetUsersInGroup.php',
        'Panopto\UserManagement\GetUsersInGroupResponse' => __DIR__ .'/GetUsersInGroupResponse.php',
        'Panopto\UserManagement\SetUserHasLoggedIn' => __DIR__ .'/SetUserHasLoggedIn.php',
        'Panopto\UserManagement\SetUserHasLoggedInResponse' => __DIR__ .'/SetUserHasLoggedInResponse.php',
        'Panopto\UserManagement\GetUserMeetingsRecordingFolderIdForUser' => __DIR__ .'/GetUserMeetingsRecordingFolderIdForUser.php',
        'Panopto\UserManagement\GetUserMeetingsRecordingFolderIdForUserResponse' => __DIR__ .'/GetUserMeetingsRecordingFolderIdForUserResponse.php',
        'Panopto\UserManagement\SetUserMeetingsRecordingFolderIdForUser' => __DIR__ .'/SetUserMeetingsRecordingFolderIdForUser.php',
        'Panopto\UserManagement\SetUserMeetingsRecordingFolderIdForUserResponse' => __DIR__ .'/SetUserMeetingsRecordingFolderIdForUserResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    }
}

spl_autoload_register('autoload_ce096417baeee140338215f53f5a5487');

// Do nothing. The rest is just leftovers from the code generation.
{
}
