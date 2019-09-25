-- Create database `Kviz`
CREATE DATABASE kviz;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: kviz
-- ------------------------------------------------------
-- Server version	5.7.19
Use kviz;

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
-- Dumping routines for database 'kviz'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-23 17:55:36
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionId` int(11) NOT NULL,
  `answersCorrect` int(2) DEFAULT NULL,
  `razina` int(11) NOT NULL,
  `correctAnswer` varchar(255) NOT NULL,
  `answerSelected` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-23 17:55:36

--
-- Table structure for table `razina`
--
DROP TABLE IF EXISTS `razina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `razina` (
  `RazinaId` int(11) NOT NULL AUTO_INCREMENT,
  `RazinaNaziv` varchar(255) NOT NULL,
  PRIMARY KEY (`RazinaId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `razina`
--

LOCK TABLES `razina` WRITE;
/*!40000 ALTER TABLE `razina` DISABLE KEYS */;
INSERT INTO `razina` VALUES (1,'Lagano'),(2,'Mm,onako'),(3,'Zaguljenije'),(4,'Samo za hardokorovce');
/*!40000 ALTER TABLE `razina` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

--
-- Table structure for table `pitanja`
--

DROP TABLE IF EXISTS `pitanja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pitanja` (
  `PitanjeId` int(11) NOT NULL AUTO_INCREMENT,
  `PitanjeSadrzaj` varchar(510) NOT NULL,
  `PitanjeRazinaId` int(11) NOT NULL,
  `TacanOdgovor` varchar(255) NOT NULL,
  PRIMARY KEY (`PitanjeId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pitanja`
--

LOCK TABLES `pitanja` WRITE;
/*!40000 ALTER TABLE `pitanja` DISABLE KEYS */;
INSERT INTO `pitanja` VALUES (1,'Ko je osvojio NBA titulu 1986.?',2,'Boston Celtics'),(5,'Ko je najmladji MVP u istoriji lige?',1,'Derrick Rose'),(4,'Ko je osvojio NBA ligu u sezoni 1998/1999?',1,'San Antonio Spurs'),(6,'Koji igrac ima najvise osvojenih prstena u istoriji lige?',1,'Bill Russell'),(7,'Koji igrac je rekorder po broju postignutih trojki u karijeri? (Do 15.09.2019)',1,'Ray Allen'),(8,'Koji igrac je rekorder po broju postignutih poena u NBA ligi? (Do 15.09.2019)',1,'Kareem Abdul Jabbar'),(9,'Koji od navedenih igraca ima najveci broj osvojenih titula u svojoj igrackoj karijeri?',1,'Robert Horry'),(10,'Koji tim je osvojio NBA ligu u sezoni 2004/05?',1,'San Antonio Spurs'),(11,'Koji je od navedenih igraca igrao za vise od jednog kluba u svojoj karijeri?',1,'Karl Malone');
/*!40000 ALTER TABLE `pitanja` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-23 17:55:35

--
-- Table structure for table `odgovori`
--

DROP TABLE IF EXISTS `odgovori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odgovori` (
  `OdgovorId` int(11) NOT NULL AUTO_INCREMENT,
  `OdgovorSadrzaj` varchar(255) NOT NULL,
  `OdgovorPitanjeId` int(11) NOT NULL,
  PRIMARY KEY (`OdgovorId`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odgovori`
--

LOCK TABLES `odgovori` WRITE;
/*!40000 ALTER TABLE `odgovori` DISABLE KEYS */;
INSERT INTO `odgovori` VALUES (1,'Los Angeles Lakers',1),(2,'Philladelphia 76ers',1),(3,'Boston Celtics',1),(4,'Detroit Pistons',1),(23,'Robert Horry',6),(22,'Bill Russell',6),(21,'Sam Jones',6),(20,'Michael Jordan',5),(19,'Derrick Rose',5),(18,'LeBron James',5),(17,'Wilt Chamberlain',5),(13,'Los Angeles Lakers',4),(14,'San Antonio Spurs',4),(15,'Chicago Bulls',4),(16,'New York Knicks',4),(24,'Phil Jackson',6),(25,'Stephen Curry',7),(26,'Ray Allen',7),(27,'Reggie Miler',7),(28,'Jason Terry',7),(29,'Michael Jordan',8),(30,'Wilt Chamberlain',8),(31,'LeBron James',8),(32,'Kareem Abdul Jabbar',8),(33,'Steve Kerr',9),(34,'Michael Jordan',9),(35,'Scottie Pippen',9),(36,'Robert Horry',9),(37,'Los Angeles Lakers',10),(38,'Detroit Pistons',10),(39,'San Antonio Spurs',10),(40,'Miami Heat',10),(41,'Reggie Miller',11),(42,'John Stockton',11),(43,'Karl Malone',11),(44,'John Havlicek',11);
/*!40000 ALTER TABLE `odgovori` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-23 17:55:36