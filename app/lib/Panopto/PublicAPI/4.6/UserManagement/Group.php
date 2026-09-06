<?php

namespace Panopto\UserManagement;

class Group
{

    /**
     * @var string|null $ExternalId
     */
    protected $ExternalId = null;

    /**
     * @var GroupType|null $GroupType
     */
    protected $GroupType = null;

    /**
     * @var string|null $Id
     */
    protected $Id = null;

    /**
     * @var string|null $MembershipProviderName
     */
    protected $MembershipProviderName = null;

    /**
     * @var string|null $Name
     */
    protected $Name = null;

    /**
     * @var SystemRole|null $SystemRole
     */
    protected $SystemRole = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->ExternalId;
    }

    /**
     * @param string $ExternalId
     * @return Group
     */
    public function setExternalId($ExternalId): Group
    {
        $this->ExternalId = $ExternalId;
        return $this;
    }

    /**
     * @return GroupType
     */
    public function getGroupType()
    {
        return $this->GroupType;
    }

    /**
     * @param GroupType $GroupType
     * @return Group
     */
    public function setGroupType($GroupType): Group
    {
        $this->GroupType = $GroupType;
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param string $Id
     * @return Group
     */
    public function setId($Id): Group
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return string
     */
    public function getMembershipProviderName()
    {
        return $this->MembershipProviderName;
    }

    /**
     * @param string $MembershipProviderName
     * @return Group
     */
    public function setMembershipProviderName($MembershipProviderName): Group
    {
        $this->MembershipProviderName = $MembershipProviderName;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     * @return Group
     */
    public function setName($Name): Group
    {
        $this->Name = $Name;
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
     * @return Group
     */
    public function setSystemRole($SystemRole): Group
    {
        $this->SystemRole = $SystemRole;
        return $this;
    }

}
