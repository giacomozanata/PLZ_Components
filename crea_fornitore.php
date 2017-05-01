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


      $flag = false;


    if(empty($_POST['p_iva'])){
      echo "<p id='p_error'> il campo partita iva deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "la partita iva che hai inserito è: ".$_POST['p_iva']."<br>";
    }

    if(empty($_POST['rag_soc'])){
      echo "<p id='p_error'> il campo ragione sociale deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "la ragione che hai inserito è: ".$_POST['rag_soc']."<br>";
    }

    if(empty($_POST['Indirizzo'])){
      echo "<p id='p_error'> il campo Indirizzo deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "l' indirizzo che hai inserito è: ".$_POST['Indirizzo']."<br>";
    }

    if(empty($_POST['Telefono'])){
      echo "<p id='p_error'> il campo Telefono deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "Il numero di telefono che hai inserito è: ".$_POST['Telefono']."<br>";
    }

    if($flag == false){

      $conn = mysqli_connect("localhost","root","","Pezzi");

      if(!$conn){
      die("<p id='p_error'>Connessione Fallita: " . mysqli_connect_error()." </p>");
      $flag=true;
    }else{
      echo "<p id='p_insert'> connessione con il database avvenuta con successo! </p>";
    }

      echo "Carico i dati nel database...<br>";

      $sql = "INSERT INTO Fornitori(p_iva, Ragione_Sociale, Indirizzo, Telefono)
                VALUES ('".$_POST['p_iva']."','".$_POST['rag_soc']."','".$_POST['Indirizzo']."','".$_POST['Telefono']."')";

              if (mysqli_query($conn, $sql)) {
              echo "<p id='p_insert'> Dati inseriti con successo!!</p><br>";
              } else {
              echo "<p id='p_error'> Errore: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
              $flag=true;
              }

              mysqli_close($conn);

            }

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
