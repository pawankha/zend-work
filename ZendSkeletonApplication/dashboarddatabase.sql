-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: dashboard
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `manage_choosedevice`
--

DROP TABLE IF EXISTS `manage_choosedevice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manage_choosedevice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `above_text` text NOT NULL,
  `image_1` text NOT NULL,
  `image_2` text NOT NULL,
  `below_text` text NOT NULL,
  `text_otp_page` text NOT NULL,
  `otp_expire_time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manage_choosedevice`
--

LOCK TABLES `manage_choosedevice` WRITE;
/*!40000 ALTER TABLE `manage_choosedevice` DISABLE KEYS */;
INSERT INTO `manage_choosedevice` VALUES (1,'Please Select your OS','570cc2733e6be_andriod.jpg','570cc2733ec3d_apple.jpg','Please select your OS','                                          Please enter your details and submit','600');
/*!40000 ALTER TABLE `manage_choosedevice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manage_otp`
--

DROP TABLE IF EXISTS `manage_otp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manage_otp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctn` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `imei` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `otp_number` varchar(255) NOT NULL,
  `otp_send_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''0=>pending'',''1=>valid'',''2=>expire''',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manage_otp`
--

LOCK TABLES `manage_otp` WRITE;
/*!40000 ALTER TABLE `manage_otp` DISABLE KEYS */;
INSERT INTO `manage_otp` VALUES (19,'919827275270','pawan.k@cisinlabs.com','','android','807195','2016-04-13 13:31:09','0'),(20,'07968280916','brejeshchauhan@hotmail.com','','android','454876','2016-04-11 16:45:43','0'),(21,'07968280916','brejeshchauhan@hotmail.com','1234567890124356','iphone','453195','2016-04-11 16:46:46','0'),(22,'07968280916','brejeshchauhan@hotmail.com','234567890645678','iphone','164253','2016-04-11 17:25:52','0'),(23,'07968280916','brejeshchauhan@hotmail.com','543267899065433','iphone','374109','2016-04-11 20:43:10','0'),(24,'07968280916','brejeshchauhan@hotmail.com','0987654687777','iphone','315461','2016-04-11 20:57:30','0'),(25,'07968280916','brejeshchauhan@hotmail.com','123456789999002','iphone','605962','2016-04-12 11:23:47','0'),(26,'07968280916','brejeshchauhan@hotmail.com','123456789999999','iphone','516991','2016-04-12 11:40:43','0'),(27,'07968280916','brejeshchauhan@hotmail.com','123456789000000','iphone','558401','2016-04-12 11:43:51','0'),(28,'919827275270','pawan.k@cisinlive.com','','android','404647','2016-04-12 16:31:34','1'),(29,'919827275270','pawan.k@cisinlive.com','','android','557326','2016-04-12 18:04:21','1'),(30,'07968280916','brejeshchauhan@hotmail.com','234567876567878','iphone','711181','2016-04-12 18:20:19','0'),(31,'919827275270','pawan.k@cisinlive.com','123456789012345','iphone','494958','2016-04-12 18:33:59','0'),(32,'919827275270','pawan.k@cisinlive.com','','android','872994','2016-04-12 18:35:44','0'),(33,'919827275270','pawan.k@cisinlive.com','123456789012345','iphone','864664','2016-04-12 18:42:23','0'),(34,'07968280916','brejeshchauhan@hotmail.com','234567890000000','iphone','544539','2016-04-12 19:15:11','0'),(35,'07968280916','brejeshchauhan@hotmail.com','123456789000000','iphone','940914','2016-04-12 22:06:26','0'),(36,'07968280916','brejeshchauhan@hotmail.com','123456789000000','iphone','923775','2016-04-12 22:09:25','0'),(37,'07756772867','brejeshchauhan@hotmail.com','234567898887677','iphone','597322','2016-04-12 22:15:11','0'),(38,'07968280916','brejeshchauhan@hotmail.com','897987667866787','iphone','569083','2016-04-12 22:19:05','0'),(39,'07968280916','brejeshchauhan@hotmail.com','123456789876543','iphone','623762','2016-04-12 22:28:59','0'),(40,'07968280916','brejeshchauhan@hotmail.com','345678902876567','iphone','299337','2016-04-12 22:33:27','0'),(41,'07968280916','brejeshchauhan@hotmail.com','345678909876545','iphone','536847','2016-04-13 02:50:16','0'),(42,'07956693822','','','iphone','392977','2016-04-13 02:56:22','1'),(43,'07968280916','brejeshchauhan@hotmail.com','123456789876543','iphone','828237','2016-04-13 14:51:40','1'),(44,'07968280916','brejeshchauhan@hotmail.com','234567890098767','iphone','499378','2016-04-13 16:01:42','1'),(45,'07756772867','m.p.scott@h','','iphone','756358','2016-04-13 18:03:31','1'),(46,'07756772867','m.p.scott@outlook.com','789678678956756','iphone','792508','2016-04-13 20:07:47','1'),(47,'07756772867','','','iphone','412593','2016-04-13 21:26:05','0'),(48,'07756772867','','','iphone','431710','2016-04-13 21:26:07','0'),(49,'07756772867','','','iphone','441555','2016-04-13 21:26:09','1'),(50,'07968280916','brejeshchauhan@hotmail.com','356377272828828','iphone','566256','2016-04-13 22:55:45','0'),(51,'07968280916','brejeshchauhan@hotmail.com','484748478474874','iphone','686954','2016-04-13 22:59:12','0'),(52,'07968280916','brejeshchauhan@hotmail.com','456789098765456','iphone','697392','2016-04-13 23:02:36','0'),(53,'07756772867','','','iphone','380166','2016-04-14 13:45:51','1'),(54,'07756772867','','','iphone','321932','2016-04-14 14:12:22','0'),(55,'07756772867','','','iphone','598797','2016-04-14 14:14:18','1'),(56,'07968280916','brejeshchauhan@hotmail.com','345678965678878','iphone','392199','2016-04-14 14:30:11','1'),(57,'07968280916','brejeshchauhan@hotmail.com','123456789010989','iphone','985801','2016-04-14 15:25:57','1'),(58,'07968280916','brejeshchauhan@hotmail.com','345678909876545','iphone','882769','2016-04-20 18:35:22','0'),(59,'07968280916','brejeshchauhan@hotmail.com','234567890987656','iphone','472294','2016-04-20 19:08:41','0'),(60,'07968280916','','','iphone','872828','2016-04-20 20:36:15','0'),(61,'07756772867','','','android','914722','2016-04-20 21:20:17','0'),(62,'07756772867','','','android','769589','2016-04-20 21:22:03','0'),(63,'07968280916','brejeshchauhan@hotmail.com','234567890987654','iphone','405326','2016-04-21 17:44:07','0'),(64,'07968280916','brejeshchauhan@hotmail.com','','android','229117','2016-04-21 17:44:22','0');
/*!40000 ALTER TABLE `manage_otp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manage_text`
--

DROP TABLE IF EXISTS `manage_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manage_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `step_1_above_text` text NOT NULL,
  `step_1_below_text` text NOT NULL,
  `step_2_above_text` text NOT NULL,
  `step_2_below_text` text NOT NULL,
  `step_3_image1` text NOT NULL,
  `step_3_image2` text NOT NULL,
  `step_3_image3` text NOT NULL,
  `step_3_1_image1` text NOT NULL,
  `step_3_1_image2` text NOT NULL,
  `step_3_a_image1` text NOT NULL,
  `step_3_a_image2` text NOT NULL,
  `step_3_a_image3` text NOT NULL,
  `step_3_1_a_image1` text NOT NULL,
  `step_3_1_a_image2` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manage_text`
--

LOCK TABLES `manage_text` WRITE;
/*!40000 ALTER TABLE `manage_text` DISABLE KEYS */;
INSERT INTO `manage_text` VALUES (7,'iPhone Install Instructions ','iPhone Install Instructions ','Android Install Instructions','Android Install Instructions','5718c3cd8148a_ADD IMAGE.png','5718c3cd81591_ADD IMAGE.png','570e82a539f99_ADD IMAGE.png','570e82a53a186_ADD IMAGE.png','570e82a53a368_ADD IMAGE.png','570e82a53a550_ADD IMAGE.png','570e82a53a72f_ADD IMAGE.png','570e82a53a90a_ADD IMAGE.png','570e82a53aae2_ADD IMAGE.png','570e82a53acb6_ADD IMAGE.png','');
/*!40000 ALTER TABLE `manage_text` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-21 15:53:19
