<?php
namespace PharmaIntelligence\HL7\Node;

abstract class BaseNode implements \ArrayAccess, \Iterator, \Countable
{
    protected $children = array();
    
    protected $parent = null;

    /**
     * 
     * @return \PharmaIntelligence\HL7\Node\Message
     */
    public function getRootNode() {
        if(is_null($this->parent))
            return $this;
        return $this->parent->getRootNode();
    }
    
    public function append(BaseNode $node) {
        $node->setParent($this);
        array_push($this->children, $node);
    }
    
    public function setParent(BaseNode $node) {
        $this->parent = $node;
    }
    
    public function count() {
        return count($this->children);
    }
    
    public abstract function __toString(); 
    
    /*
     * (non-PHPdoc)
     * @see Iterator::current()
     */
    public function current()
    {
        return current($this->children);
    }
    
    /*
     * (non-PHPdoc)
     * @see Iterator::key()
     */
    public function key()
    {
        return key($this->children);
    }
    
    /*
     * (non-PHPdoc)
     * @see Iterator::next()
     */
    public function next()
    {
        return next($this->children);
    }
    
    /*
     * (non-PHPdoc)
     * @see Iterator::rewind()
     */
    public function rewind()
    {
        return reset($this->children);
    }
    
    /*
     * (non-PHPdoc)
     * @see Iterator::valid()
     */
    public function valid()
    {
        return isset($this->children[$this->key()]);
    }
    
    /*
     * (non-PHPdoc)
     * @see ArrayAccess::offsetExists()
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->children);
    }
    
    /*
     * (non-PHPdoc)
     * @see ArrayAccess::offsetGet()
     */
    public function offsetGet($offset)
    {
        return $this->children[$offset];
    }
    
    /*
     * (non-PHPdoc)
     * @see ArrayAccess::offsetSet()
     */
    public function offsetSet($offset, $value)
    {
        $this->children[$offset] = $value;
    }
    
    /*
     * (non-PHPdoc)
     * @see ArrayAccess::offsetUnset()
     */
    public function offsetUnset($offset)
    {
        unset($this->children[$offset]);
    }
}

?>