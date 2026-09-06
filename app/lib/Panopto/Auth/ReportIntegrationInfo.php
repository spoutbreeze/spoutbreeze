<?php

namespace Panopto\Auth;

class ReportIntegrationInfo
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $idProviderName
     */
    protected $idProviderName = null;

    /**
     * @var string|null $moduleVersion
     */
    protected $moduleVersion = null;

    /**
     * @var string|null $targetPlatformVersion
     */
    protected $targetPlatformVersion = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $idProviderName
     * @param string $moduleVersion
     * @param string $targetPlatformVersion
     */
    public function __construct($auth, $idProviderName, $moduleVersion, $targetPlatformVersion)
    {
      $this->auth = $auth;
      $this->idProviderName = $idProviderName;
      $this->moduleVersion = $moduleVersion;
      $this->targetPlatformVersion = $targetPlatformVersion;
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
     * @return ReportIntegrationInfo
     */
    public function setAuth($auth): ReportIntegrationInfo
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdProviderName()
    {
        return $this->idProviderName;
    }

    /**
     * @param string $idProviderName
     * @return ReportIntegrationInfo
     */
    public function setIdProviderName($idProviderName): ReportIntegrationInfo
    {
        $this->idProviderName = $idProviderName;
        return $this;
    }

    /**
     * @return string
     */
    public function getModuleVersion()
    {
        return $this->moduleVersion;
    }

    /**
     * @param string $moduleVersion
     * @return ReportIntegrationInfo
     */
    public function setModuleVersion($moduleVersion): ReportIntegrationInfo
    {
        $this->moduleVersion = $moduleVersion;
        return $this;
    }

    /**
     * @return string
     */
    public function getTargetPlatformVersion()
    {
        return $this->targetPlatformVersion;
    }

    /**
     * @param string $targetPlatformVersion
     * @return ReportIntegrationInfo
     */
    public function setTargetPlatformVersion($targetPlatformVersion): ReportIntegrationInfo
    {
        $this->targetPlatformVersion = $targetPlatformVersion;
        return $this;
    }

}
