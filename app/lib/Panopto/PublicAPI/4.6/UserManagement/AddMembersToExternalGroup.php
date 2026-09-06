<?php

namespace Panopto\UserManagement;

class AddMembersToExternalGroup
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $externalProviderName
     */
    protected $externalProviderName = null;

    /**
     * @var string|null $externalGroupId
     */
    protected $externalGroupId = null;

    /**
     * @var ArrayOfguid|null $memberIds
     */
    protected $memberIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $externalProviderName
     * @param string $externalGroupId
     * @param ArrayOfguid $memberIds
     */
    public function __construct($auth, $externalProviderName, $externalGroupId, $memberIds)
    {
      $this->auth = $auth;
      $this->externalProviderName = $externalProviderName;
      $this->externalGroupId = $externalGroupId;
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
     * @return AddMembersToExternalGroup
     */
    public function setAuth($auth): AddMembersToExternalGroup
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalProviderName()
    {
        return $this->externalProviderName;
    }

    /**
     * @param string $externalProviderName
     * @return AddMembersToExternalGroup
     */
    public function setExternalProviderName($externalProviderName): AddMembersToExternalGroup
    {
        $this->externalProviderName = $externalProviderName;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalGroupId()
    {
        return $this->externalGroupId;
    }

    /**
     * @param string $externalGroupId
     * @return AddMembersToExternalGroup
     */
    public function setExternalGroupId($externalGroupId): AddMembersToExternalGroup
    {
        $this->externalGroupId = $externalGroupId;
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
     * @return AddMembersToExternalGroup
     */
    public function setMemberIds($memberIds): AddMembersToExternalGroup
    {
        $this->memberIds = $memberIds;
        return $this;
    }

}
