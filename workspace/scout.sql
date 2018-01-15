-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: scout
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Current Database: `scout`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `scout` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `scout`;

--
-- Table structure for table `averages`
--

DROP TABLE IF EXISTS `averages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `averages` (
  `team_num` varchar(30) NOT NULL DEFAULT '',
  `auto_high` varchar(30) DEFAULT NULL,
  `auto_low` varchar(30) DEFAULT NULL,
  `auto_gear` varchar(30) DEFAULT NULL,
  `auto_base` varchar(30) DEFAULT NULL,
  `high` varchar(30) DEFAULT NULL,
  `high_acc` varchar(30) DEFAULT NULL,
  `low` varchar(30) DEFAULT NULL,
  `low_acc` varchar(30) DEFAULT NULL,
  `gear` varchar(30) DEFAULT NULL,
  `gearDrop` varchar(30) DEFAULT NULL,
  `climbing` varchar(30) DEFAULT NULL,
  `defense` varchar(30) DEFAULT NULL,
  `composite` varchar(30) DEFAULT NULL,
  `teamScore` varchar(30) DEFAULT NULL,
  `teamScore_stanDev` varchar(20) DEFAULT NULL,
  `strength` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`team_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `averages`
--

LOCK TABLES `averages` WRITE;
/*!40000 ALTER TABLE `averages` DISABLE KEYS */;
/*!40000 ALTER TABLE `averages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone`
--

DROP TABLE IF EXISTS `phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phone` (
  `team_num` varchar(4) DEFAULT NULL,
  `autoGearSuccess` varchar(2) DEFAULT NULL,
  `autoGearTry` varchar(2) DEFAULT NULL,
  `baselineSuccess` varchar(20) DEFAULT NULL,
  `baselineTry` varchar(20) DEFAULT NULL,
  `autoHigh` varchar(20) DEFAULT NULL,
  `averageTeleopGear` varchar(2) DEFAULT NULL,
  `gearDrop` varchar(20) DEFAULT NULL,
  `climbSuccess` varchar(2) DEFAULT NULL,
  `climbTry` varchar(2) DEFAULT NULL,
  `composite` varchar(20) DEFAULT NULL,
  `teamScore` varchar(20) DEFAULT NULL,
  `teamScore_stanDev` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone`
--

LOCK TABLES `phone` WRITE;
/*!40000 ALTER TABLE `phone` DISABLE KEYS */;
/*!40000 ALTER TABLE `phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `raw_phone`
--

DROP TABLE IF EXISTS `raw_phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `raw_phone` (
  `team_num` varchar(10) DEFAULT NULL,
  `auto_high` varchar(10) DEFAULT NULL,
  `auto_low` varchar(10) DEFAULT NULL,
  `auto_gear` varchar(10) DEFAULT NULL,
  `auto_base` varchar(10) DEFAULT NULL,
  `tele_gear` varchar(10) DEFAULT NULL,
  `gearDrop` varchar(30) DEFAULT NULL,
  `tele_high` varchar(10) DEFAULT NULL,
  `high_acc` varchar(10) DEFAULT NULL,
  `tele_low` varchar(10) DEFAULT NULL,
  `low_acc` varchar(10) DEFAULT NULL,
  `defense` varchar(10) DEFAULT NULL,
  `sweeper` varchar(10) DEFAULT NULL,
  `climbing` varchar(10) DEFAULT NULL,
  `composite` varchar(30) NOT NULL DEFAULT '',
  `teamScore` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raw_phone`
--

LOCK TABLES `raw_phone` WRITE;
/*!40000 ALTER TABLE `raw_phone` DISABLE KEYS */;
/*!40000 ALTER TABLE `raw_phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `result` (
  `name` varchar(30) DEFAULT NULL,
  `team_num` varchar(10) DEFAULT NULL,
  `auto_high` varchar(10) DEFAULT NULL,
  `auto_low` varchar(10) DEFAULT NULL,
  `auto_gear` varchar(10) DEFAULT NULL,
  `auto_base` varchar(10) DEFAULT NULL,
  `tele_gear` varchar(10) DEFAULT NULL,
  `gearDrop` varchar(30) DEFAULT NULL,
  `tele_high` varchar(10) DEFAULT NULL,
  `high_acc` varchar(10) DEFAULT NULL,
  `tele_low` varchar(10) DEFAULT NULL,
  `low_acc` varchar(10) DEFAULT NULL,
  `defense` varchar(10) DEFAULT NULL,
  `sweeper` varchar(10) DEFAULT NULL,
  `climbing` varchar(10) DEFAULT NULL,
  `composite` varchar(30) NOT NULL DEFAULT '',
  `teamScore` varchar(30) DEFAULT NULL,
  `comments` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result`
--

LOCK TABLES `result` WRITE;
/*!40000 ALTER TABLE `result` DISABLE KEYS */;
/*!40000 ALTER TABLE `result` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-15 19:40:43
