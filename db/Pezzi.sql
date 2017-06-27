-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Giu 27, 2017 alle 10:16
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
(1, '12345678901', '3476V', '2017-06-20', 14, 45),
(2, '34567890123', '3652F', '2017-06-20', 4521, 2);

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
('', 'SELEZIONA UN ARTICOLO O AGGIUNGINE UNO', 0),
('3476V', 'OLIO CASTROL SYNTEC 5W30', 45),
('3652F', 'BLOCCO MOTORE MERCEDES CLASSE C', 1);

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
('CPSLLR70P29H594P', 'Caio Sagese', 'Piazza della Repubblica, 37 95121-Zia Lisa CT', '65432109876', '3632878912'),
('DNCHSP81R68H011R', 'Blaga Antunovic', 'Via San Cosmo fuori Porta Nolana, 134 20066-Melzo MI', '', '3465438975'),
('LLDSMQ86M52A539I', 'Alice Palerma', 'Via delle Coste, 54 42010-Toano RE', '87654321098', '3890987654'),
('RFCGYS50S41I310I', 'Alen Ortega Gracia', 'Via Santa Teresa degli Scalzi, 119 35040-Este PD', '', '3478136213'),
('TMNRNR78C27L529O', 'Omero Buccho', 'Via Bologna, 62 26838-Tavazzano Con Villavesco LO', '10987654321', '3969964544'),
('YKZFSM74T65E982W', 'Kang Lei', 'Via Longhena, 128 00030-Gavignano RM', '', '3665225987');

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
('', 'SELEZIONA UN FORNITORE O AGGIUNGINE UNO', '', ''),
('12345678901', 'Sofa Express', 'Via Santa Lucia, 17 06020-Colpalombo PG', '3439143235'),
('2345678901', 'Exact Realty', 'Via Palermo, 40 20161-Affori MI', '3682332165'),
('34567890123', 'Greenwich IGA', 'Via Piccinni, 136 82010-Ripabianca Tressanti BN', '3678305518'),
('45678901234', 'Chase Pitkin', 'Via Santa Teresa, 5 53020-Monte Amiata SI', '3796163476');

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
(1, '3652F', 'RFCGYS50S41I310I', '2017-06-20', 5300, 1);

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
  MODIFY `ID_Acquisto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `vendite`
--
ALTER TABLE `vendite`
  MODIFY `Id_Vendita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `acquisti`
--
ALTER TABLE `acquisti`
  ADD CONSTRAINT `acquisti_ibfk_1` FOREIGN KEY (`FK_P_Iva`) REFERENCES `fornitori` (`P_Iva`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acquisti_ibfk_2` FOREIGN KEY (`FK_Cod_Articolo`) REFERENCES `articoli` (`Cod_Articolo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `vendite`
--
ALTER TABLE `vendite`
  ADD CONSTRAINT `Cod_Articolo` FOREIGN KEY (`FK_Cod_Articolo`) REFERENCES `articoli` (`Cod_Articolo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Codice_Fiscale` FOREIGN KEY (`FK_Codice_Fiscale`) REFERENCES `cliente` (`Codice_Fiscale`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
