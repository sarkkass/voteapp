<?php
if (empty($_GET)) {
  die("Et valinnut vaihtoehtoa.");
}
else {

  print_r($_GET);
  //Äänesstys läpi
  $output = "<h2>Kiitos äänestyksestä</h2>";
  $xml = simplexml_load_file('data/data.xml');


  $aanestys_id = intval($_GET['aanestys']);
  $vaihtoehto_id2 = intval($_GET['vaihtoehto']);

  $nykyinen_aanimaara = intval($xml->äänestys[$aanestys_id]->vaihtoehto[$vaihtoehto_id2]['aanet']);
  $total_votes = intval($xml->äänestys[$aanestys_id]->kerrat['yhteensa']);

  $total_votes++;
  $nykyinen_aanimaara++;
  echo $nykyinen_aanimaara;

  $xml->äänestys[$aanestys_id]->kerrat['yhteensa']=$total_votes;
  $xml->äänestys[$aanestys_id]->vaihtoehto[$vaihtoehto_id2]['aanet'] = $nykyinen_aanimaara;

  // MUOTOILU JA TALLENNUS
  $dom = new DOMDocument("1.0");
  $dom->preserveWhiteSpace = false;
  $dom->formatOutput = true;
  $dom->loadXML($xml->asXML());
  $dom->save('data/data.xml');


}

?>
<!DOCUMENT html>
<html>
<head>
  <meta charset="utf-8">
  <Title>Äänestys</title>
</head>

<body>
  <?php echo $output; ?>
</body>

</html>
