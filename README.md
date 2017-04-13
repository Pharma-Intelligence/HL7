# HL7
HL7 Messaging Standard (2.5.1) Parsing library for PHP

## What is HL7?
HL7 version 2 defines a series of electronic messages to support administrative, logistical, financial as well as clinical processes.

HL7 v2.x messages use a non-XML encoding syntax based on segments (lines) and one-character delimiters.<sup>1</sup> Segments have composites (fields) separated by the composite delimiter. A composite can have sub-composites (components) separated by the sub-composite delimiter, and sub-composites can have sub-sub-composites (subcomponents) separated by the sub-sub-composite delimiter. The default delimiters are vertical bar or pipe (|) for the field separator, caret (^) for the component separator, and ampersand (&) for the subcomponent separator. The tilde (~) is the default repetition separator. Each segment starts with a 3-character string which identifies the segment type. Each segment of the message contains one specific category of information. Every message has MSH as its first segment, which includes a field that identifies the message type. The message type determines the expected segment types in the message.<sup>2</sup> The segment types used in a particular message type are specified by the segment grammar notation used in the HL7 standards.

1: <a href="http://www.interfaceware.com/understanding_hl7_messages.html" target="_blank">"Understanding HL7 Messages"</a> - iNTERFACEWARE.

2: <a href="http://www.interfaceware.com/hl7-standard/hl7-messages.html" target="_blank">"HL7 Messages and Descriptions"</a> - iNTERFACEWARE.

For more information about the HL7 2.5.1 messaging standard specification, visit: <a href="http://hl7-definition.caristix.com:9010/Default.aspx?version=HL7%20v2.5.1" target="_blank">HL7® Definition</a>
