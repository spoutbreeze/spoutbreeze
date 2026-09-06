<?php

namespace Panopto\UserManagement;

class ArrayOfGroup implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var Group[] $Group
     */
    protected array $Group = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return Group[]|null
     */
    public function getGroup(): ?array
    {
        return $this->Group;
    }

    /**
     * @param Group[]|null $Group
     * @return ArrayOfGroup
     */
    public function setGroup(?array $Group = null): ArrayOfGroup
    {
        $this->Group = $Group;
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
        return isset($this->Group[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return Group
     */
    public function offsetGet(mixed $offset): Group
    {
        return $this->Group[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param Group $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->Group[] = $value;
        } else {
            $this->Group[$offset] = $value;
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
        unset($this->Group[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return Group Return the current element
     */
    public function current(): Group
    {
        return current($this->Group);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->Group);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->Group);
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
        reset($this->Group);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->Group);
    }

}
