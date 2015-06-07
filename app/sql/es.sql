-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 07 2015 г., 15:13
-- Версия сервера: 5.6.17
-- Версия PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `es`
--

-- --------------------------------------------------------

--
-- Структура таблицы `geo`
--

CREATE TABLE IF NOT EXISTS `geo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL COMMENT '1-gorod;2-oblast;3-rayon;4-jamoat',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `internat_form1`
--

CREATE TABLE IF NOT EXISTS `internat_form1` (
  `id` varchar(45) NOT NULL,
  `muassisa_id` int(11) NOT NULL,
  `soli_tahsil` int(11) DEFAULT NULL,
  `sinf` int(11) DEFAULT NULL,
  `yatimon_hamagi` int(11) DEFAULT NULL,
  `yatimon_duxtaron` int(11) DEFAULT NULL,
  `bepadar_hamagi` int(11) DEFAULT NULL,
  `bepadar_duxtaron` int(11) DEFAULT NULL,
  `bemodar_hamagi` int(11) DEFAULT NULL,
  `bemodar_duxtaron` int(11) DEFAULT NULL,
  `beparastoron_hamagi` int(11) DEFAULT NULL,
  `beparastoron_duxtaron` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_internat_form1_1_idx` (`muassisa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `kudakiston_form1`
--

CREATE TABLE IF NOT EXISTS `kudakiston_form1` (
  `muassisa_id` int(11) DEFAULT NULL,
  `shumorai_kudakon` int(11) DEFAULT NULL,
  `miqdori_joy` int(11) DEFAULT NULL,
  `khususi` tinyint(4) DEFAULT NULL,
  `tobei_korxona` varchar(255) DEFAULT NULL,
  `soli_tahsil` int(11) DEFAULT NULL,
  KEY `fk_kudakiston_form1_1_idx` (`muassisa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `maktab_form1`
--

CREATE TABLE IF NOT EXISTS `maktab_form1` (
  `id` varchar(45) NOT NULL,
  `muassisa_id` int(11) NOT NULL,
  `zaboni_tahsil` varchar(2) DEFAULT NULL COMMENT '\\''язык обучения\\''',
  `miqdori_sinf` int(11) DEFAULT NULL,
  `shumorai_khonanda` int(11) DEFAULT NULL,
  `duxtaron` int(11) DEFAULT NULL,
  `soli_tahsil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_maktab_form1_1_idx` (`muassisa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `maktab_form2`
--

CREATE TABLE IF NOT EXISTS `maktab_form2` (
  `id` varchar(45) NOT NULL,
  `muassisa_id` int(11) NOT NULL,
  `umumi_hamagi` int(11) DEFAULT NULL,
  `umumi_duxtaron` int(11) DEFAULT NULL,
  `umumi_pisaron` int(11) DEFAULT NULL,
  `yatimon_hamagi` int(11) DEFAULT NULL,
  `yatimon_duxtaron` int(11) DEFAULT NULL,
  `yatimon_pisaron` int(11) DEFAULT NULL,
  `mayubon_hamagi` int(11) DEFAULT NULL,
  `mayubon_duxtaron` int(11) DEFAULT NULL,
  `mayubon_pisaron` int(11) DEFAULT NULL,
  `xurok_hamagi` int(11) DEFAULT NULL,
  `xurok_duxtaron` int(11) DEFAULT NULL,
  `xurok_pisaron` int(11) DEFAULT NULL,
  `soli_tahsil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_maktab_form2_1_idx` (`muassisa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `muassisaho`
--

CREATE TABLE IF NOT EXISTS `muassisaho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namudi_muassisa_id` int(11) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `name_tj` varchar(255) DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `cellphone` varchar(45) DEFAULT NULL,
  `geo_id` int(11) DEFAULT NULL,
  `geo_lat` varchar(12) DEFAULT NULL,
  `geo_lon` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_muassisaho_1_idx` (`geo_id`),
  KEY `fk_muassisaho_2_idx` (`namudi_muassisa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `n-acl`
--

CREATE TABLE IF NOT EXISTS `n-acl` (
  `acl-id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `acl-name` varchar(100) COLLATE utf8_bin NOT NULL,
  `acl-gid` int(2) unsigned DEFAULT NULL,
  `acl-uid` int(8) unsigned DEFAULT NULL,
  `act-type` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`acl-id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `n-acl`
--

INSERT INTO `n-acl` (`acl-id`, `acl-name`, `acl-gid`, `acl-uid`, `act-type`) VALUES
(1, '*,*', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `n-groups`
--

CREATE TABLE IF NOT EXISTS `n-groups` (
  `gp-gid` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `gp-group` varchar(250) COLLATE utf8_bin NOT NULL,
  `gp-sort` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gp-gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `n-users`
--

CREATE TABLE IF NOT EXISTS `n-users` (
  `usr-uid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `usr-gid` int(2) unsigned NOT NULL,
  `usr-pid` int(8) unsigned DEFAULT NULL,
  `usr-login` varchar(100) COLLATE utf8_bin NOT NULL,
  `usr-pwd` varchar(255) COLLATE utf8_bin NOT NULL,
  `usr-salt` varchar(8) COLLATE utf8_bin NOT NULL,
  `usr-hint` varchar(255) COLLATE utf8_bin NOT NULL,
  `usr-status` int(1) NOT NULL DEFAULT '1',
  `usr-created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usr-lastlogin` timestamp NOT NULL,
  PRIMARY KEY (`usr-uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `n-users`
--

INSERT INTO `n-users` (`usr-uid`, `usr-gid`, `usr-pid`, `usr-login`, `usr-pwd`, `usr-salt`, `usr-hint`, `usr-status`, `usr-created`, `usr-lastlogin`) VALUES
(1, 1, NULL, 'admin', 'c55bfd3002033b16e0c78cfef98d15fc', 'x9l', 'YWRtaW5jaGVnMjAxNQ==', 1, '2015-05-13 11:30:42', '2015-06-07 11:24:33');

-- --------------------------------------------------------

--
-- Структура таблицы `namudi_muassisa`
--

CREATE TABLE IF NOT EXISTS `namudi_muassisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(255) DEFAULT NULL,
  `name_tj` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `namudi_muassisa`
--

INSERT INTO `namudi_muassisa` (`id`, `name_ru`, `name_tj`) VALUES
(1, 'Муассисахои тахсилоти то мактаби', NULL),
(2, 'Мактабхои тахсилоти миёна умуми', NULL),
(3, 'Мактаб интернатхо', NULL),
(4, 'Иловаги', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `registration_form`
--

CREATE TABLE IF NOT EXISTS `registration_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `muassisa_id` int(11) DEFAULT NULL,
  `namudi_muassisa_id` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `nasab` varchar(255) DEFAULT NULL,
  `nomi_padar` varchar(255) DEFAULT NULL,
  `zodruz` date DEFAULT NULL,
  `raqami_shahodatnoma` varchar(45) DEFAULT NULL,
  `yatim` tinyint(4) DEFAULT NULL,
  `nomi_volidon` varchar(255) DEFAULT NULL,
  `address_volidon` varchar(255) DEFAULT NULL,
  `email_volidon` varchar(255) DEFAULT NULL,
  `telefon_volidon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_registration_form_1_idx` (`namudi_muassisa_id`),
  KEY `fk_registration_form_2_idx` (`muassisa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `internat_form1`
--
ALTER TABLE `internat_form1`
  ADD CONSTRAINT `fk_internat_form1_1` FOREIGN KEY (`muassisa_id`) REFERENCES `muassisaho` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `kudakiston_form1`
--
ALTER TABLE `kudakiston_form1`
  ADD CONSTRAINT `fk_kudakiston_form1_1` FOREIGN KEY (`muassisa_id`) REFERENCES `muassisaho` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `maktab_form1`
--
ALTER TABLE `maktab_form1`
  ADD CONSTRAINT `fk_maktab_form1_1` FOREIGN KEY (`muassisa_id`) REFERENCES `muassisaho` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `maktab_form2`
--
ALTER TABLE `maktab_form2`
  ADD CONSTRAINT `fk_maktab_form2_1` FOREIGN KEY (`muassisa_id`) REFERENCES `muassisaho` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `muassisaho`
--
ALTER TABLE `muassisaho`
  ADD CONSTRAINT `fk_muassisaho_1` FOREIGN KEY (`geo_id`) REFERENCES `geo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_muassisaho_2` FOREIGN KEY (`namudi_muassisa_id`) REFERENCES `namudi_muassisa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `registration_form`
--
ALTER TABLE `registration_form`
  ADD CONSTRAINT `fk_registration_form_1` FOREIGN KEY (`namudi_muassisa_id`) REFERENCES `namudi_muassisa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registration_form_2` FOREIGN KEY (`muassisa_id`) REFERENCES `muassisaho` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
