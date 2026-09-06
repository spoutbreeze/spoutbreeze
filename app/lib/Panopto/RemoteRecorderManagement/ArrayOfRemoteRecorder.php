<?php

namespace Panopto\RemoteRecorderManagement;

class ArrayOfRemoteRecorder implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var RemoteRecorder[] $RemoteRecorder
     */
    protected array $RemoteRecorder = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return RemoteRecorder[]|null
     */
    public function getRemoteRecorder(): ?array
    {
        return $this->RemoteRecorder;
    }

    /**
     * @param RemoteRecorder[]|null $RemoteRecorder
     * @return ArrayOfRemoteRecorder
     */
    public function setRemoteRecorder(?array $RemoteRecorder = null): ArrayOfRemoteRecorder
    {
        $this->RemoteRecorder = $RemoteRecorder;
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
        return isset($this->RemoteRecorder[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return RemoteRecorder
     */
    public function offsetGet(mixed $offset): RemoteRecorder
    {
        return $this->RemoteRecorder[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param RemoteRecorder $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->RemoteRecorder[] = $value;
        } else {
            $this->RemoteRecorder[$offset] = $value;
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
        unset($this->RemoteRecorder[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return RemoteRecorder Return the current element
     */
    public function current(): RemoteRecorder
    {
        return current($this->RemoteRecorder);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->RemoteRecorder);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->RemoteRecorder);
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
        reset($this->RemoteRecorder);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->RemoteRecorder);
    }

}
