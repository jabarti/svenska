-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 06 Lip 2014, 22:59
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
  PRIMARY KEY (`id`,`id_ord`),
  UNIQUE KEY `id_ord_UNIQUE` (`id_ord`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Zrzut danych tabeli `ord`
--

INSERT INTO `ord` (`id`, `id_ord`, `typ`, `rodzaj`, `trans`, `infinitive`, `presens`, `past`, `supine`, `imperative`, `present_participle`, `past_participle`, `S_indefinite`, `S_definite`, `P_indefinite`, `P_definite`, `st_wyzszy`, `st_najwyzszy`, `wymowa`) VALUES
(1, 'rower', 'noun', 'en', 'cykel', '', '', '', '', '', '', '', 'en cykel', 'cykeln', 'cyklar', 'cyklarna', '', '', 'sykel'),
(2, 'list', 'noun', 'ett', 'brev', '', '', '', '', '', '', '', 'ett brev', 'brevet', 'brev', 'breven', '', '', ''),
(3, 'iĹÄ', 'verb', 'att', 'gĂĽ', 'att gĂĽ', 'gĂĽr', 'gick', 'gĂĽtt', 'gĂĽ', 'gĂĽende', 'gĂĽngen', '', '', '', '', '', '', 'goa'),
(4, 'samochĂłd', 'noun', 'en', 'bil', '', '', '', '', '', '', '', 'en bil', 'bilen', 'bilar', 'bilarna', '', '', ''),
(5, 'kiedy, wtedy', 'adverb', '', 'dĂĽ', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'mĹody(a)', 'adjective', '', 'ung, ungt, unga', '', '', '', '', '', '', '', '', '', '', '', 'yngre', 'yngst', ''),
(7, 'wczeĹniej, poprzednio', 'adjective', '', 'tidigare', '', '', '', '', '', '', '', '', '', '', '', '', '', 'tidjare'),
(8, 'mieszkaÄ', 'verb', 'att', 'bo', 'att bo', 'bor', 'bodde', 'bott', 'bo!', 'boende', 'brak', '', '', '', '', '', '', ''),
(9, 'z', 'preposition', '', 'med', '', '', '', '', '', '', '', 'med', 'meden', 'medar', 'medarna', '', '', ''),
(10, 'mieÄ', 'verb', 'att', 'ha', 'att ha', 'har', 'hade', 'haft', 'ha!', '', '', '', '', '', '', '', '', ''),
(11, 'chodziÄ, iĹÄ', 'verb', 'att', 'ĂĽka', 'att ĂĽka', 'ĂĽker', 'ĂĽkte', 'ĂĽkt', 'ĂĽk ', 'ĂĽkande', 'brak', '', '', '', '', '', '', 'oker'),
(12, 'poĹczocha, skarpeta', 'noun', 'en', 'en strumpa', '', '', '', '', '', '', '', 'en strumpa', 'strumpan', 'strumpor', 'strumporna', '', '', ''),
(13, 'brudny, brudne', 'adjective', '', 'smutsig, smutsigt, smutsiga', '', '', '', '', '', '', '', '', '', '', '', 'smutsigare', 'smutsigast', ''),
(14, 'pada deszcz', 'verb', 'att', 'regna', 'att regna', 'regnar', 'regnade', 'regnat', 'regna!', 'regnande', '', '', '', '', '', '', '', ''),
(15, 'czekaÄ', 'verb', 'att', 'vĂ¤nta', 'att vĂ¤nta', 'vĂ¤ntar', 'vĂ¤ntade', 'vĂ¤ntat', 'vĂ¤nta', 'vĂ¤ntande', 'vĂ¤ntad', '', '', '', '', '', '', ''),
(16, 'tutaj', 'adverb', '', 'hĂ¤r', '', '', '', '', '', '', '', '', '', '', '', '', '', 'her'),
(17, 'uniwersytet', 'noun', 'ett', 'universitet', '', '', '', '', '', '', '', 'ett universitet', 'universitetet', 'universitet', 'universiteten', '', '', ''),
(18, 'szkoĹa podstawowa', 'noun', 'en', 'grundskola', '', '', '', '', '', '', '', 'en grundskola', 'grundskolan', '', '', '', '', ''),
(19, 'uczeĹ', 'noun', 'en', 'elev', '', '', '', '', '', '', '', 'en elev', 'eleven', 'elever', 'eleverna', '', '', ''),
(20, 'takie samo', 'adjective', '', 'samma, samme', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'lubiÄ', 'verb', 'att', 'tycka om', 'att tycka om', 'tycker om', 'tyckte om', 'tyckt om', 'tyck om!', '', '', '', '', '', '', '', '', ''),
(22, 'myĹleÄ, sÄdziÄ, uwaĹźaÄ', 'verb', 'att', 'tycka', 'att tycka', 'tycker', 'tyckte', 'tyckt', 'tyck!', 'tyckande', 'tyckt', '', '', '', '', '', '', ''),
(23, 'biuro', 'noun', 'ett', 'kontor', '', '', '', '', '', '', '', 'ett kontor', 'kontoret', 'kontor', 'kontoren', '', '', ''),
(24, 'sklep', 'noun', 'en', 'affĂ¤r', '', '', '', '', '', '', '', 'en affĂ¤r', 'affĂ¤ren', 'affĂ¤rer', 'affĂ¤rerna', '', '', 'affar'),
(25, 'chory, chora', 'adjective', '', 'sjuk, sjukt, sjuka', '', '', '', '', '', '', '', '', '', '', '', 'sjukare', 'sjukast', 'chjuk'),
(26, 'choroba', 'noun', 'en', 'sjuka', '', '', '', '', '', '', '', 'en sjuka', 'sjukan', 'sjukor', 'sjukorna', '', '', 'chjuka'),
(27, 'otwarte', 'adjective', '', 'Ăśppen, Ăśppet, Ăśppna', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'kierownik', 'noun', 'en', 'chef', '', '', '', '', '', '', '', 'en chef', 'chefen', 'chefer', 'cheferna', '', '', ''),
(29, 'pracownik', 'noun', 'en', 'anstĂ¤lld', '', '', '', '', '', '', '', 'en anstĂ¤lld', '', 'anstĂ¤llda', '', '', '', ''),
(30, 'staroĹÄ', 'adjective', '', 'gammal, gammalt, gamla', '', '', '', '', '', '', '', '', '', '', '', 'Ă¤ldre', 'Ă¤ldst', ''),
(31, 'ksiÄgarnia', 'noun', 'en', 'bokhandel', '', '', '', '', '', '', '', 'en bokhandel', 'bokhandeln', 'bokhandlar', 'bokhandlarna', '', '', ''),
(32, 'informatyka', 'noun', 'en', 'datavetenskap', '', '', '', '', '', '', '', 'en datavetenskap', 'datavetenskapen', 'datavetenskaps', 'datavetenskapens', '', '', ''),
(33, 'pĂłĹşniej', 'adverb', '', 'sedan', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 'ciepĹo', 'noun', 'en', 'vĂ¤rme', '', '', '', '', '', '', '', 'en vĂ¤rme', 'vĂ¤rmen', '', '', '', '', ''),
(35, 'spragniony', 'adjective', '', 'tĂśrstig, tĂśrstigt, tĂśrstiga', '', '', '', '', '', '', '', '', '', '', '', 'tĂśrstigare', 'tĂśrstigast', 'torsztig'),
(36, 'gĹodny', 'adjective', '', 'hungrig', '', '', '', '', '', '', '', '', '', '', '', 'hungrigare', 'hungrigast', ''),
(37, 'dawaÄ', 'verb', 'att', 'ge', 'att ge', 'ger', 'gav', 'gett/givit', 'ge!', '', '', '', '', '', '', '', '', ''),
(38, 'mieszkanie', 'noun', 'en', 'lĂ¤genhet', '', '', '', '', '', '', '', 'en lĂ¤genhet', 'lĂ¤genheten', 'lĂ¤genheter', 'lĂ¤genheterna', '', '', 'legenhet'),
(39, 'nauczaÄ', 'verb', 'att', 'undervisa', 'att undervisa', 'undervisar', 'undervisade', 'undervisat', 'undervisa!', '', '', '', '', '', '', '', '', ''),
(40, 'piÄ', 'verb', 'att', 'dricka', 'att dricka', 'dricker', 'drack', 'druckit', 'drick!', 'drickande', 'drucken', '', '', '', '', '', '', ''),
(41, 'napĂłj', 'noun', 'en', 'dricka', '', '', '', '', '', '', '', 'en dricka', 'drickan', 'drickor', 'drickorna', '', '', ''),
(42, 'lot', 'noun', 'ett', 'flyg', '', '', '', '', '', '', '', 'ett flyg', 'flyget', 'flyg', 'flygen', '', '', ''),
(43, 'odjechaÄ', 'verb', 'att', 'avgĂĽ', 'att avgĂĽ', 'avgĂĽr', 'avgick', 'avgĂĽtt', 'avgĂĽ!', 'avgĂĽende', 'avgĂĽngen', '', '', '', '', '', '', ''),
(44, 'kanapka', 'noun', 'en', 'smĂśrgĂĽs', '', '', '', '', '', '', '', 'en smĂśrgĂĽs', 'smĂśrgĂĽsen', 'smĂśrgĂĽsar', 'smĂśrgĂĽsarna', '', '', 'smorgos'),
(45, 'jeĹÄ', 'verb', 'att', 'Ă¤ta', 'att Ă¤ta', 'Ă¤ter', 'ĂĽt', 'Ă¤tit', 'Ă¤t!', '', '', '', '', '', '', '', '', ''),
(46, 'marchewka', 'noun', 'en', 'morot', '', '', '', '', '', '', '', 'en morot', 'moroten', 'morĂśtter', 'morĂśtterna', '', '', ''),
(47, 'kto', 'pronoun', '', 'vem', '', '', '', '', '', '', '', '', '', 'vilka', '', '', '', ''),
(48, 'babcia (matka ojca)', 'noun', 'en', 'farmor', '', '', '', '', '', '', '', 'en farmor', 'farmorn/farmodern', 'farmĂśdrar', 'farmĂśdrarna', '', '', ''),
(49, 'babcia (matka matki)', 'noun', 'en', 'mormor', '', '', '', '', '', '', '', 'en mormor', 'mormorn/mormodern', 'mormĂśdrar', 'mormĂśdrarna', '', '', ''),
(50, 'chÄtnie, proszÄ', 'adjective', '', 'gĂ¤rna', '', '', '', '', '', '', '', '', '', '', '', 'hellre', 'helst', ''),
(51, 'albo, lub', '', '', 'eller', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, 'rozumie', 'verb', 'att', 'fĂśrstĂĽ', 'att fĂśrstĂĽ', 'fĂśrstĂĽr', 'fĂśrstod', 'fĂśrstĂĽtt', 'fĂśrstĂĽ!', '', '', '', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
