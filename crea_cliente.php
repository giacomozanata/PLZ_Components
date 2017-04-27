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


    if(empty($_POST['Codice_Fiscale'])){
      echo "<p id='p_error'> il campo codice fiscale deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "il codice fiscale che hai inserito è: ".$_POST['Codice_Fiscale']."<br>";
    }

    if(empty($_POST['nome_o_ragione_sociale'])){
      echo "<p id='p_error'> il campo ragione sociale o nome deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "la ragione sociale o nome che hai inserito è: ".$_POST['nome_o_ragione_sociale']."<br>";
    }

    if(empty($_POST['Indirizzo'])){
      echo "<p id='p_error'> il campo Indirizzo deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "l' indirizzo che hai inserito è: ".$_POST['Indirizzo']."<br>";
    }

    if(empty($_POST['P_Iva'])){
      echo "<p id='p_error'> il campo partita iva deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "La partita iva che hai inserito è: ".$_POST['P_Iva']."<br>";
    }
        
    if(empty($_POST['Telefono'])){
      echo "<p id='p_error'> il campo Telefono deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "Il numero di telefono che hai inserito è: ".$_POST['Telefono']."<br>";
    }

    $Codice_Fiscale = isset($_POST['Codice_Fiscale']) ? test_input($_POST['Codice_Fiscale']) : null;
    $nome_o_ragione_sociale = isset($_POST['nome_o_ragione_sociale']) ? test_input($_POST['nome_o_ragione_sociale']) : null;
    $indirizzo = isset($_POST['Indirizzo']) ? test_input($_POST['Indirizzo']) : null;
    $P_Iva = isset($_POST['P_Iva']) ? test_input($_POST['P_Iva']) : null;
    $telefono = isset($_POST['Telefono']) ? test_input($_POST['Telefono']) : null;

    if($flag == false){

      $conn = mysqli_connect("localhost","root","","Pezzi");

      if(!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }else{
      echo "connessione con il database avvenuta con successo! <br>";
    }

      echo "Carico i dati nel database...<br>";

      $sql = "INSERT INTO cliente(Codice_Fiscale, nome_o_ragione_sociale, Indirizzo, P_Iva, Telefono)
                VALUES ('$Codice_Fiscale','$nome_o_ragione_sociale','$indirizzo', '$P_Iva','$telefono')";

              if (mysqli_query($conn, $sql)) {
              echo "<p id='p_insert'>Dati inseriti con successo!!</p><br>";
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
        echo "<button type='submit'>AGGIUNGI UN ALTRO CLIENTE</button>";
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