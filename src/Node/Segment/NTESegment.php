<?php namespace PharmaIntelligence\HL7\Node\Segment;

use PharmaIntelligence\HL7\Node\Segment;

class NTESegment extends Segment
{
    const IDENTIFIER = 'NTE';

    public function getSetId()
    {
        return $this->children[0][0]->value;
    }

    public function getSourceOfComment()
    {
        return $this->children[1][0]->value;
    }

    public function getComment()
    {
        return $this->children[2][0]->value;
    }
}