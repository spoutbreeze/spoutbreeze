<?php

namespace Panopto\UsageReporting;

class ArrayOfDetailedUsageResponseItem implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var DetailedUsageResponseItem[] $DetailedUsageResponseItem
     */
    protected array $DetailedUsageResponseItem = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return DetailedUsageResponseItem[]|null
     */
    public function getDetailedUsageResponseItem(): ?array
    {
        return $this->DetailedUsageResponseItem;
    }

    /**
     * @param DetailedUsageResponseItem[]|null $DetailedUsageResponseItem
     * @return ArrayOfDetailedUsageResponseItem
     */
    public function setDetailedUsageResponseItem(?array $DetailedUsageResponseItem = null): ArrayOfDetailedUsageResponseItem
    {
        $this->DetailedUsageResponseItem = $DetailedUsageResponseItem;
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
        return isset($this->DetailedUsageResponseItem[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return DetailedUsageResponseItem
     */
    public function offsetGet(mixed $offset): DetailedUsageResponseItem
    {
        return $this->DetailedUsageResponseItem[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param DetailedUsageResponseItem $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->DetailedUsageResponseItem[] = $value;
        } else {
            $this->DetailedUsageResponseItem[$offset] = $value;
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
        unset($this->DetailedUsageResponseItem[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return DetailedUsageResponseItem Return the current element
     */
    public function current(): DetailedUsageResponseItem
    {
        return current($this->DetailedUsageResponseItem);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->DetailedUsageResponseItem);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->DetailedUsageResponseItem);
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
        reset($this->DetailedUsageResponseItem);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->DetailedUsageResponseItem);
    }

}
