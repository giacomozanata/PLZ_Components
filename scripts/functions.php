<?php

  /*
   * @author: G
   * @date  : 31-05-2017
   */

    include 'dbmanager.php';
    include 'salva.php';

    function getSelectFornitori() {
        $conn = getConn();
        $result = query($conn, "select p_iva, ragione_sociale from fornitori", true);

        echo "<select name='p_iva'>";

        while ($row = $result->fetch_assoc()) {
        unset($p_iva);
        $p_iva = $row['p_iva'];
        $rag_soc = $row['ragione_sociale'];
        echo '<option value="'.$p_iva.'">'.$p_iva.', '.$rag_soc.'</option>';
        }

        echo "</select>";
    }

    function getSelectCliente() {
      $conn= getConn();
      $result = query($conn, "select Codice_Fiscale, Nome_O_Ragione_Sociale from cliente", true);

      echo "<select name='Codice_Fiscale'>";

      while ($row = mysqli_fetch_assoc($result)) {
      unset($cod_fisc);
      $cod_fisc = $row['Codice_Fiscale'];
      $name_rag_soc = $row['Nome_O_Ragione_Sociale'];
      echo '<option value="'.$cod_fisc.'">'.$cod_fisc.', '.$name_rag_soc.'</option>';
      }

      echo "</select>";
      mysqli_free_result($result);
      mysqli_close($conn);

    }

    function getSelectArticoli(){
      $conn= getConn();
      $result = query($conn, "select Cod_Articolo, Descrizione from articoli", true);

      echo "<select name='Cod_Articolo'>";

      while ($row = mysqli_fetch_assoc($result)) {

                unset($cod_articolo);
                $cod_art = $row['Cod_Articolo'];
                $desc = $row['Descrizione'];
                echo '<option value="'.$cod_art.'">'.$cod_art.', '.$desc.'</option>';

      }

      echo "</select>";

      mysqli_free_result($result);
      mysqli_close($conn);

    }

    function test_input($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

    function backButton() {
        echo '<button onclick="window.history.back();">INDIETRO</button>';
    }

    function acquistoButton() {
        echo "<br><br>";
        echo "<form method='get' action='inserisci_prodotti.php'>";
        echo "<button type='submit'>AGGIUNGI UN ALTRO PRODOTTO</button>";
        echo "</form>";
    }

    function redirectButton($page, $msg){
      echo "<br><br>";
      echo "<form method='get' action='$page'>";
      echo "<button type='submit'>".$msg."</button>";
      echo "</form>";
    }

    function modifyButton($key, $table){
      echo
        "<form action='modifica.php' method='POST'>
        <button type='submit' name='mod'> MODIFICA </button>
        <input type='hidden' name='id' value='$key'>
        <input type='hidden' name='table' value='$table'>
        </form>";
    }

?>
