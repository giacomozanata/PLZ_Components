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
               <li><a href="index.html">HOME</a>
               <li>
               <li><a href="crea_cliente.html">CREA CLIENTE</a>
               <li>
               <li><a href="inserisci_prodotti.php">INSERISCI PRODOTTI</a>
               <li>
               <li><a href="vendiprodotti.php">VENDI PRODOTTI</a>
               <li>
               <li><a href="crea_fornitore.html">CREA FORNITORE</a>
               <li>
               <li><a href="#">OPERAZIONI</a>
               <li>
            </ul>
         </div>
      </div>

      <div id="main_cf" class="main">

         <form action="vendi_prodotti2.php" method="POST">
            <p>CODICE FISCALE CLIENTE *:</p>
            <?php

               $conn = new mysqli('localhost', 'root', '', 'Pezzi')
               or die ('Non riesco a collegarmi al database');

               $result = $conn->query("select Codice_Fiscale, Nome_O_Ragione_Sociale from cliente");

               echo "<select name='Codice_Fiscale'>";

               while ($row = $result->fetch_assoc()) {

                         unset($cod_fisc);
                         $cod_fisc = $row['Codice_Fiscale'];
                         $name_rag_soc = $row['Nome_O_Ragione_Sociale'];
                         echo '<option value="'.$cod_fisc.'">'.$cod_fisc.', '.$name_rag_soc.'</option>';

               }

               echo "</select>";
               mysqli_free_result($result);
               ?>

               <input type="submit" name="ac" value="AGGIUNGI CLIENTE" />

              <p>CODICE ARTICOLO ACQUISTATO *:</p>
              <?php

                 $result = $conn->query("select Cod_Articolo, Descrizione from articoli");

                 echo "<select name='Cod_Articolo' onchange='showPrezzo(document.getElementById(\"Cod_Articolo\").textContent)'>";

                 while ($row = $result->fetch_assoc()) {

                           unset($cod_articolo);
                           $cod_art = $row['Cod_Articolo'];
                           $desc = $row['Descrizione'];
                           echo '<option value="'.$cod_art.'">'.$cod_art.', '.$desc.'</option>';

                 }

                 echo "</select>";
             mysqli_free_result($result);
             mysqli_close($conn);
                 ?>
            <p>DATA VENDITA *:</p>
                <input type="date" name="data">
            <p>PREZZO UNITARIO *:</p>
                <input type="text" name="prezzo">
            <p>QUANTITA' *:</p>
            <input type="number" name="quantita">
            <br><br><br>
            <center><button onclick="submit"> VENDI PRODOTTO! </button></center>
            <br><br><br><br><br><br>


         </form>
      </div>
      <div id="footer" class="footer">
         <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro</p>
      </div>
   </body>
</html>
