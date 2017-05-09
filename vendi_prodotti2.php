<?php
  if(isset($_POST['ac'])) {
    //header("Location: /crea_cliente.html");
    header("Location: " . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . "/crea_cliente.html");
    die();
  }
?>
