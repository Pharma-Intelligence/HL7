<?php
namespace PharmaIntelligence\HL7\Node;

class Message extends BaseNode
{
    public $escapeSequences = array(
        'field_delimiter' => '|',
        'repeat_delimiter' => '~',
        'component_delimiter' => '^',
        'subcomponent_delimiter' => '&',
        'escape_delimiter' => '\\',
        'cursor_return' => '\r'
    );
    
    public function setEscapeSequences(array $escapeSequences) {
        $this->escapeSequences = array_merge($this->escapeSequences, $escapeSequences);
    }
    
    public function getSegmentsByName($segmentName) {
        $filtered = array_filter($this->children, function($segment) use ($segmentName) {
           if($segment->getSegmentName() === $segmentName)
               return true; 
           return false;
        });
        return array_values($filtered);
    }
    
    public function getMessageHeaderSegment() {
        return $this->children[0];
    }
    
    public function getValueAtIndex($segmentIndex = 0, $fieldIndex = 0, $repetitionIndex = 0, $componentIndex = 0, $subComponentIndex = 0) {
        if(!array_key_exists($segmentIndex, $this->children)) {
            throw new \DomainException('No segment at index "'.$segmentIndex.'"');
        }
        $segment = $this->children[$segmentIndex];
        
        if(!$segment->offsetExists($fieldIndex)) {
            throw new \DomainException('Field is out of bounds at index "'.$fieldIndex.'"');
        }
        $field = $segment[$fieldIndex];
        
        if(!$field->offsetExists($repetitionIndex)) {
            throw new \DomainException('Repetition is out of bounds at index "'.$fieldIndex.'"');
        }
        $repetition = $field[$repetitionIndex];
        
        if(!$repetition->offsetExists($componentIndex)) {
            return $repetition->value;
        }
        
        $component = $repetition[$componentIndex];
        
        if(!$component->offsetExists($subComponentIndex)) {
            return $component->value;
        }
    }
    
    public function __toString() {
        return implode($this->getRootNode()->escapeSequences['cursor_return'], $this->children);
    }
}

?>