<html>
<head>
  <title>VENDI PRODOTTI | PLZ COMPONENTS </title>
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

  <div id="main_cf" class="main">
    <center>
    <br><br><br><br><br>
    <?php

      include "scripts/functions.php";

      $flag=false;

      if(isset($_POST['ac'])) {
        header("Location: " . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . "/crea_cliente.html");
        die();
      }


      $data_vendita = isset($_POST['data']) ? test_input($_POST['data']) : null;
      $prezzo = isset($_POST['prezzo']) ? test_input($_POST['prezzo']) : null;
      $quantita = isset($_POST['quantita']) ? test_input($_POST['quantita']) : null;

      if(empty($_POST['Codice_Fiscale'])) {
        echo "<p id='p_error'> Il campo del codice fiscale del cliente deve essere completato </p><br>";
        $flag=true;
      } else {
        echo "Il codice fiscale che hai inserito è: ".test_input($_POST['Codice_Fiscale'])."<br>";
      }

      if(empty($_POST['Cod_Articolo'])) {
        echo "<p id='p_error'> Il campo del codice dell' articolo deve essere completato </p><br>";
        $flag=true;
      } else {
        echo "Il codice dell'articolo che hai inserito è: ".$_POST['Cod_Articolo']."<br>";
      }

      if(empty($data_vendita)) {
        echo "<p id='p_error'> Il campo della data di vendita deve essere completato </p><br>";
        $flag=true;
      } else {
        echo "La data di vendita che hai inserito è: ".$_POST['data']."<br>";
      }

      if(empty($prezzo)) {
        echo "<p id='p_error'> Il campo del prezzo unitario deve essere completato </p><br>";
        $flag=true;
      } else {
        echo "Il prezzo dell' articolo che hai inserito è: ".$_POST['prezzo']."<br>";
      }

      if(empty($quantita)) {
        echo "<p id='p_error'> Il campo della quantita' deve essere completato </p><br>";
        $flag=true;
      } else {
        echo "La quantità che hai inserito è: ".$_POST['quantita']."<br>";
      }

      if($flag==false){

      echo"<br><hr><br>";

      $conn = getConn();

      if($conn)
        echo "<p id='p_insert'> connessione con il database avvenuta con successo! </p>";

      echo "Carico i dati nel database...<br>";

      $result = query($conn, "SELECT Quantita from articoli WHERE Cod_Articolo = '" . test_input($_POST['Cod_Articolo']) . "'",true);;

      if(!mysqli_error($conn)) {

        $row = mysqli_fetch_assoc($result);
        if($row['Quantita'] < $_POST['quantita']) {
          echo "<p id='p_error'> Non ci sono abbastanza prodotti in magazzino </p>";
          backButton();
          mysqli_close($conn);
          die();
        } else {
          $quantita = ($row['Quantita'] - $_POST['quantita']);
          $sql = "UPDATE articoli
                    SET Quantita = '$quantita'
                    WHERE Cod_Articolo = '" . test_input($_POST['Cod_Articolo']) . "'";
          $tmp=query($conn, $sql, false);
          $sql2="INSERT INTO vendite (FK_Cod_Articolo, FK_Codice_Fiscale, Data, Prezzo, Quantita)
                VALUES('".test_input($_POST['Cod_Articolo'])."','".test_input($_POST['Codice_Fiscale'])."','".test_input($_POST['data'])."','".test_input($_POST['prezzo'])."','".test_input($_POST['quantita'])."')";
          $tmp = $tmp && query($conn, $sql2, false);
        }

        if($tmp) {
          echo "<p id='p_insert'> Dati inseriti con successo!!</p><br>";
          redirectButton("vendi_prodotti.php","AGGIUNGI UN' ALTRA VENDITA");
        } else {
          echo "<p id='p_error'>Errore nell'inserimento dati nel database</p>";
          die();
        }

        }

        mysqli_free_result($result);
        mysqli_close($conn);

      }elseif ($flag==true) {
        echo '<br><br>';
        backButton();
        die();
      }



    ?>

  </center>
  </div>

  <div id="footer" class="footer">
    <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro<p>
  </div>

</body>
</html>
