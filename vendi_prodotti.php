<?php include "scripts/functions.php" ?>
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
               <li><a href="vendiprodotti.php">VENDI PRODOTTI</a><li>
               <li><a href="crea_fornitore.html">CREA FORNITORE</a><li>
               <li><a href="operazioni.html">OPERAZIONI</a><li>
            </ul>
         </div>
      </div>

      <div id="main_cf" class="main">

         <form action="vendi_prodotti2.php" method="POST">

            <p>CODICE FISCALE CLIENTE *:</p>
            <?php getSelectCliente(); ?>
            <button type="submit" name="ac"> AGGIUNGI CLIENTE </button>
            <p>CODICE ARTICOLO ACQUISTATO *:</p>
            <?php getSelectArticoli(); ?>
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
