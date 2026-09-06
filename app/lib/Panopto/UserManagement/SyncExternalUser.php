<?php

namespace Panopto\UserManagement;

class SyncExternalUser
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $firstName
     */
    protected $firstName = null;

    /**
     * @var string|null $lastName
     */
    protected $lastName = null;

    /**
     * @var string|null $email
     */
    protected $email = null;

    /**
     * @var bool|null $EmailSessionNotifications
     */
    protected $EmailSessionNotifications = null;

    /**
     * @var ArrayOfstring|null $externalGroupIds
     */
    protected $externalGroupIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param bool $EmailSessionNotifications
     * @param ArrayOfstring $externalGroupIds
     */
    public function __construct($auth, $firstName, $lastName, $email, $EmailSessionNotifications, $externalGroupIds)
    {
      $this->auth = $auth;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->email = $email;
      $this->EmailSessionNotifications = $EmailSessionNotifications;
      $this->externalGroupIds = $externalGroupIds;
    }

    /**
     * @return AuthenticationInfo
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param AuthenticationInfo $auth
     * @return SyncExternalUser
     */
    public function setAuth($auth): SyncExternalUser
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return SyncExternalUser
     */
    public function setFirstName($firstName): SyncExternalUser
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return SyncExternalUser
     */
    public function setLastName($lastName): SyncExternalUser
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return SyncExternalUser
     */
    public function setEmail($email): SyncExternalUser
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return bool
     */
    public function getEmailSessionNotifications()
    {
        return $this->EmailSessionNotifications;
    }

    /**
     * @param bool $EmailSessionNotifications
     * @return SyncExternalUser
     */
    public function setEmailSessionNotifications($EmailSessionNotifications): SyncExternalUser
    {
        $this->EmailSessionNotifications = $EmailSessionNotifications;
        return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getExternalGroupIds()
    {
        return $this->externalGroupIds;
    }

    /**
     * @param ArrayOfstring $externalGroupIds
     * @return SyncExternalUser
     */
    public function setExternalGroupIds($externalGroupIds): SyncExternalUser
    {
        $this->externalGroupIds = $externalGroupIds;
        return $this;
    }

}
