INSERT INTO articoli (Cod_Articolo, Descrizione, Quantita)
    VALUES ('$Cod_Articoli', '$descrizione', $quantita)
ON DUPLICATE KEY UPDATE Quantita = Quantita + $quantita;
INSERT INTO acquisti (FK_P_Iva, FK_Cod_Articolo, Data_Acquisto, Prezzo, Quantita)
    VALUES ('$p_iva', '$Cod_Articolo', '$Data_Acquisto', $prezzo, $quantita);

SELECT COUNT(*)
FROM fornitori
WHERE P_Iva = '$p_iva'
