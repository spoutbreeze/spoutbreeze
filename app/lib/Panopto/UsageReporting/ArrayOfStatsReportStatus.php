<?php

namespace Panopto\UsageReporting;

class ArrayOfStatsReportStatus implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var StatsReportStatus[] $StatsReportStatus
     */
    protected array $StatsReportStatus = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return StatsReportStatus[]|null
     */
    public function getStatsReportStatus(): ?array
    {
        return $this->StatsReportStatus;
    }

    /**
     * @param StatsReportStatus[]|null $StatsReportStatus
     * @return ArrayOfStatsReportStatus
     */
    public function setStatsReportStatus(?array $StatsReportStatus = null): ArrayOfStatsReportStatus
    {
        $this->StatsReportStatus = $StatsReportStatus;
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
        return isset($this->StatsReportStatus[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return StatsReportStatus
     */
    public function offsetGet(mixed $offset): StatsReportStatus
    {
        return $this->StatsReportStatus[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param StatsReportStatus $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->StatsReportStatus[] = $value;
        } else {
            $this->StatsReportStatus[$offset] = $value;
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
        unset($this->StatsReportStatus[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return StatsReportStatus Return the current element
     */
    public function current(): StatsReportStatus
    {
        return current($this->StatsReportStatus);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->StatsReportStatus);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->StatsReportStatus);
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
        reset($this->StatsReportStatus);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->StatsReportStatus);
    }

}
