-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 07 okt 2015 om 12:18
-- Serverversie: 5.6.11
-- PHP-versie: 5.5.3

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

CREATE TABLE IF NOT EXISTS `game` (
  `Game_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tournooi_ID` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Tijd` time NOT NULL,
  `Locatie_ID` int(11) NOT NULL,
  PRIMARY KEY (`Game_ID`),
  UNIQUE KEY `Game_ID` (`Game_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `locatie`
--

CREATE TABLE IF NOT EXISTS `locatie` (
  `Locatie_ID` int(11) NOT NULL,
  `Adres` text NOT NULL,
  `Zaal_naam` text NOT NULL,
  UNIQUE KEY `Locatie_ID` (`Locatie_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `persoon`
--

CREATE TABLE IF NOT EXISTS `persoon` (
  `Google_ID` int(11) NOT NULL,
  `Fnaam` text NOT NULL,
  `Vnaam` text NOT NULL,
  PRIMARY KEY (`Google_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `Score_ID` int(11) NOT NULL,
  `Game_ID` int(11) NOT NULL,
  `Google_ID` int(11) NOT NULL,
  `Totaal` int(11) NOT NULL,
  `Strikes` int(11) NOT NULL,
  `Spare` int(11) NOT NULL,
  PRIMARY KEY (`Score_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tounament`
--

CREATE TABLE IF NOT EXISTS `tounament` (
  `Toernooi_ID` int(11) NOT NULL,
  `Eigenaar_ID` int(11) NOT NULL,
  `Begin_Datum` date NOT NULL,
  `Eind_Datum` date NOT NULL,
  `Naam` text,
  PRIMARY KEY (`Toernooi_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
