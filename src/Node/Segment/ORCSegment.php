<?php namespace PharmaIntelligence\HL7\Node\Segment;

use PharmaIntelligence\HL7\Node\Segment;

/**
 * The Common Order segment (ORC) is used to transmit fields that are common to all orders (all types of services that
 * are requested). The ORC segment is required in the Order (ORM) message. ORC is mandatory in Order Acknowledgment
 * (ORR) messages if an order detail segment is present, but is not required otherwise.
 */
class ORCSegment extends Segment
{
    const IDENTIFIER = 'ORC';

    public function getOrderControl()
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

    public function getOrderStatus()
    {
        return $this->children[4][0]->value;
    }

    public function getOrderVerifierId()
    {
        return $this->children[10][0][0]->value;
    }

    public function getOrderVerifierNameLast()
    {
        return $this->children[10][0][1]->value;
    }

    public function getOrderVerifierNameFirst()
    {
        return $this->children[10][0][2]->value;
    }

    public function getOrderVerifierIdType()
    {
        return $this->children[10][0][12]->value;
    }

    public function getOrderProviderId()
    {
        return $this->children[11][0][0]->value;
    }

    public function getOrderProviderNameLast()
    {
        return $this->children[11][0][1]->value;
    }

    public function getOrderProviderNameFirst()
    {
        return $this->children[11][0][2]->value;
    }

    public function getOrderProviderIdType()
    {
        return $this->children[11][0][12]->value;
    }

    public function getOrderFacilityOrganizationName()
    {
        return $this->children[20][0][0]->value;
    }

    public function getOrderFacilityOrganizationId()
    {
        return $this->children[20][0][9]->value;
    }

    public function getOrderFacilityAddressStreet()
    {
        return $this->children[21][0][0]->value;
    }

    public function getOrderFacilityAddressOtherDesignation()
    {
        return $this->children[21][0][1]->value;
    }

    public function getOrderFacilityAddressCity()
    {
        return $this->children[21][0][2]->value;
    }

    public function getOrderFacilityAddressState()
    {
        return $this->children[21][0][3]->value;
    }

    public function getOrderFacilityAddressPostalCode()
    {
        return $this->children[21][0][4]->value;
    }

    public function getOrderFacilityAddressType()
    {
        return $this->children[21][0][6]->value;
    }

    public function getOrderFacilityAddressCounty()
    {
        return $this->children[21][0][8]->value;
    }

}