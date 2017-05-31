-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Mag 31, 2017 alle 10:54
-- Versione del server: 10.1.10-MariaDB
-- Versione PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Pezzi`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `acquisti`
--

CREATE TABLE `acquisti` (
  `ID_Acquisto` int(11) NOT NULL,
  `FK_P_Iva` varchar(11) NOT NULL,
  `FK_Cod_Articolo` varchar(255) NOT NULL,
  `Data_Acquisto` date NOT NULL,
  `Prezzo` float NOT NULL,
  `Quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `acquisti`
--

INSERT INTO `acquisti` (`ID_Acquisto`, `FK_P_Iva`, `FK_Cod_Articolo`, `Data_Acquisto`, `Prezzo`, `Quantita`) VALUES
(1, '23456789012', '4365A', '2017-05-26', 102793000, 1000),
(2, '14725836998', '7234A', '2017-05-20', 7324, 2147483647),
(3, '23456789012', 'DIOCAN', '2017-05-26', 1234, 1234),
(4, '14725836998', '2423F', '2017-05-30', 12, 123),
(5, '14725836998', '2423a', '2017-05-30', 12, 123),
(6, '1599513692', '5142A', '2017-05-31', 77654, 30),
(7, '21123443567', '4721G', '2017-05-31', 8723, 6723),
(8, '14725836998', '4321O', '2017-05-31', 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `Cod_Articolo` varchar(255) NOT NULL,
  `Descrizione` varchar(255) NOT NULL,
  `Quantita` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`Cod_Articolo`, `Descrizione`, `Quantita`) VALUES
('', 'SELEZIONA UN ARTICOLO', 45),
('2136B', 'PASTIGLIE FRENI FERODO OPEL ASTRA', 98),
('2345F', 'MOTORINO TERGICRISTALLO LANCIA Y 2002', 45),
('2423a', 'jnr', 123),
('2423F', 'CIAO', 123),
('4321O', 'nnnn', 1),
('4365A', 'Zanna frocio', 1000),
('4569F', 'TERGICRISTALLI BOSCH 4569F', 100),
('4721G', 'Zanna Rosso', 6723),
('5142A', 'Comunismo', 30),
('7234A', 'MOTORINO TERGICRISTALLO LANCIA Y 2002 Rosso come il comunismo sovietico ai tempi di Lenin e il comunismo si guerra', 2147483647),
('DIOCAN', 'Porca Madonna', 1234);

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `Codice_Fiscale` varchar(16) NOT NULL,
  `Nome_O_Ragione_Sociale` varchar(50) NOT NULL,
  `Indirizzo` varchar(100) NOT NULL,
  `P_Iva` varchar(11) NOT NULL,
  `Telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`Codice_Fiscale`, `Nome_O_Ragione_Sociale`, `Indirizzo`, `P_Iva`, `Telefono`) VALUES
('', 'SELEZIONA UN CLIENTE O AGGIUNGINE UNO', '', '', ''),
('ABC234CBU999CHIS', 'Jonny Sins', 'VIa delle querce, 33, Lecco', '2147483647', '3334333333'),
('ABCDEF98I1234569', 'Lollo Cava', 'via verdi, 15, Lampedusa ', '', '3456767890'),
('ZNNRSS98T21L736M', 'Zanna Rosso', 'Via Dei Rossi 25/11', '03456723904', '6666666777');

-- --------------------------------------------------------

--
-- Struttura della tabella `fornitori`
--

CREATE TABLE `fornitori` (
  `P_Iva` varchar(11) NOT NULL,
  `Ragione_Sociale` varchar(50) NOT NULL,
  `Indirizzo` varchar(100) NOT NULL,
  `Telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `fornitori`
--

