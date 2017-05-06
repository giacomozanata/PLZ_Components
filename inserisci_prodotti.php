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
               <li><a href="vendi_prodotti.php"\>VENDI PRODOTTI</a>
               <li>
               <li><a href="crea_fornitore.html">CREA FORNITORE</a>
               <li>
               <li><a href="#">CERCA</a>
               <li>
            </ul>
         </div>
      </div>

      <div id="main_cf" class="main">

         <form action="inserisci_prodotti2.php" method="POST">
            <p>PARTITA IVA FORNITORE *:</p>
            <?php

               $conn = new mysqli('localhost', 'root', '', 'Pezzi')
               or die ('Non riesco a collegarmi al database');

               $result = $conn->query("select p_iva, ragione_sociale from fornitori");

               echo "<select name='p_iva'>";

               while ($row = $result->fetch_assoc()) {

                         unset($p_iva);
                         $p_iva = $row['p_iva'];
                         $rag_soc = $row['ragione_sociale'];
                         echo '<option value="'.$p_iva.'">'.$p_iva.', '.$rag_soc.'</option>';

               }

               echo "</select>";

               ?>
              <p>CODICE ARTICOLO *:</p>
                <input type="text" name="cod_articolo">
            <p>DATA ACQUISTO *:</p>
                <input type="date" name="data_acquisto">
            <p>PREZZO UNITARIO *:</p>
                <input type="text" name="prezzo">
            <p>QUANTITA' *:</p>
            <input type="number" name="quantita">
            <p>DESCRIZIONE ARTICOLO :</p>
            <input type="text" name="descrizione">
            <br><br><br>
            <center><button onclick="submit"> INSERISCI PRODOTTO! </button></center>
            <br><br><br><br><br><br>


         </form>
      </div>
      <div id="footer" class="footer">
         <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro</p>
      </div>
   </body>
</html>
