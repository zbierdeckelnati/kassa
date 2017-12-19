-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Okt 2017 um 17:11
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
CREATE DATABASE IF NOT EXISTS `kassa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kassa`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bslmitarbeiter`
--

CREATE TABLE `bslmitarbeiter` (
  `id` int(10) NOT NULL,
  `datum` date NOT NULL,
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

INSERT INTO `bslmitarbeiter` (`id`, `datum`, `beschreibung`, `soll`, `haben`, `file`, `type`, `size`) VALUES
(1, '2017-06-06', 'ad', 50, 0, '10236-jellyfish.jpg', 'image/jpeg', 758),
(2, '2017-05-05', 'ad', 5000, 0, '92529-jellyfish.jpg', 'image/jpeg', 758),
(7, '2017-01-01', 'dddd', 0, 100, '63123-jellyfish.jpg', 'image/jpeg', 758);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `virtua`
--

CREATE TABLE `virtua` (
  `id` int(10) NOT NULL,
  `datum` date NOT NULL,
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

INSERT INTO `virtua` (`id`, `datum`, `beschreibung`, `soll`, `haben`, `file`, `type`, `size`) VALUES
(2, '0000-00-00', 'new', 100, 0, '46956-lighthouse.jpg', 'image/jpeg', 548),
(4, '2017-02-02', 'virtua', 50, 70, '54068-studieren.jpg', 'image/jpeg', 18),
(41, '2017-07-07', 'asdfasdf', 5555, 5555, '75422-chrysanthemum.jpg', 'image/jpeg', 859);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bslmitarbeiter`
--
ALTER TABLE `bslmitarbeiter`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `virtua`
--
ALTER TABLE `virtua`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bslmitarbeiter`
--
ALTER TABLE `bslmitarbeiter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `virtua`
--
ALTER TABLE `virtua`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;--
-- Datenbank: `users`
--
CREATE DATABASE IF NOT EXISTS `users` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `users`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `bslmitarbeiter` varchar(255) NOT NULL,
  `virtua` varchar(255) NOT NULL,
  `selecta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `bslmitarbeiter`, `virtua`, `selecta`) VALUES
(2, 'og', '5bc3c1d52024c150581c7651627304b7', 'ja', 'ja', 'ja'),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', 'ja', 'ja', '');

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

--
-- Indizes der exportierten Tabellen
--

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
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `usersadmin`
--
ALTER TABLE `usersadmin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
