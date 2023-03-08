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
-- Table structure for table `campervan`
--

DROP TABLE IF EXISTS `campervan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campervan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modele` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `visite_virtuelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visuel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lien_descriptif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_locpro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci,
  `description_de` longtext COLLATE utf8mb4_unicode_ci,
  `description_nl` longtext COLLATE utf8mb4_unicode_ci,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caracteristiques_id` int(11) DEFAULT NULL,
  `img_gallery_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6891BB7FEA0ED812` (`img_gallery_id`),
  KEY `IDX_6891BB7FB2639FE4` (`caracteristiques_id`),
  CONSTRAINT `FK_6891BB7FB2639FE4` FOREIGN KEY (`caracteristiques_id`) REFERENCES `van_caracteristique` (`id`),
  CONSTRAINT `FK_6891BB7FEA0ED812` FOREIGN KEY (`img_gallery_id`) REFERENCES `img_gallery` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campervan`
--

LOCK TABLES `campervan` WRITE;
/*!40000 ALTER TABLE `campervan` DISABLE KEYS */;
INSERT INTO `campervan` VALUES (3,'Baroudeur California','VOLKSWAGEN California T6.1','<p>Le van am&eacute;nag&eacute; Volkswagen California T6.1 gamme Baroudeur vous surprendra par son confort et sa facilit&eacute; d&rsquo;utilisation. Avec ses 4 places assises et 4 couchages, id&eacute;al pour partir en road-trip et explorer de nouvelles destinations afin des vivre des exp&eacute;riences en toute libert&eacute; !</p>','a:0:{}','http://storage.net-fs.com/hosting/6256320/87/','41f231170e14ba6382fad7301ea86c3a.jpg','https://admin.blacksheep-van.com/wp-content/uploads/2022/05/fiche-technique-baroudeur-california-1.pdf','INDIV_CALIF','<p>The Volkswagen California T6.1 Baroudeur range camper van will surprise you with its comfort and ease of use. With its 4 seats and 4 beds, ideal for going on a road trip and exploring new destinations in order to live experiences in complete freedom!</p>','<p>Das Reisemobil der Baureihe Volkswagen California T6.1 Baroudeur wird Sie mit seinem Komfort und seiner Benutzerfreundlichkeit &uuml;berraschen. Mit seinen 4 Sitzen und 4 Betten ist es ideal, um einen Roadtrip zu unternehmen und neue Ziele zu erkunden, um Erfahrungen in v&ouml;lliger Freiheit zu erleben!</p>','<p>De camper van de Volkswagen California T6.1 Baroudeur-reeks zal u verrassen door zijn comfort en gebruiksgemak. Met zijn 4 zitplaatsen en 4 bedden, ideaal om op roadtrip te gaan en nieuwe bestemmingen te verkennen om ervaringen in alle vrijheid te beleven!</p>','À partir de 119€/jour',1,3),(4,'California Winter Edition','VOLKSWAGEN California T6.1','<h2>Le Baroudeur California Winter aka le petit nid douillet au pied des remont&eacute;es m&eacute;caniques</h2>\r\n\r\n<p>Le best seller Blacksheep rev&ecirc;t sa robe hivernale pour vous amener au pied des pistes ou des faces vierges. Cuisine am&eacute;nag&eacute;e, chauffage stationnaire : de quoi partir en weekend ou &agrave; la semaine sillonner les montagnes ! Blacksheep vous offre votre bonnet et votre bi&egrave;re avec le Pack Winter, profitez-en !</p>','a:0:{}','https://www.blacksheep-van.com/visite-virtuelle/california-winter-edition/','f259ef0ca143bbdbbf27c536c7be1ac5.webp','https://admin.blacksheep-van.com/wp-content/uploads/2022/05/fiche-technique-campervan-mini.pdf','ID_WKB','X','X','X','À partir de 85€/jour',1,6),(5,'Campervan Mini','VOLKSWAGEN Caddy California ou EGOE','<h2>Le mini van id&eacute;al pour les petits budgets</h2>\r\n\r\n<p>Ce mini van am&eacute;nag&eacute; Volkswagen Caddy California offre un espace int&eacute;rieur optimal pour un couchage 2 places. Il offre &eacute;galement un am&eacute;nagement ext&eacute;rieur. Id&eacute;al pour ceux qui ne sont pas &agrave; l&rsquo;aise pour conduire un &ldquo;gros&rdquo; van am&eacute;nag&eacute;.</p>','a:0:{}','https://www.blacksheep-van.com/visite-virtuelle/location-mini-van/','9ec44caff3dd5a253c949a84de3f4ffb.webp','https://admin.blacksheep-van.com/wp-content/uploads/2022/05/fiche-technique-campervan-mini.pdf','ID_CAMP',NULL,NULL,NULL,'À partir de 79€/jour',2,4),(6,'Baroudeur +','Ford Copa Bürstner C530','<p>Le van am&eacute;nag&eacute; Ford Copa 530 vous permettra de partir en road-trip sans n&eacute;gliger le confort gr&acirc;ce aux WC int&eacute;gr&eacute;s. Avec ses 4 places assises et 4 couchages, vous b&eacute;n&eacute;ficierez d&rsquo;un grand confort lors de vos nouvelles exp&eacute;riences outdoor.</p>','a:0:{}','#','5889096ef01a82e9ba50e8cc8ec9298b.webp','#','Baroudeur +','Test','Test','Test','À partir de 109€/jour',2,5),(8,'BAROUDEUR MARCO POLO','MERCEDES Marco Polo','<p>Le van am&eacute;nag&eacute; Mercedes Marco Polo vous permettra de partir en road-trip sans n&eacute;gliger le confort. Avec ses 4 places assises et 4 couchages, vous b&eacute;n&eacute;ficierez d&rsquo;un grand confort lors de vos nouvelles exp&eacute;riences outdoor.</p>','a:0:{}','https://www.blacksheep-van.com/visite-virtuelle/mercedes-marco-polo/','c14cafd6e45c98e34cd377684f22bca3.jpg','https://admin.blacksheep-van.com/wp-content/uploads/2022/08/fiche-technique-baroudeur-plus.pdf','indiv_',NULL,NULL,NULL,'À partir de 119€/jour',4,NULL);
/*!40000 ALTER TABLE `campervan` ENABLE KEYS */;
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

-- Dump completed on 2023-03-08  9:55:38
