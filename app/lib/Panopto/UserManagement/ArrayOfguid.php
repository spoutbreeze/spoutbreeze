<?php

namespace Panopto\UserManagement;

class ArrayOfguid implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var guid[] $guid
     */
    protected array $guid = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return guid[]|null
     */
    public function getGuid(): ?array
    {
        return $this->guid;
    }

    /**
     * @param guid[]|null $guid
     * @return ArrayOfguid
     */
    public function setGuid(?array $guid = null): ArrayOfguid
    {
        $this->guid = $guid;
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
        return isset($this->guid[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return guid
     */
    public function offsetGet(mixed $offset): guid
    {
        return $this->guid[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param guid $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->guid[] = $value;
        } else {
            $this->guid[$offset] = $value;
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
        unset($this->guid[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return guid Return the current element
     */
    public function current(): guid
    {
        return current($this->guid);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->guid);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->guid);
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
        reset($this->guid);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->guid);
    }

}
