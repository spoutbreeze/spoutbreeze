<?php

namespace Panopto\SessionManagement;

class EditNote
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
     * @var string|null $newText
     */
    protected $newText = null;

    /**
     * @param AuthenticationInfo $auth
     * @param string $noteId
     * @param string $sessionId
     * @param string $newText
     */
    public function __construct($auth, $noteId, $sessionId, $newText)
    {
      $this->auth = $auth;
      $this->noteId = $noteId;
      $this->sessionId = $sessionId;
      $this->newText = $newText;
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
     * @return EditNote
     */
    public function setAuth($auth): EditNote
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
     * @return EditNote
     */
    public function setNoteId($noteId): EditNote
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
     * @return EditNote
     */
    public function setSessionId($sessionId): EditNote
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getNewText()
    {
        return $this->newText;
    }

    /**
     * @param string $newText
     * @return EditNote
     */
    public function setNewText($newText): EditNote
    {
        $this->newText = $newText;
        return $this;
    }

}
