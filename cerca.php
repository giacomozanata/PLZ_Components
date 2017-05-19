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
        <li><a href="vendi_prodotti.php">VENDI PRODOTTI</a><li>
        <li><a href="crea_fornitore.html">CREA FORNITORE</a><li>
        <li><a href="operazioni.php">OPERAZIONI</a><li>
      </ul>
    </div>

  </div>

  <div class="main">

    <?php

    $table = $_POST['search'];

    $conn = mysqli_connect("localhost","root","","Pezzi");

    if(!$conn){
    die("<p id='p_error'>Connessione Fallita: " . mysqli_connect_error()." </p>");
    }else{
    echo "<p id='p_insert'> connessione con il database avvenuta con successo! </p>";
    }

    echo "Cerco i dati nel database...<br>";

    $sql = "SELECT * FROM $table";
    if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
      echo "<table>";
      if($table = "acquisti"){
        echo "<tr>";
            echo "<th>ID_Acquisto</th>";
            echo "<th>FK_P_Iva</th>";
            echo "<th>FK_Cod_Articolo</th>";
            echo "<th>data_acquisto</th>";
            echo "<th>prezzo</th>";
            echo "<th>quantita</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['ID_Acquisto'] . "</td>";
                echo "<td>" . $row['FK_P_Iva'] . "</td>";
                echo "<td>" . $row['FK_Cod_Articolo'] . "</td>";
                echo "<td>" . $row['data_acquisto'] . "</td>";
                echo "<td>" . $row['prezzo'] . "</td>";
                echo "<td>" . $row['quantita'] . "</td>";
            echo "</tr>";
        }
      }
      if($table = "fornitori"){
        echo "<tr>";
            echo "<th>P_Iva</th>";
            echo "<th>Ragione Sociale</th>";
            echo "<th>Indirizzo</th>";
            echo "<th>Telefono</th>";
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
      if($table = "cliente"){
        echo "<tr>";
            echo "<th>Codice Fiscale</th>";
            echo "<th>Nome o Ragione Sociale</th>";
            echo "<th>Indirizzo</th>";
            echo "<th>P_Iva</th>";
            echo "<th>Telefono</th>";
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
      if($table = "vendite"){
        echo "<tr>";
            echo "<th>Id Vendita</th>";
            echo "<th>FK Codice Articolo</th>";
            echo "<th>FK Codice Fiscale</th>";
            echo "<th>Data</th>";
            echo "<th>Prezzo</th>";
            echo "<th>Quantità</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id_vendita'] . "</td>";
                echo "<td>" . $row['FK_Cod_Articolo'] . "</td>";
                echo "<td>" . $row['FK_Cod_Fiscale'] . "</td>";
                echo "<td>" . $row['data'] . "</td>";
                echo "<td>" . $row['prezzo'] . "</td>";
                echo "<td>" . $row['quantita'] . "</td>";
            echo "</tr>";
        }
      }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

mysqli_close($conn);
?>

  </div>

  <br><br><br><br>

  <div id="footer" class="footer">
    <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro<p>
  </div>

</body>
</html>
