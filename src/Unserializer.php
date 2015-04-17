<?php
namespace PharmaIntelligence\HL7;

use PharmaIntelligence\HL7\Exception\StructureException;
use PharmaIntelligence\HL7\Node\Segment\MSHSegment;
use PharmaIntelligence\HL7\Node\Message;
use PharmaIntelligence\HL7\Node\Segment;
use PharmaIntelligence\HL7\Node\Field;
use PharmaIntelligence\HL7\Node\Repetition;
use PharmaIntelligence\HL7\Node\Component;
use PharmaIntelligence\HL7\Node\SubComponent;
class Unserializer
{
    protected $hl7String = '';
    
    /**
     * 
     * @var Message
     */
    protected $message = null;
    
    protected $segmentClassMap = array();
    
    protected $escapeSequences = array(
        'field_delimiter' => '|',
        'repeat_delimiter' => '~',
        'component_delimiter' => '^',
        'subcomponent_delimiter' => '&',
        'escape_delimiter' => '\\',
        'cursor_return' => '\r'
    );
    
    public function __construct() {
    }
    
    public function loadMessageFromString($hl7String, $segmentClassMap = array()) {
        $this->hl7String = $hl7String;
        $this->segmentClassMap = $segmentClassMap;
        
        $this->validate();
        $this->setEscapeSequences();
        $this->message = new Message();
        $this->message->setEscapeSequences($this->escapeSequences);
        $this->splitSegments();
        return $this->message;
    }
    
    
    protected function splitSegments() {
        $segmentStrings = explode($this->escapeSequences['cursor_return'], $this->hl7String);
        foreach($segmentStrings as $segmentString) {
            /**
             * Last line
             */
            if($segmentString === '') 
                break;
            
            $segment = $this->splitFields($segmentString);
            $this->message->append($segment);
        }
    }
    
    protected function splitFields($segmentString) {
        $segmentName = substr($segmentString, 0, 3);
        if(!array_key_exists($segmentName, $this->segmentClassMap)) {
            $segment = new Segment($segmentName);
        } else {
            $className = $this->segmentClassMap[$segmentName];
            $segment = new $className($segmentName);
        }
        $fieldStrings = explode($this->escapeSequences['field_delimiter'], substr($segmentString, 4));
        foreach($fieldStrings as $fieldString) {
            $field = $this->splitRepetitions($fieldString);
            $segment->append($field);
        }
        return $segment; 
    }
    
    protected function splitRepetitions($fieldString) {
        $field = new Field();
        $repetitionStrings = explode($this->escapeSequences['repeat_delimiter'], $fieldString);
        foreach($repetitionStrings as $repetitionString) {
            $repetition = $this->splitComponents($repetitionString);
            $field->append($repetition);
        }
        return $field;
    }
    
    protected function splitComponents($repetitionString) {
        $componentStrings = explode($this->escapeSequences['component_delimiter'], $repetitionString);
        if(count($componentStrings) === 1) {
            /**
             * Check for subcomponents in single component
             */
            $component = $this->splitSubComponents($componentStrings[0]);
            if($component->count() === 0) {
                $repetition = new Repetition($componentStrings[0]);
                return $repetition;
            }
        }
        
        $repetition = new Repetition();
        foreach($componentStrings as $componentString) {
            $component = $this->splitSubComponents($componentString);
            $repetition->append($component);
        }
        return $repetition;
    }
    
    protected function splitSubComponents($componentString) {
        $subcomponentStrings = explode($this->escapeSequences['subcomponent_delimiter'], $componentString);
        if(count($subcomponentStrings) === 1) {
            $component = new Component($subcomponentStrings[0]);
            return $component;
        }
        $component = new Component();
        foreach($subcomponentStrings as $subcomponentString) {
            $subcomponent = new SubComponent($subcomponentString);
            $component->append($subcomponent);
        }
        return $component;
    }
    
    protected function validate() {
        if(strlen($this->hl7String) == 0)
            throw new StructureException('HL7 string is empty');
        
        /**
         * Check for MSH starter
         */
        $header = substr($this->hl7String, 0, 3);
        if($header !== MSHSegment::IDENTIFIER) {
            throw new StructureException('HL7 starts with "'.$header.'". Expected "MSH"');
        }
    }
    
    protected function setEscapeSequences() {
        $escapeSequence = substr($this->hl7String, 3, 5);
        $escapeSequence = str_split($escapeSequence);
        $this->escapeSequences['field_delimiter'] = $escapeSequence[0];
        $this->escapeSequences['repeat_delimiter'] = $escapeSequence[2];
        $this->escapeSequences['component_delimiter'] = $escapeSequence[1];
        $this->escapeSequences['subcomponent_delimiter'] = $escapeSequence[4];
        $this->escapeSequences['cursor_return'] = chr(13);
    }
}

?>