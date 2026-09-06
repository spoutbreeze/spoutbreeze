<?php

namespace Panopto\SessionManagement;

class ListSessionsRequest
{

    /**
     * @var \DateTime|string|null $EndDate
     */
    protected \DateTime|string|null $EndDate = null;

    /**
     * @var string|null $FolderId
     */
    protected $FolderId = null;

    /**
     * @var Pagination|null $Pagination
     */
    protected $Pagination = null;

    /**
     * @var string|null $RemoteRecorderId
     */
    protected $RemoteRecorderId = null;

    /**
     * @var SessionSortField|null $SortBy
     */
    protected $SortBy = null;

    /**
     * @var bool|null $SortIncreasing
     */
    protected $SortIncreasing = null;

    /**
     * @var \DateTime|string|null $StartDate
     */
    protected \DateTime|string|null $StartDate = null;

    /**
     * @var ArrayOfSessionState|null $States
     */
    protected $States = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getEndDate(): \DateTime|bool|null
    {
        if ($this->EndDate == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->EndDate);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime|null $EndDate
     * @return ListSessionsRequest
     */
    public function setEndDate(?\DateTime $EndDate = null): ListSessionsRequest
    {
        if ($EndDate == null) {
            $this->EndDate = null;
        } else {
            $this->EndDate = $EndDate->format(\DateTime::ATOM);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getFolderId()
    {
        return $this->FolderId;
    }

    /**
     * @param string $FolderId
     * @return ListSessionsRequest
     */
    public function setFolderId($FolderId): ListSessionsRequest
    {
        $this->FolderId = $FolderId;
        return $this;
    }

    /**
     * @return Pagination
     */
    public function getPagination()
    {
        return $this->Pagination;
    }

    /**
     * @param Pagination $Pagination
     * @return ListSessionsRequest
     */
    public function setPagination($Pagination): ListSessionsRequest
    {
        $this->Pagination = $Pagination;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemoteRecorderId()
    {
        return $this->RemoteRecorderId;
    }

    /**
     * @param string $RemoteRecorderId
     * @return ListSessionsRequest
     */
    public function setRemoteRecorderId($RemoteRecorderId): ListSessionsRequest
    {
        $this->RemoteRecorderId = $RemoteRecorderId;
        return $this;
    }

    /**
     * @return SessionSortField
     */
    public function getSortBy()
    {
        return $this->SortBy;
    }

    /**
     * @param SessionSortField $SortBy
     * @return ListSessionsRequest
     */
    public function setSortBy($SortBy): ListSessionsRequest
    {
        $this->SortBy = $SortBy;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSortIncreasing()
    {
        return $this->SortIncreasing;
    }

    /**
     * @param bool $SortIncreasing
     * @return ListSessionsRequest
     */
    public function setSortIncreasing($SortIncreasing): ListSessionsRequest
    {
        $this->SortIncreasing = $SortIncreasing;
        return $this;
    }

    /**
     * @return \DateTime|bool|null
     */
    public function getStartDate(): \DateTime|bool|null
    {
        if ($this->StartDate == null) {
            return null;
        } else {
            try {
                return new \DateTime($this->StartDate);
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    /**
     * @param \DateTime|null $StartDate
     * @return ListSessionsRequest
     */
    public function setStartDate(?\DateTime $StartDate = null): ListSessionsRequest
    {
        if ($StartDate == null) {
            $this->StartDate = null;
        } else {
            $this->StartDate = $StartDate->format(\DateTime::ATOM);
        }
        return $this;
    }

    /**
     * @return ArrayOfSessionState
     */
    public function getStates()
    {
        return $this->States;
    }

    /**
     * @param ArrayOfSessionState $States
     * @return ListSessionsRequest
     */
    public function setStates($States): ListSessionsRequest
    {
        $this->States = $States;
        return $this;
    }

}
