-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 30 okt 2015 om 20:31
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

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `Game_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tournament_ID` int(11) NOT NULL,
  `Game_Name` text NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Location` text,
  PRIMARY KEY (`Game_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `game`
--

INSERT INTO `game` (`Game_ID`, `Tournament_ID`, `Game_Name`, `Date`, `Time`, `Location`) VALUES
(1, 0, 'Game1', '2015-10-10', '10:10:00', 'HASSELT'),
(2, 0, 'Game2', '2015-10-10', '10:10:00', 'HASSELT'),
(3, 0, 'Game3', '2015-10-10', '10:10:00', 'HASSELT'),
(4, 0, 'Game4', '2015-10-10', '10:10:00', 'HASSELT');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `Game_ID` int(11) NOT NULL,
  `Google_ID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `participants`
--

INSERT INTO `participants` (`Game_ID`, `Google_ID`) VALUES
(1, '4'),
(2, '1'),
(2, '2'),
(2, '3'),
(2, '4'),
(3, '1'),
(3, '2'),
(3, '3'),
(3, '4'),
(4, '1'),
(4, '2'),
(4, '3'),
(4, '4'),
(5, '1'),
(5, '2'),
(5, '3'),
(5, '4'),
(1, '1'),
(1, '2'),
(1, '3'),
(6, '1'),
(6, '2'),
(6, '3'),
(6, '4'),
(7, '1'),
(7, '2'),
(7, '3'),
(7, '4');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `participants_tournament`
--

DROP TABLE IF EXISTS `participants_tournament`;
CREATE TABLE IF NOT EXISTS `participants_tournament` (
  `Google_ID` varchar(25) NOT NULL,
  `Tournament_ID` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `participants_tournament`
--

INSERT INTO `participants_tournament` (`Google_ID`, `Tournament_ID`, `Status`) VALUES
('1', 1, 1),
('1', 1, 1),
('1', 2, 0),
('1', 3, 0),
('1', 5, 0),
('1', 6, 0),
('1', 7, 0),
('2', 1, 0),
('2', 2, 0),
('2', 3, 0),
('2', 5, 0),
('2', 6, 0),
('2', 7, 0),
('3', 1, 0),
('3', 2, 0),
('3', 3, 0),
('3', 5, 0),
('3', 6, 0),
('3', 7, 0),
('4', 1, 0),
('4', 2, 0),
('4', 3, 0),
('4', 5, 0),
('4', 6, 0),
('4', 7, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `Google_ID` varchar(25) NOT NULL,
  `Last_Name` text NOT NULL,
  `Nickname` text,
  `First_Name` text NOT NULL,
  `Email` text,
  `GSM` text,
  PRIMARY KEY (`Google_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `person`
--

INSERT INTO `person` (`Google_ID`, `Last_Name`, `Nickname`, `First_Name`, `Email`, `GSM`) VALUES
('1', 'AchternaamTest', NULL, 'Voornaam', NULL, NULL),
('2', 'Boelen', 'Bilbo', 'Tom', 'BoelenTom@gmail.com', '0497495050'),
('3', 'Trekels', '', 'Vincent', 'trekelsVincent@gmail.com', '123456789'),
('4', 'Carremans', '', 'Glenn', 'CarremansGlenn@gmail.com', '123456789'),
('5', 'Cardinaals', 'stukske', 'Leandro', 'CardinaalsLeandro@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `Score_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Game_ID` int(11) NOT NULL,
  `Google_ID` varchar(25) NOT NULL,
  `Total` int(11) NOT NULL,
  `Strikes` int(11) NOT NULL,
  `Spares` int(11) NOT NULL,
  PRIMARY KEY (`Score_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Gegevens worden uitgevoerd voor tabel `score`
--

INSERT INTO `score` (`Score_ID`, `Game_ID`, `Google_ID`, `Total`, `Strikes`, `Spares`) VALUES
(3, 1, '1', 101, 1, 2),
(4, 2, '1', 102, 1, 2),
(5, 3, '1', 103, 1, 2),
(6, 4, '1', 101, 1, 2),
(7, 1, '2', 201, 1, 2),
(8, 2, '2', 202, 1, 2),
(9, 3, '2', 203, 1, 2),
(10, 4, '2', 201, 1, 2),
(11, 1, '3', 121, 1, 2),
(12, 2, '3', 122, 1, 2),
(13, 3, '3', 123, 1, 2),
(14, 4, '3', 121, 1, 2),
(15, 1, '4', 124, 1, 2),
(16, 2, '4', 125, 1, 2),
(17, 3, '4', 126, 1, 2),
(18, 4, '4', 127, 1, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tournament`
--

DROP TABLE IF EXISTS `tournament`;
CREATE TABLE IF NOT EXISTS `tournament` (
  `Tournament_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Google_ID` varchar(25) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Tournament_Name` text,
  PRIMARY KEY (`Tournament_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `tournament`
--

INSERT INTO `tournament` (`Tournament_ID`, `Google_ID`, `Start_Date`, `End_Date`, `Tournament_Name`) VALUES
(1, '1', '2021-12-12', '2012-12-12', 'TEST TOURNOOI 1'),
(2, '1', '2021-12-12', '2012-12-12', 'TEST TOURNOOI 2'),
(3, '1', '2021-12-12', '2012-12-12', 'TEST TOURNOOI 3'),
(4, '1', '2021-12-12', '2012-12-12', 'TEST TOURNOOI 4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
