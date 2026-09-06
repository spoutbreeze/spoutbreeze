<?php

namespace Panopto\SessionManagement;

class ArrayOfAccessRole implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var AccessRole[] $AccessRole
     */
    protected array $AccessRole = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return AccessRole[]|null
     */
    public function getAccessRole(): ?array
    {
        return $this->AccessRole;
    }

    /**
     * @param AccessRole[]|null $AccessRole
     * @return ArrayOfAccessRole
     */
    public function setAccessRole(?array $AccessRole = null): ArrayOfAccessRole
    {
        $this->AccessRole = $AccessRole;
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
        return isset($this->AccessRole[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return AccessRole
     */
    public function offsetGet(mixed $offset): AccessRole
    {
        return $this->AccessRole[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param AccessRole $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->AccessRole[] = $value;
        } else {
            $this->AccessRole[$offset] = $value;
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
        unset($this->AccessRole[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return AccessRole Return the current element
     */
    public function current(): AccessRole
    {
        return current($this->AccessRole);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->AccessRole);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->AccessRole);
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
        reset($this->AccessRole);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->AccessRole);
    }

}
