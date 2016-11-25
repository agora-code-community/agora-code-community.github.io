-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: agora
-- ------------------------------------------------------
-- Server version	5.5.53-0+deb8u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` text,
  `first_name` text,
  `last_name` text,
  `email` text,
  `last_time` bigint(20) DEFAULT NULL,
  `tsgone` bigint(20) DEFAULT '0',
  `old_time` bigint(20) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `posts` bigint(20) DEFAULT '0',
  `sig` text,
  `banned` varchar(50) DEFAULT 'no',
  `rank` varchar(50) DEFAULT '0',
  `usepm` int(11) DEFAULT '1',
  `aim` text,
  `icq` text,
  `location` text,
  `show_profile` int(11) DEFAULT '1',
  `avatar` text,
  `photo` text,
  `rating` bigint(20) DEFAULT '0',
  `total_votes` bigint(20) DEFAULT '0',
  `voted_for` text,
  `rps` int(11) DEFAULT '1',
  `rps_score` bigint(20) DEFAULT '0',
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'admin','$2y$11$tKTQB./4PogTDebVHoYi2uzTU.TXs/5DuMRc0jgAyMQdeJGqQu.Y.',NULL,NULL,NULL,NULL,0,0,0,0,NULL,'no','0',1,NULL,NULL,NULL,1,NULL,NULL,0,0,NULL,1,0),(5,'icifrost','$2y$11$tKTQB./4PogTDebVHoYi2uzTU.TXs/5DuMRc0jgAyMQdeJGqQu.Y.','Kafwana','Wandi','kafwana@mwanta.com',1479647455,1479647455,1479645889,0,0,NULL,'no','0',1,NULL,NULL,NULL,1,NULL,NULL,0,0,NULL,1,0);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banemails`
--

