<?php

  include 'functions.php';

  $table = isset($_POST['table']) ? test_input($_POST['table']) : null;
  $row_id = $_POST['id'];

  switch($table) {
    case 'acquisti':
    $sql="DELETE from acquisti WHERE ID_Acquisto='$row_id';";
    query(getConn(), $sql, false);
    break;

    case 'vendite':
    $sql="DELETE from vendite WHERE ID_Vendita='$row_id';";
    query(getConn(), $sql, false);
    break;

    case 'fornitori':
    $sql="DELETE from fornitori WHERE P_Iva ='$row_id';";
    query(getConn(), $sql, false);
    break;

    case 'cliente':
    $sql="DELETE from cliente WHERE Codice_Fiscale='$row_id';";
    query(getConn(), $sql, false);
    break;

  }

?>
