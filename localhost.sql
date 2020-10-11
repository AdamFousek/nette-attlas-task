-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `quickstart` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `quickstart`;

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `parentId` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `menu` (`id`, `name`, `url`, `parentId`) VALUES
(1,	'Home',	'#',	NULL),
(2,	'About us',	'#',	1),
(3,	'Documentation',	'#',	1),
(4,	'Doc v3',	'#',	3),
(5,	'Contact',	'#',	NULL);

-- 2020-10-11 12:48:54
