<?php

  include 'functions.php';

  $table = isset($_POST['table']) ? test_input($_POST['table']) : null;
  $row_id = $_POST['id'];

  switch($table) {
    case 'acquisti':

      $p_iva = isset($_POST['P_Iva']) ? test_input($_POST['P_Iva']) : null;
      $cod_articolo = isset($_POST['Cod_Articolo']) ? test_input($_POST['Cod_Articolo']) : null;
      $data = isset($_POST['data']) ? test_input($_POST['data']) : null;
      $prezzo = isset($_POST['prezzo']) ? test_input($_POST['prezzo']) : null;
      $quantita = isset($_POST['quantita']) ? test_input($_POST['quantita']) : null;

      $sql = "UPDATE acquisti SET FK_P_iva = '$p_iva', FK_Cod_Articolo = '$cod_articolo', Data_Acquisto = '$data', Prezzo = '$prezzo', Quantita = '$quantita' WHERE ID_Acquisto = '$row_id' ";
      query(getConn(), $sql, false);

    break;

    case 'vendite':

      $cod_articolo = isset($_POST['Cod_Articolo']) ? test_input($_POST['Cod_Articolo']) : null;
      $codice_fiscale = isset($_POST['Codice_Fiscale']) ? test_input($_POST['Codice_Fiscale']) : null;
      $data = isset($_POST['data']) ? test_input($_POST['data']) : null;
      $prezzo = isset($_POST['prezzo']) ? test_input($_POST['prezzo']) : null;
      $quantita = isset($_POST['quantita']) ? test_input($_POST['quantita']) : null;

      $sql = "UPDATE vendite SET FK_Cod_Articolo = '$cod_articolo', FK_Codice_Fiscale = '$codice_fiscale', Data = '$data', Prezzo = '$prezzo', Quantita = '$quantita' WHERE ID_Vendita = '$row_id' ";
      query(getConn(), $sql, false);

    break;

    case 'fornitori':

      $p_iva = isset($_POST['p_iva']) ? test_input($_POST['p_iva']) : null;
      $rag_soc = isset($_POST['rag_soc']) ? test_input($_POST['rag_soc']) : null;
      $indirizzo = isset($_POST['indirizzo']) ? test_input($_POST['indirizzo']) : null;
      $telefono = isset($_POST['telefono']) ? test_input($_POST['telefono']) : null;

      $sql = "UPDATE fornitori SET P_Iva = '$p_iva', Ragione_Sociale = '$rag_soc', Indirizzo = '$indirizzo', Telefono = '$telefono' WHERE P_Iva = '$row_id' ";
      query(getConn(), $sql, false);

    break;

    case 'cliente':

      $codice_fiscale = isset($_POST['codice_fiscale']) ? test_input($_POST['codice_fiscale']) : null;
      $nome_o_rag_soc = isset($_POST['nome_o_rag_soc']) ? test_input($_POST['nome_o_rag_soc']) : null;
      $indirizzo = isset($_POST['indirizzo']) ? test_input($_POST['indirizzo']) : null;
      $p_iva = isset($_POST['p_iva']) ? test_input($_POST['p_iva']) : null;
      $telefono = isset($_POST['telefono']) ? test_input($_POST['telefono']) : null;

      $sql = "UPDATE cliente SET Codice_Fiscale = '$codice_fiscale', Nome_O_Ragione_Sociale = '$nome_o_rag_soc', Indirizzo = '$indirizzo', P_Iva = '$p_iva', Telefono = '$telefono'  WHERE Codice_Fiscale = '$row_id' ";
      query(getConn(), $sql, false);

    break;

  }

  header("Location: http://localhost/zanata/progetto/PLZ_Components/operazioni.html");
  die();

?>
