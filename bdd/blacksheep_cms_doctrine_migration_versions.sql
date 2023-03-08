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
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20230206150316','2023-02-06 15:03:25',61),('DoctrineMigrations\\Version20230206151048','2023-02-06 15:10:57',42),('DoctrineMigrations\\Version20230206153328','2023-02-06 15:33:38',42),('DoctrineMigrations\\Version20230206193842','2023-02-06 19:38:54',93),('DoctrineMigrations\\Version20230207134618','2023-02-07 13:46:25',534),('DoctrineMigrations\\Version20230208090433','2023-02-08 09:04:41',879),('DoctrineMigrations\\Version20230208090604','2023-02-08 09:06:18',72),('DoctrineMigrations\\Version20230208093833','2023-02-08 09:38:49',790),('DoctrineMigrations\\Version20230208095026','2023-02-08 09:51:10',829),('DoctrineMigrations\\Version20230208161916','2023-02-08 16:19:26',783),('DoctrineMigrations\\Version20230208162658','2023-02-08 16:27:20',70),('DoctrineMigrations\\Version20230209162847','2023-02-09 16:28:58',598),('DoctrineMigrations\\Version20230213103546','2023-02-13 10:36:48',1156),('DoctrineMigrations\\Version20230213103618','2023-02-13 10:36:49',12),('DoctrineMigrations\\Version20230213163946','2023-02-13 16:40:05',516),('DoctrineMigrations\\Version20230215133111','2023-02-15 13:31:21',465),('DoctrineMigrations\\Version20230215150236','2023-02-15 15:02:42',44),('DoctrineMigrations\\Version20230215150744','2023-02-15 15:07:48',40),('DoctrineMigrations\\Version20230216143358','2023-02-16 14:34:13',447),('DoctrineMigrations\\Version20230216155724','2023-02-16 15:57:33',45),('DoctrineMigrations\\Version20230216162123','2023-02-16 16:21:29',44),('DoctrineMigrations\\Version20230217133018','2023-02-17 13:30:53',470),('DoctrineMigrations\\Version20230221122316','2023-02-21 12:23:35',452),('DoctrineMigrations\\Version20230221123345','2023-02-21 12:36:05',76),('DoctrineMigrations\\Version20230221153559','2023-02-21 15:36:07',519),('DoctrineMigrations\\Version20230221154233','2023-02-21 15:42:45',48),('DoctrineMigrations\\Version20230221165001','2023-02-21 16:50:10',112),('DoctrineMigrations\\Version20230228104036','2023-02-28 10:40:48',528),('DoctrineMigrations\\Version20230228104531','2023-02-28 10:45:35',41),('DoctrineMigrations\\Version20230303234218','2023-03-03 23:42:31',239),('DoctrineMigrations\\Version20230304144425','2023-03-04 14:44:50',137),('DoctrineMigrations\\Version20230304173338','2023-03-04 17:33:45',113),('DoctrineMigrations\\Version20230305011441','2023-03-05 01:14:50',236),('DoctrineMigrations\\Version20230305012550','2023-03-05 01:25:58',674),('DoctrineMigrations\\Version20230306134213','2023-03-06 13:47:15',82),('DoctrineMigrations\\Version20230306134703','2023-03-06 13:47:15',51),('DoctrineMigrations\\Version20230306145649','2023-03-06 14:56:59',103),('DoctrineMigrations\\Version20230306153701','2023-03-06 15:37:08',78),('DoctrineMigrations\\Version20230306154045','2023-03-06 15:40:54',285),('DoctrineMigrations\\Version20230306204310','2023-03-06 20:43:16',167),('DoctrineMigrations\\Version20230306210341','2023-03-06 21:03:50',183),('DoctrineMigrations\\Version20230307095044','2023-03-07 09:50:50',140),('DoctrineMigrations\\Version20230307105249','2023-03-07 10:53:28',75),('DoctrineMigrations\\Version20230307110325','2023-03-07 11:03:34',281),('DoctrineMigrations\\Version20230307113852','2023-03-07 11:38:58',97);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
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

-- Dump completed on 2023-03-08  9:55:36
