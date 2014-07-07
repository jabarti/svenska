-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 06 Lip 2014, 11:40
-- Server version: 5.5.37-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bartilev_APIPO`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ord`
--
DROP table `ord`;
CREATE TABLE IF NOT EXISTS `ord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ord` varchar(45) NOT NULL,
  `typ` enum('noun','verb','adjective','adverb','preposition','pronoun','wyrazenie') NOT NULL,
  `rodzaj` enum('ett','en','att') DEFAULT NULL,
  `trans` varchar(45) NOT NULL,
  `infinitive` varchar(45) DEFAULT NULL,
  `presens` varchar(45) DEFAULT NULL,
  `past` varchar(45) DEFAULT NULL,
  `supine` varchar(45) DEFAULT NULL,
  `imperative` varchar(45) DEFAULT NULL,
  `present_participle` varchar(45) DEFAULT NULL,
  `past_participle` varchar(45) DEFAULT NULL,
  `S_indefinite` varchar(45) DEFAULT NULL,
  `S_definite` varchar(45) DEFAULT NULL,
  `P_indefinite` varchar(45) DEFAULT NULL,
  `P_definite` varchar(45) DEFAULT NULL,
  `st_wyzszy` varchar(45) DEFAULT NULL,
  `st_najwyzszy` varchar(45) DEFAULT NULL,
  `wymowa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_ord`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `ord`
--

INSERT INTO `ord` (`id`, `id_ord`, `typ`, `rodzaj`, `trans`, `infinitive`, `presens`, `past`, `supine`, `imperative`, `present_participle`, `past_participle`, `S_indefinite`, `S_definite`, `P_indefinite`, `P_definite`, `st_wyzszy`, `st_najwyzszy`, `wymowa`) VALUES
(1, 'iĹÄ', 'noun', '', 'pĂĽ', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Ä,Ä,Ä,Ĺ,Ĺ,Ăł,Ĺ,', 'noun', '', 'ĂĽ,Ăś,Ă¤,Ă,Ă,Ă', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ä,Ä,Ä,Ĺ,Ĺ,Ă,Ĺ');
--   ą, ć, ę, ł, ń, Ăł, ś
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
