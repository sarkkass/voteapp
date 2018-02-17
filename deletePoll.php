<?php
$output = 'Äänestys poistettu';
$xml =simplexml_load_file('data/data.xml');

$äänestysnumero = intval($_GET['id']);

unset($xml->äänestys[$äänestysnumero]);

echo $output;



$dom = new DOMDocument("1.0");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($xml->asXML());
$dom->save('data/data.xml');

header('refresh:3;url=create.php');
