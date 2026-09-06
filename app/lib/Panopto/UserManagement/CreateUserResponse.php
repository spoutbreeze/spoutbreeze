<?php

namespace Panopto\UserManagement;

class CreateUserResponse
{

    /**
     * @var string|null $CreateUserResult
     */
    protected $CreateUserResult = null;

    /**
     * @param string $CreateUserResult
     */
    public function __construct($CreateUserResult)
    {
      $this->CreateUserResult = $CreateUserResult;
    }

    /**
     * @return string
     */
    public function getCreateUserResult()
    {
        return $this->CreateUserResult;
    }

    /**
     * @param string $CreateUserResult
     * @return CreateUserResponse
     */
    public function setCreateUserResult($CreateUserResult): CreateUserResponse
    {
        $this->CreateUserResult = $CreateUserResult;
        return $this;
    }

}
