<?php

namespace Panopto\UserManagement;

class User
{

    /**
     * @var string|null $Email
     */
    protected $Email = null;

    /**
     * @var bool|null $EmailSessionNotifications
     */
    protected $EmailSessionNotifications = null;

    /**
     * @var string|null $FirstName
     */
    protected $FirstName = null;

    /**
     * @var ArrayOfguid|null $GroupMemberships
     */
    protected $GroupMemberships = null;

    /**
     * @var string|null $LastName
     */
    protected $LastName = null;

    /**
     * @var SystemRole|null $SystemRole
     */
    protected $SystemRole = null;

    /**
     * @var string|null $UserBio
     */
    protected $UserBio = null;

    /**
     * @var string|null $UserId
     */
    protected $UserId = null;

    /**
     * @var string|null $UserKey
     */
    protected $UserKey = null;

    /**
     * @var string|null $UserSettingsUrl
     */
    protected $UserSettingsUrl = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param string $Email
     * @return User
     */
    public function setEmail($Email): User
    {
        $this->Email = $Email;
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
     * @return User
     */
    public function setEmailSessionNotifications($EmailSessionNotifications): User
    {
        $this->EmailSessionNotifications = $EmailSessionNotifications;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @param string $FirstName
     * @return User
     */
    public function setFirstName($FirstName): User
    {
        $this->FirstName = $FirstName;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getGroupMemberships()
    {
        return $this->GroupMemberships;
    }

    /**
     * @param ArrayOfguid $GroupMemberships
     * @return User
     */
    public function setGroupMemberships($GroupMemberships): User
    {
        $this->GroupMemberships = $GroupMemberships;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @param string $LastName
     * @return User
     */
    public function setLastName($LastName): User
    {
        $this->LastName = $LastName;
        return $this;
    }

    /**
     * @return SystemRole
     */
    public function getSystemRole()
    {
        return $this->SystemRole;
    }

    /**
     * @param SystemRole $SystemRole
     * @return User
     */
    public function setSystemRole($SystemRole): User
    {
        $this->SystemRole = $SystemRole;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserBio()
    {
        return $this->UserBio;
    }

    /**
     * @param string $UserBio
     * @return User
     */
    public function setUserBio($UserBio): User
    {
        $this->UserBio = $UserBio;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * @param string $UserId
     * @return User
     */
    public function setUserId($UserId): User
    {
        $this->UserId = $UserId;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserKey()
    {
        return $this->UserKey;
    }

    /**
     * @param string $UserKey
     * @return User
     */
    public function setUserKey($UserKey): User
    {
        $this->UserKey = $UserKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserSettingsUrl()
    {
        return $this->UserSettingsUrl;
    }

    /**
     * @param string $UserSettingsUrl
     * @return User
     */
    public function setUserSettingsUrl($UserSettingsUrl): User
    {
        $this->UserSettingsUrl = $UserSettingsUrl;
        return $this;
    }

}
