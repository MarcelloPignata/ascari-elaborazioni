-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 28, 2021 alle 10:52
-- Versione del server: 10.4.19-MariaDB
-- Versione PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ascari-elaborazioni`
--
CREATE DATABASE IF NOT EXISTS `ascari-elaborazioni` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ascari-elaborazioni`;

-- --------------------------------------------------------

--
-- Struttura della tabella `automobili`
--

CREATE TABLE `automobili` (
  `id` int(11) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modello` varchar(20) NOT NULL,
  `serie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `automobili`
--

INSERT INTO `automobili` (`id`, `marca`, `modello`, `serie`) VALUES
(1, 'Mazda', 'RX-7', 'FD'),
(2, 'Mitsubishi', '3000GT', 'VR4'),
(3, 'Nissan', 'Skyline R35', 'GTR'),
(4, 'Toyota', 'GR86', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `eventi`
--

CREATE TABLE `eventi` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `luogo` text NOT NULL,
  `data` text NOT NULL,
  `ora` text NOT NULL,
  `descrizione` text NOT NULL,
  `contatti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `eventi`
--

INSERT INTO `eventi` (`id`, `nome`, `luogo`, `data`, `ora`, `descrizione`, `contatti`) VALUES
(4, 'Milano Night Run', 'Via Vincenzo Monti 2, Pero (MI)', '27/07/2021', '23:00', 'Le migliori auto al miglior orario della giornata, non puoi mancare!', 'www.milanonightrun.it'),
(5, '100 Anni di Mazda', 'Rho Fieramilano, Gate 2', '13-15 Ottobre 2021', '10:00 - 20:00', 'Festeggia con noi i 100 Anni dalla nascita del vostro marchio automobilistico preferito!', 'mazda.it\r\nFacebook: Mazda Italia'),
(6, 'TunersMeet', 'Parcheggio Carrefour Paderno Dugnano', '23/10/2021', '14:30', 'Elaborazioni, tuning, trasformazioni, preparazioni e molto altro, in una giornata dedicata agli esperti del settore', 'Whatsapp: 0192837465');

-- --------------------------------------------------------

--
-- Struttura della tabella `iscrizioni_eventi`
--

CREATE TABLE `iscrizioni_eventi` (
  `id_evento` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `kit`
--

CREATE TABLE `kit` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descrizione` text NOT NULL,
  `id_automobile` int(11) NOT NULL,
  `prezzo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `kit`
--

INSERT INTO `kit` (`id`, `nome`, `descrizione`, `id_automobile`, `prezzo`) VALUES
(1, 'Stage 1', 'Rimappatura centralina 1, filtro aria 1', 1, 100),
(2, 'Stage 2', 'Rimappatura centralina 2, filtro aria 2 , scarico 1', 1, 200),
(3, 'Stage 3', 'Rimappatura centralina 3, filtro aria 3 , scarico 2, iniettori 1, pompa benzina 1', 1, 300),
(4, 'Stage 4', 'Rimappatura centralina 4, filtro aria 4 , scarico 3, iniettori 2, pompa benzina 2, aspirazione 1, volano 1', 1, 400),
(5, 'Stage 5', 'Rimappatura centralina 5, filtro aria 5 , scarico 4, iniettori 3, pompa benzina 3, aspirazione 2, volano 2, turbina 1, intercooler 1', 1, 500),
(6, 'Stage 1', 'Rimappatura centralina 1, filtro aria 1', 2, 100),
(7, 'Stage 2', 'Rimappatura centralina 2, filtro aria 2 , scarico 1', 2, 200),
(8, 'Stage 3', 'Rimappatura centralina 3, filtro aria 3 , scarico 2, iniettori 1, pompa benzina 1', 2, 300),
(9, 'Stage 4', 'Rimappatura centralina 4, filtro aria 4 , scarico 3, iniettori 2, pompa benzina 2, aspirazione 1, volano 1', 2, 400),
(10, 'Stage 5', 'Rimappatura centralina 5, filtro aria 5 , scarico 4, iniettori 3, pompa benzina 3, aspirazione 2, volano 2, turbina 1, intercooler 1', 2, 500),
(11, 'Stage 1', 'Rimappatura centralina 1, filtro aria 1', 3, 100),
(12, 'Stage 2', 'Rimappatura centralina 2, filtro aria 2 , scarico 1', 3, 200),
(13, 'Stage 3', 'Rimappatura centralina 3, filtro aria 3 , scarico 2, iniettori 1, pompa benzina 1', 3, 300),
(14, 'Stage 4', 'Rimappatura centralina 4, filtro aria 4 , scarico 3, iniettori 2, pompa benzina 2, aspirazione 1, volano 1', 3, 400),
(15, 'Stage 5', 'Rimappatura centralina 5, filtro aria 5 , scarico 4, iniettori 3, pompa benzina 3, aspirazione 2, volano 2, turbina 1, intercooler 1', 3, 500),
(16, 'Stage 1', 'Rimappatura centralina 1, filtro aria 1', 4, 100),
(17, 'Stage 2', 'Rimappatura centralina 2, filtro aria 2 , scarico 1', 4, 200),
(18, 'Stage 3', 'Rimappatura centralina 3, filtro aria 3 , scarico 2, iniettori 1, pompa benzina 1', 4, 300),
(19, 'Stage 4', 'Rimappatura centralina 4, filtro aria 4 , scarico 3, iniettori 2, pompa benzina 2, aspirazione 1, volano 1', 4, 400),
(20, 'Stage 5', 'Rimappatura centralina 5, filtro aria 5 , scarico 4, iniettori 3, pompa benzina 3, aspirazione 2, volano 2, turbina 1, intercooler 1', 4, 500);

-- --------------------------------------------------------

--
-- Struttura della tabella `parti`
--

CREATE TABLE `parti` (
  `id` int(11) NOT NULL,
  `id_automobile` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `prezzo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `parti`
--

INSERT INTO `parti` (`id`, `id_automobile`, `categoria`, `nome`, `prezzo`) VALUES
(1, 1, 'Centralina', 'Rimappatura centralina 1', 100),
(2, 1, 'Centralina', 'Rimappatura centralina 2', 200),
(3, 1, 'Centralina', 'Rimappatura centralina 3', 300),
(4, 1, 'Centralina', 'Rimappatura centralina 4', 400),
(5, 1, 'Centralina', 'Rimappatura centralina 5', 500),
(6, 1, 'Filtro aria', 'Filtro aria 1', 100),
(7, 1, 'Filtro aria', 'Filtro aria 2', 200),
(8, 1, 'Filtro aria', 'Filtro aria 3', 300),
(9, 1, 'Filtro aria', 'Filtro aria 4', 400),
(10, 1, 'Filtro aria', 'Filtro aria 5', 500),
(11, 1, 'Scarico', 'Scarico 1', 100),
(12, 1, 'Scarico', 'Scarico 2', 200),
(13, 1, 'Scarico', 'Scarico 3', 300),
(14, 1, 'Scarico', 'Scarico 4', 400),
(15, 1, 'Iniettori', 'Iniettori 1', 100),
(16, 1, 'Iniettori', 'Iniettori 2', 200),
(17, 1, 'Iniettori', 'Iniettori 3', 300),
(18, 1, 'Pompa benzina', 'Pompa benzina 1', 100),
(19, 1, 'Pompa benzina', 'Pompa benzina 2', 200),
(20, 1, 'Pompa benzina', 'Pompa benzina 3', 300),
(21, 1, 'Aspirazione', 'Aspirazione 1', 100),
(22, 1, 'Aspirazione', 'Aspirazione 2', 200),
(23, 1, 'Volano alleggerito', 'Volano alleggerito 1', 100),
(24, 1, 'Volano alleggerito', 'Volano alleggerito 2', 200),
(25, 1, 'Turbina', 'Turbina 1', 100),
(26, 1, 'Intercooler', 'Intercooler 1', 100),
(27, 2, 'Centralina', 'Rimappatura centralina 1', 100),
(28, 2, 'Centralina', 'Rimappatura centralina 2', 200),
(29, 2, 'Centralina', 'Rimappatura centralina 3', 300),
(30, 2, 'Centralina', 'Rimappatura centralina 4', 400),
(31, 2, 'Centralina', 'Rimappatura centralina 5', 500),
(32, 2, 'Filtro aria', 'Filtro aria 1', 100),
(33, 2, 'Filtro aria', 'Filtro aria 2', 200),
(34, 2, 'Filtro aria', 'Filtro aria 3', 300),
(35, 2, 'Filtro aria', 'Filtro aria 4', 400),
(36, 2, 'Filtro aria', 'Filtro aria 5', 500),
(37, 2, 'Scarico', 'Scarico 1', 100),
(38, 2, 'Scarico', 'Scarico 2', 200),
(39, 2, 'Scarico', 'Scarico 3', 300),
(40, 2, 'Scarico', 'Scarico 4', 400),
(41, 2, 'Iniettori', 'Iniettori 1', 100),
(42, 2, 'Iniettori', 'Iniettori 2', 200),
(43, 2, 'Iniettori', 'Iniettori 3', 300),
(44, 2, 'Pompa benzina', 'Pompa benzina 1', 100),
(45, 2, 'Pompa benzina', 'Pompa benzina 2', 200),
(46, 2, 'Pompa benzina', 'Pompa benzina 3', 300),
(47, 2, 'Aspirazione', 'Aspirazione 1', 100),
(48, 2, 'Aspirazione', 'Aspirazione 2', 200),
(49, 2, 'Volano alleggerito', 'Volano alleggerito 1', 100),
(50, 2, 'Volano alleggerito', 'Volano alleggerito 2', 200),
(51, 2, 'Turbina', 'Turbina 1', 100),
(52, 2, 'Intercooler', 'Intercooler 1', 100),
(53, 3, 'Centralina', 'Rimappatura centralina 1', 100),
(54, 3, 'Centralina', 'Rimappatura centralina 2', 200),
(55, 3, 'Centralina', 'Rimappatura centralina 3', 300),
(56, 3, 'Centralina', 'Rimappatura centralina 4', 400),
(57, 3, 'Centralina', 'Rimappatura centralina 5', 500),
(58, 3, 'Filtro aria', 'Filtro aria 1', 100),
(59, 3, 'Filtro aria', 'Filtro aria 2', 200),
(60, 3, 'Filtro aria', 'Filtro aria 3', 300),
(61, 3, 'Filtro aria', 'Filtro aria 4', 400),
(62, 3, 'Filtro aria', 'Filtro aria 5', 500),
(63, 3, 'Scarico', 'Scarico 1', 100),
(64, 3, 'Scarico', 'Scarico 2', 200),
(65, 3, 'Scarico', 'Scarico 3', 300),
(66, 3, 'Scarico', 'Scarico 4', 400),
(67, 3, 'Iniettori', 'Iniettori 1', 100),
(68, 3, 'Iniettori', 'Iniettori 2', 200),
(69, 3, 'Iniettori', 'Iniettori 3', 300),
(70, 3, 'Pompa benzina', 'Pompa benzina 1', 100),
(71, 3, 'Pompa benzina', 'Pompa benzina 2', 200),
(72, 3, 'Pompa benzina', 'Pompa benzina 3', 300),
(73, 3, 'Aspirazione', 'Aspirazione 1', 100),
(74, 3, 'Aspirazione', 'Aspirazione 2', 200),
(75, 3, 'Volano alleggerito', 'Volano alleggerito 1', 100),
(76, 3, 'Volano alleggerito', 'Volano alleggerito 2', 200),
(77, 3, 'Turbina', 'Turbina 1', 100),
(78, 3, 'Intercooler', 'Intercooler 1', 100),
(79, 4, 'Centralina', 'Rimappatura centralina 1', 100),
(80, 4, 'Centralina', 'Rimappatura centralina 2', 200),
(81, 4, 'Centralina', 'Rimappatura centralina 3', 300),
(82, 4, 'Centralina', 'Rimappatura centralina 4', 400),
(83, 4, 'Centralina', 'Rimappatura centralina 5', 500),
(84, 4, 'Filtro aria', 'Filtro aria 1', 100),
(85, 4, 'Filtro aria', 'Filtro aria 2', 200),
(86, 4, 'Filtro aria', 'Filtro aria 3', 300),
(87, 4, 'Filtro aria', 'Filtro aria 4', 400),
(88, 4, 'Filtro aria', 'Filtro aria 5', 500),
(89, 4, 'Scarico', 'Scarico 1', 100),
(90, 4, 'Scarico', 'Scarico 2', 200),
(91, 4, 'Scarico', 'Scarico 3', 300),
(92, 4, 'Scarico', 'Scarico 4', 400),
(93, 4, 'Iniettori', 'Iniettori 1', 100),
(94, 4, 'Iniettori', 'Iniettori 2', 200),
(95, 4, 'Iniettori', 'Iniettori 3', 300),
(96, 4, 'Pompa benzina', 'Pompa benzina 1', 100),
(97, 4, 'Pompa benzina', 'Pompa benzina 2', 200),
(98, 4, 'Pompa benzina', 'Pompa benzina 3', 300),
(99, 4, 'Aspirazione', 'Aspirazione 1', 100),
(100, 4, 'Aspirazione', 'Aspirazione 2', 200),
(101, 4, 'Volano alleggerito', 'Volano alleggerito 1', 100),
(102, 4, 'Volano alleggerito', 'Volano alleggerito 2', 200),
(103, 4, 'Turbina', 'Turbina 1', 100),
(104, 4, 'Intercooler', 'Intercooler 1', 100);

-- --------------------------------------------------------

--
-- Struttura della tabella `parti_kit`
--

CREATE TABLE `parti_kit` (
  `id_kit` int(11) NOT NULL,
  `id_parte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `parti_kit`
--

INSERT INTO `parti_kit` (`id_kit`, `id_parte`) VALUES
(1, 1),
(1, 6),
(2, 2),
(2, 7),
(2, 11),
(3, 3),
(3, 8),
(3, 12),
(3, 15),
(3, 18),
(4, 4),
(4, 9),
(4, 13),
(4, 16),
(4, 19),
(4, 21),
(4, 23),
(5, 5),
(5, 10),
(5, 14),
(5, 17),
(5, 20),
(5, 22),
(5, 24),
(5, 25),
(5, 26),
(6, 27),
(6, 32),
(7, 28),
(7, 33),
(7, 37),
(8, 29),
(8, 34),
(8, 38),
(8, 41),
(8, 44),
(9, 30),
(9, 35),
(9, 39),
(9, 42),
(9, 45),
(9, 47),
(9, 49),
(10, 31),
(10, 36),
(10, 40),
(10, 43),
(10, 46),
(10, 48),
(10, 50),
(10, 51),
(10, 52),
(11, 53),
(11, 58),
(12, 54),
(12, 59),
(12, 63),
(13, 55),
(13, 60),
(13, 64),
(13, 67),
(13, 70),
(14, 56),
(14, 61),
(14, 65),
(14, 68),
(14, 71),
(14, 73),
(14, 75),
(15, 57),
(15, 62),
(15, 66),
(15, 69),
(15, 72),
(15, 74),
(15, 76),
(15, 77),
(15, 78),
(16, 79),
(16, 84),
(17, 80),
(17, 85),
(17, 89),
(18, 81),
(18, 86),
(18, 90),
(18, 93),
(18, 96),
(19, 82),
(19, 87),
(19, 91),
(19, 94),
(19, 97),
(19, 99),
(19, 101),
(20, 83),
(20, 88),
(20, 92),
(20, 95),
(20, 98),
(20, 100),
(20, 102),
(20, 103),
(20, 104);

-- --------------------------------------------------------

--
-- Struttura della tabella `parti_prenotazioni`
--

CREATE TABLE `parti_prenotazioni` (
  `id_prenotazione` int(11) NOT NULL,
  `id_parte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni_banco`
--

CREATE TABLE `prenotazioni_banco` (
  `id` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni_elaborazioni`
--

CREATE TABLE `prenotazioni_elaborazioni` (
  `id` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `id_automobile` int(11) NOT NULL,
  `targa` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `bancaggio` tinyint(1) NOT NULL,
  `preventivo` float NOT NULL,
  `stato` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `email`, `password`, `nome`, `cognome`, `telefono`) VALUES
(8, 'pincopallino@gmail.com', 'asd', 'pinco', 'pallino', '1234567890');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `automobili`
--
ALTER TABLE `automobili`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `eventi`
--
ALTER TABLE `eventi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `kit`
--
ALTER TABLE `kit`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `parti`
--
ALTER TABLE `parti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prenotazioni_banco`
--
ALTER TABLE `prenotazioni_banco`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prenotazioni_elaborazioni`
--
ALTER TABLE `prenotazioni_elaborazioni`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `automobili`
--
ALTER TABLE `automobili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `eventi`
--
ALTER TABLE `eventi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `kit`
--
ALTER TABLE `kit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `parti`
--
ALTER TABLE `parti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT per la tabella `prenotazioni_banco`
--
ALTER TABLE `prenotazioni_banco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `prenotazioni_elaborazioni`
--
ALTER TABLE `prenotazioni_elaborazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
