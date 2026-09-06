<?php

namespace Panopto\SessionManagement;

class SetCopiedExternalCourseAccess
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
     * @return SetCopiedExternalCourseAccess
     */
    public function setAuth($auth): SetCopiedExternalCourseAccess
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
     * @return SetCopiedExternalCourseAccess
     */
    public function setName($name): SetCopiedExternalCourseAccess
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
     * @return SetCopiedExternalCourseAccess
     */
    public function setExternalId($externalId): SetCopiedExternalCourseAccess
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
     * @return SetCopiedExternalCourseAccess
     */
    public function setFolderIds($folderIds): SetCopiedExternalCourseAccess
    {
        $this->folderIds = $folderIds;
        return $this;
    }

}
