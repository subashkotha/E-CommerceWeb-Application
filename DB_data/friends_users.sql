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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `account` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (17,'Anjaneya','subash.kotha@gmail.com','0ff2729270a5f4b7c418ca72ae90adfd792c1e0c332316bb2e5700e81bc41cb3','a1s2d3','male',9878,NULL,'9951074289','Kozhikode','kerala'),(25,'srinivas rao kotha','srinivas@gmail.com','6d596b34b8012f417b79d1b1ce72667d3ec0fad2040454881ea4627f1568cbb8','404040','male',NULL,NULL,'9633074289','Flat no:404;Anjaneya Towers;Nandigama','Andhra Pradesh'),(26,'Subash Chandra Kotha','subash.kotha2@gmail.com','759bbeb4259c3d377271225c8a701321da358613802979cae765e04b2eca3dc3','20244235481','male',68685,'1996-07-02','9633074289','Flat no:404, Anjaneya Towers, Raithupeta , Nandigama','Andhra Pradesh'),(27,'alekhya','alekhya31@gmail.com','bc10e2748a00654bc9fd9d1723e3ee8c5611b5095b55742209ac1d7c197362e7','27315','female',31315,'1997-05-31','9100092299','Flat no:129, SVCC Towers, Hyderabad','Telangana'),(28,'kingslayer','kingslayer@gmail.com','7488a77c524d6cbe905d9ea81b5f50afd97cfaea8fa20d0cd05961058ff2f772','a1s2d3','male',NULL,'2000-07-01','9951074289','Kozhikode','kerala'),(29,'kingslayer','kingslayer1@gmail.com','7488a77c524d6cbe905d9ea81b5f50afd97cfaea8fa20d0cd05961058ff2f772','205698','female',NULL,'2004-02-01','9713842650','','Delhi'),(30,'Donald J Trump','donald@usa.com','4138cfbc5d36f31e8ae09ef4044bb88c0c9c6f289a6a1c27b335a99d1d8dc86f','31285utd','male',NULL,'1966-10-27','9633074289','White house, washnigton DC ,united states',''),(31,'vijay','vijayanandh12@gmail.com','5491a528c058dbed5991f4455e51b5b0f8ddcea430aeb91ae06f1b9a45137d8f','25632563','male',NULL,'1997-02-07','8484956321','erode','Tamilnadu');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
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
