<html>
<head>
  <title>CREA FORNITORE | PLZCOMPONENTS</title>
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

      include 'scripts/functions.php';

      $flag = false;

    $p_iva = isset($_POST['p_iva']) ? test_input($_POST['p_iva']) : null;
    $rag_soc = isset($_POST['rag_soc']) ? test_input($_POST['rag_soc']) : null;
    $Indirizzo = isset($_POST['Indirizzo']) ? test_input($_POST['Indirizzo']) : null;
    $Telefono = isset($_POST['Telefono']) ? test_input($_POST['Telefono']) : null;

    if(empty($p_iva)){
      echo "<p id='p_error'> il campo partita iva deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "la partita iva che hai inserito è: ".$_POST['p_iva']."<br>";
    }

    if(empty($rag_soc)){
      echo "<p id='p_error'> il campo ragione sociale deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "la ragione che hai inserito è: ".$_POST['rag_soc']."<br>";
    }

    if(empty($Indirizzo)){
      echo "<p id='p_error'> il campo Indirizzo deve essere completato </p><br>";
      $flag = true;
    }else{
      echo "l' indirizzo che hai inserito è: ".$_POST['Indirizzo']."<br>";
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
                        FROM fornitori
                        WHERE P_Iva = '$p_iva'";

                $rs = query(getConn(), $sql, true);

                $row = mysqli_fetch_assoc($rs);

                if($row['tmp'] == 1){
                  echo "<p id='p_error'> Fornitore già inserito! </p>";
                  backButton();
                  die();
                } else {
                  $sql = "INSERT INTO Fornitori(p_iva, Ragione_Sociale, Indirizzo, Telefono)
                            VALUES ('$p_iva', '$rag_soc', '$Indirizzo', '$Telefono')";

                  if(query(getConn(), $sql, false)) {
                    echo "<p id='p_insert'> Dati inseriti con successo </p>";
                    redirectButton("crea_cliente.html","AGGIUNGI UN' ALTRO FORNITORE");
                  }

                }

              mysqli_close($conn);

            } else if($flag==true){
              backButton();
              die();
            }

      ?>

  </div>

  <div id="footer" class="footer">
    <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro<p>
  </div>

</body>
</html>
