<?php

namespace PharmaIntelligence\HL7\Node;

#[\AllowDynamicProperties]
abstract class BaseNode implements \ArrayAccess, \Iterator, \Countable
{
    protected $children = [];

    protected $parent = null;

    /**
     * @return \PharmaIntelligence\HL7\Node\Message
     */
    #[\ReturnTypeWillChange]
    public function getRootNode()
    {
        if (is_null($this->parent)) {
            return $this;
        }

        return $this->parent->getRootNode();
    }

    #[\ReturnTypeWillChange]
    public function append(BaseNode $node)
    {
        $node->setParent($this);
        array_push($this->children, $node);
    }

    #[\ReturnTypeWillChange]
    public function setParent(BaseNode $node)
    {
        $this->parent = $node;
    }

    #[\ReturnTypeWillChange]
    public function count()
    {
        return count($this->children);
    }

    #[\ReturnTypeWillChange]
    public abstract function __toString();

    #[\ReturnTypeWillChange]
    public function current()
    {
        return current($this->children);
    }

    #[\ReturnTypeWillChange]
    public function key()
    {
        return key($this->children);
    }

    #[\ReturnTypeWillChange]
    public function next()
    {
        return next($this->children);
    }

    #[\ReturnTypeWillChange]
    public function rewind()
    {
        return reset($this->children);
    }

    #[\ReturnTypeWillChange]
    public function valid()
    {
        return isset($this->children[$this->key()]);
    }

    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->children);
    }

    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->children[$offset];
    }

    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        $this->children[$offset] = $value;
    }

    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->children[$offset]);
    }
}
