<?php namespace PharmaIntelligence\HL7\Node\Segment;

use DateTime;
use PharmaIntelligence\HL7\Node\Segment;

/**
 * The PID segment is used by all applications as the primary means of communicating patient identification information.
 * This segment contains permanent patient identifying and demographic information that, for the most part, is not
 * likely to change frequently.
 */
class PIDSegment extends Segment
{
    const IDENTIFIER = 'PID';

    public function getSetId()
    {
        return $this->children[0][0]->value;
    }

    public function getPatientId()
    {
        return $this->children[2][0][0]->value;
    }

    public function getPatientIdType()
    {
        return $this->children[2][0][4]->value;
    }

    public function getPatientNameLast()
    {
        return $this->children[4][0][0]->value;
    }

    public function getPatientNameFirst()
    {
        return $this->children[4][0][1]->value;
    }

    public function getPatientNameType()
    {
        return $this->children[4][0][6]->value;
    }

    public function getPatientDateOfBirth()
    {
        return DateTime::createFromFormat("Ymd", $this->children[6][0]->value);
    }

    public function getPatientGender()
    {
        return $this->children[7][0]->value;
    }

    public function getPatientAddressCountry()
    {
        return $this->children[10][0][5]->value;
    }

    public function getPatientPhoneNumber()
    {
        return $this->children[12][0][5]->value . $this->children[12][0][6]->value;
    }

}

?>