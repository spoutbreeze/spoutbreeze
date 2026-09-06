<?php

namespace Panopto\UsageReporting;

class ArrayOfRecurringStatsReportDefinition implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var RecurringStatsReportDefinition[] $RecurringStatsReportDefinition
     */
    protected array $RecurringStatsReportDefinition = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return RecurringStatsReportDefinition[]|null
     */
    public function getRecurringStatsReportDefinition(): ?array
    {
        return $this->RecurringStatsReportDefinition;
    }

    /**
     * @param RecurringStatsReportDefinition[]|null $RecurringStatsReportDefinition
     * @return ArrayOfRecurringStatsReportDefinition
     */
    public function setRecurringStatsReportDefinition(?array $RecurringStatsReportDefinition = null): ArrayOfRecurringStatsReportDefinition
    {
        $this->RecurringStatsReportDefinition = $RecurringStatsReportDefinition;
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
        return isset($this->RecurringStatsReportDefinition[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return RecurringStatsReportDefinition
     */
    public function offsetGet(mixed $offset): RecurringStatsReportDefinition
    {
        return $this->RecurringStatsReportDefinition[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param RecurringStatsReportDefinition $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->RecurringStatsReportDefinition[] = $value;
        } else {
            $this->RecurringStatsReportDefinition[$offset] = $value;
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
        unset($this->RecurringStatsReportDefinition[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return RecurringStatsReportDefinition Return the current element
     */
    public function current(): RecurringStatsReportDefinition
    {
        return current($this->RecurringStatsReportDefinition);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->RecurringStatsReportDefinition);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->RecurringStatsReportDefinition);
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
        reset($this->RecurringStatsReportDefinition);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->RecurringStatsReportDefinition);
    }

}
