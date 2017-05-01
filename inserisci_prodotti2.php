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

      $flag=false;

      $conn = mysqli_connect("localhost","root","","Pezzi");

      if(!$conn){
      die("<p id='p_error'>Connessione Fallita: " . mysqli_connect_error()." </p>");
      }else{
      echo "<p id='p_insert'> connessione con il database avvenuta con successo! </p>";
      }

      echo "Carico i dati nel database...<br>";

      $sql="INSERT INTO acquisti(Data_Acquisto, Prezzo, Quantita)
            VALUES('".$_POST['data_acquisto']."','".$_POST['prezzo']."','".$_POST['quantita']."')";

      $sql2="INSERT INTO articoli (Cod_Articolo, Quantita)
              VALUES ('".$_POST['cod_articolo'].", '".$_POST['quantita']."')";

              if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
              echo "<p id='p_insert'> Dati inseriti con successo!!</p><br>";
              } else {
              echo "<p id='p_error'> Errore: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
              }

              mysqli_close($conn);

      ?>

    </form>

    <?php
      if($flag == false){
        echo "<br><br>";
        echo "<form method='get' action='crea_fornitore.html'>";
        echo "<button type='submit'>AGGIUNGI UN ALTRO PRODOTTO</button>";
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
