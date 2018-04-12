# ************************************************************
# Sequel Pro SQL dump
# バージョン 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# ホスト: 192.168.33.10 (MySQL 5.7.12)
# データベース: cakephp_blog_db
# 作成時刻: 2018-04-12 08:00:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# テーブルのダンプ acos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `acos`;

CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_acos_lft_rght` (`lft`,`rght`),
  KEY `idx_acos_alias` (`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`)
VALUES
	(1,NULL,NULL,NULL,'controllers',1,88),
	(2,1,NULL,NULL,'Groups',2,13),
	(3,2,NULL,NULL,'index',3,4),
	(4,2,NULL,NULL,'view',5,6),
	(5,2,NULL,NULL,'add',7,8),
	(6,2,NULL,NULL,'edit',9,10),
	(7,2,NULL,NULL,'delete',11,12),
	(8,1,NULL,NULL,'Pages',14,17),
	(9,8,NULL,NULL,'display',15,16),
	(10,1,NULL,NULL,'Posts',18,29),
	(11,10,NULL,NULL,'index',19,20),
	(12,10,NULL,NULL,'view',21,22),
	(13,10,NULL,NULL,'add',23,24),
	(14,10,NULL,NULL,'edit',25,26),
	(15,10,NULL,NULL,'delete',27,28),
	(16,1,NULL,NULL,'Users',30,47),
	(17,16,NULL,NULL,'login',31,32),
	(18,16,NULL,NULL,'logout',33,34),
	(19,16,NULL,NULL,'index',35,36),
	(20,16,NULL,NULL,'view',37,38),
	(21,16,NULL,NULL,'add',39,40),
	(22,16,NULL,NULL,'edit',41,42),
	(23,16,NULL,NULL,'delete',43,44),
	(24,1,NULL,NULL,'Widgets',48,59),
	(25,24,NULL,NULL,'index',49,50),
	(26,24,NULL,NULL,'view',51,52),
	(27,24,NULL,NULL,'add',53,54),
	(28,24,NULL,NULL,'edit',55,56),
	(29,24,NULL,NULL,'delete',57,58),
	(30,1,NULL,NULL,'AclExtras',60,61),
	(31,16,NULL,NULL,'get_post_code',45,46),
	(32,1,NULL,NULL,'Tags',62,73),
	(33,32,NULL,NULL,'index',63,64),
	(34,32,NULL,NULL,'view',65,66),
	(35,32,NULL,NULL,'add',67,68),
	(36,32,NULL,NULL,'edit',69,70),
	(37,32,NULL,NULL,'delete',71,72),
	(38,1,NULL,NULL,'Categories',74,87),
	(39,38,NULL,NULL,'index',75,76),
	(40,38,NULL,NULL,'view',77,78),
	(41,38,NULL,NULL,'add',79,80),
	(42,38,NULL,NULL,'edit',81,82),
	(43,38,NULL,NULL,'delete',83,84);

/*!40000 ALTER TABLE `acos` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ aros
# ------------------------------------------------------------

DROP TABLE IF EXISTS `aros`;

CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_aros_lft_rght` (`lft`,`rght`),
  KEY `idx_aros_alias` (`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`)
VALUES
	(7,NULL,'Group',4,NULL,1,2),
	(8,NULL,'Group',5,NULL,3,4),
	(9,NULL,'Group',6,NULL,5,6);

/*!40000 ALTER TABLE `aros` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ aros_acos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `aros_acos`;

CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`),
  KEY `idx_aco_id` (`aco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`)
VALUES
	(1,7,1,'1','1','1','1'),
	(2,8,1,'-1','-1','-1','-1'),
	(3,8,10,'1','1','1','1'),
	(4,8,24,'1','1','1','1'),
	(5,9,1,'-1','-1','-1','-1'),
	(6,9,13,'1','1','1','1'),
	(7,9,14,'1','1','1','1'),
	(8,9,27,'1','1','1','1'),
	(9,9,28,'1','1','1','1'),
	(10,9,15,'-1','-1','-1','-1'),
	(11,7,31,'1','1','1','1'),
	(12,7,32,'1','1','1','1'),
	(13,7,38,'1','1','1','1');

/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `category_name`, `created`, `modified`)
VALUES
	(18,'php','2018-04-12 16:50:22','2018-04-12 16:50:22'),
	(19,'C#','2018-04-12 16:50:28','2018-04-12 16:50:28'),
	(20,'java','2018-04-12 16:50:35','2018-04-12 16:50:35');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text,
  `post_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`, `created`, `modified`)
VALUES
	(4,'administrators','2018-02-27 11:24:44','2018-02-27 11:24:44'),
	(5,'managers','2018-02-27 11:25:02','2018-02-27 11:25:02'),
	(6,'users','2018-02-27 11:25:15','2018-02-27 11:25:15');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT '0',
  `delete_flag` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ post_code
# ------------------------------------------------------------

DROP TABLE IF EXISTS `post_code`;

CREATE TABLE `post_code` (
  `local_gov_cd` int(5) DEFAULT NULL,
  `post_code_old` char(7) DEFAULT NULL,
  `post_code` char(7) DEFAULT NULL,
  `address1_kana` varchar(50) DEFAULT NULL,
  `address2_kana` varchar(50) DEFAULT NULL,
  `address3_kana` varchar(100) DEFAULT NULL,
  `address1` varchar(50) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `address3` varchar(100) DEFAULT NULL,
  `code01` int(1) DEFAULT NULL,
  `code02` int(1) DEFAULT NULL,
  `code03` int(1) DEFAULT NULL,
  `code04` int(1) DEFAULT NULL,
  `code05` int(1) DEFAULT NULL,
  `code06` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ post_tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `post_tags`;

CREATE TABLE `post_tags` (
  `post_id` int(10) unsigned NOT NULL DEFAULT '0',
  `tag_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `publish_flag` int(1) DEFAULT '0',
  `delete_flag` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`, `user_id`, `category_id`, `publish_flag`, `delete_flag`)
VALUES
	(1,'テスト記事１','テスト\r\n\r\nテスト\r\n\r\nテスト\r\n','2018-04-12 16:51:23','2018-04-12 16:51:23',32,18,1,0),
	(2,'テスト記事２','テスト','2018-04-12 16:52:10','2018-04-12 16:52:10',32,19,1,0),
	(3,'テスト記事３','test3','2018-04-12 16:53:10','2018-04-12 16:53:10',32,20,1,0);

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;

INSERT INTO `tags` (`id`, `tag_name`)
VALUES
	(20,'tagA'),
	(21,'tagB'),
	(22,'tagC');

/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `post_code` char(7) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `delete_flag` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
