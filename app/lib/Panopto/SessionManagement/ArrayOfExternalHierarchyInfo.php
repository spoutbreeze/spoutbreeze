<?php

namespace Panopto\SessionManagement;

class ArrayOfExternalHierarchyInfo implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var ExternalHierarchyInfo[] $ExternalHierarchyInfo
     */
    protected array $ExternalHierarchyInfo = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return ExternalHierarchyInfo[]|null
     */
    public function getExternalHierarchyInfo(): ?array
    {
        return $this->ExternalHierarchyInfo;
    }

    /**
     * @param ExternalHierarchyInfo[]|null $ExternalHierarchyInfo
     * @return ArrayOfExternalHierarchyInfo
     */
    public function setExternalHierarchyInfo(?array $ExternalHierarchyInfo = null): ArrayOfExternalHierarchyInfo
    {
        $this->ExternalHierarchyInfo = $ExternalHierarchyInfo;
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
        return isset($this->ExternalHierarchyInfo[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return ExternalHierarchyInfo
     */
    public function offsetGet(mixed $offset): ExternalHierarchyInfo
    {
        return $this->ExternalHierarchyInfo[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param ExternalHierarchyInfo $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->ExternalHierarchyInfo[] = $value;
        } else {
            $this->ExternalHierarchyInfo[$offset] = $value;
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
        unset($this->ExternalHierarchyInfo[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return ExternalHierarchyInfo Return the current element
     */
    public function current(): ExternalHierarchyInfo
    {
        return current($this->ExternalHierarchyInfo);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->ExternalHierarchyInfo);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->ExternalHierarchyInfo);
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
        reset($this->ExternalHierarchyInfo);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->ExternalHierarchyInfo);
    }

}
