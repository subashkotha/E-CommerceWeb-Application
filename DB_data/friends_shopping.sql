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
-- Table structure for table `shopping`
--

DROP TABLE IF EXISTS `shopping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping` (
  `idshopping` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(105) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `DOB` date DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idshopping`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping`
--

LOCK TABLES `shopping` WRITE;
/*!40000 ALTER TABLE `shopping` DISABLE KEYS */;
INSERT INTO `shopping` VALUES (1,'subash','subash.kotha2@gmail.com','759bbeb4259c3d377271225c8a701321da358613802979cae765e04b2eca3dc3','2015-04-29','male','9633074289','Nandigama','Andhra Pradesh'),(2,'srinivas rao kotha','srinivas@gmail.com','954c7a1f84096998e6df172544976b0f8357d9d545c0f5ffa0d7ca839ee8a383',NULL,'male','9505417018','Flat no:404;Anjaneya Towers;Nandigama','Andhra Pradesh'),(3,'KingSlayer','kingslayer@gmail.com','7488a77c524d6cbe905d9ea81b5f50afd97cfaea8fa20d0cd05961058ff2f772','1996-07-02','male','9900011111','Banjara Hills , Hyderabad','Telangana'),(6,'alekhya','alekhya31@gmail.com','3bd275c7f7a0c7a993c0ddbf8cbf85ac99c059e1f570240b01706d026d014ce8','1997-05-31','female','9100092299','Flat no 129 ; SVCC towers;Hyderabad','Telangana'),(7,'Alekhya reddy','alekhyareddy31@gmail.com','3bd275c7f7a0c7a993c0ddbf8cbf85ac99c059e1f570240b01706d026d014ce8','1997-05-31','female','9100092299','Flat no 129 ; SVCC towers;Hyderabad','Telangana'),(8,'Narendra Modi','modi@govtofindia.com','02b9604c7021a778192477da70b0965277688b0836c90082a29ca2103147a295','1958-07-05','male','7736514895','PM residence, New Delhi','Delhi'),(9,'Donald J Trump','donald@gmail.com','4138cfbc5d36f31e8ae09ef4044bb88c0c9c6f289a6a1c27b335a99d1d8dc86f','1961-03-29','female','1215555654','White house,washington DC',''),(10,'anjaneya','anjaneya@gmail.com','759bbeb4259c3d377271225c8a701321da358613802979cae765e04b2eca3dc3','1949-06-05','male','9633074289','',''),(11,'subash','subash.kotha11@gmail.com','759bbeb4259c3d377271225c8a701321da358613802979cae765e04b2eca3dc3','1996-07-02','male','9633074289','Flat no:404;Anjaneya Towers;Nandigama','Andhra Pradesh');
/*!40000 ALTER TABLE `shopping` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-09 13:07:43
