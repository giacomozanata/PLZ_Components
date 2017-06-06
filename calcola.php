<?php

  $prezzo = isset($_POST['prezzo']) ? test_input($_POST['prezzo']) : null;
  $quantita = isset($_POST['quantita']) ? test_input($_POST['quantita']) : null;
  
  $moltiplicazione = ($prezzo*$quantita);
  echo "Prezzo Totale = $moltiplicazione <br>";
  
 ?>