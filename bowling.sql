-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 16 okt 2015 om 10:33
-- Serverversie: 5.6.26
-- PHP-versie: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bowling`
--
CREATE DATABASE IF NOT EXISTS `bowling` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bowling`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `deelnemers`
--

DROP TABLE IF EXISTS `deelnemers`;
CREATE TABLE IF NOT EXISTS `deelnemers` (
  `GameId` int(11) NOT NULL,
  `GoogleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `deelnemersTournooi`
--

DROP TABLE IF EXISTS `deelnemersTournooi`;
CREATE TABLE IF NOT EXISTS `deelnemersTournooi` (
  `googleID` int(11) NOT NULL,
  `tournooiID` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `Game_ID` int(11) NOT NULL,
  `Tournooi_ID` int(11) NOT NULL,
  `Naam` text NOT NULL,
  `Datum` text NOT NULL,
  `Tijd` text NOT NULL,
  `Locatie` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `game`
--

INSERT INTO `game` (`Game_ID`, `Tournooi_ID`, `Naam`, `Datum`, `Tijd`, `Locatie`) VALUES
(1, 0, 'vincents game', '27/07/2016', '12:00', 'hasselt');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `persoon`
--

DROP TABLE IF EXISTS `persoon`;
CREATE TABLE IF NOT EXISTS `persoon` (
  `Google_ID` int(11) NOT NULL,
  `Fnaam` text NOT NULL,
  `Vnaam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `Score_ID` int(11) NOT NULL,
  `Game_ID` int(11) NOT NULL,
  `Google_ID` int(11) NOT NULL,
  `Totaal` int(11) NOT NULL,
  `Strikes` int(11) NOT NULL,
  `Spare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `score`
--

INSERT INTO `score` (`Score_ID`, `Game_ID`, `Google_ID`, `Totaal`, `Strikes`, `Spare`) VALUES
(0, 2, 2, 300, 12, 12),
(2, 2, 2, 300, 12, 12);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tournament`
--

DROP TABLE IF EXISTS `tournament`;
CREATE TABLE IF NOT EXISTS `tournament` (
  `Toernooi_ID` int(11) NOT NULL,
  `Eigenaar_ID` int(11) NOT NULL,
  `Begin_Datum` date NOT NULL,
  `Eind_Datum` date NOT NULL,
  `Naam` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tournament`
--

INSERT INTO `tournament` (`Toernooi_ID`, `Eigenaar_ID`, `Begin_Datum`, `Eind_Datum`, `Naam`) VALUES
(1, 1, '2021-12-12', '2012-12-12', 'vincents tournooi'),
(2, 1, '2021-12-12', '2012-12-12', 'vincents tournooi'),
(3, 1, '2021-12-12', '2012-12-12', 'vincents tournooi'),
(4, 1, '2021-12-12', '2012-12-12', 'vincents tournooi');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`Game_ID`),
  ADD UNIQUE KEY `Game_ID` (`Game_ID`);

--
-- Indexen voor tabel `persoon`
--
ALTER TABLE `persoon`
  ADD PRIMARY KEY (`Google_ID`);

--
-- Indexen voor tabel `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`Score_ID`);

--
-- Indexen voor tabel `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`Toernooi_ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `game`
--
ALTER TABLE `game`
  MODIFY `Game_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `tournament`
--
ALTER TABLE `tournament`
  MODIFY `Toernooi_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
