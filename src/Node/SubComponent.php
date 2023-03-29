<?php

namespace PharmaIntelligence\HL7\Node;

#[\AllowDynamicProperties]
class SubComponent extends BaseNode
{
    public $value = null;

    public function __construct($value = null)
    {
        $this->value = $value;
    }

    #[\ReturnTypeWillChange]
    public function __toString()
    {
        return $this->value;
    }
}