DROP TABLE IF EXISTS `banemails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banemails` (
  `emailid` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  PRIMARY KEY (`emailid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banemails`
--

LOCK TABLES `banemails` WRITE;
/*!40000 ALTER TABLE `banemails` DISABLE KEYS */;
/*!40000 ALTER TABLE `banemails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `account_id` bigint(20) NOT NULL,
  `validated` bigint(20) DEFAULT NULL,
  `keynode` bigint(20) DEFAULT NULL,
  `validation_reminder` bigint(20) DEFAULT NULL,
  `registration_date` bigint(20) DEFAULT NULL,
  `funds` double DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (5,1,1170633,3,1479631862,0);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_artcats`
--

DROP TABLE IF EXISTS `forum_artcats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_artcats` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` text,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_artcats`
--

LOCK TABLES `forum_artcats` WRITE;
/*!40000 ALTER TABLE `forum_artcats` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_artcats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_articles`
--

DROP TABLE IF EXISTS `forum_articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_articles` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `validates` int(11) DEFAULT NULL,
  `author_id` bigint(20) DEFAULT NULL,
  `short_des` text,
  `body` text,
  `category` bigint(20) DEFAULT NULL,
  `titles` text,
  `the_date` text,
  `the_time` bigint(20) DEFAULT NULL,
  `forum_topic` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_articles`
--

LOCK TABLES `forum_articles` WRITE;
/*!40000 ALTER TABLE `forum_articles` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_categories`
--

DROP TABLE IF EXISTS `forum_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` text,
  `cat_sort` bigint(20) DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_categories`
--

LOCK TABLES `forum_categories` WRITE;
/*!40000 ALTER TABLE `forum_categories` DISABLE KEYS */;
INSERT INTO `forum_categories` VALUES (1,'PHP',0),(2,'XHTML',0),(3,'Javascript',0),(4,'CSS',0),(5,'CSS',0);
/*!40000 ALTER TABLE `forum_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_forums`
--

DROP TABLE IF EXISTS `forum_forums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_forums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `name` text,
  `description` text,
  `num_topics` bigint(20) DEFAULT '0',
  `num_posts` bigint(20) DEFAULT '0',
  `last_post` text,
  `sort` bigint(20) DEFAULT '0',
  `last_post_user` text,
  `permission_min` int(11) DEFAULT '0',
  `permission_post` int(11) DEFAULT '0',
  `permission_reply` int(11) DEFAULT '0',
  `last_post_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_forums`
--

LOCK TABLES `forum_forums` WRITE;
/*!40000 ALTER TABLE `forum_forums` DISABLE KEYS */;
INSERT INTO `forum_forums` VALUES (1,1,'How can I create a login script','Need help in creating a login script',0,0,NULL,0,NULL,-1,-1,-1,0),(2,1,'How can I create a login script','Need help in creating a login script',0,0,NULL,0,NULL,-1,-1,-1,0);
/*!40000 ALTER TABLE `forum_forums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_pagecats`
--

DROP TABLE IF EXISTS `forum_pagecats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_pagecats` (
  `page_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_cat_name` text,
  `page_cat_order` bigint(20) DEFAULT '0',
  PRIMARY KEY (`page_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_pagecats`
--

LOCK TABLES `forum_pagecats` WRITE;
/*!40000 ALTER TABLE `forum_pagecats` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_pagecats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_pages`
--

DROP TABLE IF EXISTS `forum_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` text,
  `page_text` text,
  `page_cat` bigint(20) DEFAULT '0',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_pages`
--

LOCK TABLES `forum_pages` WRITE;
/*!40000 ALTER TABLE `forum_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_posts`
--

DROP TABLE IF EXISTS `forum_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `author` bigint(20) DEFAULT '0',
  `te_lapsed` bigint(20) DEFAULT '0',
  `time_post` text,
  `num_replies` int(11) DEFAULT '0',
  `post` text,
  `thread_parent` bigint(20) DEFAULT '0',
  `last_post` text,
  `post_forum` bigint(20) DEFAULT '0',
  `views` bigint(20) DEFAULT '0',
  `no_smilies` int(11) DEFAULT '0',
  `value` int(11) DEFAULT '0',
  `ip_address` text,
  `locked` int(11) DEFAULT '0',
  `article_identifier` bigint(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_posts`
--

LOCK TABLES `forum_posts` WRITE;
/*!40000 ALTER TABLE `forum_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_ranks`
--

DROP TABLE IF EXISTS `forum_ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_ranks` (
  `rank_id` int(11) NOT NULL AUTO_INCREMENT,
  `rank_name` text,
  `posts_needed` bigint(20) DEFAULT '0',
  PRIMARY KEY (`rank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_ranks`
--

LOCK TABLES `forum_ranks` WRITE;
/*!40000 ALTER TABLE `forum_ranks` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_rps`
--

DROP TABLE IF EXISTS `forum_rps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_rps` (
  `rps_id` int(11) NOT NULL AUTO_INCREMENT,
  `challenger` bigint(20) DEFAULT '0',
  `challenged` bigint(20) DEFAULT '0',
  `throw` int(11) DEFAULT '0',
  `accept` int(11) DEFAULT '0',
  `result` text,
  PRIMARY KEY (`rps_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_rps`
--

LOCK TABLES `forum_rps` WRITE;
/*!40000 ALTER TABLE `forum_rps` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_rps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_tut_cats`
--

DROP TABLE IF EXISTS `forum_tut_cats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_tut_cats` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` text,
  `parent_cat` bigint(20) DEFAULT '0',
  `num_tutorials` bigint(20) DEFAULT '0',
  `last_added` bigint(20) DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_tut_cats`
--

LOCK TABLES `forum_tut_cats` WRITE;
/*!40000 ALTER TABLE `forum_tut_cats` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_tut_cats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_tut_changes`
--

DROP TABLE IF EXISTS `forum_tut_changes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_tut_changes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `edit_id` bigint(20) DEFAULT '0',
  `email` text,
  `title` text,
  `author` text,
  `cat_parent` bigint(20) DEFAULT '0',
  `url` text,
  `short_des` text,
  `description` text,
  `used_cat` bigint(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_tut_changes`
--

LOCK TABLES `forum_tut_changes` WRITE;
/*!40000 ALTER TABLE `forum_tut_changes` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_tut_changes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_tut_entries`
--

DROP TABLE IF EXISTS `forum_tut_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_tut_entries` (
  `tut_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `short_des` text,
  `description` text,
  `url` text,
  `hits_out` bigint(20) DEFAULT '0',
  `total_score` bigint(20) DEFAULT '0',
  `total_votes` bigint(20) DEFAULT '0',
  `avg_vote` double DEFAULT '0',
  `rank_score` bigint(20) DEFAULT '0',
  `validated` int(11) DEFAULT '0',
  `cat_parent` bigint(20) DEFAULT '0',
  `time_added` bigint(20) DEFAULT '0',
  `date_added` text,
  `author` text,
  `pass_key` text,
  `email` text,
  PRIMARY KEY (`tut_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_tut_entries`
--

LOCK TABLES `forum_tut_entries` WRITE;
/*!40000 ALTER TABLE `forum_tut_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_tut_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_tut_ip`
--

DROP TABLE IF EXISTS `forum_tut_ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_tut_ip` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `voted_for` bigint(20) DEFAULT '0',
  `ip` text,
  `time` bigint(20) DEFAULT '0',
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_tut_ip`
--

LOCK TABLES `forum_tut_ip` WRITE;
/*!40000 ALTER TABLE `forum_tut_ip` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_tut_ip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_tutorial_posts`
--

DROP TABLE IF EXISTS `forum_tutorial_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_tutorial_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `post` text,
  `title` text,
  `author` text,
  `show_time` text,
  `real_time` bigint(20) DEFAULT '0',
  `num_replies` bigint(20) DEFAULT '0',
  `last_poster` text,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_tutorial_posts`
--

LOCK TABLES `forum_tutorial_posts` WRITE;
/*!40000 ALTER TABLE `forum_tutorial_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_tutorial_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guestsonline`
--

DROP TABLE IF EXISTS `guestsonline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guestsonline` (
  `guestid` bigint(20) NOT NULL AUTO_INCREMENT,
  `guestip` varchar(250) NOT NULL DEFAULT '',
  `time` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`guestid`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guestsonline`
--

LOCK TABLES `guestsonline` WRITE;
/*!40000 ALTER TABLE `guestsonline` DISABLE KEYS */;
INSERT INTO `guestsonline` VALUES (1,'127.0.0.1',1479536866),(2,'127.0.0.1',1479536992),(3,'127.0.0.1',1479537012),(4,'127.0.0.1',1479537196),(5,'127.0.0.1',1479537781),(6,'127.0.0.1',1479538328),(7,'127.0.0.1',1479545642),(8,'127.0.0.1',1479545681),(9,'127.0.0.1',1479545794),(10,'127.0.0.1',1479545887),(11,'127.0.0.1',1479545956),(12,'127.0.0.1',1479546005),(13,'127.0.0.1',1479546066),(14,'127.0.0.1',1479546112),(15,'127.0.0.1',1479546182),(16,'127.0.0.1',1479546197),(17,'127.0.0.1',1479546278),(18,'127.0.0.1',1479546305),(19,'127.0.0.1',1479546322),(20,'127.0.0.1',1479546352),(21,'127.0.0.1',1479546658),(22,'127.0.0.1',1479546673),(23,'127.0.0.1',1479546688),(24,'127.0.0.1',1479546691),(25,'127.0.0.1',1479546704),(26,'127.0.0.1',1479546729),(27,'127.0.0.1',1479547321),(28,'127.0.0.1',1479550753),(29,'127.0.0.1',1479638990);
/*!40000 ALTER TABLE `guestsonline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pms`
--

DROP TABLE IF EXISTS `pms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pms` (
  `pm_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` bigint(20) DEFAULT '0',
  `receiver` bigint(20) DEFAULT '0',
  `the_real_time` bigint(20) DEFAULT '0',
  `subject` text,
  `message` text,
  `has_read` int(11) DEFAULT '0',
  `var_time` text,
  PRIMARY KEY (`pm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pms`
--

LOCK TABLES `pms` WRITE;
/*!40000 ALTER TABLE `pms` DISABLE KEYS */;
/*!40000 ALTER TABLE `pms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `account_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `profilePic` text NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'None');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribe`
--

DROP TABLE IF EXISTS `subscribe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscribe` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email_address` text,
  `subscribed` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribe`
--

LOCK TABLES `subscribe` WRITE;
/*!40000 ALTER TABLE `subscribe` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscribe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'agora'
--

--
-- Dumping routines for database 'agora'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-21  4:53:38
