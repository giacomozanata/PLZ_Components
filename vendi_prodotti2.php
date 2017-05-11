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
      /*
      ++++++++++++++++++++
      ++++++++++++++++++++
      ++++Gian Was Here+++
      ++++++++++++++++++++
      ++++++++++++++++++++
      */
      if(isset($_POST['ac'])) {
        header("Location: " . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . "/crea_cliente.html");
        die();
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $data_vendita = isset($_POST['data']) ? test_input($_POST['data']) : null;
      $prezzo = isset($_POST['prezzo']) ? test_input($_POST['prezzo']) : null;
      $quantita = isset($_POST['quantita']) ? test_input($_POST['quantita']) : null;

      if(!isset($_POST['Codice_Fiscale'])) {
        echo "<p id='p_error'> Il campo del codice fiscale del cliente deve essere completato </p><br>";
        $flag=true;
      } else {
        echo "Il codice fiscale che hai inserito è: ".test_input($_POST['Codice_Fiscale'])."<br>";
      }

      if(!isset($_POST['Cod_Articolo'])) {
        echo "<p id='p_error'> Il campo del codice dell' articolo deve essere completato </p><br>";
        $flag=true;
      } else {
        echo "Il codice dell'articolo che hai inserito è: ".$_POST['Cod_Articolo']."<br>";
      }

      if(!isset($_POST['data'])) {
        echo "<p id='p_error'> Il campo della data di vendita deve essere completato </p><br>";
        $flag=true;
      } else {
        echo "La data di vendita che hai inserito è: ".$_POST['data']."<br>";
      }

      if(!isset($_POST['prezzo'])) {
        echo "<p id='p_error'> Il campo del prezzo unitario deve essere completato </p><br>";
        $flag=true;
      } else {
        echo "Il prezzo dell' articolo che hai inserito è: ".$_POST['prezzo']."<br>";
      }

      if(!isset($_POST['quantita'])) {
        echo "<p id='p_error'> Il campo della quantita' deve essere completato </p><br>";
        $flag=true;
      } else {
        echo "La quantità che hai inserito è: ".$_POST['quantita']."<br>";
      }


      if($flag==false) {

           $conn = mysqli_connect("localhost","root","","Pezzi");

        if(!$conn) {
        die("<p id='p_error'>Connessione Fallita: " . mysqli_connect_error()." </p>");
        $flag=true;
        } else {
        echo "<p id='p_insert'> connessione con il database avvenuta con successo! </p>";
        }

        $sql = " SELECT Quantita from articoli WHERE Cod_Articolo = '" . test_input($_POST['Cod_Articolo']) . "'";

        $result = mysqli_query($conn, $sql);
        if(!mysqli_error($conn)) {

          $row = mysqli_fetch_assoc($result);
          if($row['Quantita'] < $_POST['quantita']) {
            echo "<p id='p_error'> Non ci sono abbastanza prodotti in magazzino </p>";
            mysqli_close($conn);
            die();
          } else {
            $quantita = ($row['Quantita'] - $_POST['quantita']);
            $sql2 = "UPDATE articoli
                     SET Quantita = '$quantita'
                     WHERE Cod_Articolo = '" . test_input($_POST['Cod_Articolo']) . "'";
            mysqli_query($conn, $sql2);
          }
        }

        echo "Carico i dati nel database...<br>";

        $sql3="INSERT INTO vendite (FK_Cod_Articolo, FK_Codice_Fiscale, Data, Prezzo, Quantita)
              VALUES('".test_input($_POST['Cod_Articolo'])."','".test_input($_POST['Codice_Fiscale'])."','".test_input($_POST['data'])."','".test_input($_POST['prezzo'])."','".test_input($_POST['quantita'])."')";

        if(!mysqli_query($conn, $sql3))
          echo "<p id='p_error'> Errore: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
        else {
          echo "<p id='p_insert'> Dati inseriti con successo!!</p><br>";
          $flag=true;
        }

        mysqli_free_result($result);
        mysqli_close($conn);
      }

    ?>

    </form>

    <?php
      if($flag == false){
        echo "<br><br>";
        echo "<form method='get' action='vendi_prodotti.php'>";
        echo "<button type='submit'>VENDI UN ALTRO PRODOTTO</button>";
        echo "</form>";
      }else if($flag == true){
		echo '<button onclick="goBack()">INDIETRO</button>
			<script>
				function goBack() {
					window.history.back();
				}
			</script>';

      }
    echo "<br><br><br><br><br><br>";
    ?>


  </div>

  <div id="footer" class="footer">
    <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro<p>
  </div>

</body>
</html>
