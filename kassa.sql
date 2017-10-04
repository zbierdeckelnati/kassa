-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Okt 2017 um 16:48
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`uid`, `username`, `password`) VALUES
(1, 'test', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'og', '5bc3c1d52024c150581c7651627304b7');

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
(9, 'asdf', 3333333, 3, '6556-d6b65b0593807fa74148fbcc33a1c873.jpg', 'image/jpeg', 362),
(6, 'hadd', 30, 300, '62631-6770455-amazing-wallpaper.jpg', 'image/jpeg', 270),
(7, 'SASCHasdfasdfdf', 30, 0, '16469-dreamy_rose-wallpaper-1920x1200.jpg', 'image/jpeg', 246),
(8, 'asdf', 3, 66, '17301-09_aufgaben_elektrische_arbeit_nr.7.xlsx', 'application/vnd.openxmlformats', 11);

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
-- Indizes für die Tabelle `zahlungen`
--
ALTER TABLE `zahlungen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `zahlungen`
--
ALTER TABLE `zahlungen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
