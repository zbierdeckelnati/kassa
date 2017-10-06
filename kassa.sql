-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Okt 2017 um 17:25
-- Server-Version: 5.7.17
-- PHP-Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kassa`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bslmitarbeiter`
--

CREATE TABLE `bslmitarbeiter` (
  `id` int(10) NOT NULL,
  `beschreibung` varchar(255) NOT NULL,
  `soll` int(11) NOT NULL,
  `haben` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bslmitarbeiter`
--

INSERT INTO `bslmitarbeiter` (`id`, `beschreibung`, `soll`, `haben`, `file`, `type`, `size`) VALUES
(1, 'ad', 50, 0, '10236-jellyfish.jpg', 'image/jpeg', 758),
(2, 'ad', 50, 0, '92529-jellyfish.jpg', 'image/jpeg', 758),
(5, 'swal', 9, 0, '28285-tulips.jpg', 'image/jpeg', 606),
(7, 'dddd', 50, 0, '63123-jellyfish.jpg', 'image/jpeg', 758);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `bsl` varchar(255) NOT NULL,
  `virtua` varchar(255) NOT NULL,
  `selecta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `bsl`, `virtua`, `selecta`) VALUES
(2, 'og', '5bc3c1d52024c150581c7651627304b7', 'ja', 'ja', 'ja'),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', '', 'ja', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usersadmin`
--

CREATE TABLE `usersadmin` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Daten für Tabelle `usersadmin`
--

INSERT INTO `usersadmin` (`uid`, `username`, `password`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `virtua`
--

CREATE TABLE `virtua` (
  `id` int(10) NOT NULL,
  `beschreibung` varchar(255) NOT NULL,
  `soll` int(11) NOT NULL,
  `haben` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `virtua`
--

INSERT INTO `virtua` (`id`, `beschreibung`, `soll`, `haben`, `file`, `type`, `size`) VALUES
(1, 'asdfjklÃ¶', 400, 0, '81190-studieren.jpg', 'image/jpeg', 18),
(2, 'new', 100, 0, '46956-lighthouse.jpg', 'image/jpeg', 548),
(4, 'virtua', 50, 70, '54068-studieren.jpg', 'image/jpeg', 18),
(5, 'virtua', 50, 70, '48234-studieren.jpg', 'image/jpeg', 18),
(23, 'virtua', 50, 70, '46482-studieren.jpg', 'image/jpeg', 18);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zahlungen`
--

CREATE TABLE `zahlungen` (
  `id` int(10) NOT NULL,
  `beschreibung` varchar(255) NOT NULL,
  `soll` int(11) NOT NULL,
  `haben` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `zahlungen`
--

INSERT INTO `zahlungen` (`id`, `beschreibung`, `soll`, `haben`, `file`, `type`, `size`) VALUES
(10, 'BENIIII', 30, 0, '81059-d6b65b0593807fa74148fbcc33a1c873.jpg', 'image/jpeg', 362),
(9, 'asdf', 40, 0, '6556-d6b65b0593807fa74148fbcc33a1c873.jpg', 'image/jpeg', 362),
(6, 'hex', 150, 0, '62631-6770455-amazing-wallpaper.jpg', 'image/jpeg', 270),
(7, 'SASCHasdfasdfdf', 30, 0, '16469-dreamy_rose-wallpaper-1920x1200.jpg', 'image/jpeg', 246),
(8, 'asdf', 0, 60, '17301-09_aufgaben_elektrische_arbeit_nr.7.xlsx', 'application/vnd.openxmlformats', 11),
(11, 'GA', 0, 10, '92490-roboter.png', 'image/png', 120),
(12, 'vfvf', 100, 30, '83574-roboter.png', 'image/png', 120),
(13, 'ddd', 30, 0, '6124-studieren.jpg', 'image/jpeg', 18),
(14, 'asdf', 40, 0, '52316-studieren.jpg', 'image/jpeg', 18),
(15, 'sdf', 50, 0, '34321-desert.jpg', 'image/jpeg', 826);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bslmitarbeiter`
--
ALTER TABLE `bslmitarbeiter`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indizes für die Tabelle `usersadmin`
--
ALTER TABLE `usersadmin`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indizes für die Tabelle `virtua`
--
ALTER TABLE `virtua`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `zahlungen`
--
ALTER TABLE `zahlungen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bslmitarbeiter`
--
ALTER TABLE `bslmitarbeiter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `usersadmin`
--
ALTER TABLE `usersadmin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `virtua`
--
ALTER TABLE `virtua`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT für Tabelle `zahlungen`
--
ALTER TABLE `zahlungen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
