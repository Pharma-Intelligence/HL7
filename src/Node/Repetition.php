<?php

namespace PharmaIntelligence\HL7\Node;

#[\AllowDynamicProperties]
class Repetition extends BaseNode
{
    public $value = null;

    public function __construct($value = null)
    {
        $this->value = $value;
    }

    #[\ReturnTypeWillChange]
    public function __toString()
    {
        if (count($this->children) === 0) {
            return $this->value;
        }

        return implode($this->getRootNode()->escapeSequences['component_delimiter'], $this->children);
    }
}
