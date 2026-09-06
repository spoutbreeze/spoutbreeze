<?php

namespace Panopto\UserManagement;

class SetGroupIsPublic
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $groupId
     */
    protected $groupId = null;

    /**
     * @var bool|null $isPublic
     */
    protected $isPublic = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $groupId
     * @param bool $isPublic
     */
    public function __construct($auth, $groupId, $isPublic)
    {
      $this->auth = $auth;
      $this->groupId = $groupId;
      $this->isPublic = $isPublic;
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
     * @return SetGroupIsPublic
     */
    public function setAuth($auth): SetGroupIsPublic
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param string $groupId
     * @return SetGroupIsPublic
     */
    public function setGroupId($groupId): SetGroupIsPublic
    {
        $this->groupId = $groupId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * @param bool $isPublic
     * @return SetGroupIsPublic
     */
    public function setIsPublic($isPublic): SetGroupIsPublic
    {
        $this->isPublic = $isPublic;
        return $this;
    }

}
