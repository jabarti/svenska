-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11 Lip 2014, 01:23
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
  `id_ord` varchar(145) NOT NULL,
  `typ` enum('noun','verb','adjective','adverb','preposition','pronoun','wyrazenie') NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=152 ;

--
-- Zrzut danych tabeli `ord`
--

INSERT INTO `ord` (`id`, `id_ord`, `typ`, `rodzaj`, `trans`, `infinitive`, `presens`, `past`, `supine`, `imperative`, `present_participle`, `past_participle`, `S_indefinite`, `S_definite`, `P_indefinite`, `P_definite`, `neuter`, `masculin`, `plural`, `st_rowny`, `st_wyzszy`, `st_najwyzszy`, `wymowa`) VALUES
(1, 'rower', 'noun', 'en', 'cykel', '', '', '', '', '', '', '', 'en cykel', 'cykeln', 'cyklar', 'cyklarna', NULL, NULL, NULL, NULL, '', '', 'sykel'),
(2, 'list', 'noun', 'ett', 'brev', '', '', '', '', '', '', '', 'ett brev', 'brevet', 'brev', 'breven', NULL, NULL, NULL, NULL, '', '', ''),
(3, 'iĹÄ', 'verb', 'att', 'gĂĽ', 'att gĂĽ', 'gĂĽr', 'gick', 'gĂĽtt', 'gĂĽ!', 'gĂĽende', 'gĂĽngen', '', '', '', '', '', '', '', '', '', '', 'goa'),
(4, 'samochĂłd', 'noun', 'en', 'bil', '', '', '', '', '', '', '', 'en bil', 'bilen', 'bilar', 'bilarna', NULL, NULL, NULL, NULL, '', '', ''),
(5, 'kiedy, wtedy', 'adverb', '', 'dĂĽ', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(6, 'mĹody(a)', 'adjective', '', 'ung', '', '', '', '', '', '', '', '', '', '', '', 'ungt', 'unge', 'unga', NULL, 'yngre', 'yngst', ''),
(7, 'wczeĹniej, poprzednio', 'adjective', '', 'tidigare', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', 'tidjare'),
(8, 'mieszkaÄ', 'verb', 'att', 'bo', 'att bo', 'bor', 'bodde', 'bott', 'bo!', 'boende', 'brak', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(9, 'z', 'preposition', '', 'med', '', '', '', '', '', '', '', 'med', 'meden', 'medar', 'medarna', NULL, NULL, NULL, NULL, '', '', ''),
(10, 'mieÄ', 'verb', 'att', 'ha', 'att ha', 'har', 'hade', 'haft', 'ha!', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(11, 'chodziÄ, iĹÄ', 'verb', 'att', 'ĂĽka', 'att ĂĽka', 'ĂĽker', 'ĂĽkte', 'ĂĽkt', 'ĂĽk!', 'ĂĽkande', '', '', '', '', '', '', '', '', '', '', '', 'oker'),
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
(32, 'informatyka', 'noun', 'en', 'datavetenskap', '', '', '', '', '', '', '', 'en datavetenskap', 'datavetenskapen', 'datavetenskaps', 'datavetenskapens', NULL, NULL, NULL, NULL, '', '', ''),
(33, 'pĂłĹşniej', 'adverb', '', 'sedan', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(34, 'ciepĹo', 'noun', 'en', 'vĂ¤rme', '', '', '', '', '', '', '', 'en vĂ¤rme', 'vĂ¤rmen', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(35, 'spragniony', 'adjective', '', 'tĂśrstig', '', '', '', '', '', '', '', '', '', '', '', 'tĂśrstigt', 'tĂśrstige', 'tĂśrstiga', NULL, 'tĂśrstigare', 'tĂśrstigast', 'torsztig'),
(36, 'gĹodny', 'adjective', '', 'hungrig', '', '', '', '', '', '', '', '', '', '', '', 'hungrigt', 'hungrige', 'hungriga', NULL, 'hungrigare', 'hungrigaste', ''),
(37, 'dawaÄ', 'verb', 'att', 'ge', 'att ge', 'ger', 'gav', 'gett, givit', 'ge!', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 'mieszkanie', 'noun', 'en', 'lĂ¤genhet', '', '', '', '', '', '', '', 'en lĂ¤genhet', 'lĂ¤genheten', 'lĂ¤genheter', 'lĂ¤genheterna', NULL, NULL, NULL, NULL, '', '', 'legenhet'),
(39, 'nauczaÄ', 'verb', 'att', 'undervisa', 'att undervisa', 'undervisar', 'undervisade', 'undervisat', 'undervisa!', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(40, 'piÄ', 'verb', 'att', 'dricka', 'att dricka', 'dricker', 'drack', 'druckit', 'drick!', 'drickande', 'drucken', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(41, 'napĂłj', 'noun', 'en', 'dricka', '', '', '', '', '', '', '', 'en dricka', 'drickan', 'drickor', 'drickorna', NULL, NULL, NULL, NULL, '', '', ''),
(42, 'lot', 'noun', 'ett', 'flyg', '', '', '', '', '', '', '', 'ett flyg', 'flyget', 'flyg', 'flygen', NULL, NULL, NULL, NULL, '', '', ''),
(43, 'odjechaÄ, wyruszaÄ, odlecieÄ', 'verb', 'att', 'avgĂĽ', 'att avgĂĽ', 'avgĂĽr', 'avgick', 'avgĂĽtt', 'avgĂĽ!', 'avgĂĽende', 'avgĂĽngen', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(44, 'kanapka', 'noun', 'en', 'smĂśrgĂĽs', '', '', '', '', '', '', '', 'en smĂśrgĂĽs', 'smĂśrgĂĽsen', 'smĂśrgĂĽsar', 'smĂśrgĂĽsarna', NULL, NULL, NULL, NULL, '', '', 'smorgos'),
(45, 'jeĹÄ', 'verb', 'att', 'Ă¤ta', 'att Ă¤ta', 'Ă¤ter', 'ĂĽt', 'Ă¤tit', 'Ă¤t!', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(46, 'marchewka', 'noun', 'en', 'morot', '', '', '', '', '', '', '', 'en morot', 'moroten', 'morĂśtter', 'morĂśtterna', NULL, NULL, NULL, NULL, '', '', ''),
(47, 'kto', 'pronoun', '', 'vem', '', '', '', '', '', '', '', '', '', 'vilka', '', NULL, NULL, NULL, NULL, '', '', ''),
(48, 'babcia (matka ojca)', 'noun', 'en', 'farmor', '', '', '', '', '', '', '', 'en farmor', 'farmorn/farmodern', 'farmĂśdrar', 'farmĂśdrarna', NULL, NULL, NULL, NULL, '', '', ''),
(49, 'babcia (matka matki)', 'noun', 'en', 'mormor', '', '', '', '', '', '', '', 'en mormor', 'mormorn/mormodern', 'mormĂśdrar', 'mormĂśdrarna', NULL, NULL, NULL, NULL, '', '', ''),
(50, 'chÄtnie, proszÄ', 'adjective', '', 'gĂ¤rna', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 'hellre', 'helst', ''),
(51, 'albo, lub', '', '', 'eller', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(52, 'rozumieÄ', 'verb', 'att', 'fĂśrstĂĽ', 'att fĂśrstĂĽ', 'fĂśrstĂĽr', 'fĂśrstod', 'fĂśrstĂĽtt', 'fĂśrstĂĽ!', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', ''),
(53, 'sĹoneczny', 'adjective', '', 'solig', '', '', '', '', '', '', '', '', '', '', '', 'soligt', 'sĂślige', 'soliga', NULL, 'soligare', 'soligast', ''),
(54, 'jabĹko', 'noun', 'ett', 'Ă¤pple', '', '', '', '', '', '', '', 'ett Ă¤pple', 'Ă¤pplet', 'Ă¤pplen', 'Ă¤pplena', NULL, NULL, NULL, NULL, '', '', 'eple'),
(55, 'teraz, obecnie', 'adverb', '', 'nu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', ''),
(56, 'krowa', 'noun', 'en', 'ko', '', '', '', '', '', '', '', 'en ko', 'kon', 'kor', 'korna', '', '', '', NULL, '', '', ''),
(57, 'lato', 'noun', 'en', 'sommar', '', '', '', '', '', '', '', 'en sommar', 'sommar(e)n', 'somrar', 'somrarna', '', '', '', NULL, '', '', ''),
(58, 'trochÄ, maĹo, kilka', 'adverb', '', 'lite', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'mindre', 'minst', ''),
(59, 'graÄ', 'verb', 'att', 'spela', 'att spela', 'spelar', 'spelade', 'spelat', 'spela!', 'spelande', 'spelad', '', '', '', '', '', '', '', '', '', '', ''),
(60, 'duĹźy', 'adjective', '', 'stor', '', '', '', '', '', '', '', '', '', '', '', 'stort', 'store', 'stora', '', 'stĂśrre', 'stĂśrst', ''),
(61, 'popoĹudnie', 'noun', 'en', 'eftermiddag', '', '', '', '', '', '', '', 'en eftermiddag', 'eftermiddagen', 'eftermiddagar', 'eftermiddagarna', '', '', '', '', '', '', 'eftermida'),
(62, 'Mam skarpetki na sobie', 'wyrazenie', '', 'jag har pĂĽ mig strumpor', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, 'ale, jednak', '', '', 'men', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, 'Ile masz lat?', 'wyrazenie', '', 'Hur gammal Ă¤r du?', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, 'jaki', 'adverb', '', 'nĂĽgon', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, 'Jak siÄ masz?', 'wyrazenie', '', 'Hur Ă¤r det?', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, 'wieczĂłr', 'noun', 'en', 'kvĂ¤ll', '', '', '', '', '', '', '', 'en kvĂ¤ll', 'kvĂ¤llen', 'kvĂ¤llar', 'kvĂ¤llarna', '', '', '', '', '', '', 'kwel'),
(68, 'zamarzaÄ', 'verb', 'att', 'frysa', 'att frysa', 'fryser', 'frĂśs', 'frusit', 'frys!', 'frysande', 'frusen', '', '', '', '', '', '', '', '', '', '', ''),
(69, 'caĹowaÄ', 'verb', 'att', 'pussa', 'att pussa', 'pussar', 'pussade', 'pussat', 'pussa!', 'pussande', 'pussad', '', '', '', '', '', '', '', '', '', '', ''),
(70, 'kiedy, gdy', '', '', 'nĂĽr', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'nar'),
(71, 'kupowaÄ', 'verb', 'att', 'kĂśpa', 'att kĂśpa', 'kĂśper', 'kĂśpte', 'kĂśpt', 'kĂśpa!', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(72, 'dla', 'preposition', '', 'fĂśr', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, 'szpital', 'noun', 'ett', 'sjukhus', '', '', '', '', '', '', '', 'ett sjukhus', 'sjukhuset', 'sjukhus', 'sjukhusen', '', '', '', '', '', '', 'szjukhus'),
(74, 'pĹaciÄ, zapĹaciÄ', 'verb', 'att', 'betala', 'att betala', 'betalar', 'betalade', 'betalat, betalt', 'betala!', 'betalande', 'betalad', '', '', '', '', '', '', '', '', '', '', ''),
(75, 'Nie zrozumiaĹem czy mĂłgbyĹ to powiedzieÄ jeszcze raz?', 'wyrazenie', '', 'Jag fĂśrstĂĽr inte, kan du sĂ¤ga det igen?', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(76, 'ja', 'pronoun', '', 'jag', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jo'),
(77, 'taĹczyÄ', 'verb', 'att', 'dansa', 'att dansa', 'dansar', 'dansade', 'dansat', 'dansa!', 'dansande', 'dansad', '', '', '', '', '', '', '', '', '', '', ''),
(78, 'ĹpiewaÄ', 'verb', 'att', 'sjunga', 'att sjunga', 'sjunger', 'sjĂśng', 'sjungit', 'sjung!', 'sjungande', 'sjungen', '', '', '', '', '', '', '', '', '', '', 'chjunga'),
(79, 'sĹuchaÄ', 'verb', 'att', 'lyssna', 'att lyssna', 'lyssnar', 'lyssnade', 'lyssnat', 'lyssna!', 'lyssnande', '', '', '', '', '', '', '', '', '', '', '', ''),
(80, 'kierowaÄ, jechaÄ', 'verb', 'att', 'kĂśra', 'att kĂśra', 'kĂśr', 'kĂśrde', 'kĂśrt', 'kĂśr!', 'kĂśrande', '', '', '', '', '', '', '', '', '', '', '', 'siora'),
(81, 'prosto', 'adverb', '', 'rakt fram', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(82, 'prawo', 'adjective', '', 'hĂśger', '', '', '', '', '', '', '', '', '', '', '', 'hĂśger', 'hĂśgre', 'hĂśgra', '', '', '', ''),
(83, 'lewo', 'adjective', '', 'vĂ¤nster', '', '', '', '', '', '', '', '', '', '', '', 'vĂ¤nster', 'vĂ¤nstre', 'vĂ¤nstra', '', '', '', ''),
(84, 'bawiÄ siÄ', 'verb', 'att', 'leka', 'att leka', 'leker', 'lekte', 'lekt', 'lek!', 'lekande', 'lekt', '', '', '', '', '', '', '', '', '', '', ''),
(85, 'jezioro', 'noun', 'en', 'sjĂś', '', '', '', '', '', '', '', 'en sjĂś', 'sjĂśn', 'sjĂśar', 'sjĂśarna', '', '', '', '', '', '', 'chjoe'),
(86, 'siadaÄ', 'verb', 'att', 'sĂ¤tta sig', 'att sĂ¤tta sig', 'sĂ¤tter sig', 'satte sig', 'satt sig', 'sĂ¤tt sig!', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(87, 'nazwa, imiÄ, nazwisko', 'noun', 'ett', 'namn', '', '', '', '', '', '', '', 'ett namn', 'namnet', 'namn', 'namnen', '', '', '', '', '', '', ''),
(88, 'stawiaÄ', 'verb', 'att', 'sĂ¤tta', 'att sĂ¤tta', 'sĂ¤tter', 'satte', 'satt', 'sĂ¤tt!', 'sĂ¤ttande', 'satt', '', '', '', '', '', '', '', '', '', '', ''),
(89, 'kubek, filiĹźanka', 'noun', 'en', ' kopp', '', '', '', '', '', '', '', 'en kopp', 'koppen', 'koppar', 'kopparna', '', '', '', '', '', '', ''),
(90, 'za', 'preposition', '', 'bakom', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
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
(104, 'festyn, przyjÄcie, biesiada', 'noun', 'en', 'fest', '', '', '', '', '', '', '', 'en fest', 'festen', 'fester', 'festerna', '', '', '', '', '', '', ''),
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
(125, 'przyjĹÄ', 'verb', 'att', 'komma', 'att komma', 'kommer', 'kom', 'kommit', 'komm!', 'kommande', 'kommen', '', '', '', '', '', '', '', '', '', '', ''),
(126, 'Ona idzie (gdzieĹ)', 'wyrazenie', '', 'Hon ska till ..', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(127, 'Ona wraca (skÄdĹ)', 'wyrazenie', '', 'Hon kommer frĂĽn...', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(128, 'ona pĂłjdzie (gdzieĹ)', 'wyrazenie', '', 'Hon kommer till âŚ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
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
(147, 'coĹ', 'pronoun', '', 'nĂĽgot', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'nogot'),
(148, 'chcieÄ', 'verb', 'att', 'vilja', 'att vilja', 'vill', 'ville', 'velat', 'vill!', 'viljande', '', '', '', '', '', '', '', '', '', '', '', ''),
(149, 'przedstawienie', 'noun', 'en', 'fĂśrestĂ¤llning', '', '', '', '', '', '', '', 'fĂśrestĂ¤llning', 'fĂśrestĂ¤llningen', 'fĂśrestĂ¤llningar', 'fĂśrestĂ¤llningarna', '', '', '', '', '', '', 'forestelning'),
(150, 'drabina', 'noun', 'en', 'stege', '', '', '', '', '', '', '', 'en stege', 'stegen', 'stegar', 'stegarna', '', '', '', '', '', '', ''),
(151, 'wiosna', 'noun', 'en', 'vĂĽr', '', '', '', '', '', '', '', 'en vĂĽr', 'vĂĽren', 'vĂĽrar', 'vĂĽrarna', '', '', '', '', '', '', 'wor');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
