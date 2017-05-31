<?php
  function getConn() {
    $db_addr = 'localhost';
    $db_user = 'root';
    $db_pwd = '';
    $db_name = 'Pezzi';

    $conn = mysqli_connect($db_addr, $db_user, $db_pwd, $db_name);
    if(!$conn) {
      die(mysqli_error($conn));
    }
    return $conn;
  }

  function select($conn, $sql) {
    $rs = mysqli_query($conn, $sql);
    if(mysqli_error($conn)) {
      echo '<span style="color: red">' . mysqli_error($conn) . '</span>';
      return false;
    }

    if(mysqli_num_rows($rs) > 0) {
      return $rs;
    } else {
      return false;     
    }
  }
?>
