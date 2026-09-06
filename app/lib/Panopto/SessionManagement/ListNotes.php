<?php

namespace Panopto\SessionManagement;

class ListNotes
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $sessionId
     */
    protected $sessionId = null;

    /**
     * @var Pagination|null $pagination
     */
    protected $pagination = null;

    /**
     * @var string|null $creatorId
     */
    protected $creatorId = null;

    /**
     * @var string|null $channel
     */
    protected $channel = null;

    /**
     * @var string|null $searchQuery
     */
    protected $searchQuery = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $sessionId
     * @param Pagination $pagination
     * @param string $creatorId
     * @param string $channel
     * @param string $searchQuery
     */
    public function __construct($auth, $sessionId, $pagination, $creatorId, $channel, $searchQuery)
    {
      $this->auth = $auth;
      $this->sessionId = $sessionId;
      $this->pagination = $pagination;
      $this->creatorId = $creatorId;
      $this->channel = $channel;
      $this->searchQuery = $searchQuery;
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
     * @return ListNotes
     */
    public function setAuth($auth): ListNotes
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     * @return ListNotes
     */
    public function setSessionId($sessionId): ListNotes
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return Pagination
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * @param Pagination $pagination
     * @return ListNotes
     */
    public function setPagination($pagination): ListNotes
    {
        $this->pagination = $pagination;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatorId()
    {
        return $this->creatorId;
    }

    /**
     * @param string $creatorId
     * @return ListNotes
     */
    public function setCreatorId($creatorId): ListNotes
    {
        $this->creatorId = $creatorId;
        return $this;
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param string $channel
     * @return ListNotes
     */
    public function setChannel($channel): ListNotes
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearchQuery()
    {
        return $this->searchQuery;
    }

    /**
     * @param string $searchQuery
     * @return ListNotes
     */
    public function setSearchQuery($searchQuery): ListNotes
    {
        $this->searchQuery = $searchQuery;
        return $this;
    }

}
