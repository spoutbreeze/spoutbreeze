<?php

namespace Panopto\UserManagement;

class DeleteGroup
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
     * @param AuthenticationInfo $auth
     * @param string $groupId
     */
    public function __construct($auth, $groupId)
    {
      $this->auth = $auth;
      $this->groupId = $groupId;
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
     * @return DeleteGroup
     */
    public function setAuth($auth): DeleteGroup
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
     * @return DeleteGroup
     */
    public function setGroupId($groupId): DeleteGroup
    {
        $this->groupId = $groupId;
        return $this;
    }

}
