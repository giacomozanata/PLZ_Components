<html>
<head>
    <title>INSERISCI PRODOTTI | PLZCOMPONENTS</title>
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
               <li><a href="index.html">HOME</a>
               <li>
               <li><a href="crea_cliente.html">CREA CLIENTE</a>
               <li>
               <li><a href="inserisci_prodotti.php">INSERISCI PRODOTTI</a>
               <li>
               <li><a href="vendi_prodotti.php">VENDI PRODOTTI</a>
               <li>
               <li><a href="crea_fornitore.html">CREA FORNITORE</a>
               <li>
               <li><a href="operazioni.html">OPERAZIONI</a>
               <li>
            </ul>
         </div>
    </div>
    <div id="main_cf" class="main">
      <center>
        <br><br><br><br>

        <?php
            include 'scripts/functions.php';

            if(isset($_POST['ac'])) {
              header("Location: " . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . "/crea_fornitore.html");
              die();
            }

            $p_iva = isset($_POST['p_iva']) ? test_input($_POST['p_iva']) : null;
            $Cod_Articolo = isset($_POST['Cod_Articolo']) ? test_input($_POST['Cod_Articolo']) : null;
            $Data_Acquisto = isset($_POST['Data_Acquisto']) ? test_input($_POST['Data_Acquisto']) : null;
            $prezzo = isset($_POST['prezzo']) ? test_input($_POST['prezzo']) : null;
            $quantita = isset($_POST['quantita']) ? test_input($_POST['quantita']) : null;
            $descrizione = isset($_POST['descrizione']) ? test_input($_POST['descrizione']) : null;

            $flag = true;

            if(empty($p_iva)){
              echo "<p id='p_error'> il campo partita iva deve essere completato </p><br>";
              $flag = false;
            }else{
              echo "la partita iva che hai inserito è: $p_iva<br>";
            }
            if(empty($Cod_Articolo)){
              echo "<p id='p_error'> il campo codice articolo deve essere completato </p><br>";
              $flag = false;
            }else{
              echo "IL codice dell'articolo che hai inserito è: $Cod_Articolo<br>";
            }
            if(empty($Data_Acquisto)){
              echo "<p id='p_error'> il campo Data Acquisto deve essere completato </p><br>";
              $flag = false;
            }else{
              echo "La data di acquisto che hai inserito è: $Data_Acquisto.<br>";
            }
            if(empty($prezzo)){
              echo "<p id='p_error'> il campo Prezzo deve essere completato </p><br>";
              $flag = false;
            }else{
              echo "Il prezzo che hai inserito è: $prezzo.<br>";
            }
            if(empty($quantita)){
              echo "<p id='p_error'> il campo Quantità deve essere completato </p><br>";
              $flag = false;
            }else{
              echo "La quantità che hai inserito è: $quantita <br>";
            }
            if(!empty($descrizione)){
              echo "La descrizione che hai inserito è: $descrizione <br>";
            }

            if(!$flag) {
                echo '<br><br>';
                backButton();
                die();
            }

            $sql = "INSERT INTO articoli (Cod_Articolo, Descrizione, Quantita)
                    VALUES ('$Cod_Articolo', '$descrizione', $quantita)
                    ON DUPLICATE KEY UPDATE Quantita = Quantita + $quantita;";
            $tmp = query(getConn(), $sql, false);
            $sql = "INSERT INTO acquisti (FK_P_Iva, FK_Cod_Articolo, Data_Acquisto, Prezzo, Quantita)
                    VALUES ('$p_iva', '$Cod_Articolo', '$Data_Acquisto', $prezzo, $quantita);";
            $tmp = $tmp && query(getConn(), $sql, false);

            if($tmp) {
              echo "<p id='p_insert'> Dati inseriti con successo!!</p><br>";
              redirectButton("inserisci_prodotti.php","AGGIUNGI UN' ALTRO ACQUISTO");
            } else {
              echo "<p id='p_error'>Errore nell'inserimento dati nel database</p>";
            }

        ?>
      </center>
    </div>
    <div id="footer" class="footer">
        <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro</p>
    </div>
</body>
</html>
