<?php

namespace Panopto\SessionManagement;

class SetCopiedExternalCourseAccessForRoles
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
     * @var ArrayOfAccessRole|null $roles
     */
    protected $roles = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $name
     * @param string $externalId
     * @param ArrayOfguid $folderIds
     * @param ArrayOfAccessRole $roles
     */
    public function __construct($auth, $name, $externalId, $folderIds, $roles)
    {
      $this->auth = $auth;
      $this->name = $name;
      $this->externalId = $externalId;
      $this->folderIds = $folderIds;
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
     * @return SetCopiedExternalCourseAccessForRoles
     */
    public function setAuth($auth): SetCopiedExternalCourseAccessForRoles
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
     * @return SetCopiedExternalCourseAccessForRoles
     */
    public function setName($name): SetCopiedExternalCourseAccessForRoles
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
     * @return SetCopiedExternalCourseAccessForRoles
     */
    public function setExternalId($externalId): SetCopiedExternalCourseAccessForRoles
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
     * @return SetCopiedExternalCourseAccessForRoles
     */
    public function setFolderIds($folderIds): SetCopiedExternalCourseAccessForRoles
    {
        $this->folderIds = $folderIds;
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
     * @return SetCopiedExternalCourseAccessForRoles
     */
    public function setRoles($roles): SetCopiedExternalCourseAccessForRoles
    {
        $this->roles = $roles;
        return $this;
    }

}
