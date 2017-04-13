<?php namespace PharmaIntelligence\HL7\Node\Segment;

use DateTime;
use PharmaIntelligence\HL7\Node\Segment;

/**
 * Observation Request segment; Taken from ASTM E1238
 */
class OBRSegment extends Segment
{
    const IDENTIFIER = 'OBR';

    public function getSetId()
    {
        return $this->children[0][0]->value;
    }

    public function getPlacerOrderEntityId()
    {
        return $this->children[1][0][0]->value;
    }

    public function getPlacerOrderNamespaceId()
    {
        return $this->children[1][0][1]->value;
    }

    public function getFillerOrderEntityId()
    {
        return $this->children[2][0][0]->value;
    }

    public function getFillerOrderNamespaceId()
    {
        return $this->children[2][0][1]->value;
    }

    public function getUniversalServiceId()
    {
        return $this->children[3][0][0]->value;
    }

    public function getUniversalServiceName()
    {
        return $this->children[3][0][1]->value;
    }

    public function getUniversalServiceCode()
    {
        return $this->children[3][0][2]->value;
    }

    public function getObservationDate()
    {
        return DateTime::createFromFormat("YmdHis.uO", $this->children[6][0]->value);
    }

    public function getOrderProviderId()
    {
        return $this->children[15][0][0]->value;
    }

    public function getOrderProviderNameLast()
    {
        return $this->children[15][0][1]->value;
    }

    public function getOrderProviderNameFirst()
    {
        return $this->children[15][0][2]->value;
    }

    public function getOrderProviderIdType()
    {
        return $this->children[15][0][12]->value;
    }

    public function getResultsDate()
    {
        return DateTime::createFromFormat("YmdHis.uO", $this->children[21][0]->value);
    }

    public function getResultStatus()
    {
        return $this->children[24][0]->value;
    }

}