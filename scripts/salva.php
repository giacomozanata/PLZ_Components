<?php

  include 'functions.php';

  $table = isset($_POST['table']) ? test_input($_POST['table']) : null;
  $row_id = $_POST['id'];

  switch($table) {
    case 'acquisti':

      $data = isset($_POST['data']) ? test_input($_POST['data']) : null;
      $prezzo = isset($_POST['prezzo']) ? test_input($_POST['prezzo']) : null;
      $quantita = isset($_POST['quantita']) ? test_input($_POST['quantita']) : null;

      $sql = "UPDATE acquisti SET Data_Acquisto = '$data', Prezzo = '$prezzo', Quantita = '$quantita' WHERE ID_Acquisto = '$row_id' ";
      query(getConn(), $sql, false);

    break;

    case 'vendite':

      $data = isset($_POST['data']) ? test_input($_POST['data']) : null;
      $prezzo = isset($_POST['prezzo']) ? test_input($_POST['prezzo']) : null;
      $quantita = isset($_POST['quantita']) ? test_input($_POST['quantita']) : null;

      $sql = "UPDATE vendite SET Data = '$data', Prezzo = '$prezzo', Quantita = '$quantita' WHERE ID_Vendita = '$row_id' ";
      query(getConn(), $sql, false);

    break;

    case 'fornitori':

      $p_iva = isset($_POST['p_iva']) ? test_input($_POST['p_iva']) : null;
      $rag_soc = isset($_POST['rag_soc']) ? test_input($_POST['rag_soc']) : null;
      $indirizzo = isset($_POST['indirizzo']) ? test_input($_POST['indirizzo']) : null;
      $telefono = isset($_POST['telefono']) ? test_input($_POST['telefono']) : null;

      $sql = "UPDATE fornitori SET Ragione_Sociale = '$rag_soc', Indirizzo = '$indirizzo', Telefono = '$telefono' WHERE P_Iva = '$row_id' ";
      query(getConn(), $sql, false);

    break;

    case 'cliente':

      $codice_fiscale = isset($_POST['codice_fiscale']) ? test_input($_POST['codice_fiscale']) : null;
      $nome_o_rag_soc = isset($_POST['nome_o_rag_soc']) ? test_input($_POST['nome_o_rag_soc']) : null;
      $indirizzo = isset($_POST['indirizzo']) ? test_input($_POST['indirizzo']) : null;
      $p_iva = isset($_POST['p_iva']) ? test_input($_POST['p_iva']) : null;
      $telefono = isset($_POST['telefono']) ? test_input($_POST['telefono']) : null;

      $sql = "UPDATE cliente SET Nome_O_Ragione_Sociale = '$nome_o_rag_soc', Indirizzo = '$indirizzo', P_Iva = '$p_iva', Telefono = '$telefono'  WHERE Codice_Fiscale = '$row_id' ";
      query(getConn(), $sql, false);

    break;

  }

  header("Location: http://localhost/zanata/PLZ_Components/operazioni.html");
  die();

?>
