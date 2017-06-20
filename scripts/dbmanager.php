<?php

  /*
   * @author: G
   * @date  : 31-05-2017
   */


  function getConn() {
    $db_addr = 'localhost';
    $db_user = 'root';
    $db_pwd = '';
    $db_name = 'Pezzi';

    $conn = mysqli_connect($db_addr, $db_user, $db_pwd, $db_name);
    if(!$conn) {
      die("<p id='p_error'>Connessione Fallita: " . mysqli_connect_error()." </p>");
    }
    return $conn;
  }

  function query($conn, $sql, $resultNeeded) {
    if($resultNeeded)
     $rs = mysqli_query($conn, $sql);
    else
      mysqli_query($conn, $sql);

    if(mysqli_error($conn)) {
      echo '<span style="color: red">' . mysqli_error($conn) . '</span>';
      return false;
    }

    if(!$resultNeeded)
      return true;

    if($resultNeeded && mysqli_num_rows($rs) > 0) {
      return $rs;
    } else {
      echo "<p id='p_error'>Non sono stati trovati risultati corrispondenti alla tua ricerca!<p>";
      return false;
    }

  }
?>
