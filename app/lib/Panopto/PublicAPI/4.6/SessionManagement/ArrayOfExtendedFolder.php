<?php

namespace Panopto\SessionManagement;

class ArrayOfExtendedFolder implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var ExtendedFolder[] $ExtendedFolder
     */
    protected array $ExtendedFolder = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return ExtendedFolder[]|null
     */
    public function getExtendedFolder(): ?array
    {
        return $this->ExtendedFolder;
    }

    /**
     * @param ExtendedFolder[]|null $ExtendedFolder
     * @return ArrayOfExtendedFolder
     */
    public function setExtendedFolder(?array $ExtendedFolder = null): ArrayOfExtendedFolder
    {
        $this->ExtendedFolder = $ExtendedFolder;
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
        return isset($this->ExtendedFolder[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return ExtendedFolder
     */
    public function offsetGet(mixed $offset): ExtendedFolder
    {
        return $this->ExtendedFolder[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param ExtendedFolder $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->ExtendedFolder[] = $value;
        } else {
            $this->ExtendedFolder[$offset] = $value;
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
        unset($this->ExtendedFolder[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return ExtendedFolder Return the current element
     */
    public function current(): ExtendedFolder
    {
        return current($this->ExtendedFolder);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->ExtendedFolder);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->ExtendedFolder);
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
        reset($this->ExtendedFolder);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->ExtendedFolder);
    }

}
