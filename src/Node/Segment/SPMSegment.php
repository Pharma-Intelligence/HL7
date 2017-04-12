<?php namespace PharmaIntelligence\HL7\Node\Segment;

use DateTime;
use PharmaIntelligence\HL7\Node\Segment;

class SPMSegment extends Segment
{
    const IDENTIFIER = 'SPM';

    public function getSetId()
    {
        return $this->children[0][0]->value;
    }

    public function getSpecimenPlacerId()
    {
        return $this->children[1][0][0]->value;
    }

    public function getSpecimenFillerId()
    {
        return $this->children[1][0][1]->value;
    }

    public function getSpecimenTypeId()
    {
        return $this->children[3][0][0]->value;
    }

    public function getSpecimenTypeText()
    {
        return $this->children[3][0][1]->value;
    }

    public function getSpecimenTypeCodingSystem()
    {
        return $this->children[3][0][2]->value;
    }

    public function getSpecimenCollectionDate()
    {
        return DateTime::createFromFormat("YmdHis.uO", $this->children[16][0]->value);
    }
}