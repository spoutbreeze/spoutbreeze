<?php

namespace Panopto\SessionManagement;

class AddFolder
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
     * @var string|null $parentFolder
     */
    protected $parentFolder = null;

    /**
     * @var bool|null $isPublic
     */
    protected $isPublic = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $name
     * @param string $parentFolder
     * @param bool $isPublic
     */
    public function __construct($auth, $name, $parentFolder, $isPublic)
    {
      $this->auth = $auth;
      $this->name = $name;
      $this->parentFolder = $parentFolder;
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
     * @return AddFolder
     */
    public function setAuth($auth): AddFolder
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
     * @return AddFolder
     */
    public function setName($name): AddFolder
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getParentFolder()
    {
        return $this->parentFolder;
    }

    /**
     * @param string $parentFolder
     * @return AddFolder
     */
    public function setParentFolder($parentFolder): AddFolder
    {
        $this->parentFolder = $parentFolder;
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
     * @return AddFolder
     */
    public function setIsPublic($isPublic): AddFolder
    {
        $this->isPublic = $isPublic;
        return $this;
    }

}
