# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.1.61)
# Datenbank: p3
# Erstellungsdauer: 2012-03-05 22:28:10 +0100
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle p3_widget
# ------------------------------------------------------------

DROP TABLE IF EXISTS `p3_widget`;

CREATE TABLE `p3_widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(128) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  `containerId` varchar(128) NOT NULL,
  `moduleId` varchar(128) NOT NULL DEFAULT '',
  `controllerId` varchar(128) NOT NULL DEFAULT '',
  `actionName` varchar(128) NOT NULL DEFAULT '',
  `requestParam` varchar(128) NOT NULL DEFAULT '',
  `sessionParam` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `p3_widget` WRITE;
/*!40000 ALTER TABLE `p3_widget` DISABLE KEYS */;

INSERT INTO `p3_widget` (`id`, `alias`, `rank`, `containerId`, `moduleId`, `controllerId`, `actionName`, `requestParam`, `sessionParam`)
VALUES
	(2,'CWidget',0,'main','','wiki','index','',''),
	(3,'CWidget',1,'main','','wiki','index','','');

/*!40000 ALTER TABLE `p3_widget` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle p3_widget_meta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `p3_widget_meta`;

CREATE TABLE `p3_widget_meta` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `language` varchar(8) DEFAULT NULL,
  `treeParent_id` int(11) DEFAULT NULL,
  `treePosition` int(11) DEFAULT NULL,
  `begin` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `keywords` text,
  `customData` text,
  `label` int(11) DEFAULT NULL,
  `owner` varchar(64) DEFAULT NULL,
  `checkAccessCreate` varchar(256) DEFAULT NULL,
  `checkAccessRead` varchar(256) DEFAULT NULL,
  `checkAccessUpdate` varchar(256) DEFAULT NULL,
  `checkAccessDelete` varchar(256) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(64) DEFAULT NULL,
  `modifiedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifiedBy` varchar(64) DEFAULT NULL,
  `guid` varchar(64) DEFAULT NULL,
  `ancestor_guid` varchar(64) DEFAULT NULL,
  `model` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `p3_widget_meta_ibfk_1` FOREIGN KEY (`id`) REFERENCES `p3_widget` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `p3_widget_meta` WRITE;
/*!40000 ALTER TABLE `p3_widget_meta` DISABLE KEYS */;

INSERT INTO `p3_widget_meta` (`id`, `status`, `type`, `language`, `treeParent_id`, `treePosition`, `begin`, `end`, `keywords`, `customData`, `label`, `owner`, `checkAccessCreate`, `checkAccessRead`, `checkAccessUpdate`, `checkAccessDelete`, `createdAt`, `createdBy`, `modifiedAt`, `modifiedBy`, `guid`, `ancestor_guid`, `model`)
VALUES
	(2,30,NULL,'_ALL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,'Admin','Admin','2012-03-05 21:49:10','1','0000-00-00 00:00:00',NULL,'7E7EDA2B-499C-4D27-B581-1E204D43732F',NULL,'P3Widget'),
	(3,30,NULL,'_ALL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,'Admin','Admin','2012-03-05 21:59:37','1','2012-03-05 22:08:36','1','D544B35B-BE24-4DF8-B74A-13DBAF1EB00F',NULL,'P3Widget');

/*!40000 ALTER TABLE `p3_widget_meta` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle p3_widget_translation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `p3_widget_translation`;

CREATE TABLE `p3_widget_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p3_widget_id` int(11) NOT NULL,
  `language` varchar(8) DEFAULT NULL,
  `properties` text,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `fk_p3_widget_id` (`p3_widget_id`),
  CONSTRAINT `p3_widget_translation_ibfk_1` FOREIGN KEY (`p3_widget_id`) REFERENCES `p3_widget` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `p3_widget_translation` WRITE;
/*!40000 ALTER TABLE `p3_widget_translation` DISABLE KEYS */;

INSERT INTO `p3_widget_translation` (`id`, `p3_widget_id`, `language`, `properties`, `content`)
VALUES
	(150,2,'en',NULL,'TWO -- ONE'),
	(151,3,'en',NULL,'Hello World!'),
	(152,3,'de',NULL,'Hallo Welt!');

/*!40000 ALTER TABLE `p3_widget_translation` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
