<?php

namespace Panopto\SessionManagement;

class ArrayOfListSessionRTMPStreamKeysResponse implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var ListSessionRTMPStreamKeysResponse[] $ListSessionRTMPStreamKeysResponse
     */
    protected array $ListSessionRTMPStreamKeysResponse = [];

    
    public function __construct()
    {
    
    }

    /**
     * @return ListSessionRTMPStreamKeysResponse[]|null
     */
    public function getListSessionRTMPStreamKeysResponse(): ?array
    {
        return $this->ListSessionRTMPStreamKeysResponse;
    }

    /**
     * @param ListSessionRTMPStreamKeysResponse[]|null $ListSessionRTMPStreamKeysResponse
     * @return ArrayOfListSessionRTMPStreamKeysResponse
     */
    public function setListSessionRTMPStreamKeysResponse(?array $ListSessionRTMPStreamKeysResponse = null): ArrayOfListSessionRTMPStreamKeysResponse
    {
        $this->ListSessionRTMPStreamKeysResponse = $ListSessionRTMPStreamKeysResponse;
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
        return isset($this->ListSessionRTMPStreamKeysResponse[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return ListSessionRTMPStreamKeysResponse
     */
    public function offsetGet(mixed $offset): ListSessionRTMPStreamKeysResponse
    {
        return $this->ListSessionRTMPStreamKeysResponse[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param ListSessionRTMPStreamKeysResponse $value The value to set
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!isset($offset)) {
            $this->ListSessionRTMPStreamKeysResponse[] = $value;
        } else {
            $this->ListSessionRTMPStreamKeysResponse[$offset] = $value;
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
        unset($this->ListSessionRTMPStreamKeysResponse[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return ListSessionRTMPStreamKeysResponse Return the current element
     */
    public function current(): ListSessionRTMPStreamKeysResponse
    {
        return current($this->ListSessionRTMPStreamKeysResponse);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next(): void
    {
        next($this->ListSessionRTMPStreamKeysResponse);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->ListSessionRTMPStreamKeysResponse);
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
        reset($this->ListSessionRTMPStreamKeysResponse);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count(): int
    {
        return count($this->ListSessionRTMPStreamKeysResponse);
    }

}
