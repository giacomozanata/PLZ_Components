<html>
<head>
  <title>PLZCOMPONENTS</title>
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
  <link rel="stylesheet" type="text/css" href="style.css">

  <div id="header" class="header">

    <div id="logo">
     <a href="index.html"> <img src="logo.png"> </a>
    </div>

    <div id="menu">
      <ul>
        <li><a href="index.html">HOME</a><li>
        <li><a href="crea_cliente.html">CREA CLIENTE</a><li>
        <li><a href="inserisci_prodotti.php">INSERISCI PRODOTTI</a><li>
        <li><a href="#">VENDI PRODOTTI</a><li>
        <li><a href="crea_fornitore.html">CREA FORNITORE</a><li>
        <li><a href="#">CERCA</a><li>
      </ul>
    </div>

  </div>

  <div class="main">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <br><br><br><br><br>
      <?php

      

      ?>

    </form>

    <?php
      if($flag == false){
        echo "<br><br>";
        echo "<form method='get' action='crea_fornitore.html'>";
        echo "<button type='submit'>AGGIUNGI UN ALTRO FORNITORE</button>";
        echo "</form>";
      }else if($flag == true){
		echo '<button onclick="goBack()">INDIETRO</button>
			<script>
				function goBack() {
					window.history.back();
				}
			</script>';

      }
    ?>


  </div>

  <div id="footer" class="footer">
    <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro<p>
  </div>

</body>
</html>
