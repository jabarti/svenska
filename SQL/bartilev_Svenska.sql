-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 18 Lip 2014, 17:11
-- Server version: 5.5.37-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bartilev_Svenska`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `login`
--
 
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cuser` (`user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `data`) VALUES
(1, 'Anetka', 'eb69ee89387216430c9bdabe0275327f946aa093', '2014-07-14 14:27:41'),
(2, 'Bartek', 'eb69ee89387216430c9bdabe0275327f946aa093', '2014-07-14 14:27:41');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ord`
--

CREATE TABLE IF NOT EXISTS `ord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ord` varchar(145) NOT NULL,
  `typ` enum('noun','verb','hjalp_verb','adjective','adverb','preposition','pronoun','conjunction','interjection','wyrazenie','???') NOT NULL,
  `rodzaj` enum('ett','en','att') DEFAULT NULL,
  `trans` varchar(145) NOT NULL,
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
  `plural` varchar(45) DEFAULT NULL,
  `st_rowny` varchar(45) DEFAULT NULL,
  `st_wyzszy` varchar(45) DEFAULT NULL,
  `st_najwyzszy` varchar(45) DEFAULT NULL,
  `wymowa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_ord`),
  UNIQUE KEY `id_ord_UNIQUE` (`id_ord`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=283 ;

--
-- Zrzut danych tabeli `ord`
--

INSERT INTO `ord` (`id`, `id_ord`, `typ`, `rodzaj`, `trans`, `infinitive`, `presens`, `past`, `supine`, `imperative`, `present_participle`, `past_participle`, `S_indefinite`, `S_definite`, `P_indefinite`, `P_definite`, `neuter`, `masculin`, `plural`, `st_rowny`, `st_wyzszy`, `st_najwyzszy`, `wymowa`) VALUES
(1, 'rower', 'noun', 'en', 'cykel', '', '', '', '', '', '', '', 'en cykel', 'cykeln', 'cyklar', 'cyklarna', '', '', '', '', '', '', 'sykel'),
(2, 'list', 'noun', 'ett', 'brev', '', '', '', '', '', '', '', 'ett brev', 'brevet', 'brev', 'breven', NULL, NULL, NULL, NULL, '', '', ''),
(3, 'iĹÄ', 'verb', 'att', 'gĂĽ', 'att gĂĽ', 'gĂĽr', 'gick', 'gĂĽtt', 'gĂĽ!', 'gĂĽende', 'gĂĽngen', '', '', '', '', '', '', '', '', '', '', 'goa'),
(4, 'samochĂłd', 'noun', 'en', 'bil', '', '', '', '', '', '', '', 'en bil', 'bilen', 'bilar', 'bilarna', NULL, NULL, NULL, NULL, '', '', ''),
(5, 'kiedy, wtedy, gdy', 'conjunction', '', 'dĂĽ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'mĹody, mĹode', 'adjective', '', 'ung', '', '', '', '', '', '', '', '', '', '', '', 'ungt', 'unge', 'unga', '', 'yngre', 'yngst', ''),
(7, 'lekarz', 'noun', 'en', 'lĂ¤kare,', '', '', '', '', '', '', '', 'en lĂ¤kare', 'lĂ¤karen, lĂ¤karn', 'lĂ¤kare', 'lĂ¤karna', '', '', '', '', '', '', ''),
(8, 'mieszkaÄ', 'verb', 'att', 'bo', 'att bo', 'bor', 'bodde', 'bott', 'bo!', 'boende', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'z', 'preposition', '', 'med', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'mieÄ', 'verb', 'att', 'ha', 'att ha', 'har', 'hade', 'haft', 'ha!', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(11, 'chodziÄ, iĹÄ, jechaÄ', 'verb', 'att', 'ĂĽka', 'att ĂĽka', 'ĂĽker', 'ĂĽkte', 'ĂĽkt', 'ĂĽk!', 'ĂĽkande', '', '', '', '', '', '', '', '', '', '', '', 'oker'),
(12, 'poĹczocha, skarpeta', 'noun', 'en', 'en strumpa', '', '', '', '', '', '', '', 'en strumpa', 'strumpan', 'strumpor', 'strumporna', NULL, NULL, NULL, NULL, '', '', ''),
(13, 'brudny, brudne', 'adjective', '', 'smutsig', '', '', '', '', '', '', '', '', '', '', '', 'smutsigt', 'smutsige', 'smutsiga', NULL, 'smutsigare', 'smutsigast', ''),
(14, 'pada deszcz', 'verb', 'att', 'regna', 'att regna', 'regnar', 'regnade', 'regnat', 'regna!', 'regnande', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(15, 'czekaÄ', 'verb', 'att', 'vĂ¤nta', 'att vĂ¤nta', 'vĂ¤ntar', 'vĂ¤ntade', 'vĂ¤ntat', 'vĂ¤nta!', 'vĂ¤ntande', 'vĂ¤ntad', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'tutaj', 'adverb', '', 'hĂ¤r', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', 'her'),
(17, 'uniwersytet', 'noun', 'ett', 'universitet', '', '', '', '', '', '', '', 'ett universitet', 'universitetet', 'universitet', 'universiteten', NULL, NULL, NULL, NULL, '', '', ''),
(18, 'szkoĹa podstawowa', 'noun', 'en', 'grundskola', '', '', '', '', '', '', '', 'en grundskola', 'grundskolan', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(19, 'uczeĹ', 'noun', 'en', 'elev', '', '', '', '', '', '', '', 'en elev', 'eleven', 'elever', 'eleverna', NULL, NULL, NULL, NULL, '', '', ''),
(20, 'takie samo', 'adjective', '', 'samma, samme', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(21, 'lubiÄ', 'verb', 'att', 'tycka om', 'att tycka om', 'tycker om', 'tyckte om', 'tyckt om', 'tyck om!', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(22, 'myĹleÄ, sÄdziÄ, uwaĹźaÄ', 'verb', 'att', 'tycka', 'att tycka', 'tycker', 'tyckte', 'tyckt', 'tyck!', 'tyckande', 'tyckt', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(23, 'biuro', 'noun', 'ett', 'kontor', '', '', '', '', '', '', '', 'ett kontor', 'kontoret', 'kontor', 'kontoren', NULL, NULL, NULL, NULL, '', '', ''),
(24, 'sklep', 'noun', 'en', 'affĂ¤r', '', '', '', '', '', '', '', 'en affĂ¤r', 'affĂ¤ren', 'affĂ¤rer', 'affĂ¤rerna', NULL, NULL, NULL, NULL, '', '', 'affar'),
(25, 'chory, chora', 'adjective', '', 'sjuk', '', '', '', '', '', '', '', '', '', '', '', 'sjukt', 'sjuke', 'sjuka', NULL, 'sjukare', 'sjukast', 'chjuk'),
(26, 'choroba', 'noun', 'en', 'sjuka', '', '', '', '', '', '', '', 'en sjuka', 'sjukan', 'sjukor', 'sjukorna', NULL, NULL, NULL, NULL, '', '', 'chjuka'),
(27, 'otwarte', 'adjective', '', 'Ăśppen', '', '', '', '', '', '', '', '', '', '', '', 'Ăśppet', 'Ăśppne', 'Ăśppna', NULL, 'Ăśppnare', 'Ăśppnast', ''),
(28, 'kierownik', 'noun', 'en', 'chef', '', '', '', '', '', '', '', 'en chef', 'chefen', 'chefer', 'cheferna', NULL, NULL, NULL, NULL, '', '', ''),
(29, 'zatrudniony', 'adjective', '', 'anstĂ¤lld', '', '', '', '', '', '', '', '', '', '', '', 'anstĂ¤llt', 'anstĂ¤llde', 'anstĂ¤llda', '', '', '', 'ansteld'),
(30, 'staroĹÄ', 'adjective', '', 'gammal', '', '', '', '', '', '', '', '', '', '', '', 'gammalt', 'gamle', 'gamla', NULL, 'Ă¤ldre', 'Ă¤ldst', ''),
(31, 'ksiÄgarnia', 'noun', 'en', 'bokhandel', '', '', '', '', '', '', '', 'en bokhandel', 'bokhandeln', 'bokhandlar', 'bokhandlarna', NULL, NULL, NULL, NULL, '', '', ''),
(32, 'informatyka', 'noun', 'en', 'datavetenskap', '', '', '', '', '', '', '', 'en datavetenskap', 'datavetenskapen', '', '', '', '', '', '', '', '', ''),
(33, 'pĂłĹşniej', 'adverb', '', 'sedan', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(34, 'ciepĹo', 'noun', 'en', 'vĂ¤rme', '', '', '', '', '', '', '', 'en vĂ¤rme', 'vĂ¤rmen', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(35, 'spragniony', 'adjective', '', 'tĂśrstig', '', '', '', '', '', '', '', '', '', '', '', 'tĂśrstigt', 'tĂśrstige', 'tĂśrstiga', NULL, 'tĂśrstigare', 'tĂśrstigast', 'torsztig'),
(36, 'gĹodny', 'adjective', '', 'hungrig', '', '', '', '', '', '', '', '', '', '', '', 'hungrigt', 'hungrige', 'hungriga', NULL, 'hungrigare', 'hungrigaste', ''),
(37, 'dawaÄ', 'verb', 'att', 'ge', 'att ge', 'ger', 'gav', 'gett, givit', 'ge!', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 'mieszkanie', 'noun', 'en', 'lĂ¤genhet', '', '', '', '', '', '', '', 'en lĂ¤genhet', 'lĂ¤genheten', 'lĂ¤genheter', 'lĂ¤genheterna', NULL, NULL, NULL, NULL, '', '', 'legenhet'),
(39, 'nauczaÄ, uczyÄ kogoĹ', 'verb', 'att', 'undervisa', 'att undervisa', 'undervisar', 'undervisade', 'undervisat', 'undervisa!', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, 'piÄ', 'verb', 'att', 'dricka', 'att dricka', 'dricker', 'drack', 'druckit', 'drick!', 'drickande', 'drucken', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(41, 'napĂłj', 'noun', 'en', 'dricka', '', '', '', '', '', '', '', 'en dricka', 'drickan', 'drickor', 'drickorna', NULL, NULL, NULL, NULL, '', '', ''),
(42, 'lot', 'noun', 'ett', 'flyg', '', '', '', '', '', '', '', 'ett flyg', 'flyget', 'flyg', 'flygen', NULL, NULL, NULL, NULL, '', '', ''),
(43, 'odjechaÄ, wyruszaÄ, odlecieÄ', 'verb', 'att', 'avgĂĽ', 'att avgĂĽ', 'avgĂĽr', 'avgick', 'avgĂĽtt', 'avgĂĽ!', 'avgĂĽende', 'avgĂĽngen', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(44, 'kanapka', 'noun', 'en', 'smĂśrgĂĽs', '', '', '', '', '', '', '', 'en smĂśrgĂĽs', 'smĂśrgĂĽsen', 'smĂśrgĂĽsar', 'smĂśrgĂĽsarna', NULL, NULL, NULL, NULL, '', '', 'smorgos'),
(45, 'jeĹÄ', 'verb', 'att', 'Ă¤ta', 'att Ă¤ta', 'Ă¤ter', 'ĂĽt', 'Ă¤tit', 'Ă¤t!', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(46, 'marchewka', 'noun', 'en', 'morot', '', '', '', '', '', '', '', 'en morot', 'moroten', 'morĂśtter', 'morĂśtterna', NULL, NULL, NULL, NULL, '', '', ''),
(47, 'kto', 'pronoun', '', 'vem', '', '', '', '', '', '', '', '', '', 'vilka', '', NULL, NULL, NULL, NULL, '', '', ''),
(48, 'babcia, matka ojca, mama ojca', 'noun', 'en', 'farmor', '', '', '', '', '', '', '', 'en farmor', 'farmorn, farmodern', 'farmĂśdrar', 'farmĂśdrarna', '', '', '', '', '', '', ''),
(49, 'babcia, matka matki, mama mamy', 'noun', 'en', 'mormor', '', '', '', '', '', '', '', 'en mormor', 'mormorn, mormodern', 'mormĂśdrar', 'mormĂśdrarna', '', '', '', '', '', '', ''),
(50, 'chÄtnie, proszÄ', 'adjective', '', 'gĂ¤rna', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 'hellre', 'helst', ''),
(51, 'albo, lub', 'conjunction', '', 'eller', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, 'rozumieÄ', 'verb', 'att', 'fĂśrstĂĽ', 'att fĂśrstĂĽ', 'fĂśrstĂĽr', 'fĂśrstod', 'fĂśrstĂĽtt', 'fĂśrstĂĽ!', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(53, 'sĹoneczny', 'adjective', '', 'solig', '', '', '', '', '', '', '', '', '', '', '', 'soligt', 'sĂślige', 'soliga', NULL, 'soligare', 'soligast', ''),
(54, 'jabĹko', 'noun', 'ett', 'Ă¤pple', '', '', '', '', '', '', '', 'ett Ă¤pple', 'Ă¤pplet', 'Ă¤pplen', 'Ă¤pplena', NULL, NULL, NULL, NULL, '', '', 'eple'),
(55, 'teraz, obecnie', 'adverb', '', 'nu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', ''),
(56, 'krowa', 'noun', 'en', 'ko', '', '', '', '', '', '', '', 'en ko', 'kon', 'kor', 'korna', '', '', '', NULL, '', '', ''),
(57, 'lato', 'noun', 'en', 'sommar', '', '', '', '', '', '', '', 'en sommar', 'sommaren, sommarn', 'somrar', 'somrarna', '', '', '', '', '', '', ''),
(58, 'trochÄ, maĹo, kilka', 'adverb', '', 'lite', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'mindre', 'minst', ''),
(59, 'graÄ', 'verb', 'att', 'spela', 'att spela', 'spelar', 'spelade', 'spelat', 'spela!', 'spelande', 'spelad', '', '', '', '', '', '', '', '', '', '', ''),
(60, 'duĹźy', 'adjective', '', 'stor', '', '', '', '', '', '', '', '', '', '', '', 'stort', 'store', 'stora', '', 'stĂśrre', 'stĂśrst', ''),
(61, 'popoĹudnie', 'noun', 'en', 'eftermiddag', '', '', '', '', '', '', '', 'en eftermiddag', 'eftermiddagen', 'eftermiddagar', 'eftermiddagarna', '', '', '', '', '', '', 'eftermida'),
(62, 'Mam skarpetki na sobie', 'wyrazenie', '', 'jag har pĂĽ mig strumpor', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, 'ale, jednak, lecz', 'conjunction', '', 'men', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, 'Ile masz lat?', 'wyrazenie', '', 'Hur gammal Ă¤r du?', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, 'jaki', 'adverb', '', 'nĂĽgon', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, 'Jak siÄ masz?', 'wyrazenie', '', 'Hur Ă¤r det?', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, 'wieczĂłr', 'noun', 'en', 'kvĂ¤ll', '', '', '', '', '', '', '', 'en kvĂ¤ll', 'kvĂ¤llen', 'kvĂ¤llar', 'kvĂ¤llarna', '', '', '', '', '', '', 'kwel'),
(68, 'zamarzaÄ', 'verb', 'att', 'frysa', 'att frysa', 'fryser', 'frĂśs', 'frusit', 'frys!', 'frysande', 'frusen', '', '', '', '', '', '', '', '', '', '', ''),
(69, 'caĹowaÄ', 'verb', 'att', 'pussa', 'att pussa', 'pussar', 'pussade', 'pussat', 'pussa!', 'pussande', 'pussad', '', '', '', '', '', '', '', '', '', '', ''),
(70, 'kiedy, gdy', 'conjunction', '', 'nĂĽr', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'nar'),
(71, 'kupowaÄ', 'verb', 'att', 'kĂśpa', 'att kĂśpa', 'kĂśper', 'kĂśpte', 'kĂśpt', 'kĂśpa!', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(72, 'dla, przed, zanim', 'preposition', '', 'fĂśr', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, 'szpital', 'noun', 'ett', 'sjukhus', '', '', '', '', '', '', '', 'ett sjukhus', 'sjukhuset', 'sjukhus', 'sjukhusen', '', '', '', '', '', '', 'szjukhus'),
(74, 'pĹaciÄ, zapĹaciÄ', 'verb', 'att', 'betala', 'att betala', 'betalar', 'betalade', 'betalat, betalt', 'betala!', 'betalande', 'betalad', '', '', '', '', '', '', '', '', '', '', ''),
(75, 'Nie zrozumiaĹem czy mĂłgbyĹ to powiedzieÄ jeszcze raz?', 'wyrazenie', '', 'Jag fĂśrstĂĽr inte, kan du sĂ¤ga det igen?', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(76, 'ja', 'pronoun', '', 'jag', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jo'),
(77, 'taĹczyÄ', 'verb', 'att', 'dansa', 'att dansa', 'dansar', 'dansade', 'dansat', 'dansa!', 'dansande', 'dansad', '', '', '', '', '', '', '', '', '', '', ''),
(78, 'ĹpiewaÄ', 'verb', 'att', 'sjunga', 'att sjunga', 'sjunger', 'sjĂśng', 'sjungit', 'sjung!', 'sjungande', 'sjungen', '', '', '', '', '', '', '', '', '', '', 'chjunga'),
(79, 'sĹuchaÄ', 'verb', 'att', 'lyssna', 'att lyssna', 'lyssnar', 'lyssnade', 'lyssnat', 'lyssna!', 'lyssnande', '', '', '', '', '', '', '', '', '', '', '', ''),
(80, 'kierowaÄ, jechaÄ, prowadziÄ', 'verb', 'att', 'kĂśra', 'att kĂśra', 'kĂśr', 'kĂśrde', 'kĂśrt', 'kĂśr!', 'kĂśrande', '', '', '', '', '', '', '', '', '', '', '', 'siora'),
(81, 'prosto', 'adverb', '', 'rakt fram', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(82, 'prawo', 'adjective', '', 'hĂśger', '', '', '', '', '', '', '', '', '', '', '', 'hĂśger', 'hĂśgre', 'hĂśgra', '', '', '', ''),
(83, 'lewo', 'adjective', '', 'vĂ¤nster', '', '', '', '', '', '', '', '', '', '', '', 'vĂ¤nster', 'vĂ¤nstre', 'vĂ¤nstra', '', '', '', ''),
(84, 'bawiÄ siÄ', 'verb', 'att', 'leka', 'att leka', 'leker', 'lekte', 'lekt', 'lek!', 'lekande', 'lekt', '', '', '', '', '', '', '', '', '', '', ''),
(85, 'jezioro', 'noun', 'en', 'sjĂś', '', '', '', '', '', '', '', 'en sjĂś', 'sjĂśn', 'sjĂśar', 'sjĂśarna', '', '', '', '', '', '', 'chjoe'),
(86, 'siadaÄ', 'verb', 'att', 'sĂ¤tta sig', 'att sĂ¤tta sig', 'sĂ¤tter sig', 'satte sig', 'satt sig', 'sĂ¤tt sig!', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(87, 'nazwa, imiÄ, nazwisko', 'noun', 'ett', 'namn', '', '', '', '', '', '', '', 'ett namn', 'namnet', 'namn', 'namnen', '', '', '', '', '', '', ''),
(88, 'stawiaÄ', 'verb', 'att', 'sĂ¤tta', 'att sĂ¤tta', 'sĂ¤tter', 'satte', 'satt', 'sĂ¤tt!', 'sĂ¤ttande', 'satt', '', '', '', '', '', '', '', '', '', '', ''),
(89, 'kubek, filiĹźanka', 'noun', 'en', ' kopp', '', '', '', '', '', '', '', 'en kopp', 'koppen', 'koppar', 'kopparna', '', '', '', '', '', '', ''),
(90, 'za, z tyĹu', 'preposition', '', 'bakom', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(91, 'rÄcznik', 'noun', 'en', 'handduk', '', '', '', '', '', '', '', 'en handduk', 'handduken', 'handdukar', 'handdukarna', '', '', '', '', '', '', ''),
(92, 'kĹaĹÄ, poĹoĹźyÄ, umieszczaÄ', 'verb', 'att', 'lĂ¤gga', 'att lĂ¤gga', 'lĂ¤gger', 'la, lade', 'lagt', 'lĂ¤gg!', 'laggande', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, 'notes', 'noun', 'ett', 'anteckningsblock', '', '', '', '', '', '', '', 'ett anteckningsblock', 'anteckningsblocket', 'anteckningsblock', 'anteckningsblocken', '', '', '', '', '', '', ''),
(94, 'ĹĂłĹźko', 'noun', 'en', 'sĂ¤ng', '', '', '', '', '', '', '', 'en sĂ¤ng', 'sĂ¤ngen', 'sĂ¤ngar', 'sĂ¤ngarna', '', '', '', '', '', '', ''),
(95, 'koc', 'noun', 'en', 'filt', '', '', '', '', '', '', '', 'en filt', 'filten', 'filtar', 'filtarna', '', '', '', '', '', '', ''),
(96, 'przynieĹÄ', 'verb', 'att', 'hĂ¤mta', 'att hĂ¤mta', 'hĂ¤mtar', 'hĂ¤mtade', 'hĂ¤mtat', 'hĂ¤mta!', 'hĂ¤mtande', 'hĂ¤mtad', '', '', '', '', '', '', '', '', '', '', ''),
(97, 'rodzic', 'noun', 'en', 'fĂśrĂ¤lder', '', '', '', '', '', '', '', 'en fĂśrĂ¤lder', 'fĂśrĂ¤ldern', 'fĂśrĂ¤ldrar', 'fĂśrĂ¤ldrarna', '', '', '', '', '', '', ''),
(98, 'braÄ, przyjÄÄ, przyjmowaÄ, przynosiÄ, wziÄÄ, zawĹadnÄÄ, zaĹźywaÄ', 'verb', '', 'ta', 'att ta', 'tar, tager', 'tog', 'tagit', 'ta!, tag!', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(99, 'wiedzieÄ', 'verb', 'att', 'veta', 'att veta', 'vet', 'visste', 'vetat', 'vet!', 'vetande', '', '', '', '', '', '', '', '', '', '', '', ''),
(100, 'kuchnia', 'noun', 'ett', 'kĂśk', '', '', '', '', '', '', '', 'ett kĂśk', 'kĂśket', 'kĂśk', 'kĂśken', '', '', '', '', '', '', 'siok'),
(101, 'ksiÄĹźka', 'noun', 'en', 'bok', '', '', '', '', '', '', '', 'en bok', 'boken', 'bĂścker', 'bĂśckerna', '', '', '', '', '', '', ''),
(102, 'zabawka', 'noun', 'en', 'leksak', '', '', '', '', '', '', '', 'en leksak', 'leksaken', 'leksaker', 'leksakerna', '', '', '', '', '', '', ''),
(103, 'dziecko', 'noun', 'ett', 'barn', '', '', '', '', '', '', '', 'ett barn', 'barnet', 'barn', 'barnen', '', '', '', '', '', '', ''),
(104, 'przyjÄcie, impreza, prywatka', 'noun', 'en', 'fest', '', '', '', '', '', '', '', 'en fest', 'festen', 'fester', 'festerna', '', '', '', '', '', '', ''),
(105, 'koĹczyÄ', 'verb', 'att', 'sluta', 'att sluta', 'slutar', 'slutade', 'slutat', 'sluta!', 'slutande', 'slutad', '', '', '', '', '', '', '', '', '', '', ''),
(106, 'koniec', 'noun', 'ett', 'slut', '', '', '', '', '', '', '', 'ett slut', 'slutet', 'slut', 'sluten', '', '', '', '', '', '', ''),
(107, 'jutro', 'adverb', '', 'i morgon', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'i moron'),
(108, 'rano', 'noun', 'en', 'morgon', '', '', '', '', '', '', '', 'en morgon', 'morgonen', 'morgnar', 'morgnarna', '', '', '', '', '', '', 'moron'),
(109, 'smakowaÄ, kosztowaÄ,', 'verb', 'att', 'smaka', 'att smaka', 'smakar', 'smakade', 'smakat', 'smaka!', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(110, 'pachnieÄ, ĹmierdzieÄ', 'verb', 'att', 'lukta', 'att lukta', 'luktar', 'luktade', 'luktat', 'lukta', 'luktande', 'luktad', '', '', '', '', '', '', '', '', '', '', ''),
(111, 'palec, palec u nogi', 'noun', 'en', 'tĂĽ', '', '', '', '', '', '', '', 'en tĂĽ', 'tĂĽn', 'tĂĽr', 'tĂĽrna', '', '', '', '', '', '', 'to'),
(112, 'poniedziaĹek', 'noun', 'en', 'mĂĽndag', '', '', '', '', '', '', '', 'en mĂĽndag', 'mĂĽndagen', 'mĂĽndagar', 'mĂĽndagarna', '', '', '', '', '', '', 'monda'),
(113, 'wtorek', 'noun', 'en', 'tisdag', '', '', '', '', '', '', '', 'en tisdag', 'tisdagen', 'tisdagar', 'tisdagarna', '', '', '', '', '', '', 'tisda'),
(114, 'Ĺroda', 'noun', 'en', 'onsdag', '', '', '', '', '', '', '', 'en onsdag', 'onsdagen', 'onsdagar', 'onsdagarna', '', '', '', '', '', '', ''),
(115, 'czwartek', 'noun', 'en', 'torsdag', '', '', '', '', '', '', '', 'en torsdag', 'torsdagen', 'torsdagar', 'torsdagarna', '', '', '', '', '', '', ''),
(116, 'piÄtek', 'noun', 'en', 'fredag', '', '', '', '', '', '', '', 'en fredag', 'fredagen', 'fredagar', 'fredagarna', '', '', '', '', '', '', 'frieda'),
(117, 'sobota', 'noun', 'en', 'lĂśrdag', '', '', '', '', '', '', '', 'en lĂśrdag', 'lĂśrdagen', 'lĂśrdagar', 'lĂśrdagarna', '', '', '', '', '', '', ''),
(118, 'niedziela', 'noun', 'en', 'sĂśndag', '', '', '', '', '', '', '', 'en sĂśndag', 'sĂśndagen', 'sĂśndagar', 'sĂśndagarna', '', '', '', '', '', '', ''),
(119, 'goĹÄ', 'noun', 'en', 'gĂ¤st', '', '', '', '', '', '', '', 'en gĂ¤st', 'gĂ¤sten', 'gĂ¤ster', 'gĂ¤sterna', '', '', '', '', '', '', 'jest'),
(120, 'staÄ', 'verb', 'att', 'stĂĽ', 'att stĂĽ', 'stĂĽr', 'stod', 'stĂĽtt', 'stĂĽ!', 'stĂĽende', 'stĂĽnden', '', '', '', '', '', '', '', '', '', '', 'sto'),
(121, 'witajcie', 'adjective', '', 'vĂ¤lkommen', '', '', '', '', '', '', '', '', '', '', '', 'vĂ¤lkommet', 'vĂ¤lkomne', 'vĂ¤lkomna', 'vĂ¤lkommen', '', '', ''),
(122, 'witaÄ', 'verb', 'att', 'vĂ¤lkomna', 'att vĂ¤lkomna', 'vĂ¤lkomnar', 'vĂ¤lkomnade', 'vĂ¤lkomnat', 'vĂ¤lkomna!', 'vĂ¤lkomnande', 'vĂ¤lkomnad', '', '', '', '', '', '', '', '', '', '', ''),
(123, 'zaczynaÄ', 'verb', 'att', 'bĂśrja', 'att bĂśrja', 'bĂśrjar', 'bĂśrjade', 'bĂśrjat', 'bĂśrja!', 'bĂśrjande', 'bĂśrjad', '', '', '', '', '', '', '', '', '', '', ''),
(124, 'opuĹciÄ', 'verb', 'att', 'lĂ¤mna', 'att lĂ¤mna', 'lĂ¤mnar', 'lĂ¤mnade', 'lĂ¤mnat', 'lĂ¤mna!', 'lĂ¤mnande', 'lĂ¤mnad', '', '', '', '', '', '', '', '', '', '', ''),
(125, 'przyjĹÄ, przyjechaÄ, przybywaÄ', 'verb', 'att', 'komma', 'att komma', 'kommer', 'kom', 'kommit', 'komm!', 'kommande', 'kommen', '', '', '', '', '', '', '', '', '', '', ''),
(126, 'Ona idzie do...', 'wyrazenie', '', 'Hon ska till...', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(127, 'Ona wraca z...', 'wyrazenie', '', 'Hon kommer frĂĽn...', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(128, 'ona pĂłjdzie (gdzieĹ)', 'wyrazenie', '', 'Hon kommer till...', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(129, 'dostaÄ', 'verb', 'att', 'fĂĽ', 'att fĂĽ', 'fĂĽr', 'fick', 'fĂĽtt', 'fĂĽ!', '', '', '', '', '', '', '', '', '', '', '', '', 'fo'),
(130, 'miesiÄc', 'noun', 'en', 'mĂĽnad', '', '', '', '', '', '', '', 'en mĂĽnad', 'mĂĽnaden', 'mĂĽnader', 'mĂĽnaderna', '', '', '', '', '', '', 'monad'),
(131, 'tydzieĹ', 'noun', 'en', 'vecka', '', '', '', '', '', '', '', 'en vecka', 'veckan', 'veckor', 'veckorna', '', '', '', '', '', '', ''),
(132, 'rok', 'noun', 'ett', 'ĂĽr', '', '', '', '', '', '', '', 'ett ĂĽr', 'ĂĽret', 'ĂĽr', 'ĂĽren', '', '', '', '', '', '', 'or'),
(133, 'dzieĹ', 'noun', 'en', 'dag', '', '', '', '', '', '', '', 'en dag', 'dagen', 'dagar', 'dagarna', '', '', '', '', '', '', 'do'),
(134, 'styczeĹ', 'noun', '', 'januari', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(135, 'marzec', 'noun', '', 'mars', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'marsz'),
(136, 'kwiecieĹ', 'noun', '', 'april', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(137, 'luty', 'noun', '', 'februari', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(138, 'maj', 'noun', '', 'maj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(139, 'sierpieĹ', 'noun', '', 'augusti', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(140, 'czerwiec', 'noun', '', 'juni', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(141, 'listopad', 'noun', '', 'november', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(142, 'paĹşdziernik', 'noun', '', 'oktober', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(143, 'wrzesieĹ', 'noun', '', 'september', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(144, 'grudzieĹ', 'noun', '', 'december', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(145, 'lipiec', 'noun', '', 'juli', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(146, 'parasol, parasol przeciw deszczowy', 'noun', 'ett', 'paraply', '', '', '', '', '', '', '', 'ett paraply', 'paraplyet', 'paraplyer', 'paraplyerna', '', '', '', '', '', '', ''),
(147, 'coĹ', 'pronoun', '', 'nĂĽgot', '', '', '', '', '', '', '', '', '', '', '', 'nĂĽgon', '', 'nĂĽgra', '', '', '', 'nogot'),
(148, 'chcieÄ', 'verb', 'att', 'vilja', 'att vilja', 'vill', 'ville', 'velat', 'vill!', 'viljande', '', '', '', '', '', '', '', '', '', '', '', ''),
(149, 'przedstawienie', 'noun', 'en', 'fĂśrestĂ¤llning', '', '', '', '', '', '', '', 'fĂśrestĂ¤llning', 'fĂśrestĂ¤llningen', 'fĂśrestĂ¤llningar', 'fĂśrestĂ¤llningarna', '', '', '', '', '', '', 'forestelning'),
(150, 'drabina', 'noun', 'en', 'stege', '', '', '', '', '', '', '', 'en stege', 'stegen', 'stegar', 'stegarna', '', '', '', '', '', '', ''),
(151, 'wiosna', 'noun', 'en', 'vĂĽr', '', '', '', '', '', '', '', 'en vĂĽr', 'vĂĽren', 'vĂĽrar', 'vĂĽrarna', '', '', '', '', '', '', 'wor'),
(152, 'pomagaÄ', 'verb', 'att', 'hjĂ¤lpa', 'att hjĂ¤lpa', 'hjĂ¤lper', 'hjĂ¤lpte', 'hjĂ¤lpt', 'hjĂ¤lp!', 'hjĂ¤lpande', 'hjĂ¤lpt', '', '', '', '', '', '', '', '', '', '', 'jelpa'),
(153, 'pies', 'noun', 'en', 'hund', '', '', '', '', '', '', '', 'en hund', 'hunden', 'hundar', 'hundarna', '', '', '', '', '', '', ''),
(154, 'poznaÄ, spotkaÄ, ', 'verb', 'att', 'trĂ¤ffa', 'att trĂ¤ffa', 'trĂ¤ffar', 'trĂ¤ffade', 'trĂ¤ffat', 'trĂ¤ffa!', 'trĂ¤ffande', 'trĂ¤ffad', '', '', '', '', '', '', '', '', '', '', ''),
(155, 'miĹo, przyjemnie', 'adjective', '', 'trevlig', '', '', '', '', '', '', '', '', '', '', '', 'trevligt', 'trevligt', 'trevliga', '', 'trevligare', 'trevligast', ''),
(156, 'miĹo ciÄ poznaÄ', 'wyrazenie', '', 'trevlig att trĂ¤ffas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(157, 'dzwoniÄ, telefonowaÄ', 'verb', 'att', 'ringa', 'att ringa', 'ringer', 'ringde', 'ringt', 'ring!', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(158, 'gadaÄ, mĂłwiÄ, powiedzieÄ, rozmawiaÄ', 'verb', 'att', 'prata', 'att prata', 'pratar', 'pratade', 'pratat', 'prata!', 'pratande', 'pratad', '', '', '', '', '', '', '', '', '', '', ''),
(159, 'wczesny, wczeĹnie, poprzednio', 'adverb', '', 'tidig', '', '', '', '', '', '', '', '', '', '', '', 'tidigt', 'tidig', 'tidiga', '', '', 'tidigare', 'tidigast'),
(160, 'pĂłĹşno', 'preposition', '', 'sent', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(161, 'pĂłĹşniej, potem, nastÄpnie', 'adjective', '', 'sen', '', '', '', '', '', '', '', '', '', '', '', 'sent', 'sene', 'sena', '', 'senare', 'senaste, senast', ''),
(162, 'czas', 'noun', 'en', 'tid', '', '', '', '', '', '', '', 'en tid', 'tiden', 'tider', 'tiderna', '', '', '', '', '', '', ''),
(163, 'przyjĹÄ na czas', 'wyrazenie', '', 'kommer i tid till', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(164, 'jesieĹ', 'noun', 'en', 'hĂśst', '', '', '', '', '', '', '', 'en hĂśst', 'hĂśsten', 'hĂśstar', 'hĂśstarna', '', '', '', '', '', '', ''),
(165, 'zima', 'noun', 'en', 'vinter', '', '', '', '', '', '', '', 'en vinter', 'vintern', 'vintrar', 'vintrarna', '', '', '', '', '', '', ''),
(166, 'drzewo', 'noun', 'ett', 'trĂ¤d', '', '', '', '', '', '', '', 'ett trĂ¤d', 'trĂ¤det', 'trĂ¤d', 'trĂ¤den', '', '', '', '', '', '', 'tred'),
(167, 'na czas', 'wyrazenie', '', 'i tid', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(168, 'mydĹo', 'noun', 'en', 'tvĂĽl', '', '', '', '', '', '', '', 'en tvĂĽl', 'tvĂĽlen', 'tvĂĽlar', 'tvĂĽlarna', '', '', '', '', '', '', ''),
(169, 'miÄso', 'noun', 'ett', 'kĂśtt', '', '', '', '', '', '', '', 'ett kĂśtt', 'kĂśttet', '', '', '', '', '', '', '', '', 'siot'),
(170, 'okulary', 'noun', 'en', 'glasĂśgon', '', '', '', '', '', '', '', 'glasĂśgon', 'glasĂśgonen', '', '', '', '', '', '', '', '', ''),
(171, 'kosztowaÄ', 'verb', 'att', 'kosta', 'att kosta', 'kostar', 'kostade', 'kostat', 'kosta!', 'kostande', '', '', '', '', '', '', '', '', '', '', '', ''),
(172, 'garnitur', 'noun', 'en', 'kostym', '', '', '', '', '', '', '', 'en kostym', 'kostymen', 'kostymer', 'kostymerna', '', '', '', '', '', '', ''),
(173, 'adres', 'noun', 'en', 'adress', '', '', '', '', '', '', '', 'en adress', 'adressen', 'adresser', 'adresserna', '', '', '', '', '', '', ''),
(174, 'numer', 'noun', 'ett', 'nummer', '', '', '', '', '', '', '', 'ett nummer', 'numret', 'nummer', 'numren', '', '', '', '', '', '', ''),
(175, 'data, randka', 'noun', 'ett', 'datum', '', '', '', '', '', '', '', 'ett datum', 'datumet', 'datum', 'datumen', '', '', '', '', '', '', ''),
(176, 'adres e-mail', 'noun', 'en', 'e-postadress', '', '', '', '', '', '', '', 'en e-postadress', 'e-postadressen', 'e-postadresser', 'e-postadresserna', '', '', '', '', '', '', ''),
(177, 'myÄ, czyĹciÄ, praÄ', 'verb', 'att', 'tvĂ¤tta', 'att tvĂ¤tta', 'tvĂ¤ttar', 'tvĂ¤ttade', 'tvĂ¤ttat', 'tvĂ¤tta!', '', '', '', '', '', '', '', '', '', '', '', '', 'twetta'),
(178, 'na dĂłĹ, w dĂłĹ', 'adverb', '', 'ned', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(179, 'tam', 'adverb', '', 'dĂ¤r', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(180, 'co, jaki', 'adverb', '', 'vad', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(181, 'jaka jest dzisiaj data?, jaka jest dziĹ data?', 'wyrazenie', '', 'vad Ă¤r det fĂśr datum idag?', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(182, 'dzisiaj jest czternasty lipca 2014', 'wyrazenie', '', 'idag Ă¤r det den fjortonde juli tjugohundrafjorton', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(183, 'urodziny, dzieĹ urodzin', 'noun', 'en', 'fĂśdelsedag', '', '', '', '', '', '', '', 'en fĂśdelsedag', 'fĂśdelsedagen', 'fĂśdelsedagar', 'fĂśdelsedagarna', '', '', '', '', '', '', ''),
(184, 'moĹźna, wolno', 'adverb', '', 'fĂĽr', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(185, 'Ĺźona', 'noun', 'en', 'fru', '', '', '', '', '', '', '', 'en fru', 'frun', 'fruar', 'fruarna', '', '', '', '', '', '', ''),
(186, 'czĹowiek, mÄĹź, mÄĹźczyzna', 'noun', 'en', 'man', '', '', '', '', '', '', '', 'en man', 'mannen, manen', 'mĂ¤n, manar', 'mĂ¤nnen, manarna', '', '', '', '', '', '', ''),
(187, 'siedzieÄ', 'verb', 'att', 'sitta', 'sitta', 'sitter', 'satt', 'suttit', 'sitt!', 'sittande', 'sutten', '', '', '', '', '', '', '', '', '', '', ''),
(188, 'czyste', 'adjective', '', 'ren', '', '', '', '', '', '', '', '', '', '', '', 'rent', 'rene', 'rena', '', 'renare', 'renast', ''),
(189, 'spĂłdnica', 'noun', 'en', 'kjol', '', '', '', '', '', '', '', 'en kjol', 'kjolen', 'kjolar', 'kjolarna', '', '', '', '', '', '', 'siol'),
(190, 'sukienka', 'noun', 'en', 'klĂ¤nning', '', '', '', '', '', '', '', 'en klĂ¤nning', 'klĂ¤nningen', 'klĂ¤nningar', 'klĂ¤nningarna', '', '', '', '', '', '', ''),
(191, 'mĂłwiÄ, powiedzieÄ, rozmawiaÄ', 'verb', 'att', 'tala', 'att tala', 'talar', 'talade', 'talat', 'tala!', 'talande', 'talad', '', '', '', '', '', '', '', '', '', '', ''),
(192, 'nauczyciel', 'noun', 'en', 'lĂ¤rare', '', '', '', '', '', '', '', 'en lĂ¤rare', 'lĂ¤rarn, lĂ¤raren', 'lĂ¤rare', 'lĂ¤rarna', '', '', '', '', '', '', ''),
(193, 'dziewczyna, dziewczynka', 'noun', 'en', 'flicka', '', '', '', '', '', '', '', 'en flicka', 'flickan', 'flickor', 'flickorna', '', '', '', '', '', '', ''),
(194, 'biesiada, festyn', 'noun', 'ett', 'kalas', '', '', '', '', '', '', '', 'ett kalas', 'kalaset	', 'kalas', 'kalasen', '', '', '', '', '', '', ''),
(195, 'tort, ciasto', 'noun', 'en', 'tĂĽrta', '', '', '', '', '', '', '', 'en tĂĽrta', 'tĂĽrtan', 'tĂĽrtor', 'tĂĽrtorna', '', '', '', '', '', '', ''),
(196, 'maskarada', 'noun', 'en', 'maskerad', '', '', '', '', '', '', '', 'en maskerad', 'maskeraden', 'maskerader', 'maskeraderna', '', '', '', '', '', '', ''),
(197, 'rodzaj, typ, gatunek, sort', 'noun', 'en', 'sort', '', '', '', '', '', '', '', 'en sort', 'sorten', 'sorter', 'sorterna', '', '', '', '', '', '', ''),
(198, 'byÄ', 'verb', 'att', 'vara', 'att vara', 'Ă¤r', 'var', 'varit', 'vara!', 'varande', 'varen', '', '', '', '', '', '', '', '', '', '', 'wora'),
(199, 'oznaczaÄ', 'verb', 'att', 'betyda', 'att betyda', 'betyder', 'betydde', 'betytt', 'betyda!', 'betydande', '', '', '', '', '', '', '', '', '', '', '', ''),
(200, 'ubranie', 'noun', 'en', 'klĂ¤der', '', '', '', '', '', '', '', '', '', 'klĂ¤der', 'klĂ¤derna', '', '', '', '', '', '', 'kleder'),
(201, 'owoc', 'noun', 'en', 'frukt', '', '', '', '', '', '', '', 'en frukt', 'frukten', 'frukter', 'frukterna', '', '', '', '', '', '', ''),
(202, 'pomaraĹcza', 'noun', 'en', 'apelsin', '', '', '', '', '', '', '', 'en apelsin', 'apelsinen', 'apelsiner', 'apelsinerna', '', '', '', '', '', '', ''),
(203, 'pomaraĹcza jest rodzajem owoca', 'wyrazenie', '', 'apelsiner Ă¤r en sorts frukt', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(204, 'spodnie', 'noun', 'en', 'byxa', '', '', '', '', '', '', '', 'en byxa', 'byxan', 'byxor', 'byxorna', '', '', '', '', '', '', 'byksa'),
(205, 'deser', 'noun', 'en', 'efterrĂ¤tt', '', '', '', '', '', '', '', 'en efterrĂ¤tt', 'efterrĂ¤tten', 'efterrĂ¤tter', 'efterrĂ¤tterna', '', '', '', '', '', '', ''),
(206, 'saĹata, saĹatka, surĂłwka', 'noun', 'en', 'sallad', '', '', '', '', '', '', '', 'en sallad', 'salladen', 'sallader', 'salladerna', '', '', '', '', '', '', ''),
(207, 'zupa', 'noun', 'en', 'soppa', '', '', '', '', '', '', '', 'en soppa', 'soppan', 'soppor', 'sopporna', '', '', '', '', '', '', ''),
(208, 'czekolada', 'noun', 'en', 'choklad', '', '', '', '', '', '', '', 'en choklad', 'chokladen', 'choklader', 'chokladerna', '', '', '', '', '', '', 'szhoklad'),
(209, 'gotowaÄ, przygotowywaÄ', 'verb', 'att', 'laga', 'att laga', 'lagar', 'lagade', 'lagat', 'laga!', '', '', '', '', '', '', '', '', '', '', '', '', 'loga'),
(210, 'Ĺniadanie', 'noun', 'en', 'frukost', '', '', '', '', '', '', '', 'en frukost', 'frukosten', 'frukostar', 'frukostarna', '', '', '', '', '', '', ''),
(211, 'lunch, obiad', 'noun', 'en', 'lunch', '', '', '', '', '', '', '', 'en lunch', 'lunchen', 'luncher', 'luncherna', '', '', '', '', '', '', 'lunsz'),
(212, 'obiad, kolacja, poĹudnie', 'noun', 'en', 'middag', '', '', '', '', '', '', '', 'en middag', 'middagen', 'middagar', 'middagarna', '', '', '', '', '', '', ''),
(213, 'kolacja', 'noun', 'en', 'kvĂ¤llsmat', '', '', '', '', '', '', '', 'en kvĂ¤llsmat', 'kvĂ¤llsmaten', '', '', '', '', '', '', '', '', 'kwelsmat'),
(214, 'jedzenie, pokarm, potrawa, poĹźywienie, ĹźywnoĹÄ', 'noun', 'en', 'mat', '', '', '', '', '', '', '', 'en mat', 'maten', '', '', '', '', '', '', '', '', ''),
(215, 'musieÄ', 'hjalp_verb', '', 'mĂĽste', '', 'mĂĽste', 'mĂĽste', 'mĂĽst', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(216, 'gotĂłwka', 'noun', 'en', 'kontanter', '', '', '', '', '', '', '', '', '', 'kontanter', 'kontanterna', '', '', '', '', '', '', ''),
(217, 'gotĂłwkowy', 'noun', '', 'kontant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(218, 'warzywo, jarzyna', 'noun', 'en', 'grĂśnsak', '', '', '', '', '', '', '', 'en grĂśnsak', 'grĂśnsaken', 'grĂśnsaker', 'grĂśnsakerna', '', '', '', '', '', '', ''),
(219, 'na zewnÄtrz, zewnÄtrz', 'preposition', '', 'ut', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(220, 'halo', 'wyrazenie', '', 'hallĂĽ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'halo'),
(221, 'czy mogÄ mĂłwiÄ z...', 'wyrazenie', '', 'kan jag fĂĽ tala med...', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(222, 'dziadek, ojciec ojca', 'noun', 'en', 'farfar', '', '', '', '', '', '', '', 'en farfar', 'farfarn, farfadern', 'farfĂ¤der', 'farfĂ¤derna', '', '', '', '', '', '', ''),
(223, 'dziadek, ojciec matki', 'noun', 'en', 'morfar', '', '', '', '', '', '', '', 'en morfar', 'morfarn, morfadern', 'morfĂ¤der', 'morfĂ¤derna', '', '', '', '', '', '', ''),
(224, 'but', 'noun', 'en', 'sko', '', '', '', '', '', '', '', 'en sko', 'skon', 'skor', 'skorna', '', '', '', '', '', '', ''),
(225, 'potrzebowaÄ', 'verb', 'att', 'behĂśva', 'att behĂśva', 'behĂśver', 'behĂśvde', 'behĂśvt', 'behĂśva!', 'behĂśvande', 'behĂśvd', '', '', '', '', '', '', '', '', '', '', ''),
(226, 'tani', 'adjective', '', 'billig', '', '', '', '', '', '', '', '', '', '', '', 'billigt', 'billige', 'billiga', '', '', '', ''),
(227, 'drogi, drogie', 'adjective', '', 'dyr', '', '', '', '', '', '', '', '', '', '', '', 'dyrt', 'dyr', 'dyra', '', 'dyrare', 'dyrast', ''),
(228, 'nowy', 'adjective', '', 'ny', '', '', '', '', '', '', '', '', '', '', '', 'nytt', 'nye', 'nya', '', 'nyare', 'nyaste', ''),
(229, 'czĹowiek, istota ludzka', 'noun', 'en', 'mĂ¤nniska', '', '', '', '', '', '', '', 'en mĂ¤nniska', 'mĂ¤nniskan', 'mĂ¤nniskor', 'mĂ¤nniskorna', '', '', '', '', '', '', 'menicha'),
(230, 'kobieta', 'noun', 'en', 'kvinna', '', '', '', '', '', '', '', 'en kvinna', 'kvinnan', 'kvinnor', 'kvinnorna', '', '', '', '', '', '', ''),
(231, 'koĹ', 'noun', 'en', 'hĂ¤st', '', '', '', '', '', '', '', 'en hĂ¤st', 'hĂ¤sten', 'hĂ¤star', 'hĂ¤starna', '', '', '', '', '', '', 'hest'),
(232, 'przyjaciel, kolega', 'noun', 'en', 'vĂ¤n', '', '', '', '', '', '', '', 'en vĂ¤n', 'vĂ¤nnen', 'vĂ¤nner', 'vĂ¤nnerna', '', '', '', '', '', '', ''),
(233, 'ProszÄ podaÄ swĂłj zawĂłd', 'wyrazenie', '', 'Vad arbetar du med?', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(234, 'kaczka', 'noun', 'en', 'and', '', '', '', '', '', '', '', 'en and', 'anden', 'Ă¤nder', 'Ă¤nderna', '', '', '', '', '', '', ''),
(235, 'apteka', 'noun', 'ett', 'apotek', '', '', '', '', '', '', '', 'ett apotek', 'apoteket', 'apotek', 'apoteken', '', '', '', '', '', '', ''),
(236, 'stacja benzynowa', 'noun', 'en', 'bensinstation', '', '', '', '', '', '', '', 'en bensinstation', 'bensinstationen', 'bensinstationer', 'bensinstationerna', '', '', '', '', '', '', ''),
(237, 'biblioteka', 'noun', 'ett', 'bibliotek', '', '', '', '', '', '', '', 'ett bibliotek', 'biblioteket', 'bibliotek', 'biblioteken', '', '', '', '', '', '', ''),
(238, 'koĹo, obok', 'preposition', '', 'bredvid', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(239, 'koĹo, obok, przy', 'preposition', '', 'vid', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(240, 'wsiadaÄ do autobusu, wsiÄĹÄ do autobusu', 'wyrazenie', '', 'gĂĽ pĂĽ bussen', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(241, 'wysiadaÄ z autobusu, wysiÄĹÄ z autobusu', 'wyrazenie', '', 'gĂĽ av bussen', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(242, 'kolejka', 'noun', 'en', 'kĂś', '', '', '', '', '', '', '', 'en kĂś', 'kĂśn', 'kĂśer', 'kĂśerna', '', '', '', '', '', '', 'koe'),
(243, 'sklep spoĹźywczy', 'noun', 'en', 'livsmedelsaffĂ¤r', '', '', '', '', '', '', '', 'en livsmedelsaffĂ¤r', 'livsmedelsaffĂ¤ren', 'livsmedelsaffĂ¤rer', 'livsmedelsaffĂ¤rerna', '', '', '', '', '', '', 'lifs medel afer'),
(244, 'ksiÄĹźyc', 'noun', 'en', 'mĂĽne', '', '', '', '', '', '', '', 'en mĂĽne', 'mĂĽnen', 'mĂĽnar', 'mĂĽnarna', '', '', '', '', '', '', 'mone'),
(245, 'gdy, kiedy', 'conjunction', '', 'nĂ¤r', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ner'),
(246, 'i, oraz', 'conjunction', '', 'och', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ok'),
(247, 'bo', 'conjunction', '', 'fĂśr', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(248, 'lecz', 'conjunction', '', 'utan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(249, 'zarwno..., jak i...', 'wyrazenie', '', 'zarĂłwno..., jak i...', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(250, 'Ĺźe', 'conjunction', '', 'att', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(251, 'czy, jeĹli, leĹźeli', 'conjunction', '', 'om', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(252, 'tak..., jak...', 'wyrazenie', '', 'lika... som...', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(253, 'ponadto, rĂłwnieĹź, takĹźe, teĹź', 'adverb', '', 'ocksĂĽ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'okso'),
(254, 'inny, odmienny, rĂłĹźny', '???', '', 'olika', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(255, 'przed', 'preposition', '', 'fĂśre', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(256, 'koszula', 'noun', 'en', 'skjorta', '', '', '', '', '', '', '', 'en skjorta', 'skjortan', 'skjortor', 'skjortorna', '', '', '', '', '', '', 'chuta'),
(257, 'zwierzÄ', 'noun', 'ett', 'djur', '', '', '', '', '', '', '', 'ett djur', 'djuret', 'djur', 'djuren', '', '', '', '', '', '', 'jur'),
(258, 'uczyÄ siÄ', 'verb', 'att', 'studera', 'att studera', 'studerar', 'studerade', 'studerat', 'studera!', 'studerande', 'studerad', '', '', '', '', '', '', '', '', '', '', ''),
(259, 'samolot', 'noun', 'ett', 'flygplan', '', '', '', '', '', '', '', 'ett flygplan', 'flygplanet', 'flygplan', 'flygplanen', '', '', '', '', '', '', ''),
(260, 'autobus', 'noun', 'en', 'buss', '', '', '', '', '', '', '', 'en buss', 'bussen', 'bussar', 'bussarna', '', '', '', '', '', '', ''),
(261, 'lotnisko', 'noun', 'en', 'flygplats', '', '', '', '', '', '', '', 'en flygplats', 'flygplatsen', 'flygplatser', 'flygplatserna', '', '', '', '', '', '', ''),
(262, 'Czy mogÄ dostaÄ coĹ do picia?', 'wyrazenie', '', 'kan jag fĂĽ nĂĽgot att dricka?', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(263, 'klejnot, ozdoba', 'noun', 'ett', 'smycke', '', '', '', '', '', '', '', 'ett smycke', 'smycket', 'smycken', 'smyckena', '', '', '', '', '', '', ''),
(264, 'co wziÄĹeĹ?, co wziÄĹaĹ?', 'wyrazenie', '', 'vad tog du med?', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(265, 'piosenkarka, piosenkarz, Ĺpiewaczka, Ĺpiewak', 'noun', 'en', 'sĂĽngerska', '', '', '', '', '', '', '', 'en sĂĽngerska, en sĂĽngare', 'sĂĽngerskan, sĂĽngaren, sĂĽngarn', 'sĂĽngerskor, sĂĽngare', 'sĂĽngerskorna, sĂĽngarna', '', '', '', '', '', '', 'songerszka'),
(266, 'tancerka, tancerz', 'noun', 'en', 'dansare', '', '', '', '', '', '', '', 'en dansare', 'dansaren', 'dansare', 'dansarna', '', '', '', '', '', '', ''),
(267, 'muzyk', 'noun', 'en', 'musiker', '', '', '', '', '', '', '', 'en musiker', 'musikern', 'musiker', 'musikerna', '', '', '', '', '', '', ''),
(268, 'pianino, fortepian', 'noun', 'ett', 'piano', '', '', '', '', '', '', '', 'ett piano', 'pianot', 'pianon', 'pianona', '', '', '', '', '', '', ''),
(269, 'zy, niedobry,, kiepski', 'adjective', '', 'dĂĽlig', '', '', '', '', '', '', '', '', '', '', '', 'dĂĽligt', 'dĂĽlig', 'dĂĽliga', 'dĂĽlig', 'sĂ¤mre, vĂ¤rre', 'sĂ¤mst, vĂ¤rst', 'dolig'),
(270, 'dobry', 'adjective', '', 'bra', '', '', '', '', '', '', '', '', '', '', '', 'bra', 'bra', 'bra', 'bra', 'bĂ¤ttre', 'bĂ¤st', 'bro'),
(271, 'pogoda', 'noun', 'ett', 'vĂ¤der', '', '', '', '', '', '', '', 'ett vĂ¤der', 'vĂ¤dret;', '', '', '', '', '', '', '', '', 'weder'),
(272, 'zajÄty', 'adjective', '', 'upptagen', '', '', '', '', '', '', '', '', '', '', '', 'upptaget', 'upptagen', 'upptagna', 'upptagen', 'upptagnare', 'upptagnast', ''),
(273, 'wolny, swobodny, niezajÄty', 'adjective', '', 'ledig', '', '', '', '', '', '', '', '', '', '', '', 'ledigt', 'ledige', 'lediga', 'ledig', '', '', ''),
(274, 'przepraszam', 'interjection', '', 'fĂśrlĂ¤t, ursĂ¤kta', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ferlot, urszekta'),
(275, 'wybaczaÄ, uniewinniaÄ', 'verb', 'att', 'ursĂ¤kta', 'att ursĂ¤kta', 'ursĂ¤ktar', 'ursĂ¤ktade', 'ursĂ¤ktat', 'ursĂ¤kta!', 'ursĂ¤ktande', 'ursĂ¤ktad', '', '', '', '', '', '', '', '', '', '', 'urszekta'),
(276, 'przebaczenie, usprawiedliwienie', 'noun', 'en', 'ursĂ¤kt', 'en ursĂ¤kt', '', 'ursĂ¤kten', 'ursĂ¤kter', 'ursĂ¤kterna', '', '', 'en ursĂ¤kt', 'ursĂ¤kten', 'ursĂ¤kter', 'ursĂ¤kterna', '', '', '', '', '', '', 'urszakt'),
(277, 'nic siÄ nie staĹo', 'wyrazenie', '', 'det gĂśr inget', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(278, 'niestety', 'adverb', '', 'tyvĂ¤rr', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(279, 'nie, nie wolno, nikt, Ĺźaden', 'adjective', '', 'ingen', '', '', '', '', '', '', '', '', '', '', '', 'inget', 'ingen', 'inga', '', '', '', ''),
(280, 'MoĹźecie przyjĹÄ do naszego domu na kolacjÄ w piÄtek?', 'wyrazenie', '', 'Kan ni komma hem till oss pĂĽ middag pĂĽ fredag?', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(281, 'Czy wiesz, co to oznacza?', 'wyrazenie', '', 'Vet du vad det hĂ¤r betyder?', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(282, 'Niestety nie wiem co to znaczy', 'wyrazenie', '', 'TyvĂ¤rr vet jag inte vad det hĂ¤r betyder', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `good` int(11) NOT NULL,
  `bad` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=23 ;

--
-- Zrzut danych tabeli `score`
--

INSERT INTO `score` (`id`, `user_id`, `good`, `bad`, `data`) VALUES
(16, 2, 1, 0, '2014-07-17 12:15:04'),
(17, 2, 0, 1, '2014-07-17 13:12:10'),
(18, 2, 2, 0, '2014-07-17 13:14:40'),
(19, 2, 1, 1, '2014-07-17 13:15:13'),
(20, 1, 1, 0, '2014-07-17 13:16:45'),
(21, 2, 4, 5, '2014-07-17 13:27:47'),
(22, 2, 21, 7, '2014-07-17 22:37:01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
