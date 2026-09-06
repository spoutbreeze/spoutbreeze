<?php

namespace Panopto\UsageReporting;

class ArrayOfStatsReportType implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var StatsReportType[] $StatsReportType
     */
    protected array $StatsReportType = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return StatsReportType[]|null
     */
    public function getStatsReportType(): ?array
    {
        return $this->StatsReportType;
    }

    /**
     * @param StatsReportType[]|null $StatsReportType
     * @return ArrayOfStatsReportType
     */
    public function setStatsReportType(?array $StatsReportType = null): ArrayOfStatsReportType
    {
        $this->StatsReportType = $StatsReportType;
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
        return isset($this->StatsReportType[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return StatsReportType
     */
    public function offsetGet(mixed $offset): StatsReportType
    {
        return $this->StatsReportType[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param StatsReportType $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->StatsReportType[] = $value;
        } else {
            $this->StatsReportType[$offset] = $value;
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
        unset($this->StatsReportType[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return StatsReportType Return the current element
     */
    public function current(): StatsReportType
    {
        return current($this->StatsReportType);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->StatsReportType);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->StatsReportType);
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
        reset($this->StatsReportType);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->StatsReportType);
    }

}
