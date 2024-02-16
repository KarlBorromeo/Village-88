-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: php_exam
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(255) NOT NULL,
  `request_date` datetime NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (1,'Alice Johnson','2024-01-28 01:55:40','2024-02-01 01:55:40','2024-02-05 01:55:40','Vacation','2024-02-15 09:37:40'),(2,'Benjamin Brown','2024-02-08 01:55:40','2024-02-10 01:55:40','2024-02-12 01:55:40','Sick Leave','2024-02-15 09:37:40'),(3,'Charlotte Clark','2024-02-13 01:55:40','2024-02-15 01:55:40','2024-02-16 01:55:40','Unpaid Leave','2024-02-15 09:37:40'),(4,'Daniel Davis','2024-02-18 01:55:40','2024-02-20 01:55:40','2024-02-21 01:55:40','Paid Leave','2024-02-15 09:37:40'),(5,'Elonar Evans','2024-02-23 01:55:40','2024-02-25 01:55:40','2024-02-26 01:55:40','Half Day Unpaid','2024-02-15 09:37:40'),(6,'Frederic Fisher','2024-02-03 01:55:40','2024-02-05 01:55:40','2024-02-07 01:55:40','Sick Leave','2024-02-15 09:37:40'),(7,'Grace Green','2024-02-12 01:55:40','2024-02-14 01:55:40','2024-02-15 01:55:40','Vacation','2024-02-15 09:37:40'),(8,'Henry harris','2024-02-16 01:55:40','2024-02-18 01:55:40','2024-02-19 01:55:40','Unpaid Leave','2024-02-15 09:37:40'),(9,'Isabella Jones','2024-02-20 01:55:40','2024-02-22 01:55:40','2024-02-23 01:55:40','paid Leave','2024-02-15 09:37:40'),(10,'Jack Jackson','2024-02-25 01:55:40','2024-02-28 01:55:40','2024-03-01 01:55:40','Sick Leave','2024-02-15 09:37:40');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-15  9:39:26
