<?php

namespace Panopto\RemoteRecorderManagement;

class ArrayOfRemoteRecorderDevice implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var RemoteRecorderDevice[] $RemoteRecorderDevice
     */
    protected array $RemoteRecorderDevice = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return RemoteRecorderDevice[]|null
     */
    public function getRemoteRecorderDevice(): ?array
    {
        return $this->RemoteRecorderDevice;
    }

    /**
     * @param RemoteRecorderDevice[]|null $RemoteRecorderDevice
     * @return ArrayOfRemoteRecorderDevice
     */
    public function setRemoteRecorderDevice(?array $RemoteRecorderDevice = null): ArrayOfRemoteRecorderDevice
    {
        $this->RemoteRecorderDevice = $RemoteRecorderDevice;
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
        return isset($this->RemoteRecorderDevice[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return RemoteRecorderDevice
     */
    public function offsetGet(mixed $offset): RemoteRecorderDevice
    {
        return $this->RemoteRecorderDevice[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param RemoteRecorderDevice $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->RemoteRecorderDevice[] = $value;
        } else {
            $this->RemoteRecorderDevice[$offset] = $value;
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
        unset($this->RemoteRecorderDevice[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return RemoteRecorderDevice Return the current element
     */
    public function current(): RemoteRecorderDevice
    {
        return current($this->RemoteRecorderDevice);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->RemoteRecorderDevice);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->RemoteRecorderDevice);
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
        reset($this->RemoteRecorderDevice);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->RemoteRecorderDevice);
    }

}
