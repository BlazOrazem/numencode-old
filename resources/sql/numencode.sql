-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 06. maj 2015 ob 22.13
-- Različica strežnika: 5.6.16
-- Različica PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Zbirka podatkov: `numencode`
--

-- --------------------------------------------------------

--
-- Struktura tabele `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Odloži podatke za tabelo `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `is_active`) VALUES
(1, 'Blaž Oražem', 'blaz@orazem.info', 'q1w2e3', 1);

-- --------------------------------------------------------

--
-- Struktura tabele `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `published_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Odloži podatke za tabelo `article`
--

INSERT INTO `article` (`id`, `category_id`, `active`, `published_at`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, '2015-05-01 00:00:00', '2013-01-02 18:00:00', '2013-01-02 18:00:00', 1, 1),
(2, 1, 1, '2015-05-01 00:00:00', '2013-01-11 17:50:07', '2013-08-08 12:30:41', 1, 1),
(3, 1, 1, '2015-01-13 08:00:00', '2015-02-24 00:00:00', '2015-02-24 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `article_i18n`
--

CREATE TABLE IF NOT EXISTS `article_i18n` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `lang_id` varchar(2) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `lang_id` (`lang_id`),
  KEY `article_id` (`article_id`),
  FULLTEXT KEY `title` (`title`,`content`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Odloži podatke za tabelo `article_i18n`
--

INSERT INTO `article_i18n` (`id`, `article_id`, `lang_id`, `title`, `content`) VALUES
(1, 1, 'en', 'IT alignment: what have we learned?', '<p>We provide a review of the alignment literature in IT, addressing questions such as: What have we learned? What is disputed? Who are contributors to the debate? The article is intended to be useful to faculty and graduate students considering conducting research on alignment, instructors preparing lectures, and practitioners seeking to assess the ''state-of-play''. It is both informational and provocative. Challenges to the value of alignment research, divergent views, and new perspectives on alignment are presented. It is hoped that the article will spark helpful conversation on the merits of continued investigation of IT alignment.</p>'),
(2, 2, 'en', 'Computer models of the mind are invalid', '<p>It is a great pleasure to have this joust with Igor who is not only a brilliant thinker about the mind, but also a great intellectual sparring partner. Igor has expressed his dissent from the view that I''m going to advance in support of the motion which is that ‘computer models of the mind are invalid’,1 in his book: The World in My Mind, My Mind In The World: Key Mechanisms of Consciousness in Humans, Animals and Machines. He actually devotes five pages of the final chapter to what he calls ‘Tallis''s complaint’ which I am now going to make public. The point of issue is whether computer models of the mind are valid. I am going to argue that they are not because the computational theory of mind is invalid. Igor may go on to argue that even if the computational theory of mind is invalid it may still be useful in the sense of being fruitful. I will leave him to prove that and simply suggest to you that while barking up the wrong tree may give a sense of progress it is illusory.</p>'),
(3, 1, 'sl', 'IT poravnava: kaj smo se naučili?', '<p>Nudimo pregled literature poravnavo v IT, ki obravnavajo vprašanja, kot so: Kaj smo se naučili? Kaj je sporno? Kdo so prispevali k razpravi?Članek je namenjen, da je koristno, da fakultete in podiplomskih študentov, ki razmišljajo opravlja raziskave na področju usklajevanja, inštruktorji pripravljajo predavanja, in delavci, ki želijo oceniti '' state-of-play ''. To je tako informativne in provokativen. So predstavljene Izzivi vrednosti raziskav poravnavo, različnih pogledov in novih pogledov na poravnavo. Upati je, da bo članek iskra koristen pogovor o utemeljenosti nadaljnjega preiskovanja IT poravnavo.</p>'),
(4, 2, 'sl', 'Računalniški modeli uma so neveljavni', '<p>To je veliko zadovoljstvo mi je, da je to tekmuješ z Igorjem, ki je ne samo briljanten mislec o mislih, ampak tudi odličen partner intelektualne sparring. Igor je izrazil nestrinjanje s stališčem, da I''m dogaja, da napreduje v podporo gibanju, ki je, da "so računalniški modeli uma neveljaven", 1 v svoji knjigi: The World v mojih mislih, My Mind v svetu : Ključne Mehanizmi zavesti pri ljudeh, živalih in strojih. On je dejansko namenja pet strani v zadnjem poglavju, da tisto, kar on imenuje "Tallis" je očitek ", ki sem zdaj dogaja, da bi javnost.Točka vprašanje, ali so računalniški modeli uma veljavna. Bom trdijo, da niso, ker računska teorija uma je neveljavna. Igor lahko gredo na trdijo, da tudi če računska teorija uma je neveljaven, lahko še vedno koristno v smislu, da je uspešen. Jaz ga bo pustil, da dokaže, da je, in preprosto predlagam vam, da je, medtem ko lahko lajali up napačno drevo dajejo občutek napredka iluzorna.</p>'),
(5, 3, 'en', 'This is just an english article.', 'Sample content for only-english article.');

-- --------------------------------------------------------

--
-- Struktura tabele `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` varchar(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `lang`
--

INSERT INTO `lang` (`id`, `title`, `currency`, `is_default`) VALUES
('en', 'English', 'USD', 1),
('sl', 'Slovenščina', 'EUR', NULL);

-- --------------------------------------------------------

--
-- Struktura tabele `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_slovenian_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_slovenian_ci DEFAULT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_slovenian_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_slovenian_ci,
  `metadesc` varchar(255) CHARACTER SET utf8 COLLATE utf8_slovenian_ci DEFAULT NULL,
  `metakw` varchar(255) CHARACTER SET utf8 COLLATE utf8_slovenian_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `updatedby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Odloži podatke za tabelo `page`
--

INSERT INTO `page` (`id`, `parent`, `position`, `active`, `name`, `title`, `subtitle`, `content`, `metadesc`, `metakw`, `created`, `createdby`, `updated`, `updatedby`) VALUES
(1, 0, 0, 1, 'Prva stran', 'Prva stran', NULL, 'Lorem ipsum dolor sit amar.', 'meta desc test', 'meta kw test', '2013-01-02 18:00:00', NULL, '2013-01-02 18:00:00', NULL),
(2, 0, 1, 1, 'Druga stran', 'Druga stran', '', '<p>In to je vsebina ja</p>\r\n\r\n<p><img alt="" src="/media/images/avto1.jpg" style="width: 300px; height: 201px;" /></p>', 'test4', 'test6', '2013-01-11 17:50:07', NULL, '2013-08-08 12:30:41', 1),
(3, 0, 2, 1, 'Tretja stran', 'Tretja stran', NULL, 'asdfasfd', 'asdfasdf', 'asdfasdf', '2013-01-14 11:11:08', NULL, '2013-01-14 11:11:08', NULL),
(4, 0, 3, 1, 'Cetrta stran', 'Cetrta stran', NULL, 'bmnvbmn', 'vbmnvbmn', 'vbmnvbmv', '2013-01-20 20:00:34', NULL, '2013-01-20 20:00:34', NULL),
(5, 9, 0, 1, 'O podjetju', 'Firma dela d.o.o.', 'Splošni podatki podjetja', '<p>Podjetje (ang. Business) ni pravna oseba in je poslovna enota gospodarske družbe (ang. Corporation), ki pa je pravna oseba (ang. Legal Entity). Podjetje v pravnem prometu nastopa v imenu in za račun gospodarske družbe.</p>\n\n<p>Ena gospodarska družba ima lahko več podjetij, ki se lahko ukvarjajo z eno (npr. ena družba ima v lasti več barov, kateri je vsaka svoje podjetje) ali več dejavnostmi (npr. večje gospodarske družbe).</p>\n\n<p><img alt="" src="/media/images/avto2.jpg" style="width: 300px; height: 197px;" /></p>\n\n<p>Eno podjetje je lahko last več gospodarskih družb v primeru t.im skupnega podjema (ang. Joint Venture).</p>\n\n<p>Običajno v praksi (zmotno) pojmujemo podjetje kot pravno osebo zaradi tega, ker ima gospodarska družba le eno podjetje in je vodja podjetja in gospodarske družbe ista oseba. Pri večjih gospodarskih družbah pa je ta razlika med vodenjem družbe in vodenjem poslov podjetja bistvena.</p>', 'Firma obstaja že 20 let in deluje v Sloveniji.', 'firma, podjetje, podatki', '2013-01-20 20:08:01', 1, '2013-08-08 23:03:18', 1),
(6, 1, 1, 1, 'Parent druga stran', 'Parent druga stran', NULL, 'asdf', 'asdf', 'asdf', '2013-01-20 20:12:28', NULL, '2013-01-20 20:12:28', NULL),
(7, 1, 0, 1, 'Parent prva stran', 'Parent prva stran', NULL, 'asdf', 'asdf', 'asdf', '2013-01-20 20:47:21', NULL, '2013-01-20 20:47:21', NULL),
(9, 2, 0, 1, 'Prva podstran pri parentu dva', 'Prva podstran pri parentu dva', NULL, 'a', 'a', 'a', '2013-01-20 21:42:35', NULL, '2013-01-20 21:42:35', NULL),
(10, 6, 0, 1, 'Tretji nivo', 'Tretji nivo', 'Tretji nivo', '<p>Tretji nivo</p>\r\n', 'Tretji nivo', 'Tretji nivo', '2013-02-18 00:00:00', NULL, '2014-02-09 00:26:24', 1),
(12, 9, 2, 1, 'Slovenija', 'Članek o Sloveniji in njeni zgodovini', 'Test šumnikov ta suhi škafec pušča že sedaj', '<p>Slovanski predniki dana&scaron;njih Slovencev so se na ozemlju Slovenije naselili v 6. stoletju. V 7. stoletju se je oblikovala Karantanija, prva država alpskih Slovanov. Leta 745 je Karantanija v zameno za obrambo proti Obrom priznala bavarsko nadoblast, medtem ko je notranjo samostojnost ohranila do preoblikovanja v frankovsko grofijo leta 828. Verjetno se je v 7. stoletju na prostoru osrednje Slovenije izoblikovala &scaron;e ena slovanska plemenska tvorba - Karniola, ki je v 8. stoletju tudi pri&scaron;la v sklop frankovske države. V času od 8. stoletja se je iz Salzburga in Ogleja začelo &scaron;iriti tudi kr&scaron;čanstvo.</p>\r\n\r\n<p>Okoli leta 1000 so bili napisani Brižinski spomeniki, prvi pisni dokument v sloven&scaron;čini in prvi slovanski zapis v latinici. V 14. stoletju je spadala večina dana&scaron;njega slovenskega ozemlja v posest Habsburžanov, kar je pozneje postala Habsbur&scaron;ka monarhija. Slovensko ozemlje je bilo razdeljeno na dežele: Kranjsko, Trst, Istro, Gori&scaron;ko, Koro&scaron;ko in &Scaron;tajersko.</p>\r\n\r\n<p>V letu 1848 so v Pomladi narodov med &scaron;tevilnimi narodi tudi Slovenci s političnim programom zahtevali združeno Slovenijo.</p>\r\n\r\n<p>Z razpadom Avstro-Ogrske leta 1918 so južnoslovanski narodi nekdanje dvojne države 29. oktobra 1918 razglasili narodno osvoboditev in ustanovitev samostojne države Slovencev, Hrvatov in Srbov s sredi&scaron;čem v Zagrebu. Nevarnost s strani Italije, ki je zasedla Primorsko in Istro ter dele Dalmacije, in pritisk Srbov po združitvi v skupno državo sta botrovali 1. decembra 1918 k združitvi Države SHS s Kraljevino Srbijo v Kraljevino Srbov, Hrvatov in Slovencev, ki se je 1929 preimenovala v Kraljevino Jugoslavijo.</p>\r\n\r\n<p>Kraljevina Jugoslavija je med 2. svetovno vojno razpadla, Slovenci pa so se pridružili Demokratični federativni Jugoslaviji, uradno razgla&scaron;eni 10. avgusta 1945. Država se je 29. novembra 1945 preimenovala v Federativno ljudsko republiko Jugoslavijo (FLRJ) in &scaron;e kasneje leta 1963 v Socialistično federativno republiko Jugoslavijo (SFRJ).</p>\r\n\r\n<p>Dana&scaron;nja Slovenija je na osnovi plebiscitne odločitve razglasila svojo neodvisnost od SFRJ 25. junija 1991.</p>\r\n\r\n<p>Gospodarstvo</p>\r\n\r\n<p>Glavni članek: Gospodarstvo Slovenije.</p>\r\n\r\n<p>Slovenija je gospodarsko zelo razvita država. Je najbolj razvita tranzicijska država s staro rudarsko-industrijsko tradicijo in razvitimi storitvenimi dejavnostmi. Kmetijstvo je manj&scaron;ega pomena, saj je obdelanih le 12&nbsp;% povr&scaron;ja. V turizmu so pomembna obmorska letovi&scaron;ča (Piran, Portorož, Izola, Koper, Ankaran, Debeli rtič...), smučarska sredi&scaron;ča (Maribor, Kranjska gora, Vogel, Kanin, Rogla...) in toplice (Radenci, Moravske Toplice, Terme Čatež, Terme Dobrna, Lendava, Maribor, Ptuj, &Scaron;marje&scaron;ke Toplice...).</p>\r\n\r\n<p>Politika</p>\r\n\r\n<p>Nekdanji slovenski predsednik Danilo T&uuml;rk ob govoru v okviru slovesnosti ob 65. obletnici zmage nad nacifa&scaron;izmom leta 2010</p>\r\n\r\n<p>Glavni članek: Politika Slovenije.</p>\r\n\r\n<p>Vodja države je predsednik, ki je izvoljen vsakih pet let. Nosilec izvr&scaron;ilne oblasti v Sloveniji je Vlada Republike Slovenije, ki jo vodi predsednik vlade. Poleg njega sestavljajo vlado &scaron;e ministri. Predsednika vlade predlaga predsednik Republike Slovenije, z glasovanjem pa potrdi državni zbor Republike Slovenije, ki ga vodi predsednik Državnega zbora Republike Slovenije</p>\r\n\r\n<p>Nepopolni dvodomni parlament Slovenije sestavljata državni zbor in državni svet Republike Slovenije. Državni zbor ima 90 sedežev, ki jih deloma zasedajo neposredno izvoljeni predstavniki in deloma sorazmerno izvoljeni predstavniki (po eden iz italijanske in madžarske manj&scaron;ine). Državni svet ima 40 sedežev, predstavljajo ga družbene, gospodarske, strokovne in krajevno pomembne skupine. Državni svet nima funkcije drugega (zgornjega) doma parlamenta, saj mu ustava teh pristojnosti ne zagotavlja. Parlamentarne volitve so vsake &scaron;tiri leta, v državni svet pa vsakih pet let.</p>\r\n', 'Vse o Sloveniji.', 'slovenija, država, splošno', '2014-01-20 18:28:25', 1, '2014-02-03 23:00:59', 1);

-- --------------------------------------------------------

--
-- Struktura tabele `url`
--

CREATE TABLE IF NOT EXISTS `url` (
  `url` varchar(255) NOT NULL,
  `plugin` varchar(255) DEFAULT NULL,
  `controller` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `params` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`url`),
  KEY `controller` (`controller`),
  KEY `plugin` (`plugin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `url`
--

INSERT INTO `url` (`url`, `plugin`, `controller`, `method`, `params`) VALUES
('all', NULL, 'page', 'index', NULL),
('cetrta_stran', NULL, 'page', 'index', 'a:3:{i:0;i:4;i:1;s:7:"testone";i:2;s:7:"testtwo";}'),
('clanek', 'article', 'article', 'index', 'a:1:{i:0;i:1;}'),
('english-article', NULL, 'article', 'index', 'a:1:{i:0;i:3;}'),
('slovenija', NULL, 'page', 'index', 'a:1:{i:0;i:12;}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
