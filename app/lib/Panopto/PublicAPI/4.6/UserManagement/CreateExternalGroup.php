<?php

namespace Panopto\UserManagement;

class CreateExternalGroup
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $groupName
     */
    protected $groupName = null;

    /**
     * @var string|null $externalProvider
     */
    protected $externalProvider = null;

    /**
     * @var string|null $externalId
     */
    protected $externalId = null;

    /**
     * @var ArrayOfguid|null $memberIds
     */
    protected $memberIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $groupName
     * @param string $externalProvider
     * @param string $externalId
     * @param ArrayOfguid $memberIds
     */
    public function __construct($auth, $groupName, $externalProvider, $externalId, $memberIds)
    {
      $this->auth = $auth;
      $this->groupName = $groupName;
      $this->externalProvider = $externalProvider;
      $this->externalId = $externalId;
      $this->memberIds = $memberIds;
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
     * @return CreateExternalGroup
     */
    public function setAuth($auth): CreateExternalGroup
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * @param string $groupName
     * @return CreateExternalGroup
     */
    public function setGroupName($groupName): CreateExternalGroup
    {
        $this->groupName = $groupName;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalProvider()
    {
        return $this->externalProvider;
    }

    /**
     * @param string $externalProvider
     * @return CreateExternalGroup
     */
    public function setExternalProvider($externalProvider): CreateExternalGroup
    {
        $this->externalProvider = $externalProvider;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     * @return CreateExternalGroup
     */
    public function setExternalId($externalId): CreateExternalGroup
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getMemberIds()
    {
        return $this->memberIds;
    }

    /**
     * @param ArrayOfguid $memberIds
     * @return CreateExternalGroup
     */
    public function setMemberIds($memberIds): CreateExternalGroup
    {
        $this->memberIds = $memberIds;
        return $this;
    }

}
