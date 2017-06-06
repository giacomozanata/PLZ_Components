<html>
<head>
  <title>CREA CLIENTE | PLZCOMPONENTS</title>
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="shortcut icon" href="resources/title_logo.png" />
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
        <li><a href="vendi_prodotti.php">VENDI PRODOTTI</a><li>
        <li><a href="crea_fornitore.html">CREA FORNITORE</a><li>
        <li><a href="operazioni.html">OPERAZIONI</a><li>
      </ul>
    </div>

  </div>

  <div class="main">

    <br><br><br><br><br>
      <?php

      include "scripts/functions.php";

      $flag = false;

        $Codice_Fiscale = isset($_POST['Codice_Fiscale']) ? test_input($_POST['Codice_Fiscale']) : null;
        $nome_o_ragione_sociale = isset($_POST['nome_o_ragione_sociale']) ? test_input($_POST['nome_o_ragione_sociale']) : null;
        $Indirizzo = isset($_POST['Indirizzo']) ? test_input($_POST['Indirizzo']) : null;
        $P_Iva = isset($_POST['P_Iva']) ? test_input($_POST['P_Iva']) : null;
        $Telefono = isset($_POST['Telefono']) ? test_input($_POST['Telefono']) : null;

    if(empty($Codice_Fiscale)){
      echo "<p id='p_error'> il campo codice fiscale deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "il codice fiscale che hai inserito è: ".$_POST['Codice_Fiscale']."<br>";
    }

    if(empty($nome_o_ragione_sociale)){
      echo "<p id='p_error'> il campo ragione sociale o nome deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "la ragione sociale o nome che hai inserito è: ".$_POST['nome_o_ragione_sociale']."<br>";
    }

    if(empty($Indirizzo)){
      echo "<p id='p_error'> il campo Indirizzo deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "l' indirizzo che hai inserito è: ".$_POST['Indirizzo']."<br>";
    }

    if(!empty($P_Iva)){
      echo "La partita iva che hai inserito è: ".$_POST['P_Iva']."<br>";
    }

    if(empty($Telefono)){
      echo "<p id='p_error'> il campo Telefono deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "Il numero di telefono che hai inserito è: ".$_POST['Telefono']."<br>";
    }

    if($flag == false){

      echo"<br><hr><br>";

      $conn = getConn();

      if($conn)
      echo "<p id='p_insert'> connessione con il database avvenuta con successo! </p>";


      echo "Carico i dati nel database...<br>";

      $sql = "SELECT COUNT(*) AS tmp
              FROM cliente
              WHERE Codice_Fiscale = '$Codice_Fiscale'";

      $rs = query(getConn(), $sql, true);

      $row = mysqli_fetch_assoc($rs);

      if($row['tmp'] == 1){
        echo "<p id='p_error'> Cliente già inserito! </p>";
        backButton();
        die();
      } else {
        $sql = "INSERT INTO cliente(Codice_Fiscale, nome_o_ragione_sociale, Indirizzo, P_Iva, Telefono)
                  VALUES ('".$_POST['Codice_Fiscale']."','".$_POST['nome_o_ragione_sociale']."','".$_POST['Indirizzo']."', '".$_POST['P_Iva']."','".$_POST['Telefono']."')";

        if(query(getConn(), $sql, false)) {
          echo "<p id='p_insert'> Dati inseriti con successo </p>";
          redirectButton("crea_cliente.html","AGGIUNGI UN' ALTRO CLIENTE");
        }
      }

      mysqli_close($conn);

    }else if($flag==true){
      backButton();
      die();
    }

      ?>

      <br><br><br><br>

  </div>

  <div id="footer" class="footer">
    <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro<p>
  </div>

</body>
</html>
