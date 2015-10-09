-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 09 okt 2015 om 11:05
-- Serverversie: 5.6.20
-- PHP-versie: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `bowling`
--
CREATE DATABASE IF NOT EXISTS `bowling` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bowling`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
`Game_ID` int(11) NOT NULL,
  `Tournooi_ID` int(11) NOT NULL,
  `Naam` text NOT NULL,
  `Datum` date NOT NULL,
  `Tijd` time NOT NULL,
  `Locatie` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `game`
--

INSERT INTO `game` (`Game_ID`, `Tournooi_ID`, `Naam`, `Datum`, `Tijd`, `Locatie`) VALUES
(1, 0, 'test', '0000-00-00', '21:30:00', 'test'),
(2, 0, 'test', '0000-00-00', '21:30:00', 'test');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tounament`
--

DROP TABLE IF EXISTS `tounament`;
CREATE TABLE IF NOT EXISTS `tounament` (
  `Toernooi_ID` int(11) NOT NULL,
  `Eigenaar_ID` int(11) NOT NULL,
  `Begin_Datum` date NOT NULL,
  `Eind_Datum` date NOT NULL,
  `Naam` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `game`
--
ALTER TABLE `game`
 ADD PRIMARY KEY (`Game_ID`), ADD UNIQUE KEY `Game_ID` (`Game_ID`);

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
-- Indexen voor tabel `tounament`
--
ALTER TABLE `tounament`
 ADD PRIMARY KEY (`Toernooi_ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `game`
--
ALTER TABLE `game`
MODIFY `Game_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `score`
--
ALTER TABLE `score`
MODIFY `Score_ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
