<?php

namespace Panopto\SessionManagement;

class ArrayOfSessionAvailabilitySettings implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var SessionAvailabilitySettings[] $SessionAvailabilitySettings
     */
    protected array $SessionAvailabilitySettings = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return SessionAvailabilitySettings[]|null
     */
    public function getSessionAvailabilitySettings(): ?array
    {
        return $this->SessionAvailabilitySettings;
    }

    /**
     * @param SessionAvailabilitySettings[]|null $SessionAvailabilitySettings
     * @return ArrayOfSessionAvailabilitySettings
     */
    public function setSessionAvailabilitySettings(?array $SessionAvailabilitySettings = null): ArrayOfSessionAvailabilitySettings
    {
        $this->SessionAvailabilitySettings = $SessionAvailabilitySettings;
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
        return isset($this->SessionAvailabilitySettings[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return SessionAvailabilitySettings
     */
    public function offsetGet(mixed $offset): SessionAvailabilitySettings
    {
        return $this->SessionAvailabilitySettings[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param SessionAvailabilitySettings $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->SessionAvailabilitySettings[] = $value;
        } else {
            $this->SessionAvailabilitySettings[$offset] = $value;
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
        unset($this->SessionAvailabilitySettings[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return SessionAvailabilitySettings Return the current element
     */
    public function current(): SessionAvailabilitySettings
    {
        return current($this->SessionAvailabilitySettings);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->SessionAvailabilitySettings);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->SessionAvailabilitySettings);
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
        reset($this->SessionAvailabilitySettings);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->SessionAvailabilitySettings);
    }

}
