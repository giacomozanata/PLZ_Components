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
               <li><a href="vendi_prodotti.php">VENDI PRODOTTI</a>
               <li>
               <li><a href="crea_fornitore.html">CREA FORNITORE</a>
               <li>
               <li><a href="operazioni.html">OPERAZIONI</a>
               <li>
            </ul>
         </div>
      </div>
      <div class="main">
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <br><br><br><br><br>
            <?php
               $flag=false;

               function test_input($data) {
                 $data = trim($data);
                 $data = stripcslashes($data);
                 $data = htmlspecialchars($data);
                 return $data;
               }

               $p_iva = isset($_POST['p_iva']) ? test_input($_POST['p_iva']) : null;
               $cod_articolo = isset($_POST['cod_articolo']) ? test_input($_POST['cod_articolo']) : null;
               $data_acquisto = isset($_POST['data_acquisto']) ? test_input($_POST['data_acquisto']) : null;
               $prezzo = isset($_POST['prezzo']) ? test_input($_POST['prezzo']) : null;
               $quantita = isset($_POST['quantita']) ? test_input($_POST['quantita']) : null;
               $descrizione = isset($_POST['descrizione']) ? test_input($_POST['descrizione']) : null;

               if(empty($_POST['p_iva'])){
                 echo "<p id='p_error'> il campo partita iva deve essere completato </p><br>";
                 $flag = true;
               }else{
                 echo "la partita iva che hai inserito è: ".$_POST['p_iva']."<br>";
               }

               if(empty($_POST['cod_articolo'])){
                 echo "<p id='p_error'> il campo codice articolo deve essere completato </p><br>";
                 $flag = true;
               }else{
                 echo "IL codice dell'articolo che hai inserito è: ".$_POST['cod_articolo']."<br>";
               }

               if(empty($_POST['data_acquisto'])){
                 echo "<p id='p_error'> il campo Data Acquisto deve essere completato </p><br>";
                 $flag = true;
               }else{
                 echo "La data di acquisto che hai inserito è: ".$_POST['data_acquisto']."<br>";
               }

               if(empty($_POST['prezzo'])){
                 echo "<p id='p_error'> il campo Prezzo deve essere completato </p><br>";
                 $flag = true;
               }else{
                 echo "Il prezzo che hai inserito è: ".$_POST['prezzo']."<br>";
               }

               if(empty($_POST['quantita'])){
                 echo "<p id='p_error'> il campo Quantità deve essere completato </p><br>";
                 $flag = true;
               }else{
                 echo "La quantità che hai inserito è: ".$_POST['quantita']."<br>";
               }

               if(!empty($_POST['descrizione'])){
                 echo "La descrizione che hai inserito è: ".$_POST['descrizione']."<br>";
               }

               if($flag==false){

                 $conn = mysqli_connect("localhost","root","","Pezzi");

                 if(!$conn){
                    die("<p id='p_error'>Connessione Fallita: " . mysqli_connect_error()." </p>");
                    $flag=true;
                 } else {
                   echo "<p id='p_insert'> connessione con il database avvenuta con successo! </p>";
                 }

                 echo "Carico i dati nel database...<br>";

                 $sql="SELECT Cod_Articolo FROM articoli";
                 $result_sql=mysqli_query($conn, $sql);



                 if (mysqli_num_rows($result_sql) > 0) {
echo 'Zanna 1';
                   $row = mysqli_fetch_assoc($result_sql);
echo 'Zanna 2';
                     if($row['Cod_Articolo']==$_POST['cod_articolo']){
echo 'Zanna 3';
                       $search_quantita="SELECT Quantita FROM articoli WHERE Cod_Articolo = '".$_POST['cod_articolo']."'";
                       $search_quantita_result=mysqli_query($conn, $search_quantita);
echo 'Zanna 4';
                       if(mysqli_error($conn)){
echo 'Zanna 5';
                         $search_quantita_row = mysqli_fetch_assoc($search_quantita_result);
echo 'Zanna 6';
                         $quantita = ($search_quantita_row['Quantita'] + $_POST['quantita']);
echo 'Zanna 7';
                         $sql2="INSERT INTO acquisti (FK_P_Iva, FK_Cod_Articolo, Data_Acquisto, Prezzo, Quantita)
                              VALUES ('".$_POST['p_iva']."', '".$_POST['cod_articolo']."', '".$_POST['data_acquisto']."', '".$_POST['prezzo']."', '".$_POST['quantita']."')";
echo 'Zanna 8';
                         $sql3="UPDATE articoli
                                SET quantita = '$quantita'
                                WHERE Cod_Articolo = '".$_POST['cod_articolo']."'";
echo 'Zanna 9';
                          if(mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)){
        echo 'Zanna 10';                    echo "<p id='p_insert'> dati aggiornati con successo! </p>";
                          } else {
        echo 'Zanna 11';                    echo "<p id='p_error'> Aggiornamento dati fallito! </p>";
                          }

                        }

                     } else {
echo 'Zanna 12';
                       $sql4="INSERT INTO articoli (Cod_Articolo, Descrizione, Quantita)
                              VALUES ('".$_POST['cod_articolo']."', '".$_POST['descrizione']."', '".$_POST['quantita']."')";
echo 'Zanna 13';
                       $sql5="INSERT INTO acquisti (FK_P_Iva, FK_Cod_Articolo, Data_Acquisto, Prezzo, Quantita)
                            VALUES ('".$_POST['p_iva']."', '".$_POST['cod_articolo']."', '".$_POST['data_acquisto']."', '".$_POST['prezzo']."', '".$_POST['quantita']."')";
echo 'Zanna 14';
                       if(mysqli_query($conn, $sql4) && mysqli_query($conn, $sql5)){
                         echo "<p id='p_insert'> Dati inseriti con successo! </p>";
                       } else {
                         echo "<p id='p_error'> Inserimento dati fallito! </p>";
                         echo "<p id='p_error'> Errore: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
                       }

                     }

                   }

                 }

                 mysqli_close($conn);

                

                 ?>
              <br><br><br><br>
           </form>
           <?php
              if($flag == false){
                echo "<br><br>";
                echo "<form method='get' action='inserisci_prodotti.php'>";
                echo "<button type='submit'>AGGIUNGI UN ALTRO PRODOTTO</button>";
                echo "</form>";
              }else if($flag == true){
              echo '<button onclick="goBack()">INDIETRO</button>
              <script>
              function goBack() {
              window.history.back();
              }
              </script>';

              }
              ?>
      </div>
      <div id="footer" class="footer">
         <p id="fp"> Sviluppato da Zanata Giacomo, Cavaglia' Lorenzo e De Nunzio Pietro
         <p>
      </div>
   </body>
</html>
