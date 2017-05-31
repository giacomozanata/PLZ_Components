<?php 

  /*
   * @author: Gianvito Bono
   * @date  : 31-05-2017
   */

    include 'dbmanager.php';
    
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

    function test_input($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

    function backButton() {
        echo '<button onclick="goBack()">INDIETRO</button>
			<script>
				function goBack() {
					window.history.back();
				}
			</script>';
    }

    function acquistoButton() {
        echo "<br><br>";
        echo "<form method='get' action='inserisci_prodotti.php'>";
        echo "<button type='submit'>AGGIUNGI UN ALTRO PRODOTTO</button>";
        echo "</form>";
    }
?>