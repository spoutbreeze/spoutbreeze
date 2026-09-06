<?php

namespace Panopto\UserManagement;

class UpdateContactInfo
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $userId
     */
    protected $userId = null;

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
     * @var bool|null $sendNotifications
     */
    protected $sendNotifications = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $userId
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param bool $sendNotifications
     */
    public function __construct($auth, $userId, $firstName, $lastName, $email, $sendNotifications)
    {
      $this->auth = $auth;
      $this->userId = $userId;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->email = $email;
      $this->sendNotifications = $sendNotifications;
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
     * @return UpdateContactInfo
     */
    public function setAuth($auth): UpdateContactInfo
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return UpdateContactInfo
     */
    public function setUserId($userId): UpdateContactInfo
    {
        $this->userId = $userId;
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
     * @return UpdateContactInfo
     */
    public function setFirstName($firstName): UpdateContactInfo
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
     * @return UpdateContactInfo
     */
    public function setLastName($lastName): UpdateContactInfo
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
     * @return UpdateContactInfo
     */
    public function setEmail($email): UpdateContactInfo
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSendNotifications()
    {
        return $this->sendNotifications;
    }

    /**
     * @param bool $sendNotifications
     * @return UpdateContactInfo
     */
    public function setSendNotifications($sendNotifications): UpdateContactInfo
    {
        $this->sendNotifications = $sendNotifications;
        return $this;
    }

}
