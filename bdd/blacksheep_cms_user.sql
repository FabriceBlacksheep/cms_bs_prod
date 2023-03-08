-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 34.155.171.58    Database: blacksheep_cms
-- ------------------------------------------------------
-- Server version	5.7.39-google-log

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--


--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_log_in` datetime DEFAULT NULL,
  `picture_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (9,'blacksheepdev69@gmail.com','[\"ROLE_ADMIN\"]','$2y$13$p6mK7yZoAsYPIrdgblVvCOJbHI/ptoBVmG/QK3uNQOLcgB27LG6vW','Admin','Dev','2023-03-08 09:34:48','e9ebec96ded5cd97c0b7fcaf99a63936.gif','+33798652433'),(14,'fabrice@blacksheep-van.com','[\"ROLE_ADMIN\"]','$2y$13$zu7L/bqAL0umhfK/K5tPq.BhOiD9m2CjhBHWhNNrpAh.tZq.4Esi6','VALLES','Fabrice','2023-03-07 18:11:36','b6bed2fb5c9683b53d192a075d5757e0.jpg','0661629817'),(19,'edouard@blacksheep-van.com','[\"ROLE_ADMIN\"]','$2y$13$SeSL52sO1Fjj04SCAJV4Deo0HsnYnx.RVZUDCMToyMjO5mOZ6NTxy','AMOUROUX','Edouard',NULL,'4c02e6d7c50792e595c45bacd73e69ad.jpg','0661626364'),(20,'augustin@blacksheep-van.com','[\"ROLE_ADMIN\"]','$2y$13$kNZ26yIkGMBn1xtdmYBoJekOREGZz/JhK/7P3XCq300NkuTu7jT8G','MAHIEUX','Augustin',NULL,'26856bef4480c6c6bfd6c467ba2d5ce7.jpg','0661626364'),(21,'user@free.fr','[\"ROLE_WEBMASTER\"]','$2y$13$IVT4W.Yg7JRo2giP.cXXf.ZaRfQBFU3Qx5GEUrOXBRGzsSnaQqJwK','USER','USER','2023-03-04 23:44:12',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-08  9:55:34
