<html>
<head>
  <title>PLZCOMPONENTS</title>
</head>
<body>
  <link rel="stylesheet" type="text/css" href="style.css">

  <div id="header" class="header">

    <div id="logo">
     <a href="index.html"> <img src="onlinelogomaker-042417-1841-8476.png"> </a>
    </div>

    <div id="menu">
      <ul>
        <li><a href="index.html">HOME</a><li>
        <li><a href="#">CREA CLIENTE</a><li>
        <li><a href="#">INSERISCI PRODOTTI</a><li>
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

      function test_input($data) {
		      $data = trim($data);
		      $data = stripcslashes($data);
		      $data = htmlspecialchars($data);
		      return $data;
	       }

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

    $p_iva = isset($_POST['p_iva']) ? test_input($_POST['p_iva']) : null;
    $rag_soc = isset($_POST['rag_soc']) ? test_input($_POST['rag_soc']) : null;
    $indirizzo = isset($_POST['Indirizzo']) ? test_input($_POST['Indirizzo']) : null;
    $telefono = isset($_POST['Telefono']) ? test_input($_POST['Telefono']) : null;

    if($flag == false){

      $conn = mysqli_connect("localhost","root","","Pezzi");

      if(!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }else{
      echo "connessione con il database avvenuta con successo! <br>";
    }

      echo "Carico i dati nel database...<br>";

      $sql = "INSERT INTO Fornitori(p_iva, Ragione_Sociale, Indirizzo, Telefono)
                VALUES ('$p_iva','$rag_soc','$indirizzo','$telefono')";

              if (mysqli_query($conn, $sql)) {
              echo "Dati inseriti con successo!!";
              } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
        echo "<br><br>";
        echo "<form method='get' action='history.go(-1);return true;'>";
        echo "<button type='submit'>INDIETRO</button>";
        echo "</form>";
      }
    ?>

  </div>

  <div id="footer" class="footer">
    <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro<p>
  </div>

</body>
</html>
