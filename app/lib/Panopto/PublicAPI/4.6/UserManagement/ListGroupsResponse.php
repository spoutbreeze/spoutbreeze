<?php

namespace Panopto\UserManagement;

class ListGroupsResponse
{

    /**
     * @var ListGroupsResponse|null $ListGroupsResult
     */
    protected $ListGroupsResult = null;

    /**
     * @param ListGroupsResponse $ListGroupsResult
     */
    public function __construct($ListGroupsResult)
    {
      $this->ListGroupsResult = $ListGroupsResult;
    }

    /**
     * @return ListGroupsResponse
     */
    public function getListGroupsResult()
    {
        return $this->ListGroupsResult;
    }

    /**
     * @param ListGroupsResponse $ListGroupsResult
     * @return ListGroupsResponse
     */
    public function setListGroupsResult($ListGroupsResult): ListGroupsResponse
    {
        $this->ListGroupsResult = $ListGroupsResult;
        return $this;
    }

}
