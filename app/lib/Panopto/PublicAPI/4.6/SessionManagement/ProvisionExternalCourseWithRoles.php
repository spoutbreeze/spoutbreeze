<?php

namespace Panopto\SessionManagement;

class ProvisionExternalCourseWithRoles
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $name
     */
    protected $name = null;

    /**
     * @var string|null $externalId
     */
    protected $externalId = null;

    /**
     * @var ArrayOfAccessRole|null $roles
     */
    protected $roles = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $name
     * @param string $externalId
     * @param ArrayOfAccessRole $roles
     */
    public function __construct($auth, $name, $externalId, $roles)
    {
      $this->auth = $auth;
      $this->name = $name;
      $this->externalId = $externalId;
      $this->roles = $roles;
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
     * @return ProvisionExternalCourseWithRoles
     */
    public function setAuth($auth): ProvisionExternalCourseWithRoles
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ProvisionExternalCourseWithRoles
     */
    public function setName($name): ProvisionExternalCourseWithRoles
    {
        $this->name = $name;
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
     * @return ProvisionExternalCourseWithRoles
     */
    public function setExternalId($externalId): ProvisionExternalCourseWithRoles
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return ArrayOfAccessRole
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param ArrayOfAccessRole $roles
     * @return ProvisionExternalCourseWithRoles
     */
    public function setRoles($roles): ProvisionExternalCourseWithRoles
    {
        $this->roles = $roles;
        return $this;
    }

}
