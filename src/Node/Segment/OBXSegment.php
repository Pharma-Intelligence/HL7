<?php namespace PharmaIntelligence\HL7\Node\Segment;

use DateTime;
use PharmaIntelligence\HL7\Node\Segment;

class OBXSegment extends Segment
{
    const IDENTIFIER = 'OBX';

    public function getSetId()
    {
        return $this->children[0][0]->value;
    }

    public function getValueType()
    {
        return $this->children[1][0]->value;
    }

    public function getObservationId()
    {
        return $this->children[2][0][0]->value;
    }

    public function getObservationIdText()
    {
        return $this->children[2][0][1]->value;
    }

    public function getObservationIdCode()
    {
        return $this->children[2][0][2]->value;
    }

    public function getObservationIdAlt()
    {
        return $this->children[2][0][3]->value;
    }

    public function getObservationIdAltText()
    {
        return $this->children[2][0][4]->value;
    }

    public function getObservationIdCodingSystem()
    {
        return $this->children[2][0][5]->value;
    }

    public function getObservationSubId()
    {
        return $this->children[3][0]->value;
    }

    public function getObservationValueId()
    {
        return $this->children[4][0]->value;
    }

    public function getUnitsId()
    {
        return $this->children[5][0][0]->value;
    }

    public function getReferencesRanges()
    {
        return $this->children[6][0]->value;
    }

    public function getAbnormalFlags()
    {
        return $this->children[7][0]->value;
    }

    public function getObservationResultStatus()
    {
        return $this->children[10][0]->value;
    }

    public function getObservationDate()
    {
        return DateTime::createFromFormat("YmdHis.uO", $this->children[13][0]->value);
    }

    public function getAnalysisDate()
    {
        return DateTime::createFromFormat("YmdHis.uO", $this->children[18][0]->value);
    }

    public function getPerformerOrganizationName()
    {
        return $this->children[22][0][0]->value;
    }

    public function getPerformerOrganizationIdType()
    {
        return $this->children[22][0][6]->value;
    }

    public function getPerformerOrganizationAssigningFacility()
    {
        return $this->children[22][0][7]->value;
    }

    public function getPerformerOrganizationId()
    {
        return $this->children[22][0][9]->value;
    }

    public function getPerformerOrganizationAddressStreet()
    {
        return $this->children[23][0][0]->value;
    }

    public function getPerformerOrganizationAddressCity()
    {
        return $this->children[23][0][2]->value;
    }

    public function getPerformerOrganizationAddressState()
    {
        return $this->children[23][0][3]->value;
    }

    public function getPerformerOrganizationAddressPostalCode()
    {
        return $this->children[23][0][4]->value;
    }

    public function getPerformerMedicalDirectorNameLast()
    {
        return $this->children[24][0][1]->value;
    }

    public function getPerformerMedicalDirectorNameFirst()
    {
        return $this->children[24][0][2]->value;
    }

    public function getPerformerMedicalDirectorNameMiddleInitial()
    {
        return $this->children[24][0][3]->value;
    }

    public function getPerformerMedicalDirectorAssigningFacility()
    {
        return $this->children[24][0][13]->value;
    }

}