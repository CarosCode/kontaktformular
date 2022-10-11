-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Sep 2022
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kontaktformular`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kontaktdaten`
--

CREATE TABLE `kontaktdaten` (
  `id` int(11) NOT NULL,
  `vorname` varchar(45) NOT NULL,
  `nachname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `nachricht` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `kontaktdaten`
--

INSERT INTO `kontaktdaten` (`id`, `vorname`, `nachname`, `email`, `telefon`, `nachricht`) VALUES
(1, 'Max', 'Mustermann', 'max.mustermann@muster.com', '0173567890', 'Hallo, ich bin Max Mustermann.'),
(2, 'Lisa', 'Lustig', 'lisa.lustig@test.com', '0162545789', 'Hallo, ich bin Lisa Lustig.');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `kontaktdaten`
--
ALTER TABLE `kontaktdaten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `kontaktdaten`
--
ALTER TABLE `kontaktdaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
