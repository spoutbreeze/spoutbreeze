<?php

namespace Panopto\SessionManagement;

class IsDropboxResponse
{

    /**
     * @var bool|null $IsDropboxResult
     */
    protected $IsDropboxResult = null;

    /**
     * @param bool $IsDropboxResult
     */
    public function __construct($IsDropboxResult)
    {
      $this->IsDropboxResult = $IsDropboxResult;
    }

    /**
     * @return bool
     */
    public function getIsDropboxResult()
    {
        return $this->IsDropboxResult;
    }

    /**
     * @param bool $IsDropboxResult
     * @return IsDropboxResponse
     */
    public function setIsDropboxResult($IsDropboxResult): IsDropboxResponse
    {
        $this->IsDropboxResult = $IsDropboxResult;
        return $this;
    }

}
