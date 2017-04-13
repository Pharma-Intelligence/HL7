<?php namespace PharmaIntelligence\HL7\Node\Segment;

use DateTime;
use PharmaIntelligence\HL7\Node\Segment;

/**
 * The MSH segment defines the intent, source, destination, and some specifics of the syntax of a message.
 */
class MSHSegment extends Segment
{
    const IDENTIFIER = 'MSH';

    public function getEncodingCharacters()
    {
        return $this->children[0][0]->value;
    }

    public function getSendingApplication()
    {
        return $this->children[1][0]->value;
    }

    public function getSendingFacilityNamespaceId()
    {
        return $this->children[2][0][0]->value;
    }

    public function getSendingFacilityUniversalId()
    {
        return $this->children[2][0][1]->value;
    }

    public function getSendingFacilityUniversalIdType()
    {
        return $this->children[2][0][2]->value;
    }

    public function getReceivingFacility()
    {
        return $this->children[4][0]->value;
    }

    public function getDateTimeOfMessage()
    {
        return DateTime::createFromFormat("YmdHis.uO", $this->children[5][0]->value);
    }

    public function getMessageType()
    {
        return (string)$this->children[7][0];
    }

    public function getMessageControlId()
    {
        return $this->children[8][0]->value;
    }

    public function getProcessingId()
    {
        return $this->children[9][0]->value;
    }

    public function getVersionId()
    {
        return $this->children[10][0]->value;
    }

    public function getSequenceNumber()
    {
        return $this->children[11][0]->value;
    }

    public function getAcceptAcknowledgementType()
    {
        return $this->children[13][0]->value;
    }

    public function getApplicationAcknowledgementType()
    {
        return $this->children[14][0]->value;
    }

    public function getMessageProfileEntityId()
    {
        return $this->children[19][0][0]->value;
    }

    public function getMessageProfileUniversalId()
    {
        return $this->children[19][0][2]->value;
    }

    public function getMessageProfileUniversalIdType()
    {
        return $this->children[19][0][3]->value;
    }
}

?>