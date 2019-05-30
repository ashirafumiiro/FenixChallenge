-- MySQL dump 10.16  Distrib 10.1.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: employees
-- ------------------------------------------------------
-- Server version	10.1.29-MariaDB-6+b1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `employees_seniority`
--
CREATE DATABASE employees;
USE employees;
DROP TABLE IF EXISTS `employees_seniority`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees_seniority` (
  `id` int(4) NOT NULL,
  `start_date` date NOT NULL,
  `seniority` char(1) NOT NULL,
  KEY `id` (`id`),
  CONSTRAINT `employees_seniority_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employees_table` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees_seniority`
--

LOCK TABLES `employees_seniority` WRITE;
/*!40000 ALTER TABLE `employees_seniority` DISABLE KEYS */;
INSERT INTO `employees_seniority` VALUES (1,'2016-01-02','B'),(2,'2018-11-12','C'),(3,'2017-04-02','B'),(4,'2015-05-27','A'),(1,'2016-05-20','C'),(4,'2017-05-01','D'),(5,'2019-03-14','A'),(1,'2018-05-30','D'),(2,'2015-12-01','B');
/*!40000 ALTER TABLE `employees_seniority` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees_table`
--

DROP TABLE IF EXISTS `employees_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(20) NOT NULL DEFAULT '1234',
  `points_accrued` double DEFAULT '0',
  `points_used` double DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees_table`
--

LOCK TABLES `employees_table` WRITE;
/*!40000 ALTER TABLE `employees_table` DISABLE KEYS */;
INSERT INTO `employees_table` VALUES (1,'1234',102.5,10),(2,'1234',55,5),(3,'1234',25,0),(4,'1234',65,0),(5,'1234',10,0);
/*!40000 ALTER TABLE `employees_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
