<?php
namespace PharmaIntelligence\HL7\Node;

use PharmaIntelligence\HL7\Exception\StructureException;

#[\AllowDynamicProperties]
class Segment extends BaseNode
{
    protected $segmentName = '';
    
    public function __construct($segmentName) {
        if(strlen($segmentName) !== 3 || !ctype_alnum($segmentName)) {
            throw new StructureException('Segment name should be 3 characters long, alphanumeric. Received: "'.$segmentName.'"');
        }
        $this->segmentName = $segmentName;
    }

    #[\ReturnTypeWillChange]
    public function getSegmentName() {
        return $this->segmentName;
    }

    #[\ReturnTypeWillChange]
    public function __toString() {
        $children = array_merge(array($this->segmentName), $this->children);
        return implode($this->getRootNode()->escapeSequences['field_delimiter'], $children);
    }
}
