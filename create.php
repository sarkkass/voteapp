<?php
  $xml = simplexml_load_file('data/data.xml');
  $nimi = $xml->nimi;
  $tekijä = $xml->tekijä;
  $pvm = $xml->pvm;
  $äänestykset = $xml->äänestys;
?>

<!DOCTYPE html>
<html lang="fi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Luo Äänestys - <?php echo $nimi;?></title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted"> <?php echo $nimi;?> </h3>
        <nav>
          <ul class="nav nav-pills pull-left">
            <li role="presentation"><a href="index.html">Etusivu</a></li> 
            <li role="presentation"><a href="browse.php">Selaa äänestyksiä</a></li>
            <li role="presentation" class="active"><a href="#">Luo äänestys</a></li>
            <li role="presentation"><a href="myOwn.php">Muokkaa Äänestyksiä</a></li>
            <li role="presentation"><a href="about.html">Tietoja</a></li>
          </ul>
        </nav>

      </div>

      <div class="jumbotron">
        <h1>Luo äänestys</h1>
        <form action="savePoll.php" method="get">
          <ul class="list-unstyled">
            <li class="list-group-item">
              <label>Äänestyksen aihe</label>
              <input type="text" name="aihe" placeholder="Aihe (pakollinen)" class="form-control">
            </li>

            <li class="list-group-item">
              <label>Vaihtoehto 1</label>
              <input type="text" name="vaihtoehto1" placeholder="Vaihtoehto 1 (pakollinen)" class="form-control">
            </li>

            <li class="list-group-item">
              <label>Vaihtoehto 2</label>
              <input type="text" name="vaihtoehto2" placeholder="Vaihtoehto 2 (pakollinen)" class="form-control">
            </li>

            <li class="list-group-item">
              <label>Vaihtoehto 3</label>
              <input type="text" name="vaihtoehto3" placeholder="Vaihtoehto 3" class="form-control">
            </li>

            <li class="list-group-item">
              <label>Vaihtoehto 4</label>
              <input type="text" name="vaihtoehto4" placeholder="Vaihtoehto 4" class="form-control">
            </li>

            <li class="list-group-item">
              <button type="submit" class="btn btn-success">Tallenna</button>
            </li>
          </ul>

          <br>




        </form>




      </div>



      <footer class="footer">
        <p>&copy; Jester </p>
        <div align="center">
        </div>
      </footer>

    </div> <!-- /container -->
  </body>

</html>
