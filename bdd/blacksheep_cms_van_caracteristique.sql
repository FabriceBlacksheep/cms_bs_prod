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
-- Table structure for table `van_caracteristique`
--

DROP TABLE IF EXISTS `van_caracteristique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `van_caracteristique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visuel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `performances` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimensions` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layout` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `van_caracteristique`
--

LOCK TABLES `van_caracteristique` WRITE;
/*!40000 ALTER TABLE `van_caracteristique` DISABLE KEYS */;
INSERT INTO `van_caracteristique` VALUES (1,NULL,'<ul>\r\n	<li>Diesel &ndash; boite manuelle ou automatique</li>\r\n	<li>5 places</li>\r\n	<li>5 couchages (2 adultes + 3 enfants)</li>\r\n	<li>Douchette int&eacute;gr&eacute;e et toilettes en option</li>\r\n</ul>','BAROUDEUR CALIFORNIA','<ul>\r\n	<li>Motorisation : 2.0 TDI EU6</li>\r\n	<li>Cylindr&eacute;e : 1968.00 cm3</li>\r\n	<li>Nombre de vitesses : M&eacute;canique 6 ou automatique 7</li>\r\n</ul>','<ul>\r\n	<li>Consommation mixte : 7.6 L/100km</li>\r\n	<li>Vitesse maximale : 178 km/h</li>\r\n	<li>Emissions de CO2 : 198 g/km</li>\r\n	<li>Norme anti-pollution : Euro 6</li>\r\n</ul>','<ul>\r\n	<li>Longueur : 4,90 m</li>\r\n	<li>Largeur : 2,3 m</li>\r\n	<li>Hauteur : 1,99 m</li>\r\n	<li>Empattement : 3m</li>\r\n	<li>Superficie espace passagers : 4 m2</li>\r\n	<li>Nombre de places assises : 4</li>\r\n	<li>Volume du coffre : 5100 L</li>\r\n	<li>Poids &agrave; vide : 2472 kg</li>\r\n</ul>','<ul>\r\n	<li>Plaque de cuisson &agrave; gaz 2 feux</li>\r\n	<li>Frigo de 42L</li>\r\n	<li>Evier int&eacute;rieur (r&eacute;serve eau propre 24.2L)</li>\r\n	<li>Douchette ext&eacute;rieure</li>\r\n	<li>Chauffage stationnaire &agrave; air</li>\r\n	<li>Toit relevable &eacute;lectro-hydraulique</li>\r\n	<li>2 lits-double (115X200 cm et 200x120cm)</li>\r\n	<li>Table int&eacute;rieure</li>\r\n	<li>Store ext&eacute;rieur</li>\r\n	<li>Table ext&eacute;rieure dans porte coulissante</li>\r\n	<li>2 chaises pliantes dans le hayon</li>\r\n	<li>2 tabourets additionnels</li>\r\n	<li>Prise d&rsquo;alimentation externe 230V</li>\r\n	<li>Convertisseur continu-alternatif 230V</li>\r\n	<li>R&eacute;serve eaux propres 30L</li>\r\n	<li>R&eacute;serve eaux sales 30L</li>\r\n	<li>Circuit d&rsquo;eau avec pompe &eacute;lectrique</li>\r\n</ul>','<ul>\r\n	<li>R&eacute;gulateur et limitateur de vitesse</li>\r\n	<li>Climatisation</li>\r\n	<li>Vitres avant &eacute;lectrique</li>\r\n	<li>Prises 12V &agrave; de multiples endroits</li>\r\n	<li>Fermeture centralis&eacute;e</li>\r\n	<li>Autoradio avec &eacute;cran tactile</li>\r\n	<li>ABS - syst&egrave;me anti-blocage des roues</li>\r\n	<li>ESP &ndash; Correcteur de trajectoire</li>\r\n	<li>Double Airbag</li>\r\n	<li>Syst&egrave;me d&rsquo;aide au stationnement</li>\r\n	<li>2 batteries auxiliaires</li>\r\n	<li>Multiples ports USB-C</li>\r\n	<li>Fixations Isofix sur banquette arri&egrave;re</li>\r\n</ul>'),(2,NULL,'<ul>\r\n	<li>&nbsp;&nbsp;&nbsp; Diesel - bo&icirc;te manuelle ou automatique</li>\r\n	<li>&nbsp;&nbsp;&nbsp; 2 couchages</li>\r\n	<li>&nbsp;&nbsp;&nbsp; 5 places</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Douchette int&eacute;gr&eacute;e et toilettes en option</li>\r\n</ul>','CAMPERVAN MINI','<div class=\"grid grid-cols-1 lg:mb-0 mb-14 relative\">\r\n<p><strong>Motorisation </strong>: 2.0 TDI EU6<br />\r\n<strong>Cylindr&eacute;e </strong>: 1968.00 cm3<br />\r\n<strong>Nombre de vitesses</strong> : M&eacute;canique 5 ou automatique 6</p>\r\n</div>',NULL,NULL,NULL,NULL),(4,NULL,'<ul>\r\n	<li>Diesel &ndash; bo&icirc;te automatique</li>\r\n	<li>4 places</li>\r\n	<li>4 couchages</li>\r\n	<li>5,14m x 1,93 m x 1,99 m</li>\r\n</ul>','BAROUDEUR MARCO POLO','<ul>\r\n	<li>Motorisation : 250 CDI</li>\r\n	<li>Cylindr&eacute;e : 2 143 cm&sup3;</li>\r\n</ul>','<div class=\"grid grid-cols-1 lg:mb-0 mb-14 relative\">\r\n<ul>\r\n	<li>Consommation mixte : 5.9 L/100km</li>\r\n	<li>Vitesse maximale : 206 km/h</li>\r\n	<li>Emissions de CO2 : 154g/km</li>\r\n	<li>Norme anti-pollution : Euro 6</li>\r\n</ul>\r\n</div>','<ul>\r\n	<li>Longueur : 5,14 m</li>\r\n	<li>Largeur : 1,93 m</li>\r\n	<li>Hauteur : 1,98 m</li>\r\n	<li>Empattement : 3,2m</li>\r\n	<li>Superficie espace passagers : 4 m&sup2;</li>\r\n	<li>Nombre de places assises :</li>\r\n	<li>Volume du coffre : 670 L</li>\r\n	<li>Poids &agrave; vide : 2440 kg</li>\r\n</ul>','<ul>\r\n	<li>Plaque de cuisson &agrave; gaz 2 feux</li>\r\n	<li>Glaci&egrave;re de 40L</li>\r\n	<li>Evier int&eacute;rieur</li>\r\n	<li>Douchette ext&eacute;rieure</li>\r\n	<li>Chauffage stationnaire &agrave; air</li>\r\n	<li>Toit relevable</li>\r\n	<li>2 lits-double (113X203 cm et 113x205 cm)</li>\r\n	<li>Table int&eacute;rieure</li>\r\n	<li>Store ext&eacute;rieur</li>\r\n	<li>Table ext&eacute;rieure</li>\r\n	<li>2 chaises pliantes</li>\r\n	<li>2 tabourets additionnels</li>\r\n	<li>Prise d&rsquo;alimentation externe 230V</li>\r\n	<li>Prise 230V</li>\r\n	<li>R&eacute;serve eaux propres 38L</li>\r\n	<li>R&eacute;serve eaux sales 40L</li>\r\n	<li>Circuit d&rsquo;eau avec pompe &eacute;lectrique</li>\r\n</ul>','<ul>\r\n	<li>R&eacute;gulateur et limitateur de vitesse</li>\r\n	<li>Climatisation</li>\r\n	<li>Vitres avant &eacute;lectrique</li>\r\n	<li>Prises 12V &agrave; de multiples endroits</li>\r\n	<li>Fermeture centralis&eacute;e</li>\r\n	<li>Autoradio avec &eacute;cran tactile</li>\r\n	<li>ABS - syst&egrave;me anti-blocage des roues</li>\r\n	<li>ESP &ndash; Correcteur de trajectoire</li>\r\n	<li>Double Airbag</li>\r\n	<li>Syst&egrave;me d&rsquo;aide au stationnement</li>\r\n	<li>Multiples ports USB</li>\r\n	<li>Fixations Isofix sur banquette arri&egrave;re</li>\r\n</ul>');
/*!40000 ALTER TABLE `van_caracteristique` ENABLE KEYS */;
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

-- Dump completed on 2023-03-08  9:55:33
