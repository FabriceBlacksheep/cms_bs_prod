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
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `h1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visuel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_de` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_de` longtext COLLATE utf8mb4_unicode_ci,
  `h1_de` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_de` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci,
  `h1_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_nl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_nl` longtext COLLATE utf8mb4_unicode_ci,
  `h1_nl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_nl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (4,'Page - FAQ','<p><span style=\"color:#16a085\">xxxx</span></p>','FAQ','FAQ','2d3d6a7a772bd9369186a4a4ea856e03.webp',NULL,NULL,'FAQ','FAQ',NULL,NULL,'FAQ','FAQ',NULL,NULL,'FAQ','FAQ'),(5,'Page - Roadtrip','<p>Test de contenu</p>','Roadtrip','Roadtrip','cbbde3d1c34a39f981ee6a313fd512ee.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Page - Contact','<p>Ceci est une page contact</p>','Contact','Contact','4c9a0b2e4669803c8a9142e0a91e5369.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'titre FR','<p>DESC FR</p>','h1 FR','slug FR','ba8ab404b99bec691d0a6d572419dac7.png','titre ALLEMAND','<p>DESC ALLEMANDE</p>','h1 ALLEMAND','slug ALLEMAND','titre ANGLAIS','<p>DESC ANGLAISE</p>','h1 ANGLAIS','slug ANGLAIS','titre NÉERLANDAIS','<p>DESC&nbsp;N&Eacute;ERLANDAISE</p>','h1 NÉERLANDAIS','slug NÉERLANDAIS');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
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

-- Dump completed on 2023-03-08  9:55:32
