-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 16. maj 2015 ob 10.40
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
-- Struktura tabele `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned DEFAULT NULL,
  `plugin_code` varchar(255) DEFAULT NULL,
  `plugin_param` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `display_rule` varchar(255) NOT NULL DEFAULT 'always',
  `ord` int(11) DEFAULT NULL,
  `is_hidden` int(1) unsigned DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  KEY `plugin_code` (`plugin_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Odloži podatke za tabelo `content`
--

INSERT INTO `content` (`id`, `page_id`, `plugin_code`, `plugin_param`, `position`, `display_rule`, `ord`, `is_hidden`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 2, NULL, NULL, 'center', 'always', 10, NULL, '2015-05-15 18:32:54', NULL, 1, 1),
(2, 2, NULL, NULL, 'center', 'always', 20, NULL, '2015-05-15 18:32:54', NULL, 1, 1),
(3, 2, NULL, NULL, 'center', 'always', 30, NULL, '2015-05-15 18:32:54', NULL, 1, 1),
(4, 2, NULL, NULL, 'center', 'always', 40, NULL, '2015-05-15 18:32:54', NULL, 1, 1),
(5, 2, NULL, NULL, 'center', 'always', 50, NULL, '2015-05-15 18:32:54', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `content_i18n`
--

CREATE TABLE IF NOT EXISTS `content_i18n` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(10) unsigned NOT NULL,
  `lang_id` varchar(2) NOT NULL DEFAULT 'en',
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `body` text,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`),
  KEY `lang_id` (`lang_id`),
  FULLTEXT KEY `title` (`title`,`subtitle`,`body`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Odloži podatke za tabelo `content_i18n`
--

INSERT INTO `content_i18n` (`id`, `content_id`, `lang_id`, `title`, `subtitle`, `body`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(1, 1, 'en', 'Content part 1', 'Et qui dignissimos cumque repellendus quia consequatur.', '<p>Aliquam ipsum maiores odit ut laboriosam ad blanditiis atque. Dolor et eligendi perspiciatis voluptatem. Laboriosam ut et debitis. Nesciunt asperiores deserunt ex nihil unde.</p><p>Et qui qui exercitationem aut officiis consectetur aperiam. Et libero provident commodi laboriosam. Rerum amet corporis perspiciatis quia aut nihil occaecati sapiente.</p><p>Sit in officia quod fugiat deleniti. Dicta quisquam quibusdam necessitatibus earum. Quibusdam tempore incidunt sequi officia ipsa quo voluptatem.</p>', 'Ut asperiores maiores quam ad.', 'Qui voluptatem magnam ea.', 'fugiat, aut, quia'),
(2, 2, 'en', 'Content part 2', 'Voluptas modi nam et natus est consequatur facilis.', '<p>Ut soluta sunt ea molestiae. Non officiis quod voluptate voluptatem a. Qui illum odit deserunt sunt possimus.</p><p>Est provident itaque harum adipisci sit sequi sit. Temporibus odit facere modi molestiae nisi unde. Eum repudiandae et et officiis et.</p><p>Eaque aut velit eos. Debitis ut doloremque consequatur autem porro aut commodi. Id in explicabo incidunt perferendis.</p>', 'Assumenda laboriosam enim nostrum.', 'Alias nulla commodi iusto fugiat ipsum cumque.', 'velit, soluta, nulla'),
(3, 3, 'en', 'Content part 3', 'Amet facere et fuga minus.', '<p>Est placeat quae quia rerum inventore. Dolores laudantium delectus dolorem qui earum nisi sunt. Et nam qui nobis sed.</p><p>Harum itaque necessitatibus ut qui et distinctio. Quia rerum culpa a tempora voluptatum occaecati. Natus eligendi aut facilis esse et. Eaque quis expedita omnis in.</p><p>Omnis in et deleniti. Adipisci repellendus fugiat nulla totam ex. Impedit id eveniet consequuntur.</p>', 'Facere sit commodi aliquid asperiores perspiciatis eos sit sit.', 'Et quia a unde eum.', 'ipsa, sunt, molestias'),
(4, 4, 'en', 'Content part 4', 'Ad corrupti impedit officiis.', '<p>Labore sed sint sint sed adipisci rerum. Similique eius qui quas culpa. Assumenda amet vitae et commodi et aliquam. Et amet ullam corporis a.</p><p>Ullam nesciunt aut sit vero voluptatem. Excepturi ut sit corporis omnis. Facilis dolores sed nesciunt laboriosam nesciunt maxime veritatis. Est quae eveniet libero nihil quia sunt.</p><p>Sed similique maxime facilis deleniti sed non maxime. Odio nisi deleniti id sunt delectus omnis in. Minima omnis velit quia quia consequuntur non. Occaecati et similique omnis ut quia et quo.</p>', 'Corrupti est et distinctio voluptatem.', 'Cum consequuntur et aut et sint incidunt reprehenderit.', 'maxime, neque, sunt'),
(5, 5, 'en', 'Content part 5', 'Quis quo ducimus architecto dolores et laboriosam aliquam debitis.', '<p>In qui autem repellendus dolore aspernatur. Iste itaque non ut sapiente qui. Et quibusdam vitae molestiae vel a tempore.</p><p>Possimus tempora voluptatem autem molestias qui ab. Autem mollitia sint enim assumenda.</p><p>Nisi voluptate optio eaque aut possimus maiores cumque blanditiis. Earum numquam suscipit aperiam fugit et. Vitae distinctio temporibus eos ipsum provident officiis.</p>', 'Aut aut quia modi ut facere.', 'Illum inventore sed fugiat doloribus accusantium natus possimus quae.', 'nulla, molestias, facere');

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
-- Struktura tabele `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `migrations`
--

INSERT INTO `migrations` (`version`, `start_time`, `end_time`) VALUES
(20150512000000, '2015-05-14 17:44:14', '2015-05-14 17:44:15'),
(20150512000010, '2015-05-14 17:44:15', '2015-05-14 17:44:17'),
(20150512000020, '2015-05-14 17:44:17', '2015-05-14 17:44:21'),
(20150512000030, '2015-05-14 17:44:21', '2015-05-14 17:44:21'),
(20150513000000, '2015-05-15 16:32:53', '2015-05-15 16:32:53'),
(20150513000010, '2015-05-15 16:32:54', '2015-05-15 16:32:54'),
(20150513000020, '2015-05-15 16:32:54', '2015-05-15 16:32:55'),
(20150513000030, '2015-05-15 16:32:55', '2015-05-15 16:32:55');

-- --------------------------------------------------------

--
-- Struktura tabele `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned DEFAULT NULL,
  `page_type_id` int(10) unsigned NOT NULL,
  `display_rule` varchar(255) NOT NULL DEFAULT 'always',
  `is_sitemap` int(1) unsigned DEFAULT '1',
  `is_hidden` int(1) unsigned DEFAULT NULL,
  `ord` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  KEY `page_type_id` (`page_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Odloži podatke za tabelo `page`
--

INSERT INTO `page` (`id`, `page_id`, `page_type_id`, `display_rule`, `is_sitemap`, `is_hidden`, `ord`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, NULL, 1, 'always', 1, NULL, 10, '2015-05-15 18:32:54', NULL, 1, 1),
(2, 1, 1, 'always', 1, NULL, 20, '2015-05-15 18:32:54', NULL, 1, 1),
(3, 1, 1, 'always', 1, NULL, 30, '2015-05-15 18:32:54', NULL, 1, 1),
(4, 1, 1, 'always', 1, NULL, 40, '2015-05-15 18:32:54', NULL, 1, 1),
(5, 1, 1, 'always', 1, NULL, 50, '2015-05-15 18:32:54', NULL, 1, 1),
(6, 1, 1, 'always', 1, NULL, 60, '2015-05-15 18:32:54', NULL, 1, 1),
(7, 1, 1, 'always', 1, NULL, 70, '2015-05-15 18:32:54', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `page_i18n`
--

CREATE TABLE IF NOT EXISTS `page_i18n` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `lang_id` varchar(2) NOT NULL DEFAULT 'en',
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `body` text,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  KEY `lang_id` (`lang_id`),
  FULLTEXT KEY `title` (`title`,`subtitle`,`body`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Odloži podatke za tabelo `page_i18n`
--

INSERT INTO `page_i18n` (`id`, `page_id`, `lang_id`, `title`, `subtitle`, `body`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(1, 1, 'en', 'Main Menu', 'Accusantium dolor dolores dolores eos.', '<p>Numquam culpa consequatur qui dolor mollitia. Fugiat omnis quidem aut maiores consectetur est. Et sed alias odit quae. Voluptates ad quia provident amet assumenda nulla iste.</p><p>Ducimus dolorem incidunt non corrupti inventore. In error ipsum ut accusamus. Quia sed voluptatem ea aut ut.</p><p>Veniam cupiditate expedita sint sit itaque quasi aut. Fugit dolorem nobis animi autem cum doloribus repudiandae. Nostrum accusamus alias facere dolorem velit. Dolorum deserunt quo ut temporibus sint.</p>', 'Sequi inventore nihil excepturi perferendis beatae voluptatem.', 'Eaque officia rerum ipsa eos fugit.', 'consequuntur, odit, et'),
(2, 2, 'en', 'Home', 'Vero quas a quisquam nulla ullam odit.', '<p>Modi in eius voluptatem. Nam culpa quo eos nam. Molestias est autem ea et dolorem magnam. Cum est placeat minus et et. Occaecati enim id ut ab.</p><p>Optio at laboriosam voluptatibus officiis eum libero eaque impedit. Impedit aut quidem odio consequatur omnis nobis. Totam vel harum ullam qui.</p><p>Adipisci non rem architecto placeat dignissimos. Et in at animi error sit suscipit deleniti. Eius deserunt temporibus quia qui.</p>', 'Est amet atque odio perspiciatis libero.', 'Voluptate doloribus perspiciatis corrupti non dicta quaerat numquam ut.', 'omnis, sequi, magni'),
(3, 3, 'en', 'About us', 'Quisquam rerum veniam quis pariatur distinctio ipsa.', '<p>Laborum non deleniti modi. Quaerat non et odit reiciendis. Vel qui sint atque distinctio eos nostrum dignissimos. Temporibus atque nihil quia cum unde et.</p><p>Facilis qui accusantium possimus officiis. Ipsa qui sapiente voluptas ut. Sapiente commodi id eum sed. Et esse similique id sapiente officiis aut ut.</p><p>Et animi quia consequuntur nihil eum impedit in. Sint qui facere voluptatem beatae. Ipsam vel placeat qui asperiores. Nemo labore reprehenderit hic debitis sint provident dolorum.</p>', 'Eos animi aliquid vero quibusdam deserunt dolor et vero.', 'Magni numquam quo accusantium rerum unde.', 'id, velit, quis'),
(4, 4, 'en', 'News', 'Distinctio reiciendis rerum illum nam ut.', '<p>Possimus magni autem occaecati sit illum beatae nam. Tempora a voluptatibus ducimus est sint placeat.</p><p>Expedita possimus incidunt iure et qui. Provident quis quia praesentium est. Nesciunt et repellat cumque praesentium ab inventore et architecto. Est maiores et nulla in cumque.</p><p>Facilis enim ut in. Eaque magnam accusantium eveniet cumque dolor. Reprehenderit debitis dolor laboriosam quia est sunt tenetur. Distinctio aut rerum sed in commodi molestias ipsam.</p>', 'Magnam assumenda et sed voluptates ipsum et possimus.', 'Id nobis eum assumenda ut aut ut odit saepe.', 'odit, maxime, deserunt'),
(5, 5, 'en', 'Catalog', 'Deleniti possimus magnam harum at velit quia.', '<p>Ut provident pariatur rerum. Soluta velit esse quis eaque laboriosam. Nobis et numquam omnis expedita quis.</p><p>Et temporibus doloremque aliquid consequatur et atque. Atque ut quia omnis. Ut et nam sequi voluptate eos iure voluptates. Ullam necessitatibus natus iusto ut iusto maxime eos dolor.</p><p>Iure repudiandae alias aut illo tenetur minima est. Quo laboriosam asperiores quo et incidunt. Cum consequuntur quas qui illum. Aut a et non.</p>', 'Architecto nihil est reiciendis quis ea.', 'Blanditiis consequatur ducimus molestiae et voluptatibus in quos est.', 'perferendis, omnis, error'),
(6, 6, 'en', 'Gallery', 'Enim soluta quos ducimus at sunt ipsa.', '<p>Quis minima est ut. Minus consequuntur voluptatem optio ipsam consequuntur reiciendis et. Iure omnis similique molestiae tempore eveniet vero quas in.</p><p>Voluptatem exercitationem non dolorem illo assumenda. Sunt quo accusantium alias sunt eaque. Voluptas commodi fugit vero nihil culpa. Aspernatur voluptates eum omnis modi.</p><p>Magni qui aliquid quos quisquam amet consectetur amet. Aut est beatae dolores iste. Aut nulla aut recusandae. Sed qui vel natus similique qui et aut et.</p>', 'Sunt porro voluptas ut fugit et.', 'Ea nam illum explicabo aut nobis quia harum.', 'aut, et, consequuntur'),
(7, 7, 'en', 'Contact', 'Facilis ipsum repellat ducimus nihil dolores corrupti mollitia.', '<p>Aut ut quis blanditiis laborum recusandae consequatur. Assumenda quia porro error iure quisquam. Voluptas eligendi ipsam quis enim saepe. Sed dignissimos odio iure qui nihil nobis.</p><p>Molestias quod et at iste nobis. Voluptatem delectus officiis qui odio dignissimos et. Eum ipsa voluptatem omnis sit commodi quia. Consectetur placeat libero in corporis.</p><p>Exercitationem esse neque dolorem nisi. Aspernatur quis eos dicta et illo.</p>', 'Et porro sint amet odio.', 'Nam enim et occaecati quaerat.', 'modi, adipisci, a');

-- --------------------------------------------------------

--
-- Struktura tabele `page_old`
--

CREATE TABLE IF NOT EXISTS `page_old` (
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
-- Odloži podatke za tabelo `page_old`
--

INSERT INTO `page_old` (`id`, `parent`, `position`, `active`, `name`, `title`, `subtitle`, `content`, `metadesc`, `metakw`, `created`, `createdby`, `updated`, `updatedby`) VALUES
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
-- Struktura tabele `page_type`
--

CREATE TABLE IF NOT EXISTS `page_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `ord` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Odloži podatke za tabelo `page_type`
--

INSERT INTO `page_type` (`id`, `code`, `title`, `ord`) VALUES
(1, 'main', 'Main menu', 10),
(2, 'hidden', 'Hidden menu', 20),
(3, 'header', 'Header menu', 30);

-- --------------------------------------------------------

--
-- Struktura tabele `plugin`
--

CREATE TABLE IF NOT EXISTS `plugin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `ord` int(11) DEFAULT NULL,
  `is_hidden` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `url`
--

CREATE TABLE IF NOT EXISTS `url` (
  `slug` varchar(255) NOT NULL,
  `plugin` varchar(255) DEFAULT NULL,
  `controller` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `id` int(10) unsigned DEFAULT NULL,
  `params` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`slug`),
  KEY `controller` (`controller`),
  KEY `plugin` (`plugin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `url`
--

INSERT INTO `url` (`slug`, `plugin`, `controller`, `method`, `id`, `params`) VALUES
('all', NULL, 'page', 'index', NULL, NULL),
('cetrta_stran', NULL, 'page', 'index', 4, 'a:3:{i:0;i:4;i:1;s:7:"testone";i:2;s:7:"testtwo";}'),
('clanek', 'article', 'article', 'index', 1, 'a:1:{i:0;i:1;}'),
('english-article', NULL, 'article', 'index', 3, 'a:1:{i:0;i:3;}'),
('lorem', NULL, 'page', 'index', 2, 'a:2:{i:0;s:7:"testone";i:1;s:7:"testtwo";}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
