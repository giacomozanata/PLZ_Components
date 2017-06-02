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

    $table = $_POST['search'];
    $col = null;
    switch ($_POST['search']) {
      case 'acquisti':
        $col = 'Data_Acquisto LIKE "%' . $_POST['search_query'] . '%" OR
                FK_P_Iva LIKE "%' . $_POST['search_query'] . '%" OR
                (acquisti.FK_Cod_Articolo LIKE articoli.Cod_Articolo AND
                articoli.Descrizione LIKE "%' . $_POST['search_query'] . '%")';
        $tmp = $table;
        $table = $table . ", articoli";
        break;

        case 'fornitori':
          $col = 'P_Iva LIKE "%' . $_POST['search_query'] . '%" OR
                  Ragione_Sociale LIKE "%' . $_POST['search_query'] . '%" OR
                  Indirizzo LIKE "%' . $_POST['search_query'] . '%" OR
                  Telefono LIKE "%' . $_POST['search_query'] . '%"';
          $tmp = $table;
          break;

          case 'cliente':
            $col = 'Codice_Fiscale LIKE "%' . $_POST['search_query'] . '%" OR
                    Nome_O_Ragione_Sociale LIKE "%' . $_POST['search_query'] . '%" OR
                    Indirizzo LIKE "%' . $_POST['search_query'] . '%" OR
                    P_Iva LIKE "%' . $_POST['search_query'] . '%" OR
                    Telefono LIKE "%' . $_POST['search_query'] . '%"';
            $tmp = $table;
            break;

            case 'vendite':
              $col = 'vendite.FK_Cod_Articolo LIKE "%' . $_POST['search_query'] . '%" OR
                      (vendite.FK_Cod_Articolo LIKE articoli.Cod_Articolo AND
                      articoli.Descrizione LIKE "%' . $_POST['search_query'] . '%") OR
                      vendite.FK_Codice_Fiscale LIKE "%' . $_POST['search_query'] . '%" OR
                      (vendite.FK_Codice_Fiscale LIKE cliente.Codice_Fiscale AND
                      cliente.Codice_Fiscale LIKE "%' . $_POST['search_query'] . '%") OR
                      Data LIKE "%' . $_POST['search_query'] . '%" OR
                      Prezzo LIKE "%' . $_POST['search_query'] . '%" OR
                      vendite.Quantita LIKE "%' . $_POST['search_query'] . '%"';
              $tmp = $table;
              $table = $table . ", cliente, articoli";
              break;

      default:

        break;
    }
    $conn = mysqli_connect("localhost","root","","Pezzi");

    if(!$conn){
    die("<p id='p_error'>Connessione Fallita: " . mysqli_connect_error()." </p>");
    }else{
    echo "<p id='p_insert'> connessione con il database avvenuta con successo! </p>";
    }

    echo "Cerco i dati nel database...<br>";

    echo "<br><hr><br>";

    $sql = "SELECT * FROM $table WHERE $col";
    if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result) > 0){
        echo "<center>";
        echo "<table class='table_default'>";
        if($tmp == "acquisti"){
          echo "<tr>";
              echo "<th>PARTITA IVA FORNITORE</th>";
              echo "<th>CODICE ARTICOLO ACQUISTATO</th>";
              echo "<th>DATA DI ACQUISTO</th>";
              echo "<th>PREZZO</th>";
              echo "<th>QUANTITA'</th>";
          echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['FK_P_Iva'] . "</td>";
                echo "<td>" . $row['FK_Cod_Articolo'] . "</td>";
                echo "<td>" . $row['Data_Acquisto'] . "</td>";
                echo "<td>" . $row['Prezzo'] . "</td>";
                echo "<td>" . $row['Quantita'] . "</td>";
            echo "</tr>";
        }
      }
      if($tmp == "fornitori"){
        echo "<tr>";
            echo "<th>PARTITA IVA</th>";
            echo "<th>RAGIONE SOCIALE AZIENDA</th>";
            echo "<th>INDIRIZZO AZIENDA</th>";
            echo "<th>TELEFONO AZIENDA</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['P_Iva'] . "</td>";
                echo "<td>" . $row['Ragione_Sociale'] . "</td>";
                echo "<td>" . $row['Indirizzo'] . "</td>";
                echo "<td>" . $row['Telefono'] . "</td>";
            echo "</tr>";
        }
      }
      if($tmp == "cliente"){
        echo "<tr>";
            echo "<th>CODICE FISCALE</th>";
            echo "<th>NOME O RAGIONE SOCIALE</th>";
            echo "<th>INDIRIZZO</th>";
            echo "<th>PARTITA IVA</th>";
            echo "<th>TELEFONO</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Codice_Fiscale'] . "</td>";
                echo "<td>" . $row['Nome_O_Ragione_Sociale'] . "</td>";
                echo "<td>" . $row['Indirizzo'] . "</td>";
                echo "<td>" . $row['P_Iva'] . "</td>";
                echo "<td>" . $row['Telefono'] . "</td>";
            echo "</tr>";
        }
      }
      if($tmp == "vendite"){
        echo "<tr>";
            echo "<th>CODICE ARTICOLO</th>";
            echo "<th>CODICE FISCALE CLIENTE</th>";
            echo "<th>DATA VENDITA</th>";
            echo "<th>PREZZO UNITARIO</th>";
            echo "<th>QUANTITA'</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['FK_Cod_Articolo'] . "</td>";
                echo "<td>" . $row['FK_Codice_Fiscale'] . "</td>";
                echo "<td>" . $row['Data'] . "</td>";
                echo "<td>" . $row['Prezzo'] . "</td>";
                echo "<td>" . $row['Quantita'] . "</td>";
            echo "</tr>";
        }
      }
      echo "</table>";
      echo "</center>";
      mysqli_free_result($result);

      }else{
        echo "<p id='p_error'>Non sono stati trovati risultati corrispondenti alla tua ricerca!<p>";
      }

    }else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);

  echo "<br><br>";

  backButton();

  ?>

  </div>

  <br><br><br><br><br><br>

  <div id="footer" class="footer">
    <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro<p>
  </div>

</body>
</html>
