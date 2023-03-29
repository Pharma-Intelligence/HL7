<?php

namespace PharmaIntelligence\HL7\Node;

#[\AllowDynamicProperties]
class Field extends BaseNode
{
    public function __toString()
    {
        return implode($this->getRootNode()->escapeSequences['repeat_delimiter'], $this->children);
    }
}