INSERT INTO `fornitori` (`P_Iva`, `Ragione_Sociale`, `Indirizzo`, `Telefono`) VALUES
('14725836998', 'SEAT', 'corso como, 4, Milano', '3499898765'),
('1599513692', 'FIAT', 'piazza della liberazione, 4, Torino', '3478365678'),
('21123443567', 'FORD', 'via dell elettricità, 15, Marghera', '3454545678'),
('23456789012', 'OPEL', 'via delle industrie, 30, Russelheim', '3391234567'),
('35795114725', 'CAMPELLO MOTORS', 'via oberdan, 12, Mestre', '041256325');

-- --------------------------------------------------------

--
-- Struttura della tabella `vendite`
--

CREATE TABLE `vendite` (
  `Id_Vendita` int(11) NOT NULL,
  `FK_Cod_Articolo` varchar(255) NOT NULL,
  `FK_Codice_Fiscale` varchar(16) NOT NULL,
  `Data` date NOT NULL,
  `Prezzo` float NOT NULL,
  `Quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `vendite`
--

INSERT INTO `vendite` (`Id_Vendita`, `FK_Cod_Articolo`, `FK_Codice_Fiscale`, `Data`, `Prezzo`, `Quantita`) VALUES
(1, '2136B', 'ABC234CBU999CHIS', '2017-05-09', 70, 3),
(2, '2136B', 'ABC234CBU999CHIS', '2017-05-09', 70, 3),
(3, '2136B', 'ABC234CBU999CHIS', '2017-05-09', 70, 3),
(4, '4569F', 'ABCDEF98I1234569', '2017-05-09', 66, 5),
(6, '4569F', 'ZNNRSS98T21L736M', '2017-05-19', 13, 15),
(7, '4569F', 'ZNNRSS98T21L736M', '2017-05-19', 13, 15),
(8, '4569F', 'ZNNRSS98T21L736M', '2017-05-19', 13, 15),
(9, '4569F', 'ZNNRSS98T21L736M', '2017-05-19', 13, 15),
(10, '2136B', 'ZNNRSS98T21L736M', '2017-05-10', 15, 15),
(11, '2136B', 'ABC234CBU999CHIS', '2017-05-25', 50, 2),
(12, '2136B', 'ABC234CBU999CHIS', '2017-05-25', 50, 2);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `acquisti`
--
ALTER TABLE `acquisti`
  ADD PRIMARY KEY (`ID_Acquisto`),
  ADD KEY `FK_P_Iva` (`FK_P_Iva`,`FK_Cod_Articolo`),
  ADD KEY `FK_Cod_Articolo` (`FK_Cod_Articolo`);

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`Cod_Articolo`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Codice_Fiscale`);

--
-- Indici per le tabelle `fornitori`
--
ALTER TABLE `fornitori`
  ADD PRIMARY KEY (`P_Iva`);

--
-- Indici per le tabelle `vendite`
--
ALTER TABLE `vendite`
  ADD PRIMARY KEY (`Id_Vendita`),
  ADD KEY `Id_Articolo` (`FK_Cod_Articolo`),
  ADD KEY `Codice_Fiscale` (`FK_Codice_Fiscale`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `acquisti`
--
ALTER TABLE `acquisti`
  MODIFY `ID_Acquisto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT per la tabella `vendite`
--
ALTER TABLE `vendite`
  MODIFY `Id_Vendita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `acquisti`
--
ALTER TABLE `acquisti`
  ADD CONSTRAINT `acquisti_ibfk_1` FOREIGN KEY (`FK_P_Iva`) REFERENCES `fornitori` (`P_Iva`),
  ADD CONSTRAINT `acquisti_ibfk_2` FOREIGN KEY (`FK_Cod_Articolo`) REFERENCES `articoli` (`Cod_Articolo`);

--
-- Limiti per la tabella `vendite`
--
ALTER TABLE `vendite`
  ADD CONSTRAINT `Cod_Articolo` FOREIGN KEY (`FK_Cod_Articolo`) REFERENCES `articoli` (`Cod_Articolo`),
  ADD CONSTRAINT `Codice_Fiscale` FOREIGN KEY (`FK_Codice_Fiscale`) REFERENCES `cliente` (`Codice_Fiscale`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
