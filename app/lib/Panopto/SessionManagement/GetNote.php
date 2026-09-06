<?php

namespace Panopto\SessionManagement;

class GetNote
{

    /**
     * @var AuthenticationInfo|null $auth
     */
    protected $auth = null;

    /**
     * @var string|null $noteId
     */
    protected $noteId = null;

    /**
     * @var string|null $sessionId
     */
    protected $sessionId = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $noteId
     * @param string $sessionId
     */
    public function __construct($auth, $noteId, $sessionId)
    {
      $this->auth = $auth;
      $this->noteId = $noteId;
      $this->sessionId = $sessionId;
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
     * @return GetNote
     */
    public function setAuth($auth): GetNote
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return string
     */
    public function getNoteId()
    {
        return $this->noteId;
    }

    /**
     * @param string $noteId
     * @return GetNote
     */
    public function setNoteId($noteId): GetNote
    {
        $this->noteId = $noteId;
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
     * @return GetNote
     */
    public function setSessionId($sessionId): GetNote
    {
        $this->sessionId = $sessionId;
        return $this;
    }

}
