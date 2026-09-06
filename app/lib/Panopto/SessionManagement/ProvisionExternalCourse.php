<?php

namespace Panopto\SessionManagement;

class ProvisionExternalCourse
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
     * @param AuthenticationInfo $auth
     * @param string $name
     * @param string $externalId
     */
    public function __construct($auth, $name, $externalId)
    {
      $this->auth = $auth;
      $this->name = $name;
      $this->externalId = $externalId;
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
     * @return ProvisionExternalCourse
     */
    public function setAuth($auth): ProvisionExternalCourse
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
     * @return ProvisionExternalCourse
     */
    public function setName($name): ProvisionExternalCourse
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
     * @return ProvisionExternalCourse
     */
    public function setExternalId($externalId): ProvisionExternalCourse
    {
        $this->externalId = $externalId;
        return $this;
    }

}
