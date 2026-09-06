<?php

namespace Panopto\SessionManagement;

class AddSession
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
     * @var string|null $folderId
     */
    protected $folderId = null;

    /**
     * @var bool|null $isBroadcast
     */
    protected $isBroadcast = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $name
     * @param string $folderId
     * @param bool $isBroadcast
     */
    public function __construct($auth, $name, $folderId, $isBroadcast)
    {
      $this->auth = $auth;
      $this->name = $name;
      $this->folderId = $folderId;
      $this->isBroadcast = $isBroadcast;
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
     * @return AddSession
     */
    public function setAuth($auth): AddSession
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
     * @return AddSession
     */
    public function setName($name): AddSession
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getFolderId()
    {
        return $this->folderId;
    }

    /**
     * @param string $folderId
     * @return AddSession
     */
    public function setFolderId($folderId): AddSession
    {
        $this->folderId = $folderId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsBroadcast()
    {
        return $this->isBroadcast;
    }

    /**
     * @param bool $isBroadcast
     * @return AddSession
     */
    public function setIsBroadcast($isBroadcast): AddSession
    {
        $this->isBroadcast = $isBroadcast;
        return $this;
    }

}
