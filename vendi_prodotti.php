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
               <li><a href="vendi_prodotti.php">VENDI PRODOTTI</a><li>
               <li><a href="crea_fornitore.html">CREA FORNITORE</a><li>
               <li><a href="operazioni.html">OPERAZIONI</a><li>
            </ul>
         </div>
      </div>

      <div id="main_cf" class="main">

         <form action="vendi_prodotti2.php" method="POST" class="customForm customStyle">

            <p>CODICE FISCALE CLIENTE *:</p>
            <?php getSelectCliente(); ?>
            &nbsp&nbsp<button type="submit" name="ac"> AGGIUNGI CLIENTE </button>
            <p>CODICE ARTICOLO ACQUISTATO *:</p>
            <?php getSelectArticoli(); ?>
            <p>DATA VENDITA *:</p>
            <input class="field-long" type="date" name="data">
            <p>PREZZO UNITARIO *:</p>
            <input class="field-long" type="text" name="prezzo">
            <p>QUANTITA' *:</p>
            <input class="field-long" type="number" name="quantita">
            <br><br><br>
            <center><button onclick="submit"> VENDI PRODOTTO! </button></center>


         </form>
<br><br><br><br><br><br>
      </div>
      <div id="footer" class="footer">
         <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro</p>
      </div>
   </body>
</html>
