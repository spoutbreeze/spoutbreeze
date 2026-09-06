<?php

namespace Panopto\RemoteRecorderManagement;

class ArrayOfRecorderSettings implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var RecorderSettings[] $RecorderSettings
     */
    protected array $RecorderSettings = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return RecorderSettings[]|null
     */
    public function getRecorderSettings(): ?array
    {
        return $this->RecorderSettings;
    }

    /**
     * @param RecorderSettings[]|null $RecorderSettings
     * @return ArrayOfRecorderSettings
     */
    public function setRecorderSettings(?array $RecorderSettings = null): ArrayOfRecorderSettings
    {
        $this->RecorderSettings = $RecorderSettings;
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
        return isset($this->RecorderSettings[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return RecorderSettings
     */
    public function offsetGet(mixed $offset): RecorderSettings
    {
        return $this->RecorderSettings[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param RecorderSettings $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->RecorderSettings[] = $value;
        } else {
            $this->RecorderSettings[$offset] = $value;
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
        unset($this->RecorderSettings[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return RecorderSettings Return the current element
     */
    public function current(): RecorderSettings
    {
        return current($this->RecorderSettings);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->RecorderSettings);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->RecorderSettings);
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
        reset($this->RecorderSettings);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->RecorderSettings);
    }

}
