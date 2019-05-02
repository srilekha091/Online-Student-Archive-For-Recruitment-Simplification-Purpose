-- MySQL dump 10.11
--
-- Host: localhost    Database: f09t10
-- ------------------------------------------------------
-- Server version	5.0.77

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `admin` (
  `username` varchar(30) default NULL,
  `password` varchar(20) default NULL,
  `admin_id` int(3) NOT NULL auto_increment,
  PRIMARY KEY  (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('Aditya','akrsmangi',1),('Rakesh','rakkera',2);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cal_subscription`
--

DROP TABLE IF EXISTS `cal_subscription`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `cal_subscription` (
  `id` int(10) NOT NULL auto_increment,
  `email` varchar(10) default NULL,
  `orgname` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `cal_subscription`
--

LOCK TABLES `cal_subscription` WRITE;
/*!40000 ALTER TABLE `cal_subscription` DISABLE KEYS */;
INSERT INTO `cal_subscription` VALUES (4,'rakkera','Apple'),(5,'rakkera','Microsoft'),(7,'rakkera','Bloomberg'),(14,'amangip','Apple'),(10,'amangip','Microsoft');
/*!40000 ALTER TABLE `cal_subscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `company` (
  `company_id` int(11) default NULL,
  `orgname` varchar(50) NOT NULL default '',
  `title` varchar(100) default NULL,
  `description` longtext,
  `lastupdate` datetime default NULL,
  `ban` int(11) default NULL,
  PRIMARY KEY  (`orgname`),
  KEY `company_id` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (40,'Google ','Hello from Google !','Google rocks !\r\nThis is the best search engine that the internet community has ever seen !','2009-11-18 16:43:41',0),(41,'Apple','Hello from Apple!','Hello from Apple. We are extremely happy to be a part of this system. We look forward to interacting with you all soon.','2009-11-27 12:41:27',0),(42,'Microsoft','Hello from Microsoft !','Hello from Microsoft !!!!','2009-11-18 18:46:43',0),(43,'Bloomberg','','Hello all, Welcome to Bloomberg !','2009-11-19 23:11:58',0),(51,'Fidelity','','Hello, welcome to Fidelity Corporation !!!','2009-11-29 22:54:28',0);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `event` (
  `event_id` int(11) NOT NULL auto_increment,
  `company_id` int(10) default NULL,
  `event_title` varchar(50) default NULL,
  `event_desc` varchar(300) default NULL,
  `dateposted` date default NULL,
  `event_date` varchar(11) default NULL,
  PRIMARY KEY  (`event_id`),
  KEY `company_id` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (12,123456780,'event','event','2009-11-23','11/24/2009'),(33,123456780,'Checking event','Checking event','2009-11-24','11/25/2009'),(60,41,'gsdf','sdffsf','2009-12-02','12/3/2009'),(20,43,'Bloomberg','Bloomberg','2009-11-24','11/30/2009'),(18,42,'microsoft','microsoft','2009-11-23','11/25/2009'),(31,123456780,'abc','abc','2009-11-24','11/27/2009'),(25,224602955,'662 Presensation','CPSC 662 project presensation !','2009-11-24','11/24/2009'),(26,224602955,'Break begins !','Breakkkkkkkkkkkkkkk','2009-11-24','11/25/2009'),(61,41,'werqw','wqrer','2009-12-02','12/4/2009'),(32,123456780,'Thanks giving','Thanks Giving','2009-11-24','11/26/2009'),(34,42,'hello','microsoft','2009-11-24','11/26/2009'),(35,42,'end of month','end of month','2009-11-24','11/30/2009'),(36,42,'end of month','end of month','2009-11-24','11/30/2009'),(67,41,'new ','nlas','2009-12-02','12/7/2009');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forums`
--

DROP TABLE IF EXISTS `forums`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `forums` (
  `company_id` int(11) NOT NULL,
  `message` longtext,
  `t_timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `username` varchar(30) default NULL,
  `forum_id` int(11) NOT NULL auto_increment,
  `forum_topic` varchar(100) default NULL,
  `reply` int(1) default NULL,
  `reply_id` int(10) default NULL,
  PRIMARY KEY  (`forum_id`),
  KEY `company_id` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `forums`
--

LOCK TABLES `forums` WRITE;
/*!40000 ALTER TABLE `forums` DISABLE KEYS */;
INSERT INTO `forums` VALUES (40,'thats great!!!','2009-11-19 12:13:39','Rakesh',118,'google online jobs',NULL,NULL),(51,'Great news guys fidelity are on a hiring spree.......','2009-12-02 03:49:27','Rakesh',140,'Is fidelity hiring new recruits?',NULL,NULL),(40,'Work from home!!!','2009-11-19 12:12:46','Rakesh',117,'google online jobs',NULL,NULL),(41,'sdjbsdhbs','2009-11-19 09:30:31','Apple',93,'post 2',NULL,NULL),(41,'lkndslsndkljsnd','2009-11-19 09:30:52','Aditya Kiran R ',94,'post 2',NULL,NULL),(41,'adsfkankdsjnsa','2009-11-19 09:32:55','Aditya Kiran R ',95,'post 2',NULL,NULL),(40,'Oh is it? That is amazing !','2009-11-19 12:22:55','Srikanth',120,'google online jobs',NULL,NULL),(51,'I just wanted to know if Fidelity corp is hiring fresh graduate students','2009-12-02 03:41:17','Rakesh',139,'Is fidelity hiring new recruits?',NULL,NULL),(41,'Contact 865-765-5518 to know all the latest happenings about apple products !!','2009-11-19 14:14:17','Srikanth',126,'Ipod sale !!',NULL,NULL),(42,'Hello everyone, have a great day !','2009-11-27 05:05:27','Aditya',128,'Hello World !',NULL,NULL),(42,'Hello, did you hear about this latest job posting that was done by a representative recently?','2009-11-27 05:06:03','Aditya',129,'Hello World !',NULL,NULL),(42,'Is it? That is really amazing. I have not subscribed to their calender yet. Let me do it immediately so that I can also stay updated just like you.','2009-11-27 05:07:11','Srikanth',130,'Hello World !',NULL,NULL),(42,'Thanks for the information Aditya. Let me also subscribe immediately.  ','2009-11-27 05:08:02','Rakesh',131,'Hello World !',NULL,NULL),(42,'Alright guys, good luck with the process then.','2009-11-27 05:08:49','Aditya',132,'Hello World !',NULL,NULL),(42,'Yes, there indeed is a job posting recently. We are looking for candidates. Please wait to hear from us for further details.','2009-11-27 05:09:37','Microsoft',133,'Hello World !',NULL,NULL),(41,'Hello and welcome to Apple. Please let me know if you have any queries and I will get back to you as soon as I can.','2009-11-27 19:24:05','Apple',135,'Hello all.',NULL,NULL),(41,'I would like to know when you will be coming to our University for selections. Thanks.','2009-11-27 19:26:51','Aditya',136,'Hello all.',NULL,NULL),(41,'Aditya, we will post all the details here once it is decided. Thanks for participation.','2009-11-27 19:28:42','Apple',138,'Hello all.',NULL,NULL);
/*!40000 ALTER TABLE `forums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `media` (
  `media_id` int(11) NOT NULL auto_increment,
  `company_id` int(11) default NULL,
  `media_title` text,
  `media_type` text,
  `media_size` int(11) default NULL,
  `media_path` longtext,
  `uploaddate` date default NULL,
  `media_desc` longtext,
  PRIMARY KEY  (`media_id`),
  KEY `company_id` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (34,42,'google-birthday-doodles.png','image/png',83245,'uploads/microsoft/','2009-11-18',''),(39,41,'google-birthday-doodles.png','image/png',75984,'uploads/apple/','2009-11-27','');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_student`
--

DROP TABLE IF EXISTS `media_student`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `media_student` (
  `media_id` int(11) NOT NULL auto_increment,
  `email` varchar(20) default NULL,
  `media_title` text,
  `media_type` text,
  `media_size` int(11) default NULL,
  `media_path` longtext,
  `uploaddate` date default NULL,
  PRIMARY KEY  (`media_id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `media_student`
--

LOCK TABLES `media_student` WRITE;
/*!40000 ALTER TABLE `media_student` DISABLE KEYS */;
INSERT INTO `media_student` VALUES (17,'rakkera','ATT1132457.jpg','image/jpeg',52864,'uploads/rakkera/','2009-11-18'),(35,'amangip','620+paper.pdf','application/pdf',304316,'uploads/amangip/','2009-11-21'),(30,'amangip','project_status.pdf','application/pdf',26732,'uploads/amangip/','2009-11-18'),(31,'amangip','Final+Proposal.pdf','application/pdf',180601,'uploads/amangip/','2009-11-18'),(34,'rakkera','ATT1132461.jpg','image/jpeg',36074,'uploads/rakkera/','2009-11-18');
/*!40000 ALTER TABLE `media_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `messages` (
  `sendfrom` varchar(30) NOT NULL,
  `sendto` varchar(30) NOT NULL,
  `body` varchar(2000) default NULL,
  `t_timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `message_id` int(11) NOT NULL auto_increment,
  `attachment` text,
  `subject` varchar(100) default NULL,
  `bit` varchar(3) default NULL,
  `attachment_type` varchar(50) default NULL,
  `attachment_name` varchar(50) default NULL,
  `flag` int(11) default NULL,
  PRIMARY KEY  (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=190 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES ('appleap@clemson.edu','amangip@clemson.edu','sdkjbnskd','2009-11-23 23:48:01',103,'','Hello from Apple Inc.','yes',NULL,NULL,0),('amangip@clemson.edu','amangip@clemson.edu','','2009-11-23 23:47:51',179,'','AppleApple','yes','','',0),('amangip@clemson.edu','amangip@clemson.edu','','2009-11-23 23:47:51',184,'','Hello, sdksbd','yes','','',0),('appleap@clemson.edu','appleap@clemson.edu','','2009-11-23 23:52:18',185,'','Hello, testing','yes','','',1),('rakkera@clemson.edu','rakkera@clemson.edu','akkera\r\n','2009-11-24 11:44:20',186,'','akkera','yes','','',0),('rakkera@clemson.edu','rakkera@clemson.edu','','2009-11-22 07:09:29',176,'','Hello','yes','','',0),('rakkera@clemson.edu','kkaruma@clemson.edu','prudhivraj karumanchi','2009-11-19 15:46:26',110,'','prudhivraj karumanchi','yes',NULL,NULL,0),('appleap@clemson.edu','kkaruma@clemson.edu','Apple Inc. welcomes you !','2009-11-19 15:46:26',107,'','Hello !','yes',NULL,NULL,0),('appleap@clemson.edu','amangip@clemson.edu','Test email !','2009-11-23 23:48:01',115,'','Hello, test email.','yes','',NULL,0),('amangip@clemson.edu','amangip@clemson.edu','dfndkfnd','2009-11-23 23:47:51',117,'','test mail','yes','','',0),('rakkera@clemson.edu','microso@clemson.edu','hello microsoft','2009-11-19 15:46:26',120,'student_attachment/rakkera/ATT1132450.jpg','hello microsoft','yes','image/jpeg','ATT1132450.jpg',0),('googleg@clemson.edu','amangip@clemson.edu','Hello,\r\n  Please find the enclosed file.\r\n\r\nThanks.','2009-11-19 15:46:26',122,'student_attachment/google/Final+Proposal.pdf','Finalschedule.pdf enclosed.','yes','application/pdf','Final+Proposal.pdf',0),('amangip@clemson.edu','amangip@clemson.edu','','2009-11-23 23:47:51',177,'','test','yes','','',0),('amangip@clemson.edu','amangip@clemson.edu','','2009-11-23 23:47:51',178,'','Apple','yes','','',0),('amangip@clemson.edu','rakkera@clemson.edu','','2009-11-20 00:16:28',124,'student_attachment/amangip/philstampslh3.jpg','Hello','yes','image/jpeg','philstampslh3.jpg',0),('rakkera@clemson.edu','googleg@clemson.edu','Hi','2009-11-23 23:49:20',125,'','hi','yes','','',0),('appleap@clemson.edu','amangip@clemson.edu','abasasasasasasas','2009-11-23 23:48:01',131,'','asas','yes','','',0),('rakkera@clemson.edu','rakkera@clemson.edu','','2009-11-22 07:09:32',172,'','beckhambaa','yes','','',0),('rakkera@clemson.edu','amangip@clemson.edu','dknksbnds','2009-11-20 14:06:55',134,'','Hello. Spam test email','yes','','',1),('amangip@clemson.edu','appleap@clemson.edu','','2009-11-23 02:51:33',139,'','Test ','yes','','',0),('appleap@clemson.edu','appleap@clemson.edu','','2009-11-23 23:52:18',182,'','Hey','yes','','',1),('rakkera@clemson.edu','amangip@clemson.edu','sdbnksjdbns','2009-11-20 14:06:55',136,'','new filter','yes','','',1),('appleap@clemson.edu','appleap@clemson.edu','','2009-11-23 23:52:18',183,'','asasnas','yes','','',1),('kkaruma@clemson.edu','amangip@clemson.edu','sldslkds','2009-11-20 01:40:01',137,'','Spam testing !','yes','','',1),('amangip@clemson.edu','amangip@clemson.edu','','2009-11-23 23:47:51',180,'','Wassup?','yes','','',0),('amangip@clemson.edu','appleap@clemson.edu','lsndkjsndkjsndksnkds','2009-11-23 02:51:33',141,'','hello','yes','','',0),('amangip@clemson.edu','appleap@clemson.edu','','2009-11-23 02:51:33',140,'','spamming ','yes','','',0),('amangip@clemson.edu','appleap@clemson.edu','','2009-11-23 02:51:33',143,'student_attachment/amangip/Final+Proposal.pdf','Attachment !','yes','application/pdf','Final+Proposal.pdf',0),('amangip@clemson.edu','appleap@clemson.edu','','2009-11-23 02:51:33',142,'','Hello spamming ','yes','','',0),('amangip@clemson.edu','amangip@clemson.edu','','2009-11-23 23:47:51',181,'','Hey ','yes','','',0),('bloombe@clemson.edu','amangip@clemson.edu','hbfhvufvdfvsvfjhbsjbfjsbfjbsjbfsdf','2009-11-20 04:22:00',145,'','Hello, welcome to Bloomberg !','yes','','',0),('amangip@clemson.edu','bloombe@clemson.edu','ndcjnvkdnfd','2009-11-20 04:19:18',147,'','sdkdkf','no','','',0),('rakkera@clemson.edu','rakkera@clemson.edu','','2009-11-22 07:09:34',175,'','Hello Hello','yes','','',0),('rakkera@clemson.edu','rakkera@clemson.edu','','2009-11-22 07:09:36',169,'','my beckham ba','yes','','',0),('rakkera@clemson.edu','rakkera@clemson.edu','','2009-11-22 07:09:38',168,'','my beckham','yes','','',0),('rakkera@clemson.edu','rakkera@clemson.edu','','2009-11-22 07:09:40',174,'','HelloHello','yes','','',0);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recruiter`
--

DROP TABLE IF EXISTS `recruiter`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `recruiter` (
  `username` varchar(20) default NULL,
  `password` varchar(20) default NULL,
  `industry` varchar(50) default NULL,
  `orgname` varchar(50) default NULL,
  `website` varchar(50) default NULL,
  `add1` varchar(50) default NULL,
  `add2` varchar(50) default NULL,
  `city` varchar(50) default NULL,
  `state` varchar(50) default NULL,
  `country` varchar(20) default NULL,
  `zipcode` int(5) default NULL,
  `contact_number` mediumtext,
  `recruiter_id` int(11) unsigned NOT NULL auto_increment,
  `activation_key` varchar(20) default NULL,
  `activate` varchar(10) default NULL,
  `email` varchar(50) default NULL,
  `profile_pic` longtext,
  `fullname` varchar(50) default NULL,
  `ban` int(11) default NULL,
  PRIMARY KEY  (`recruiter_id`),
  KEY `country` (`country`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `recruiter`
--

LOCK TABLES `recruiter` WRITE;
/*!40000 ALTER TABLE `recruiter` DISABLE KEYS */;
INSERT INTO `recruiter` VALUES ('google','google','Computer & Information Sciences','Google','www.google.com','','','','','UnitedStates',12345,'',40,'','active','googleg@clemson.edu','profilesrec/google/mozodojo-original-image.jpg','Google Corporation',0),('apple','apple','Engineering','Apple','www.apple.com','','','','','UnitedStates',1987,'',41,'','active','appleap@clemson.edu','profilesrec/apple/apple-logo.jpg','Apple Corporation',0),('microsoft','microsoft','Engineering','Microsoft','www.microsoft.com','','','','','',0,'',42,'','active','microso@clemson.edu','profilesrec/microsoft/3microsoft_logo.jpg','Microsoft Corporation',0),('bloomberg','bloomberg','Engineering','Bloomberg','www.bloomberg.com','','','','','',0,'',43,'','active','bloombe@clemson.edu','profilesrec/bloomberg/bloomberg.jpg','Bloomberg Corporation',0),('fidelity','fidelity','Computer & Information Sciences','Fidelity','','','','','','UnitedStates',12345,'',51,'1299925408','active','fidelit@clemson.edu','profiles/default_profile.jpg','Fidelity Corporation',0);
/*!40000 ALTER TABLE `recruiter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registered_users`
--

DROP TABLE IF EXISTS `registered_users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `registered_users` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(30) default NULL,
  `fname` varchar(30) default NULL,
  `lname` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `registered_users`
--

LOCK TABLES `registered_users` WRITE;
/*!40000 ALTER TABLE `registered_users` DISABLE KEYS */;
INSERT INTO `registered_users` VALUES (1,'svanama@clemson.edu','Srikanth','Vanama'),(2,'rakkera@clemson.edu','Rakesh','Akkera'),(3,'bloombe@clemson.edu','Bloomberg','corporation'),(4,'amangip@clemson.edu','Aditya','Mangipudi'),(5,'kkaruma@clemson.edu','Prudhvi','Karumanchi'),(6,'appleap@clemson.edu','Apple','Corporation'),(7,'googleg@clemson.edu','Google','Corporation'),(8,'microso@clemson.edu','Microsoft','Corporation'),(9,'fidelit@clemson.edu','Fidelity','Corporation');
/*!40000 ALTER TABLE `registered_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stu_rec`
--

DROP TABLE IF EXISTS `stu_rec`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `stu_rec` (
  `sturec_id` int(11) NOT NULL auto_increment,
  `recruiter_id` int(11) NOT NULL,
  `CUID` int(11) NOT NULL,
  PRIMARY KEY  (`sturec_id`),
  KEY `recruiter_id` (`recruiter_id`),
  KEY `CUID` (`CUID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `stu_rec`
--

LOCK TABLES `stu_rec` WRITE;
/*!40000 ALTER TABLE `stu_rec` DISABLE KEYS */;
/*!40000 ALTER TABLE `stu_rec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `student` (
  `fname` varchar(15) default NULL,
  `lname` varchar(15) default NULL,
  `cuid` int(11) NOT NULL default '0',
  `email` varchar(40) default NULL,
  `password` varchar(30) default NULL,
  `gender` varchar(6) default NULL,
  `addressline1` varchar(50) default NULL,
  `addressline2` varchar(50) default NULL,
  `city` varchar(15) default NULL,
  `country` varchar(20) default NULL,
  `zipcode` int(11) default NULL,
  `contact` mediumtext,
  `major` varchar(50) default NULL,
  `state` varchar(50) default NULL,
  `activation_key` varchar(20) default NULL,
  `activate` varchar(10) default NULL,
  `profile_pic` longtext,
  `graduation` date default NULL,
  `skill` varchar(300) default NULL,
  `ban` int(11) default NULL,
  PRIMARY KEY  (`cuid`),
  KEY `country` (`country`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES ('Srikanth','Vanama',111111112,'svanama@clemson.edu','vanama','Male','1108 Tiger Blvd','Apt # 151','Clemson','UnitedStates',29631,'8646339412','Computer Science','SC','','active','profiles/default_profile.jpg','2010-05-15','c c++ java mysql ',0),('Aditya','Mangipudi',224602955,'amangip@clemson.edu','mangipudi','Male','1108 Tiger Blvd','Apt # 151','Clemson','UnitedStates',29631,'8646339457','Computer Engineering','SC','','active','profiles/amangip/FP3351.jpg','2010-05-07','c c++ java perl python php abap matlab mysql ruby',0),('Prudhvi','Karumanchi',137562418,'kkaruma@clemson.edu','karumanchi','Male','1108 Tiger Blvd','Apt # 151','Clemson','UnitedStates',29631,'6789380321','Computer Science','SC','','active','profiles/kkaruma/DSCN0986.JPG','2010-05-05','c c++',0),('Rakesh','Akkera',123456780,'rakkera@clemson.edu','akkera','Male','1108 Tiger Blvd','Apt # 114','Clemson','UnitedStates',29631,'8062201228','Computer Science','SC','','active','profiles/default_profile.jpg','2010-12-10','c c++ java mysql php perl abap ccna ccnp',0);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2009-12-03  4:54:10
