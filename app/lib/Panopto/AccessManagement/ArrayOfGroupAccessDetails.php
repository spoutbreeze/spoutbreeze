<?php

namespace Panopto\AccessManagement;

class ArrayOfGroupAccessDetails implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var GroupAccessDetails[] $GroupAccessDetails
     */
    protected array $GroupAccessDetails = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return GroupAccessDetails[]|null
     */
    public function getGroupAccessDetails(): ?array
    {
        return $this->GroupAccessDetails;
    }

    /**
     * @param GroupAccessDetails[]|null $GroupAccessDetails
     * @return ArrayOfGroupAccessDetails
     */
    public function setGroupAccessDetails(?array $GroupAccessDetails = null): ArrayOfGroupAccessDetails
    {
        $this->GroupAccessDetails = $GroupAccessDetails;
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
        return isset($this->GroupAccessDetails[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return GroupAccessDetails
     */
    public function offsetGet(mixed $offset): GroupAccessDetails
    {
        return $this->GroupAccessDetails[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param GroupAccessDetails $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->GroupAccessDetails[] = $value;
        } else {
            $this->GroupAccessDetails[$offset] = $value;
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
        unset($this->GroupAccessDetails[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return GroupAccessDetails Return the current element
     */
    public function current(): GroupAccessDetails
    {
        return current($this->GroupAccessDetails);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->GroupAccessDetails);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->GroupAccessDetails);
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
        reset($this->GroupAccessDetails);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->GroupAccessDetails);
    }

}
