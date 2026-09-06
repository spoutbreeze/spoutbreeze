<?php

namespace Panopto\SessionManagement;

class ArrayOfNote implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var Note[] $Note
     */
    protected array $Note = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return Note[]|null
     */
    public function getNote(): ?array
    {
        return $this->Note;
    }

    /**
     * @param Note[]|null $Note
     * @return ArrayOfNote
     */
    public function setNote(?array $Note = null): ArrayOfNote
    {
        $this->Note = $Note;
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
        return isset($this->Note[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return Note
     */
    public function offsetGet(mixed $offset): Note
    {
        return $this->Note[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param Note $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->Note[] = $value;
        } else {
            $this->Note[$offset] = $value;
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
        unset($this->Note[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return Note Return the current element
     */
    public function current(): Note
    {
        return current($this->Note);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->Note);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->Note);
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
        reset($this->Note);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->Note);
    }

}
