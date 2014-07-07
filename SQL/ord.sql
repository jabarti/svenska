-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 07 Lip 2014, 13:18
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
  `neuter` varchar(45) DEFAULT NULL,
  `masculin` varchar(45) DEFAULT NULL,
  `all` varchar(45) DEFAULT NULL,
  `st_wyzszy` varchar(45) DEFAULT NULL,
  `st_najwyzszy` varchar(45) DEFAULT NULL,
  `wymowa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_ord`),
  UNIQUE KEY `id_ord_UNIQUE` (`id_ord`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Zrzut danych tabeli `ord`
--

INSERT INTO `ord` (`id`, `id_ord`, `typ`, `rodzaj`, `trans`, `infinitive`, `presens`, `past`, `supine`, `imperative`, `present_participle`, `past_participle`, `S_indefinite`, `S_definite`, `P_indefinite`, `P_definite`, `neuter`, `masculin`, `all`, `st_wyzszy`, `st_najwyzszy`, `wymowa`) VALUES
(1, 'rower', 'noun', 'en', 'cykel', '', '', '', '', '', '', '', 'en cykel', 'cykeln', 'cyklar', 'cyklarna', NULL, NULL, NULL, '', '', 'sykel'),
(2, 'list', 'noun', 'ett', 'brev', '', '', '', '', '', '', '', 'ett brev', 'brevet', 'brev', 'breven', NULL, NULL, NULL, '', '', ''),
(3, 'iĹÄ', 'verb', 'att', 'gĂĽ', 'att gĂĽ', 'gĂĽr', 'gick', 'gĂĽtt', 'gĂĽ', 'gĂĽende', 'gĂĽngen', '', '', '', '', NULL, NULL, NULL, '', '', 'goa'),
(4, 'samochĂłd', 'noun', 'en', 'bil', '', '', '', '', '', '', '', 'en bil', 'bilen', 'bilar', 'bilarna', NULL, NULL, NULL, '', '', ''),
(5, 'kiedy, wtedy', 'adverb', '', 'dĂĽ', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(6, 'mĹody(a)', 'adjective', '', 'ung', '', '', '', '', '', '', '', '', '', '', '', 'ungt', 'unge', 'unga', 'yngre', 'yngst', ''),
(7, 'wczeĹniej, poprzednio', 'adjective', '', 'tidigare', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', 'tidjare'),
(8, 'mieszkaÄ', 'verb', 'att', 'bo', 'att bo', 'bor', 'bodde', 'bott', 'bo!', 'boende', 'brak', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(9, 'z', 'preposition', '', 'med', '', '', '', '', '', '', '', 'med', 'meden', 'medar', 'medarna', NULL, NULL, NULL, '', '', ''),
(10, 'mieÄ', 'verb', 'att', 'ha', 'att ha', 'har', 'hade', 'haft', 'ha!', '', '', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(11, 'chodziÄ, iĹÄ', 'verb', 'att', 'ĂĽka', 'att ĂĽka', 'ĂĽker', 'ĂĽkte', 'ĂĽkt', 'ĂĽk ', 'ĂĽkande', 'brak', '', '', '', '', NULL, NULL, NULL, '', '', 'oker'),
(12, 'poĹczocha, skarpeta', 'noun', 'en', 'en strumpa', '', '', '', '', '', '', '', 'en strumpa', 'strumpan', 'strumpor', 'strumporna', NULL, NULL, NULL, '', '', ''),
(13, 'brudny, brudne', 'adjective', '', 'smutsig', '', '', '', '', '', '', '', '', '', '', '', 'smutsigt', 'smutsige', 'smutsiga', 'smutsigare', 'smutsigast', ''),
(14, 'pada deszcz', 'verb', 'att', 'regna', 'att regna', 'regnar', 'regnade', 'regnat', 'regna!', 'regnande', '', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(15, 'czekaÄ', 'verb', 'att', 'vĂ¤nta', 'att vĂ¤nta', 'vĂ¤ntar', 'vĂ¤ntade', 'vĂ¤ntat', 'vĂ¤nta', 'vĂ¤ntande', 'vĂ¤ntad', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(16, 'tutaj', 'adverb', '', 'hĂ¤r', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', 'her'),
(17, 'uniwersytet', 'noun', 'ett', 'universitet', '', '', '', '', '', '', '', 'ett universitet', 'universitetet', 'universitet', 'universiteten', NULL, NULL, NULL, '', '', ''),
(18, 'szkoĹa podstawowa', 'noun', 'en', 'grundskola', '', '', '', '', '', '', '', 'en grundskola', 'grundskolan', '', '', NULL, NULL, NULL, '', '', ''),
(19, 'uczeĹ', 'noun', 'en', 'elev', '', '', '', '', '', '', '', 'en elev', 'eleven', 'elever', 'eleverna', NULL, NULL, NULL, '', '', ''),
(20, 'takie samo', 'adjective', '', 'samma, samme', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(21, 'lubiÄ', 'verb', 'att', 'tycka om', 'att tycka om', 'tycker om', 'tyckte om', 'tyckt om', 'tyck om!', '', '', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(22, 'myĹleÄ, sÄdziÄ, uwaĹźaÄ', 'verb', 'att', 'tycka', 'att tycka', 'tycker', 'tyckte', 'tyckt', 'tyck!', 'tyckande', 'tyckt', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(23, 'biuro', 'noun', 'ett', 'kontor', '', '', '', '', '', '', '', 'ett kontor', 'kontoret', 'kontor', 'kontoren', NULL, NULL, NULL, '', '', ''),
(24, 'sklep', 'noun', 'en', 'affĂ¤r', '', '', '', '', '', '', '', 'en affĂ¤r', 'affĂ¤ren', 'affĂ¤rer', 'affĂ¤rerna', NULL, NULL, NULL, '', '', 'affar'),
(25, 'chory, chora', 'adjective', '', 'sjuk', '', '', '', '', '', '', '', '', '', '', '', 'sjukt', 'sjuke', 'sjuka', 'sjukare', 'sjukast', 'chjuk'),
(26, 'choroba', 'noun', 'en', 'sjuka', '', '', '', '', '', '', '', 'en sjuka', 'sjukan', 'sjukor', 'sjukorna', NULL, NULL, NULL, '', '', 'chjuka'),
(27, 'otwarte', 'adjective', '', 'Ăśppen', '', '', '', '', '', '', '', '', '', '', '', 'Ăśppet', 'Ăśppne', 'Ăśppna', 'Ăśppnare', 'Ăśppnast', ''),
(28, 'kierownik', 'noun', 'en', 'chef', '', '', '', '', '', '', '', 'en chef', 'chefen', 'chefer', 'cheferna', NULL, NULL, NULL, '', '', ''),
(29, 'pracownik', 'noun', 'en', 'anstĂ¤lld', '', '', '', '', '', '', '', 'en anstĂ¤lld', '', 'anstĂ¤llda', '', NULL, NULL, NULL, '', '', ''),
(30, 'staroĹÄ', 'adjective', '', 'gammal', '', '', '', '', '', '', '', '', '', '', '', 'gammalt', 'gamle', 'gamla', 'Ă¤ldre', 'Ă¤ldst', ''),
(31, 'ksiÄgarnia', 'noun', 'en', 'bokhandel', '', '', '', '', '', '', '', 'en bokhandel', 'bokhandeln', 'bokhandlar', 'bokhandlarna', NULL, NULL, NULL, '', '', ''),
(32, 'informatyka', 'noun', 'en', 'datavetenskap', '', '', '', '', '', '', '', 'en datavetenskap', 'datavetenskapen', 'datavetenskaps', 'datavetenskapens', NULL, NULL, NULL, '', '', ''),
(33, 'pĂłĹşniej', 'adverb', '', 'sedan', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(34, 'ciepĹo', 'noun', 'en', 'vĂ¤rme', '', '', '', '', '', '', '', 'en vĂ¤rme', 'vĂ¤rmen', '', '', NULL, NULL, NULL, '', '', ''),
(35, 'spragniony', 'adjective', '', 'tĂśrstig', '', '', '', '', '', '', '', '', '', '', '', 'tĂśrstigt', 'tĂśrstige', 'tĂśrstiga', 'tĂśrstigare', 'tĂśrstigast', 'torsztig'),
(36, 'gĹodny', 'adjective', '', 'hungrig', '', '', '', '', '', '', '', '', '', '', '', 'hungrigt', 'hungrige', 'hungriga', 'hungrigare', 'hungrigaste', ''),
(37, 'dawaÄ', 'verb', 'att', 'ge', 'att ge', 'ger', 'gav', 'gett/givit', 'ge!', '', '', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(38, 'mieszkanie', 'noun', 'en', 'lĂ¤genhet', '', '', '', '', '', '', '', 'en lĂ¤genhet', 'lĂ¤genheten', 'lĂ¤genheter', 'lĂ¤genheterna', NULL, NULL, NULL, '', '', 'legenhet'),
(39, 'nauczaÄ', 'verb', 'att', 'undervisa', 'att undervisa', 'undervisar', 'undervisade', 'undervisat', 'undervisa!', '', '', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(40, 'piÄ', 'verb', 'att', 'dricka', 'att dricka', 'dricker', 'drack', 'druckit', 'drick!', 'drickande', 'drucken', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(41, 'napĂłj', 'noun', 'en', 'dricka', '', '', '', '', '', '', '', 'en dricka', 'drickan', 'drickor', 'drickorna', NULL, NULL, NULL, '', '', ''),
(42, 'lot', 'noun', 'ett', 'flyg', '', '', '', '', '', '', '', 'ett flyg', 'flyget', 'flyg', 'flygen', NULL, NULL, NULL, '', '', ''),
(43, 'odjechaÄ', 'verb', 'att', 'avgĂĽ', 'att avgĂĽ', 'avgĂĽr', 'avgick', 'avgĂĽtt', 'avgĂĽ!', 'avgĂĽende', 'avgĂĽngen', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(44, 'kanapka', 'noun', 'en', 'smĂśrgĂĽs', '', '', '', '', '', '', '', 'en smĂśrgĂĽs', 'smĂśrgĂĽsen', 'smĂśrgĂĽsar', 'smĂśrgĂĽsarna', NULL, NULL, NULL, '', '', 'smorgos'),
(45, 'jeĹÄ', 'verb', 'att', 'Ă¤ta', 'att Ă¤ta', 'Ă¤ter', 'ĂĽt', 'Ă¤tit', 'Ă¤t!', '', '', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(46, 'marchewka', 'noun', 'en', 'morot', '', '', '', '', '', '', '', 'en morot', 'moroten', 'morĂśtter', 'morĂśtterna', NULL, NULL, NULL, '', '', ''),
(47, 'kto', 'pronoun', '', 'vem', '', '', '', '', '', '', '', '', '', 'vilka', '', NULL, NULL, NULL, '', '', ''),
(48, 'babcia (matka ojca)', 'noun', 'en', 'farmor', '', '', '', '', '', '', '', 'en farmor', 'farmorn/farmodern', 'farmĂśdrar', 'farmĂśdrarna', NULL, NULL, NULL, '', '', ''),
(49, 'babcia (matka matki)', 'noun', 'en', 'mormor', '', '', '', '', '', '', '', 'en mormor', 'mormorn/mormodern', 'mormĂśdrar', 'mormĂśdrarna', NULL, NULL, NULL, '', '', ''),
(50, 'chÄtnie, proszÄ', 'adjective', '', 'gĂ¤rna', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, 'hellre', 'helst', ''),
(51, 'albo, lub', '', '', 'eller', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(52, 'rozumieÄ', 'verb', 'att', 'fĂśrstĂĽ', 'att fĂśrstĂĽ', 'fĂśrstĂĽr', 'fĂśrstod', 'fĂśrstĂĽtt', 'fĂśrstĂĽ!', '', '', '', '', '', '', NULL, NULL, NULL, '', '', ''),
(53, 'sĹoneczny', 'adjective', '', 'solig', '', '', '', '', '', '', '', '', '', '', '', 'soligt', 'sĂślige', 'soliga', 'soligare', 'soligast', ''),
(54, 'jabĹko', 'noun', 'ett', 'Ă¤pple', '', '', '', '', '', '', '', 'ett Ă¤pple', 'Ă¤pplet', 'Ă¤pplen', 'Ă¤pplena', NULL, NULL, NULL, '', '', 'eple');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
