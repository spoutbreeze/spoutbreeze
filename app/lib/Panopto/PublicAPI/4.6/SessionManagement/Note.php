<?php

namespace Panopto\SessionManagement;

class Note
{

    /**
     * @var string|null $Channel
     */
    protected $Channel = null;

    /**
     * @var string|null $CreatorId
     */
    protected $CreatorId = null;

    /**
     * @var string|null $ID
     */
    protected $ID = null;

    /**
     * @var string|null $SessionID
     */
    protected $SessionID = null;

    /**
     * @var string|null $Text
     */
    protected $Text = null;

    /**
     * @var float|null $Timestamp
     */
    protected $Timestamp = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->Channel;
    }

    /**
     * @param string $Channel
     * @return Note
     */
    public function setChannel($Channel): Note
    {
        $this->Channel = $Channel;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatorId()
    {
        return $this->CreatorId;
    }

    /**
     * @param string $CreatorId
     * @return Note
     */
    public function setCreatorId($CreatorId): Note
    {
        $this->CreatorId = $CreatorId;
        return $this;
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param string $ID
     * @return Note
     */
    public function setID($ID): Note
    {
        $this->ID = $ID;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionID()
    {
        return $this->SessionID;
    }

    /**
     * @param string $SessionID
     * @return Note
     */
    public function setSessionID($SessionID): Note
    {
        $this->SessionID = $SessionID;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->Text;
    }

    /**
     * @param string $Text
     * @return Note
     */
    public function setText($Text): Note
    {
        $this->Text = $Text;
        return $this;
    }

    /**
     * @return float
     */
    public function getTimestamp()
    {
        return $this->Timestamp;
    }

    /**
     * @param float $Timestamp
     * @return Note
     */
    public function setTimestamp($Timestamp): Note
    {
        $this->Timestamp = $Timestamp;
        return $this;
    }

}
