<?php

namespace Panopto\RemoteRecorderManagement;

class ArrayOfScheduledRecordingInfo implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var ScheduledRecordingInfo[] $ScheduledRecordingInfo
     */
    protected array $ScheduledRecordingInfo = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return ScheduledRecordingInfo[]|null
     */
    public function getScheduledRecordingInfo(): ?array
    {
        return $this->ScheduledRecordingInfo;
    }

    /**
     * @param ScheduledRecordingInfo[]|null $ScheduledRecordingInfo
     * @return ArrayOfScheduledRecordingInfo
     */
    public function setScheduledRecordingInfo(?array $ScheduledRecordingInfo = null): ArrayOfScheduledRecordingInfo
    {
        $this->ScheduledRecordingInfo = $ScheduledRecordingInfo;
        return $this;
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset An offset to check for
     * @return bool True on success or false on failure
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->ScheduledRecordingInfo[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return ScheduledRecordingInfo
     */
    public function offsetGet(mixed $offset): ScheduledRecordingInfo
    {
        return $this->ScheduledRecordingInfo[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param ScheduledRecordingInfo $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->ScheduledRecordingInfo[] = $value;
        } else {
            $this->ScheduledRecordingInfo[$offset] = $value;
        }
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to unset
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->ScheduledRecordingInfo[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return ScheduledRecordingInfo Return the current element
     */
    public function current(): ScheduledRecordingInfo
    {
        return current($this->ScheduledRecordingInfo);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->ScheduledRecordingInfo);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->ScheduledRecordingInfo);
    }

    /**
     * Iterator implementation
     *
     * @return bool Return the validity of the current position
     */
    public function valid(): bool
    {
        return $this->key() !== null;
    }

    /**
     * Iterator implementation
     * Rewind the Iterator to the first element
     *
     * @return void
     */
    public function rewind(): void
    {
        reset($this->ScheduledRecordingInfo);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->ScheduledRecordingInfo);
    }

}
