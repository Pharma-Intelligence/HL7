<?php
namespace PharmaIntelligence\HL7\Node\Segment;

use PharmaIntelligence\HL7\Node\Segment;

class MSHSegment extends Segment
{
    const IDENTIFIER = 'MSH';
    
    public function getSendingApplication() {
        return $this->children[1][0]->value;
    }
    
    public function getSendingFacility() {
        return $this->children[2][0]->value;
    }
    
    public function getReceivingApplication() {
        return $this->children[3][0]->value;
    }
    
    public function getReceivingFacility() {
        return $this->children[4][0]->value;
    }
    
    public function getDateTimeOfMessage() {
        return \DateTime::createFromFormat("YmdHis", $this->children[5][0]->value);
    }
    
    public function getMessageType() {
        return (string) $this->children[7][0];
    }
    
    public function getMessageControlId() {
        return $this->children[8][0];
    }
    
    public function getProcessingId() {
        return $this->children[9][0];
    }
    
    public function getVersionId() {
        return $this->children[10][0];
    }
}

?>