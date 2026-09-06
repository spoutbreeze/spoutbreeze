<?php

namespace Panopto\SessionManagement;

class DeleteNote
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
     * @return DeleteNote
     */
    public function setAuth($auth): DeleteNote
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
     * @return DeleteNote
     */
    public function setNoteId($noteId): DeleteNote
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
     * @return DeleteNote
     */
    public function setSessionId($sessionId): DeleteNote
    {
        $this->sessionId = $sessionId;
        return $this;
    }

}
