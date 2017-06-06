<html>
<head>
  <title>RICERCA | PLZCOMPONENTS</title>
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

    <?php

    include "scripts/functions.php";

    $row_id=$_POST['id'];
    $table=$_POST['table'];
    $conn = getConn();

    echo "<center> <table class='table_default'>";

    if($table=="acquisti"){
      $sql = "SELECT * FROM acquisti WHERE ID_Acquisto = '$row_id'" ;
      $rs = query($conn, $sql , true);
      $row = mysqli_fetch_assoc($rs);

      echo "<tr>";
          echo "<th>PARTITA IVA FORNITORE</th>";
          echo "<th>CODICE ARTICOLO ACQUISTATO</th>";
          echo "<th>DATA DI ACQUISTO</th>";
          echo "<th>PREZZO</th>";
          echo "<th>QUANTITA'</th>";
      echo "</tr>";

      echo "<tr>";
          echo "<th>";
            echo "<input type='text' name='p_iva' value='".$row['FK_P_Iva']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='rag_soc' value='".$row['FK_Cod_Articolo']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='indirizzo' value='".$row['Data_Acquisto']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='telefono' value='".$row['Prezzo']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='telefono' value='".$row['Quantita']."'>";
          echo "</th>";

      echo "</tr>";
    }
    if($table=="vendite"){

      $sql = "SELECT * FROM vendite WHERE Id_Vendita = '$row_id'" ;
      $rs = query($conn, $sql , true);
      $row = mysqli_fetch_assoc($rs);

      echo "<tr>";
          echo "<th>CODICE ARTICOLO</th>";
          echo "<th>CODICE FISCALE CLIENTE</th>";
          echo "<th>DATA VENDITA</th>";
          echo "<th>PREZZO UNITARIO</th>";
          echo "<th>QUANTITA'</th>";
      echo "</tr>";

      echo "<tr>";
          echo "<th>";
            echo "<input type='text' name='p_iva' value='".$row['FK_Cod_Articolo']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='rag_soc' value='".$row['FK_Codice_Fiscale']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='indirizzo' value='".$row['Data']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='telefono' value='".$row['Prezzo']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='telefono' value='".$row['Quantita']."'>";
          echo "</th>";

      echo "</tr>";

    }
    if ($table=="cliente") {

      $sql = "SELECT * FROM cliente WHERE Codice_Fiscale = '$row_id'" ;
      $rs = query($conn, $sql , true);
      $row = mysqli_fetch_assoc($rs);

      echo "<tr>";
          echo "<th>CODICE FISCALE</th>";
          echo "<th>NOME O RAGIONE SOCIALE</th>";
          echo "<th>INDIRIZZO</th>";
          echo "<th>PARTITA IVA</th>";
          echo "<th>TELEFONO</th>";
      echo "</tr>";

      echo "<tr>";
          echo "<th>";
            echo "<input type='text' name='p_iva' value='".$row['Codice_Fiscale']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='rag_soc' value='".$row['Nome_O_Ragione_Sociale']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='indirizzo' value='".$row['Indirizzo']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='telefono' value='".$row['P_Iva']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='telefono' value='".$row['Telefono']."'>";
          echo "</th>";

      echo "</tr>";

    }
    if ($table=="fornitori") {
      $sql = "SELECT * FROM fornitori WHERE P_Iva = '$row_id'" ;
      $rs = query($conn, $sql , true);
      $row = mysqli_fetch_assoc($rs);

      echo "<tr>";
          echo "<th>PARTITA IVA</th>";
          echo "<th>RAGIONE SOCIALE AZIENDA</th>";
          echo "<th>INDIRIZZO AZIENDA</th>";
          echo "<th>TELEFONO AZIENDA</th>";
      echo "</tr>";

      echo "<tr>";
          echo "<th>";
            echo "<input type='text' name='p_iva' value='".$row['P_Iva']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='rag_soc' value='".$row['Ragione_Sociale']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='indirizzo' value='".$row['Indirizzo']."'>";
          echo "</th>";

          echo "<th>";
            echo "<input type='text' name='telefono' value='".$row['Telefono']."'>";
          echo "</th>";
      echo "</tr>";
    }
    echo "</table> </center>";
    mysqli_close($conn);
    ?>

  </div>

  <br><br><br><br><br><br>

  <div id="footer" class="footer">
    <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro<p>
  </div>

</body>
</html>
