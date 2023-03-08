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
-- Table structure for table `agence`
--

DROP TABLE IF EXISTS `agence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_locpro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `visuel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horaires` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `description_en` longtext COLLATE utf8mb4_unicode_ci,
  `description_nl` longtext COLLATE utf8mb4_unicode_ci,
  `description_de` longtext COLLATE utf8mb4_unicode_ci,
  `nom_de` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_nl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_id` int(11) DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_64C19AA94DE7DC5C` (`adresse_id`),
  CONSTRAINT `FK_64C19AA94DE7DC5C` FOREIGN KEY (`adresse_id`) REFERENCES `adresse` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agence`
--

LOCK TABLES `agence` WRITE;
/*!40000 ALTER TABLE `agence` DISABLE KEYS */;
INSERT INTO `agence` VALUES (47,'Agence LYON','AGBSLYON','<p>Location de vans am&eacute;nag&eacute;s au d&eacute;part de Lyon. Lyon est la capitale gastronomique ! Cette ville est travers&eacute;e par 2 fleuves majeurs : le Rh&ocirc;ne et la Sa&ocirc;ne. Elle vous surprendra avec sa multitude de petits bouchons et ses sp&eacute;cialit&eacute;s lyonnaises. Lors de votre road-trip, suite &agrave; votre location de van am&eacute;nag&eacute; &agrave; Lyon, baladez-vous dans les pentes de la Croix-Rousse ! Grimpez jusqu&rsquo;au quartier antique et Fourvi&egrave;re ! Fourvi&egrave;re et Saint-Just font partie du patrimoine mondial de l&rsquo;Unesco. L&rsquo;&eacute;t&eacute;, prenez une dose de soleil au parc de la t&ecirc;te d&rsquo;or et faites une balade en p&eacute;dalo dans le lac ;) N&rsquo;oubliez &eacute;videmment pas de passer par la place Bellecour et de vous promener dans les rues pav&eacute;es jusqu&rsquo;&agrave; H&ocirc;tel de ville ! Vous trouverez les informations n&eacute;cessaires sur notre agence ci-dessus, pour r&eacute;server un fourgon am&eacute;nag&eacute; &agrave; Lyon, ci-dessus.</p>','d979934cc483f7c01c41b6e2355897f2.jpg','+33 9 51 38 88 15','Du lundi au Vendredi : 09h30 - 12h00 / 14h00 - 18h30 Samedi (de Mai à Novembre uniquement) : 09h30 - 12h00 Dimanche : fermé Parking sur place selon disponibilités','[\"Agence propre\"]','<p>Camper van rental from Lyon. Lyon is the gastronomic capital! This city is crossed by 2 major rivers: the Rh&ocirc;ne and the Sa&ocirc;ne. It will surprise you with its multitude of small corks and its specialties from Lyon. During your road trip, following your camper van rental in Lyon, take a walk on the slopes of the Croix-Rousse! Climb to the antique quarter and Fourvi&egrave;re! Fourvi&egrave;re and Saint-Just are part of the UNESCO world heritage. In summer, take a dose of sun at the parc de la t&ecirc;te d&#39;or and take a pedalo ride in the lake;) Don&#39;t forget to pass by Place Bellecour and stroll through the cobbled streets to City Hall ! You will find the necessary information about our agency above, to book a fitted van in Lyon, above.</p>','<p>Camperverhuur uit Lyon. Lyon is de gastronomische hoofdstad! Deze stad wordt doorkruist door 2 grote rivieren: de Rh&ocirc;ne en de Sa&ocirc;ne. Het zal u verrassen met zijn veelheid aan kleine kurken en zijn specialiteiten uit Lyon. Maak tijdens uw roadtrip, na uw huurcamper in Lyon, een wandeling over de hellingen van de Croix-Rousse! Klim naar de antieke wijk en Fourvi&egrave;re! Fourvi&egrave;re en Saint-Just maken deel uit van het UNESCO-werelderfgoed. Neem in de zomer een dosis zon in het park de la t&ecirc;te d&#39;or en maak een waterfietstocht in het meer;) Vergeet niet langs Place Bellecour te lopen en door de geplaveide straten naar het stadhuis te slenteren! U vindt hierboven de nodige informatie over ons bureau om een ​​ingerichte bestelwagen in Lyon te boeken, hierboven.</p>','<p>Wohnmobilvermietung ab Lyon. Lyon ist die gastronomische Hauptstadt! Diese Stadt wird von 2 gro&szlig;en Fl&uuml;ssen durchquert: der Rh&ocirc;ne und der Sa&ocirc;ne. Es wird Sie mit seiner Vielzahl kleiner Korken und seinen Spezialit&auml;ten aus Lyon &uuml;berraschen. Machen Sie w&auml;hrend Ihres Roadtrips nach Ihrer Wohnmobilmiete in Lyon einen Spaziergang auf den H&auml;ngen des Croix-Rousse! Erklimmen Sie das antike Viertel und Fourvi&egrave;re! Fourvi&egrave;re und Saint-Just geh&ouml;ren zum UNESCO-Welterbe. Nehmen Sie im Sommer eine Dosis Sonne im Parc de la t&ecirc;te d&#39;or und machen Sie eine Tretbootfahrt auf dem See;) Vergessen Sie nicht, am Place Bellecour vorbeizufahren und durch die Kopfsteinpflasterstra&szlig;en zum Rathaus zu schlendern! Oben finden Sie die notwendigen Informationen &uuml;ber unsere Agentur, um einen ausgestatteten Van in Lyon zu buchen, oben.</p>','AGENTUR LYON','LYON AGENGY','AGENTSCHAP VAN LYON',0,'contact@blacksheep-van.com',23,NULL,NULL),(48,'Agence LISBONNE','AGBSLISB','<p>xxx</p>','bbfd70c86936751655ec33960db94f54.jpg','+33 9 51 38 88 15','Du lundi au Vendredi : 09h30 - 12h00 / 14h00 - 18h30 Samedi (de Mai à Novembre uniquement) : 09h30 - 12h00 Dimanche : fermé Parking sur place selon disponibilités','[\"Agence propre\"]',NULL,NULL,NULL,NULL,NULL,NULL,1,'contact@blacksheep-van.com',24,NULL,NULL),(49,'Agence AJACCIO','AGLIAJACCIO','<p>Location de vans am&eacute;nag&eacute;s au d&eacute;part d&rsquo;Ajaccio. Cit&eacute; imp&eacute;riale en Corse, Ajaccio est l&rsquo;&icirc;le originaire de Napol&eacute;on. Partez en escapade &agrave; Ajaccio et relaxez-vous le temps d&rsquo;un week-end ou d&rsquo;un court s&eacute;jour. On vous propose la&nbsp;location &nbsp;de&nbsp;van am&eacute;nag&eacute; en&nbsp;Corse ; vous pourrez vous relaxer sur les superbes plages en centre-ville. Vous pourrez prendre le temps de vous poser et de boire un verre sur ses terrasses ensoleill&eacute;es. D&eacute;jeunez les pieds dans l&rsquo;eau gr&acirc;ce aux paillotes ouvertes et &eacute;vadez-vous dans les &icirc;les sanguinaires ! Ajaccio regorge d&rsquo;activit&eacute;s pour les vacanciers en qu&ecirc;te de farniente et de relaxation ! Vous trouverez les informations n&eacute;cessaires sur notre agence de&nbsp;location&nbsp;de&nbsp;vans et fourgons am&eacute;nag&eacute;s situ&eacute;e &agrave;&nbsp;Ajaccio</p>','3690a951c7aa6f0b64d3270721818875.jpg','+33 9 51 38 88 15','Du lundi au Vendredi : 09h30 - 12h00 / 14h00 - 18h30 Samedi (de Mai à Novembre uniquement) : 09h30 - 12h00 Dimanche : fermé Parking sur place selon disponibilités','[\"Agence propre\"]',NULL,NULL,NULL,NULL,NULL,NULL,1,'contact@blacksheep-van.com',25,12,12),(50,'Agence ANGERS','AGLIANG','<p>Location de vans am&eacute;nag&eacute;s au d&eacute;part d&rsquo;Angers. Angers est une ville de l&rsquo;ouest de la France et le si&egrave;ge m&eacute;di&eacute;val de la dynastie des Plantagen&ecirc;ts. D&eacute;tendez-vous dans sa vieille ville dot&eacute;e de maisons &agrave; colombages. Prenez le temps de vous arr&ecirc;ter &agrave; la cath&eacute;drale Saint-Maurice ! Ne manquez pas non plus la charmante place Ste-Croix avec la maison d&rsquo;Adam. Durant votre road-trip en van &agrave; Angers, allez visiter le ch&acirc;teau d&rsquo;Angers situ&eacute; en plein c&oelig;ur de la ville. Poursuivez votre s&eacute;jour en rejoignant la vaste place du Ralliement. Pour les amateurs d&rsquo;art : visitez la galerie David d&rsquo;Angers qui abrite les &oelig;uvres du c&eacute;l&egrave;bre sculpteur. ;) Vous trouverez les informations n&eacute;cessaires sur notre agence ci-dessus pour r&eacute;server un fourgon am&eacute;nag&eacute; &agrave; Angers.</p>','16d1d8829271312fa10015fcfc533446.jpg','+33 9 51 38 88 15','Du lundi au Vendredi : 09h30 - 12h00 / 14h00 - 18h30 Samedi (de Mai à Novembre uniquement) : 09h30 - 12h00 Dimanche : fermé Parking sur place selon disponibilités','[\"Franchise\"]',NULL,NULL,NULL,NULL,NULL,NULL,1,'contact@blacksheep-van.com',26,12,12);
/*!40000 ALTER TABLE `agence` ENABLE KEYS */;
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
