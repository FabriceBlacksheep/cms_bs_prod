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
-- Table structure for table `img_gallery`
--

DROP TABLE IF EXISTS `img_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `img_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_file` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:json)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_gallery`
--

LOCK TABLES `img_gallery` WRITE;
/*!40000 ALTER TABLE `img_gallery` DISABLE KEYS */;
INSERT INTO `img_gallery` VALUES (1,'[\"d8ddd1f1e73bc2d7dd41e4af4a688b3e.webp\",\"597e6d2412fa0e50f95bd77fb60a1715.webp\",\"ec5018f5069a68dcabb2d87bc85908fe.webp\"]'),(2,'[\"caca5084983c8bba4e08a22ad608eeb4.webp\",\"ff75172068cd5232c6718d1393d4d1dd.webp\",\"723b529193f79f2ce6e794a131d862b1.webp\",\"c7758719f1a017da6260aef853b36334.webp\"]'),(3,'[\"1429dfb8368c223c110125bf85c5b3fe.webp\",\"780ce097f8e105c5afdc4cd0eabedb19.webp\",\"5303afd7e0799e7cc7ce79fdea089dbb.webp\"]'),(4,'[\"91852a018d64f90c9862ccd9cd83a2af.webp\",\"d2f61003fa6b6186d5bad03abea39c16.webp\",\"4474be67d6b8387c1ff88ebcc885a751.webp\"]'),(5,'[\"9284d6f802b608ca027ac49e4486e742.webp\",\"d20aec5b9860fffe09c69c82a69cf905.png\",\"bb213686ec2d192f595ed4853a2e18fd.png\",\"145ce1d5d57421955597e548f91d4a4d.png\",\"29f4cffdffcc6f69f21a8651802d79f5.png\"]'),(6,'[\"623c009ec3a78e8792609843eee2a9c6.webp\"]');
/*!40000 ALTER TABLE `img_gallery` ENABLE KEYS */;
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

-- Dump completed on 2023-03-08  9:55:37
