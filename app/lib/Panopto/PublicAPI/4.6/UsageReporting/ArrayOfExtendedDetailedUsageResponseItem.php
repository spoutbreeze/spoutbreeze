<?php

namespace Panopto\UsageReporting;

class ArrayOfExtendedDetailedUsageResponseItem implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var ExtendedDetailedUsageResponseItem[] $ExtendedDetailedUsageResponseItem
     */
    protected array $ExtendedDetailedUsageResponseItem = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return ExtendedDetailedUsageResponseItem[]|null
     */
    public function getExtendedDetailedUsageResponseItem(): ?array
    {
        return $this->ExtendedDetailedUsageResponseItem;
    }

    /**
     * @param ExtendedDetailedUsageResponseItem[]|null $ExtendedDetailedUsageResponseItem
     * @return ArrayOfExtendedDetailedUsageResponseItem
     */
    public function setExtendedDetailedUsageResponseItem(?array $ExtendedDetailedUsageResponseItem = null): ArrayOfExtendedDetailedUsageResponseItem
    {
        $this->ExtendedDetailedUsageResponseItem = $ExtendedDetailedUsageResponseItem;
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
        return isset($this->ExtendedDetailedUsageResponseItem[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return ExtendedDetailedUsageResponseItem
     */
    public function offsetGet(mixed $offset): ExtendedDetailedUsageResponseItem
    {
        return $this->ExtendedDetailedUsageResponseItem[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param ExtendedDetailedUsageResponseItem $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->ExtendedDetailedUsageResponseItem[] = $value;
        } else {
            $this->ExtendedDetailedUsageResponseItem[$offset] = $value;
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
        unset($this->ExtendedDetailedUsageResponseItem[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return ExtendedDetailedUsageResponseItem Return the current element
     */
    public function current(): ExtendedDetailedUsageResponseItem
    {
        return current($this->ExtendedDetailedUsageResponseItem);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->ExtendedDetailedUsageResponseItem);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->ExtendedDetailedUsageResponseItem);
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
        reset($this->ExtendedDetailedUsageResponseItem);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->ExtendedDetailedUsageResponseItem);
    }

}
