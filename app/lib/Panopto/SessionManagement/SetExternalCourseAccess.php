<?php

namespace Panopto\SessionManagement;

class SetExternalCourseAccess
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
     * @var ArrayOfguid|null $folderIds
     */
    protected $folderIds = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $name
     * @param string $externalId
     * @param ArrayOfguid $folderIds
     */
    public function __construct($auth, $name, $externalId, $folderIds)
    {
      $this->auth = $auth;
      $this->name = $name;
      $this->externalId = $externalId;
      $this->folderIds = $folderIds;
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
     * @return SetExternalCourseAccess
     */
    public function setAuth($auth): SetExternalCourseAccess
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
     * @return SetExternalCourseAccess
     */
    public function setName($name): SetExternalCourseAccess
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
     * @return SetExternalCourseAccess
     */
    public function setExternalId($externalId): SetExternalCourseAccess
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return ArrayOfguid
     */
    public function getFolderIds()
    {
        return $this->folderIds;
    }

    /**
     * @param ArrayOfguid $folderIds
     * @return SetExternalCourseAccess
     */
    public function setFolderIds($folderIds): SetExternalCourseAccess
    {
        $this->folderIds = $folderIds;
        return $this;
    }

}
