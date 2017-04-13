<?php namespace PharmaIntelligence\HL7\Node\Segment;

use DateTime;
use PharmaIntelligence\HL7\Node\Segment;

/**
 * The intent of this segment is to describe the characteristics of a specimen. It differs from the intent of the OBR in
 * that the OBR addresses order-specific information. It differs from the SAC segment in that the SAC addresses specimen
 * container attributes. An advantage afforded by a separate specimen segment is that it generalizes the multiple
 * relationships among order(s), results, specimen(s) and specimen container(s).
 */
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