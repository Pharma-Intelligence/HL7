<?php
use PharmaIntelligence\HL7\Unserializer;

include_once 'autoload.php';

$file = 'Resources/orm.txt';
$testHl7 = file_get_contents($file);
// file_put_contents($file, str_replace(chr(10), chr(13), $testHl7));
// return;
$unserializer = new Unserializer();
$map = array(
    'MSH' => '\PharmaIntelligence\HL7\Node\Segment\MSHSegment'
);
$message = $unserializer->loadMessageFromString($testHl7, $map);
echo $message->getValueAtIndex(4, 3, 0, 1).PHP_EOL;
$message->setEscapeSequences(array('cursor_return' => PHP_EOL));
echo $message;