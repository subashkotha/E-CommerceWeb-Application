-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: friends
-- ------------------------------------------------------
-- Server version	5.7.18-log

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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(245) DEFAULT NULL,
  `OrderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `ratestatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (17,'kingslayer','chocolate','2017-05-30 20:00:51',0,1,50,1),(18,'kingslayer','wallet','2017-05-30 20:02:37',1,1,269,1),(19,'kingslayer','I phone 7','2017-05-30 20:03:59',0,1,40000,0),(23,'Alekhya reddy','wallet','2017-05-30 23:26:50',0,5,1345,1),(24,'Alekhya reddy','I phone 7','2017-05-30 23:27:34',0,2,80000,1),(40,'subash','chocolate','2017-05-31 09:34:28',0,1,50,0),(47,'KingSlayer','wallet','2017-05-31 12:30:23',0,2,538,0),(49,'KingSlayer','shoes','2017-05-31 12:30:24',1,4,2920,1),(54,'Narendra Modi','T shirt','2017-05-31 12:39:52',0,11,4389,1),(55,'Narendra Modi','shoes','2017-05-31 12:39:52',1,2,1460,1),(56,'Narendra Modi','I phone 7','2017-05-31 12:39:52',1,1,40000,1),(59,'Narendra Modi','Tropicana','2017-05-31 14:49:21',1,2,180,1),(60,'subash','Ear Phones','2017-05-31 16:47:54',0,10,2200,0),(62,'subash','shoes','2017-05-31 16:56:58',1,1,730,1),(64,'subash','shoes','2017-05-31 17:08:42',1,1,730,1),(68,'alekhya','Tropicana','2017-05-31 19:09:13',1,2,180,1),(69,'subash','Tropicana','2017-06-01 13:16:04',1,1,90,1),(70,'Donald J Trump','Tropicana','2017-06-01 15:17:10',1,2,180,1),(71,'Donald J Trump','T shirt','2017-06-01 15:17:11',0,1,399,0),(73,'anjaneya','Tropicana','2017-06-01 17:35:39',1,1,90,1),(74,'Alekhya reddy','Bangles','2017-06-01 17:37:26',1,1,12000,1),(75,'Alekhya reddy','chocolate','2017-06-01 17:46:57',0,1,50,0),(77,'kotha subash chandra','chocolate','2017-06-01 18:53:42',1,1,50,1),(79,NULL,NULL,'2017-06-01 19:42:24',1,NULL,NULL,1),(80,'KingSlayer','Bangles','2017-06-01 20:13:54',1,1,12000,1),(82,'KingSlayer','chocolate','2017-06-02 09:54:19',0,1,50,0),(83,'KingSlayer','Bangles','2017-06-02 09:54:19',1,1,12000,1),(85,'Alekhya reddy','I phone 7','2017-06-02 10:06:36',1,1,40000,1),(86,'KingSlayer','chocolate','2017-06-02 10:26:24',0,1,50,0),(87,'KingSlayer','chocolate','2017-06-02 10:26:31',1,1,50,1),(88,'KingSlayer','LED TV','2017-06-02 10:28:30',1,1,35655,1),(89,'subash','Camera','2017-06-02 10:29:39',1,1,39466,1),(90,'subash','chocolate','2017-06-02 10:29:39',0,2,100,0),(91,'subash','Tropicana','2017-06-02 10:29:40',1,1,90,1),(92,'subash','chocolate','2017-06-02 10:31:41',1,1,50,1),(93,'Donald J Trump','Pen Drive','2017-06-02 11:08:16',1,2,900,1),(94,'subash','Tropicana','2017-06-03 13:29:28',1,1,90,1),(96,'KingSlayer','chocolate','2017-08-03 21:02:03',1,10,500,1),(97,'KingSlayer','chocolate','2017-08-03 21:04:25',1,1,50,1),(98,'subash','I phone 7','2019-03-09 12:49:22',1,2,80000,1),(99,'subash','chocolate','2019-03-09 12:49:22',1,1,50,1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-09 13:07:44
