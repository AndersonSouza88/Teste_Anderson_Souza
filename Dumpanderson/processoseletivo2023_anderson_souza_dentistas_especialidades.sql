-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: processoseletivo2023_anderson_souza
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `dentistas_especialidades`
--

DROP TABLE IF EXISTS `dentistas_especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dentistas_especialidades` (
  `dentista_id` bigint unsigned NOT NULL,
  `especialidade_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `dentistas_especialidades_dentista_id_foreign` (`dentista_id`),
  CONSTRAINT `dentistas_especialidades_dentista_id_foreign` FOREIGN KEY (`dentista_id`) REFERENCES `dentistas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dentistas_especialidades`
--

LOCK TABLES `dentistas_especialidades` WRITE;
/*!40000 ALTER TABLE `dentistas_especialidades` DISABLE KEYS */;
INSERT INTO `dentistas_especialidades` VALUES (8,1,NULL,NULL),(9,2,NULL,NULL),(9,3,NULL,NULL),(10,4,NULL,NULL),(10,5,NULL,NULL),(10,6,NULL,NULL),(11,13,NULL,NULL),(13,1,NULL,NULL),(13,4,NULL,NULL),(13,8,NULL,NULL),(13,10,NULL,NULL),(14,7,NULL,NULL),(14,10,NULL,NULL),(14,11,NULL,NULL),(14,12,NULL,NULL),(14,13,NULL,NULL);
/*!40000 ALTER TABLE `dentistas_especialidades` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-01  9:41:05
