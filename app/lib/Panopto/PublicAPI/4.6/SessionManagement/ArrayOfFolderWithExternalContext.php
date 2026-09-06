<?php

namespace Panopto\SessionManagement;

class ArrayOfFolderWithExternalContext implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var FolderWithExternalContext[] $FolderWithExternalContext
     */
    protected array $FolderWithExternalContext = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return FolderWithExternalContext[]|null
     */
    public function getFolderWithExternalContext(): ?array
    {
        return $this->FolderWithExternalContext;
    }

    /**
     * @param FolderWithExternalContext[]|null $FolderWithExternalContext
     * @return ArrayOfFolderWithExternalContext
     */
    public function setFolderWithExternalContext(?array $FolderWithExternalContext = null): ArrayOfFolderWithExternalContext
    {
        $this->FolderWithExternalContext = $FolderWithExternalContext;
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
        return isset($this->FolderWithExternalContext[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return FolderWithExternalContext
     */
    public function offsetGet(mixed $offset): FolderWithExternalContext
    {
        return $this->FolderWithExternalContext[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param FolderWithExternalContext $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->FolderWithExternalContext[] = $value;
        } else {
            $this->FolderWithExternalContext[$offset] = $value;
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
        unset($this->FolderWithExternalContext[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return FolderWithExternalContext Return the current element
     */
    public function current(): FolderWithExternalContext
    {
        return current($this->FolderWithExternalContext);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->FolderWithExternalContext);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->FolderWithExternalContext);
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
        reset($this->FolderWithExternalContext);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->FolderWithExternalContext);
    }

}
