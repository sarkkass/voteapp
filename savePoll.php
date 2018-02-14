<?php
if (empty($_GET)) {
  die('Et täyttänyt lomaketta');
}
$kohde = $_GET['aihe'];
$vaihtoehto1 = $_GET['vaihtoehto1'];
$vaihtoehto2 = $_GET['vaihtoehto2'];
$vaihtoehto3 = $_GET['vaihtoehto3'];
$vaihtoehto4 = $_GET['vaihtoehto4'];

$errors = array();

if (empty($kohde)) $errors[] = 'Et antanut äänestyksen aihetta';
if (empty($vaihtoehto1) && empty($vaihtoehto2)) $errors[] = 'Vaaditaan vähintään kaksi vaihtoehtoa.';

if (!empty($errors)) {
  $output = '<ul><li>'.implode('</li><li>',$errors) .'</li></ul>';
}
else {
  $output = 'Äänestys tallennettu';
}

$xml = simplexml_load_file('data/data.xml');
$uusiAanestys = $xml->addChild('äänestys');
$uusiAanestys->addChild('kohde', $kohde);
$uusiAanestys->addChild('vaihtoehto', $vaihtoehto1);
$uusiAanestys->addChild('vaihtoehto', $vaihtoehto2);
if (!empty($vaihtoehto3)) $uusiAanestys->addChild('vaihtoehto', $vaihtoehto3);
if (!empty($vaihtoehto4)) $uusiAanestys->addChild('vaihtoehto', $vaihtoehto4);
$uusiAanestys->addChild('kerrat');

foreach ($uusiAanestys->vaihtoehto as $vaihtoehto){
  $vaihtoehto['aanet'] = "0";
}
foreach ($uusiAanestys->kerrat as $kerrat) {
  $kerrat['yhteensa'] = "0";
}



// MUOTOILU JA TALLENNUS
$dom = new DOMDocument("1.0");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($xml->asXML());
$dom->save('data/data.xml');


header('refresh:3;url=create.php');

echo $output;
