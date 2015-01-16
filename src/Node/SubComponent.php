<?php
namespace PharmaIntelligence\HL7\Node;

class SubComponent extends BaseNode
{
	public $value = null;
	
	public function __construct($value = null) {
	    $this->value = $value;
	}
	
	public function __toString() {
	    return $this->value;
	}
}

?>