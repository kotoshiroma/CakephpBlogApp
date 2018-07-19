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


