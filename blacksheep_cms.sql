-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2023 at 02:14 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blacksheep_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

CREATE TABLE `adresse` (
  `id` int NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adresse`
--

INSERT INTO `adresse` (`id`, `number`, `street`, `zipcode`, `city`, `country`) VALUES
(23, '430', 'Rue du Companet', '69140', 'RILLEUX LA PAPE', 'FRANCE'),
(24, '11', 'Rue du Truc', '01500', 'AMBRONAY', 'PORTUGAL'),
(25, '12', 'rue de la Corse', '20129', 'AJACCIO', 'FRANCE'),
(26, '13', 'Rue Joseph FOURIER', '49070', 'BEAUCOUZÉ', 'FRANCE'),
(27, '14', 'Montée de la Gargouille', '01500', 'AMBRONAY', 'FRANCE'),
(28, '4', 'Place de Trucs', '69001', 'LYON', 'FRANCE'),
(29, '22', 'Rue de Picardie', '75003', 'PARIS', 'FRANCE');

-- --------------------------------------------------------

--
-- Table structure for table `adresse_agence`
--

CREATE TABLE `adresse_agence` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

CREATE TABLE `agence` (
  `id` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_locpro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `visuel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `horaires` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `description_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_nl` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_de` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nom_de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_nl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_id` int DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agence`
--

INSERT INTO `agence` (`id`, `nom`, `id_locpro`, `description`, `visuel`, `telephone`, `horaires`, `type`, `description_en`, `description_nl`, `description_de`, `nom_de`, `nom_en`, `nom_nl`, `active`, `email`, `adresse_id`, `longitude`, `latitude`) VALUES
(47, 'Agence LYON', 'AGBSLYON', '<p>Location de vans am&eacute;nag&eacute;s au d&eacute;part de Lyon. Lyon est la capitale gastronomique ! Cette ville est travers&eacute;e par 2 fleuves majeurs : le Rh&ocirc;ne et la Sa&ocirc;ne. Elle vous surprendra avec sa multitude de petits bouchons et ses sp&eacute;cialit&eacute;s lyonnaises. Lors de votre road-trip, suite &agrave; votre location de van am&eacute;nag&eacute; &agrave; Lyon, baladez-vous dans les pentes de la Croix-Rousse ! Grimpez jusqu&rsquo;au quartier antique et Fourvi&egrave;re ! Fourvi&egrave;re et Saint-Just font partie du patrimoine mondial de l&rsquo;Unesco. L&rsquo;&eacute;t&eacute;, prenez une dose de soleil au parc de la t&ecirc;te d&rsquo;or et faites une balade en p&eacute;dalo dans le lac ;) N&rsquo;oubliez &eacute;videmment pas de passer par la place Bellecour et de vous promener dans les rues pav&eacute;es jusqu&rsquo;&agrave; H&ocirc;tel de ville ! Vous trouverez les informations n&eacute;cessaires sur notre agence ci-dessus, pour r&eacute;server un fourgon am&eacute;nag&eacute; &agrave; Lyon, ci-dessus.</p>', 'd979934cc483f7c01c41b6e2355897f2.jpg', '+33 9 51 38 88 15', 'Du lundi au Vendredi : 09h30 - 12h00 / 14h00 - 18h30 Samedi (de Mai à Novembre uniquement) : 09h30 - 12h00 Dimanche : fermé Parking sur place selon disponibilités', '[\"Agence propre\"]', '<p>Camper van rental from Lyon. Lyon is the gastronomic capital! This city is crossed by 2 major rivers: the Rh&ocirc;ne and the Sa&ocirc;ne. It will surprise you with its multitude of small corks and its specialties from Lyon. During your road trip, following your camper van rental in Lyon, take a walk on the slopes of the Croix-Rousse! Climb to the antique quarter and Fourvi&egrave;re! Fourvi&egrave;re and Saint-Just are part of the UNESCO world heritage. In summer, take a dose of sun at the parc de la t&ecirc;te d&#39;or and take a pedalo ride in the lake;) Don&#39;t forget to pass by Place Bellecour and stroll through the cobbled streets to City Hall ! You will find the necessary information about our agency above, to book a fitted van in Lyon, above.</p>', '<p>Camperverhuur uit Lyon. Lyon is de gastronomische hoofdstad! Deze stad wordt doorkruist door 2 grote rivieren: de Rh&ocirc;ne en de Sa&ocirc;ne. Het zal u verrassen met zijn veelheid aan kleine kurken en zijn specialiteiten uit Lyon. Maak tijdens uw roadtrip, na uw huurcamper in Lyon, een wandeling over de hellingen van de Croix-Rousse! Klim naar de antieke wijk en Fourvi&egrave;re! Fourvi&egrave;re en Saint-Just maken deel uit van het UNESCO-werelderfgoed. Neem in de zomer een dosis zon in het park de la t&ecirc;te d&#39;or en maak een waterfietstocht in het meer;) Vergeet niet langs Place Bellecour te lopen en door de geplaveide straten naar het stadhuis te slenteren! U vindt hierboven de nodige informatie over ons bureau om een ​​ingerichte bestelwagen in Lyon te boeken, hierboven.</p>', '<p>Wohnmobilvermietung ab Lyon. Lyon ist die gastronomische Hauptstadt! Diese Stadt wird von 2 gro&szlig;en Fl&uuml;ssen durchquert: der Rh&ocirc;ne und der Sa&ocirc;ne. Es wird Sie mit seiner Vielzahl kleiner Korken und seinen Spezialit&auml;ten aus Lyon &uuml;berraschen. Machen Sie w&auml;hrend Ihres Roadtrips nach Ihrer Wohnmobilmiete in Lyon einen Spaziergang auf den H&auml;ngen des Croix-Rousse! Erklimmen Sie das antike Viertel und Fourvi&egrave;re! Fourvi&egrave;re und Saint-Just geh&ouml;ren zum UNESCO-Welterbe. Nehmen Sie im Sommer eine Dosis Sonne im Parc de la t&ecirc;te d&#39;or und machen Sie eine Tretbootfahrt auf dem See;) Vergessen Sie nicht, am Place Bellecour vorbeizufahren und durch die Kopfsteinpflasterstra&szlig;en zum Rathaus zu schlendern! Oben finden Sie die notwendigen Informationen &uuml;ber unsere Agentur, um einen ausgestatteten Van in Lyon zu buchen, oben.</p>', 'AGENTUR LYON', 'LYON AGENGY', 'AGENTSCHAP VAN LYON', 0, 'contact@blacksheep-van.com', 23, NULL, NULL),
(48, 'Agence LISBONNE', 'AGBSLISB', '<p>xxx</p>', 'bbfd70c86936751655ec33960db94f54.jpg', '+33 9 51 38 88 15', 'Du lundi au Vendredi : 09h30 - 12h00 / 14h00 - 18h30 Samedi (de Mai à Novembre uniquement) : 09h30 - 12h00 Dimanche : fermé Parking sur place selon disponibilités', '[\"Agence propre\"]', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'contact@blacksheep-van.com', 24, NULL, NULL),
(49, 'Agence AJACCIO', 'AGLIAJACCIO', '<p>Location de vans am&eacute;nag&eacute;s au d&eacute;part d&rsquo;Ajaccio. Cit&eacute; imp&eacute;riale en Corse, Ajaccio est l&rsquo;&icirc;le originaire de Napol&eacute;on. Partez en escapade &agrave; Ajaccio et relaxez-vous le temps d&rsquo;un week-end ou d&rsquo;un court s&eacute;jour. On vous propose la&nbsp;location &nbsp;de&nbsp;van am&eacute;nag&eacute; en&nbsp;Corse ; vous pourrez vous relaxer sur les superbes plages en centre-ville. Vous pourrez prendre le temps de vous poser et de boire un verre sur ses terrasses ensoleill&eacute;es. D&eacute;jeunez les pieds dans l&rsquo;eau gr&acirc;ce aux paillotes ouvertes et &eacute;vadez-vous dans les &icirc;les sanguinaires ! Ajaccio regorge d&rsquo;activit&eacute;s pour les vacanciers en qu&ecirc;te de farniente et de relaxation ! Vous trouverez les informations n&eacute;cessaires sur notre agence de&nbsp;location&nbsp;de&nbsp;vans et fourgons am&eacute;nag&eacute;s situ&eacute;e &agrave;&nbsp;Ajaccio</p>', '3690a951c7aa6f0b64d3270721818875.jpg', '+33 9 51 38 88 15', 'Du lundi au Vendredi : 09h30 - 12h00 / 14h00 - 18h30 Samedi (de Mai à Novembre uniquement) : 09h30 - 12h00 Dimanche : fermé Parking sur place selon disponibilités', '[\"Agence propre\"]', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'contact@blacksheep-van.com', 25, 12, 12),
(50, 'Agence ANGERS', 'AGLIANG', '<p>Location de vans am&eacute;nag&eacute;s au d&eacute;part d&rsquo;Angers. Angers est une ville de l&rsquo;ouest de la France et le si&egrave;ge m&eacute;di&eacute;val de la dynastie des Plantagen&ecirc;ts. D&eacute;tendez-vous dans sa vieille ville dot&eacute;e de maisons &agrave; colombages. Prenez le temps de vous arr&ecirc;ter &agrave; la cath&eacute;drale Saint-Maurice ! Ne manquez pas non plus la charmante place Ste-Croix avec la maison d&rsquo;Adam. Durant votre road-trip en van &agrave; Angers, allez visiter le ch&acirc;teau d&rsquo;Angers situ&eacute; en plein c&oelig;ur de la ville. Poursuivez votre s&eacute;jour en rejoignant la vaste place du Ralliement. Pour les amateurs d&rsquo;art : visitez la galerie David d&rsquo;Angers qui abrite les &oelig;uvres du c&eacute;l&egrave;bre sculpteur. ;) Vous trouverez les informations n&eacute;cessaires sur notre agence ci-dessus pour r&eacute;server un fourgon am&eacute;nag&eacute; &agrave; Angers.</p>', '16d1d8829271312fa10015fcfc533446.jpg', '+33 9 51 38 88 15', 'Du lundi au Vendredi : 09h30 - 12h00 / 14h00 - 18h30 Samedi (de Mai à Novembre uniquement) : 09h30 - 12h00 Dimanche : fermé Parking sur place selon disponibilités', '[\"Franchise\"]', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'contact@blacksheep-van.com', 26, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `assurance`
--

CREATE TABLE `assurance` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_locpro` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assurance`
--

INSERT INTO `assurance` (`id`, `name`, `description`, `id_locpro`) VALUES
(1, 'Assurance TEST', 'CECI EST UN TEST', 'IDTEST');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `date_begin` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `price` bigint NOT NULL,
  `agence_id` int DEFAULT NULL,
  `vehicule_id` int DEFAULT NULL,
  `date_commande` date NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `date_begin`, `date_end`, `price`, `agence_id`, `vehicule_id`, `date_commande`, `user_id`) VALUES
(5, '2023-04-01 12:00:00', '2023-04-04 12:00:00', 1200, 47, 2, '2023-03-09', 23),
(6, '2023-05-16 10:00:00', '2023-05-22 12:30:00', 2560, 48, 2, '2023-03-09', 24),
(7, '2023-12-22 11:00:00', '2024-01-01 23:00:00', 35690, 49, 2, '2023-03-09', 19),
(8, '2023-03-13 12:00:00', '2023-03-16 20:00:00', 25860, 50, 2, '2023-03-10', 23);

-- --------------------------------------------------------

--
-- Table structure for table `campervan`
--

CREATE TABLE `campervan` (
  `id` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modele` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `visite_virtuelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visuel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lien_descriptif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_locpro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_de` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_nl` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caracteristiques_id` int DEFAULT NULL,
  `img_gallery_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campervan`
--

INSERT INTO `campervan` (`id`, `nom`, `modele`, `description`, `options`, `visite_virtuelle`, `visuel`, `lien_descriptif`, `id_locpro`, `description_en`, `description_de`, `description_nl`, `price`, `caracteristiques_id`, `img_gallery_id`) VALUES
(3, 'Baroudeur California', 'VOLKSWAGEN California T6.1', '<p>Le van am&eacute;nag&eacute; Volkswagen California T6.1 gamme Baroudeur vous surprendra par son confort et sa facilit&eacute; d&rsquo;utilisation. Avec ses 4 places assises et 4 couchages, id&eacute;al pour partir en road-trip et explorer de nouvelles destinations afin des vivre des exp&eacute;riences en toute libert&eacute; !</p>', 'a:0:{}', 'http://storage.net-fs.com/hosting/6256320/87/', '41f231170e14ba6382fad7301ea86c3a.jpg', 'https://admin.blacksheep-van.com/wp-content/uploads/2022/05/fiche-technique-baroudeur-california-1.pdf', 'INDIV_CALIF', '<p>The Volkswagen California T6.1 Baroudeur range camper van will surprise you with its comfort and ease of use. With its 4 seats and 4 beds, ideal for going on a road trip and exploring new destinations in order to live experiences in complete freedom!</p>', '<p>Das Reisemobil der Baureihe Volkswagen California T6.1 Baroudeur wird Sie mit seinem Komfort und seiner Benutzerfreundlichkeit &uuml;berraschen. Mit seinen 4 Sitzen und 4 Betten ist es ideal, um einen Roadtrip zu unternehmen und neue Ziele zu erkunden, um Erfahrungen in v&ouml;lliger Freiheit zu erleben!</p>', '<p>De camper van de Volkswagen California T6.1 Baroudeur-reeks zal u verrassen door zijn comfort en gebruiksgemak. Met zijn 4 zitplaatsen en 4 bedden, ideaal om op roadtrip te gaan en nieuwe bestemmingen te verkennen om ervaringen in alle vrijheid te beleven!</p>', 'À partir de 119€/jour', 1, 3),
(4, 'California Winter Edition', 'VOLKSWAGEN California T6.1', '<h2>Le Baroudeur California Winter aka le petit nid douillet au pied des remont&eacute;es m&eacute;caniques</h2>\r\n\r\n<p>Le best seller Blacksheep rev&ecirc;t sa robe hivernale pour vous amener au pied des pistes ou des faces vierges. Cuisine am&eacute;nag&eacute;e, chauffage stationnaire : de quoi partir en weekend ou &agrave; la semaine sillonner les montagnes ! Blacksheep vous offre votre bonnet et votre bi&egrave;re avec le Pack Winter, profitez-en !</p>', 'a:0:{}', 'https://www.blacksheep-van.com/visite-virtuelle/california-winter-edition/', 'f259ef0ca143bbdbbf27c536c7be1ac5.webp', 'https://admin.blacksheep-van.com/wp-content/uploads/2022/05/fiche-technique-campervan-mini.pdf', 'ID_WKB', '<p>X</p>', '<p>X</p>', '<p>X</p>', 'À partir de 85€/jour', 1, 10),
(5, 'Campervan Mini', 'VOLKSWAGEN Caddy California ou EGOE', '<h2>Le mini van id&eacute;al pour les petits budgets</h2>\r\n\r\n<p>Ce mini van am&eacute;nag&eacute; Volkswagen Caddy California offre un espace int&eacute;rieur optimal pour un couchage 2 places. Il offre &eacute;galement un am&eacute;nagement ext&eacute;rieur. Id&eacute;al pour ceux qui ne sont pas &agrave; l&rsquo;aise pour conduire un &ldquo;gros&rdquo; van am&eacute;nag&eacute;.</p>', 'a:0:{}', 'https://www.blacksheep-van.com/visite-virtuelle/location-mini-van/', '9ec44caff3dd5a253c949a84de3f4ffb.webp', 'https://admin.blacksheep-van.com/wp-content/uploads/2022/05/fiche-technique-campervan-mini.pdf', 'ID_CAMP', NULL, NULL, NULL, 'À partir de 79€/jour', 2, 4),
(6, 'Baroudeur +', 'Ford Copa Bürstner C530', '<p>Le van am&eacute;nag&eacute; Ford Copa 530 vous permettra de partir en road-trip sans n&eacute;gliger le confort gr&acirc;ce aux WC int&eacute;gr&eacute;s. Avec ses 4 places assises et 4 couchages, vous b&eacute;n&eacute;ficierez d&rsquo;un grand confort lors de vos nouvelles exp&eacute;riences outdoor.</p>', 'a:0:{}', '#', '5889096ef01a82e9ba50e8cc8ec9298b.webp', '#', 'Baroudeur +', '<p>Test</p>', '<p>Test</p>', '<p>Test</p>', 'À partir de 109€/jour', NULL, 9),
(8, 'BAROUDEUR MARCO POLO', 'MERCEDES Marco Polo', '<p>Le van am&eacute;nag&eacute; Mercedes Marco Polo vous permettra de partir en road-trip sans n&eacute;gliger le confort. Avec ses 4 places assises et 4 couchages, vous b&eacute;n&eacute;ficierez d&rsquo;un grand confort lors de vos nouvelles exp&eacute;riences outdoor.</p>', 'a:0:{}', 'https://www.blacksheep-van.com/visite-virtuelle/mercedes-marco-polo/', 'c14cafd6e45c98e34cd377684f22bca3.jpg', 'https://admin.blacksheep-van.com/wp-content/uploads/2022/08/fiche-technique-baroudeur-plus.pdf', 'indiv_', NULL, NULL, NULL, 'À partir de 119€/jour', 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `campervan_agence`
--

CREATE TABLE `campervan_agence` (
  `campervan_id` int NOT NULL,
  `agence_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campervan_agence`
--

INSERT INTO `campervan_agence` (`campervan_id`, `agence_id`) VALUES
(3, 47),
(3, 48),
(3, 49),
(3, 50),
(4, 47),
(4, 50),
(5, 47),
(5, 49),
(6, 47),
(8, 47);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'FAQ'),
(2, 'Blog'),
(3, 'Roadtrip'),
(4, 'xxx');

-- --------------------------------------------------------

--
-- Table structure for table `category_content`
--

CREATE TABLE `category_content` (
  `category_id` int NOT NULL,
  `content_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `h1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `visuel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_de` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `h1_de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `h1_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_nl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_nl` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `h1_nl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_nl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `description`, `h1`, `slug`, `visuel`, `title_de`, `description_de`, `h1_de`, `slug_de`, `title_en`, `description_en`, `h1_en`, `slug_en`, `title_nl`, `description_nl`, `h1_nl`, `slug_nl`) VALUES
(4, 'Page - FAQ', '<p><span style=\"color:#16a085\">xxxx</span></p>', 'FAQ', 'FAQ', '2d3d6a7a772bd9369186a4a4ea856e03.webp', NULL, NULL, 'FAQ', 'FAQ', NULL, NULL, 'FAQ', 'FAQ', NULL, NULL, 'FAQ', 'FAQ'),
(5, 'Page - Roadtrip', '<p>Test de contenu</p>', 'Roadtrip', 'Roadtrip', 'cbbde3d1c34a39f981ee6a313fd512ee.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Page - Contact', '<p>Ceci est une page contact</p>', 'Contact', 'Contact', '4c9a0b2e4669803c8a9142e0a91e5369.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'titre FR', '<p>DESC FR</p>', 'h1 FR', 'slug FR', 'ba8ab404b99bec691d0a6d572419dac7.png', 'titre ALLEMAND', '<p>DESC ALLEMANDE</p>', 'h1 ALLEMAND', 'slug ALLEMAND', 'titre ANGLAIS', '<p>DESC ANGLAISE</p>', 'h1 ANGLAIS', 'slug ANGLAIS', 'titre NÉERLANDAIS', '<p>DESC&nbsp;N&Eacute;ERLANDAISE</p>', 'h1 NÉERLANDAIS', 'slug NÉERLANDAIS');

-- --------------------------------------------------------

--
-- Table structure for table `content_category`
--

CREATE TABLE `content_category` (
  `content_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_category`
--

INSERT INTO `content_category` (`content_id`, `category_id`) VALUES
(4, 1),
(4, 4),
(5, 2),
(5, 3),
(6, 1),
(7, 2),
(7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230309110629', '2023-03-09 11:06:33', 136),
('DoctrineMigrations\\Version20230309115721', '2023-03-09 11:57:34', 22),
('DoctrineMigrations\\Version20230309122940', '2023-03-09 12:29:50', 17),
('DoctrineMigrations\\Version20230309124749', '2023-03-09 12:47:58', 83),
('DoctrineMigrations\\Version20230309130647', '2023-03-09 13:06:53', 60),
('DoctrineMigrations\\Version20230309131639', '2023-03-09 13:16:46', 58),
('DoctrineMigrations\\Version20230309135906', '2023-03-09 13:59:10', 38),
('DoctrineMigrations\\Version20230309143553', '2023-03-09 14:35:57', 83);

-- --------------------------------------------------------

--
-- Table structure for table `img_gallery`
--

CREATE TABLE `img_gallery` (
  `id` int NOT NULL,
  `img_file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:json)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `img_gallery`
--

INSERT INTO `img_gallery` (`id`, `img_file`) VALUES
(1, '[\"d8ddd1f1e73bc2d7dd41e4af4a688b3e.webp\",\"597e6d2412fa0e50f95bd77fb60a1715.webp\",\"ec5018f5069a68dcabb2d87bc85908fe.webp\"]'),
(2, '[\"caca5084983c8bba4e08a22ad608eeb4.webp\",\"ff75172068cd5232c6718d1393d4d1dd.webp\",\"723b529193f79f2ce6e794a131d862b1.webp\",\"c7758719f1a017da6260aef853b36334.webp\"]'),
(3, '[\"1429dfb8368c223c110125bf85c5b3fe.webp\",\"780ce097f8e105c5afdc4cd0eabedb19.webp\",\"5303afd7e0799e7cc7ce79fdea089dbb.webp\"]'),
(4, '[\"91852a018d64f90c9862ccd9cd83a2af.webp\",\"d2f61003fa6b6186d5bad03abea39c16.webp\"]'),
(5, '[\"9284d6f802b608ca027ac49e4486e742.webp\",\"d20aec5b9860fffe09c69c82a69cf905.png\",\"bb213686ec2d192f595ed4853a2e18fd.png\",\"145ce1d5d57421955597e548f91d4a4d.png\",\"29f4cffdffcc6f69f21a8651802d79f5.png\"]'),
(6, '[\"623c009ec3a78e8792609843eee2a9c6.webp\"]'),
(7, '[\"d839ed4e711d06334668414d9174702c.webp\",\"6684b8c79d79a4f3a64a014203f8eebe.webp\",\"fc19325d3f6a8a2fea48dac4a557c9bc.webp\",\"681bc2b6157aeaba3eeb0461b8b1ceb9.webp\"]'),
(8, '[\"e239a0b6a282e6ca3b6a9fa87a4289da.webp\"]'),
(9, '[\"d4787684fe419210067f4982b59d6426.webp\",\"ebe787292c9fe8f175ff534709a911ae.webp\",\"5f288298b1828d4d981d5cf3697925f2.webp\",\"9a4926506cd300d8d1d850e9b3e2e027.webp\"]'),
(10, '[\"2b77c22f0b7440b17de42b104677e5b4.webp\"]');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":4:{i:0;s:30:\\\"reset_password/email.html.twig\\\";i:1;N;i:2;a:1:{s:10:\\\"resetToken\\\";O:58:\\\"SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\\":4:{s:65:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0token\\\";s:40:\\\"SGIbvnqNW9Y1v931kFxkL8XeUhhPjoh6QSQ0FVYD\\\";s:69:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0expiresAt\\\";O:17:\\\"DateTimeImmutable\\\":3:{s:4:\\\"date\\\";s:26:\\\"2023-02-17 11:05:39.522013\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:71:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0generatedAt\\\";i:1676628339;s:73:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0transInterval\\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:26:\\\"contact@blacksheep-van.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:21:\\\"BLACKSHEEP VAN -- CMS\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:26:\\\"fabrice@blacksheep-van.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:27:\\\"Your password reset request\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2023-02-17 10:05:40', '2023-02-17 10:05:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reset_password_request`
--

CREATE TABLE `reset_password_request` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `selector` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_log_in` datetime DEFAULT NULL,
  `picture_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom`, `prenom`, `last_log_in`, `picture_profile`, `phone`, `adresse_id`) VALUES
(9, 'blacksheepdev69@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$f3yH/rF31recsvCZXGrQU.yOiuZepZa5cP2dCzMh17MMacTUc8tHG', 'Admin', 'Dev', '2023-03-09 11:38:50', 'e9ebec96ded5cd97c0b7fcaf99a63936.gif', '+33798652433', NULL),
(14, 'fabrice@blacksheep-van.com', '[\"ROLE_ADMIN\"]', '$2y$13$wqNUegok2Y4dxu49SpetVOb71qQzoSqsU4OlnvyTGSuMKN6HWlmDW', 'VALLES', 'Fabrice', '2023-03-10 11:27:55', 'b6bed2fb5c9683b53d192a075d5757e0.jpg', '0661629817', 27),
(19, 'edouard@blacksheep-van.com', '[\"ROLE_ADMIN\"]', '$2y$13$tlLDOGJAMLzPR7DKTr1xK.YK/jJ7fOOipb4N.KKGwFnb9xH6EJVBG', 'AMOUROUX', 'Edouard', NULL, '4c02e6d7c50792e595c45bacd73e69ad.jpg', '0661626364', NULL),
(20, 'augustin@blacksheep-van.com', '[\"ROLE_ADMIN\"]', '$2y$13$kNZ26yIkGMBn1xtdmYBoJekOREGZz/JhK/7P3XCq300NkuTu7jT8G', 'MAHIEUX', 'Augustin', NULL, '26856bef4480c6c6bfd6c467ba2d5ce7.jpg', '0661626364', NULL),
(21, 'user@free.fr', '[\"ROLE_WEBMASTER\"]', '$2y$13$IVT4W.Yg7JRo2giP.cXXf.ZaRfQBFU3Qx5GEUrOXBRGzsSnaQqJwK', 'USER', 'USER', '2023-03-08 13:56:52', NULL, NULL, NULL),
(22, 'api@blacksheep-van.com', '[\"ROLE_CLIENT_API\"]', '$2y$13$LCh8.2MXgJI1QCMD2vnd5O170B50yokOhsImKckTnY57xSYeJPEJK', 'API', 'USER', '2023-03-08 13:49:11', 'db2f16b401f89ee212c7971d37037f97.png', '0661629817', NULL),
(23, 'm.martin@free.fr', '[\"ROLE_CLIENT_BLACKSHEEP\"]', '$2y$13$hmtl8.Vzg/j/dn5kdc0j1OztFvmVW6vSiAuZxS3jyFOnQFjyhBWya', 'MARTIN', 'Michel', '2023-03-10 10:20:19', NULL, '0661626367', 28),
(24, 'test@orange.fr', '[\"ROLE_CLIENT_BLACKSHEEP\"]', '$2y$13$842OJlvSmp85j/o4OdikIe0G/01FpuUutsivJDnWQOVYWxVzRmUyC', 'CLAVIER', 'Christian', NULL, '3fc406072c84ce3ecbb1fd27808c1d59.webp', '0661626364', 29);

-- --------------------------------------------------------

--
-- Table structure for table `user_agence`
--

CREATE TABLE `user_agence` (
  `user_id` int NOT NULL,
  `agence_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_agence`
--

INSERT INTO `user_agence` (`user_id`, `agence_id`) VALUES
(9, 47),
(14, 47),
(14, 48),
(14, 49),
(14, 50),
(19, 47),
(19, 48),
(19, 49),
(19, 50),
(22, 47);

-- --------------------------------------------------------

--
-- Table structure for table `van_caracteristique`
--

CREATE TABLE `van_caracteristique` (
  `id` int NOT NULL,
  `visuel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `performances` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimensions` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layout` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `van_caracteristique`
--

INSERT INTO `van_caracteristique` (`id`, `visuel`, `description`, `nom`, `engine`, `performances`, `dimensions`, `layout`, `equipment`) VALUES
(1, NULL, '<ul>\r\n	<li>Diesel &ndash; boite manuelle ou automatique</li>\r\n	<li>5 places</li>\r\n	<li>5 couchages (2 adultes + 3 enfants)</li>\r\n	<li>Douchette int&eacute;gr&eacute;e et toilettes en option</li>\r\n</ul>', 'BAROUDEUR CALIFORNIA', '<ul>\r\n	<li>Motorisation : 2.0 TDI EU6</li>\r\n	<li>Cylindr&eacute;e : 1968.00 cm3</li>\r\n	<li>Nombre de vitesses : M&eacute;canique 6 ou automatique 7</li>\r\n</ul>', '<ul>\r\n	<li>Consommation mixte : 7.6 L/100km</li>\r\n	<li>Vitesse maximale : 178 km/h</li>\r\n	<li>Emissions de CO2 : 198 g/km</li>\r\n	<li>Norme anti-pollution : Euro 6</li>\r\n</ul>', '<ul>\r\n	<li>Longueur : 4,90 m</li>\r\n	<li>Largeur : 2,3 m</li>\r\n	<li>Hauteur : 1,99 m</li>\r\n	<li>Empattement : 3m</li>\r\n	<li>Superficie espace passagers : 4 m2</li>\r\n	<li>Nombre de places assises : 4</li>\r\n	<li>Volume du coffre : 5100 L</li>\r\n	<li>Poids &agrave; vide : 2472 kg</li>\r\n</ul>', '<ul>\r\n	<li>Plaque de cuisson &agrave; gaz 2 feux</li>\r\n	<li>Frigo de 42L</li>\r\n	<li>Evier int&eacute;rieur (r&eacute;serve eau propre 24.2L)</li>\r\n	<li>Douchette ext&eacute;rieure</li>\r\n	<li>Chauffage stationnaire &agrave; air</li>\r\n	<li>Toit relevable &eacute;lectro-hydraulique</li>\r\n	<li>2 lits-double (115X200 cm et 200x120cm)</li>\r\n	<li>Table int&eacute;rieure</li>\r\n	<li>Store ext&eacute;rieur</li>\r\n	<li>Table ext&eacute;rieure dans porte coulissante</li>\r\n	<li>2 chaises pliantes dans le hayon</li>\r\n	<li>2 tabourets additionnels</li>\r\n	<li>Prise d&rsquo;alimentation externe 230V</li>\r\n	<li>Convertisseur continu-alternatif 230V</li>\r\n	<li>R&eacute;serve eaux propres 30L</li>\r\n	<li>R&eacute;serve eaux sales 30L</li>\r\n	<li>Circuit d&rsquo;eau avec pompe &eacute;lectrique</li>\r\n</ul>', '<ul>\r\n	<li>R&eacute;gulateur et limitateur de vitesse</li>\r\n	<li>Climatisation</li>\r\n	<li>Vitres avant &eacute;lectrique</li>\r\n	<li>Prises 12V &agrave; de multiples endroits</li>\r\n	<li>Fermeture centralis&eacute;e</li>\r\n	<li>Autoradio avec &eacute;cran tactile</li>\r\n	<li>ABS - syst&egrave;me anti-blocage des roues</li>\r\n	<li>ESP &ndash; Correcteur de trajectoire</li>\r\n	<li>Double Airbag</li>\r\n	<li>Syst&egrave;me d&rsquo;aide au stationnement</li>\r\n	<li>2 batteries auxiliaires</li>\r\n	<li>Multiples ports USB-C</li>\r\n	<li>Fixations Isofix sur banquette arri&egrave;re</li>\r\n</ul>'),
(2, NULL, '<ul>\r\n	<li>&nbsp;&nbsp;&nbsp; Diesel - bo&icirc;te manuelle ou automatique</li>\r\n	<li>&nbsp;&nbsp;&nbsp; 2 couchages</li>\r\n	<li>&nbsp;&nbsp;&nbsp; 5 places</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Douchette int&eacute;gr&eacute;e et toilettes en option</li>\r\n</ul>', 'CAMPERVAN MINI', '<div class=\"grid grid-cols-1 lg:mb-0 mb-14 relative\">\r\n<p><strong>Motorisation </strong>: 2.0 TDI EU6<br />\r\n<strong>Cylindr&eacute;e </strong>: 1968.00 cm3<br />\r\n<strong>Nombre de vitesses</strong> : M&eacute;canique 5 ou automatique 6</p>\r\n</div>', NULL, NULL, NULL, NULL),
(4, NULL, '<ul>\r\n	<li>Diesel &ndash; bo&icirc;te automatique</li>\r\n	<li>4 places</li>\r\n	<li>4 couchages</li>\r\n	<li>5,14m x 1,93 m x 1,99 m</li>\r\n</ul>', 'BAROUDEUR MARCO POLO', '<ul>\r\n	<li>Motorisation : 250 CDI</li>\r\n	<li>Cylindr&eacute;e : 2 143 cm&sup3;</li>\r\n</ul>', '<div class=\"grid grid-cols-1 lg:mb-0 mb-14 relative\">\r\n<ul>\r\n	<li>Consommation mixte : 5.9 L/100km</li>\r\n	<li>Vitesse maximale : 206 km/h</li>\r\n	<li>Emissions de CO2 : 154g/km</li>\r\n	<li>Norme anti-pollution : Euro 6</li>\r\n</ul>\r\n</div>', '<ul>\r\n	<li>Longueur : 5,14 m</li>\r\n	<li>Largeur : 1,93 m</li>\r\n	<li>Hauteur : 1,98 m</li>\r\n	<li>Empattement : 3,2m</li>\r\n	<li>Superficie espace passagers : 4 m&sup2;</li>\r\n	<li>Nombre de places assises :</li>\r\n	<li>Volume du coffre : 670 L</li>\r\n	<li>Poids &agrave; vide : 2440 kg</li>\r\n</ul>', '<ul>\r\n	<li>Plaque de cuisson &agrave; gaz 2 feux</li>\r\n	<li>Glaci&egrave;re de 40L</li>\r\n	<li>Evier int&eacute;rieur</li>\r\n	<li>Douchette ext&eacute;rieure</li>\r\n	<li>Chauffage stationnaire &agrave; air</li>\r\n	<li>Toit relevable</li>\r\n	<li>2 lits-double (113X203 cm et 113x205 cm)</li>\r\n	<li>Table int&eacute;rieure</li>\r\n	<li>Store ext&eacute;rieur</li>\r\n	<li>Table ext&eacute;rieure</li>\r\n	<li>2 chaises pliantes</li>\r\n	<li>2 tabourets additionnels</li>\r\n	<li>Prise d&rsquo;alimentation externe 230V</li>\r\n	<li>Prise 230V</li>\r\n	<li>R&eacute;serve eaux propres 38L</li>\r\n	<li>R&eacute;serve eaux sales 40L</li>\r\n	<li>Circuit d&rsquo;eau avec pompe &eacute;lectrique</li>\r\n</ul>', '<ul>\r\n	<li>R&eacute;gulateur et limitateur de vitesse</li>\r\n	<li>Climatisation</li>\r\n	<li>Vitres avant &eacute;lectrique</li>\r\n	<li>Prises 12V &agrave; de multiples endroits</li>\r\n	<li>Fermeture centralis&eacute;e</li>\r\n	<li>Autoradio avec &eacute;cran tactile</li>\r\n	<li>ABS - syst&egrave;me anti-blocage des roues</li>\r\n	<li>ESP &ndash; Correcteur de trajectoire</li>\r\n	<li>Double Airbag</li>\r\n	<li>Syst&egrave;me d&rsquo;aide au stationnement</li>\r\n	<li>Multiples ports USB</li>\r\n	<li>Fixations Isofix sur banquette arri&egrave;re</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
--

CREATE TABLE `vehicule` (
  `id` int NOT NULL,
  `immatriculation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_immatriculation` date DEFAULT NULL,
  `numero_serie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kilometrage` int DEFAULT NULL,
  `date_kilometrage` date DEFAULT NULL,
  `entree_parc` date DEFAULT NULL,
  `sortie_parc` date DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campervan_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicule`
--

INSERT INTO `vehicule` (`id`, `immatriculation`, `date_immatriculation`, `numero_serie`, `kilometrage`, `date_kilometrage`, `entree_parc`, `sortie_parc`, `statut`, `campervan_id`) VALUES
(2, 'AA-123-AA', '2020-02-15', '123ABC', 69200, '2022-04-03', '2021-01-02', NULL, 'Réservé', 3),
(3, 'BB-345-BB', '2021-04-02', '123ABC', 20550, '2022-07-04', '2022-07-02', NULL, NULL, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adresse_agence`
--
ALTER TABLE `adresse_agence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_64C19AA94DE7DC5C` (`adresse_id`);

--
-- Indexes for table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E00CEDDED725330D` (`agence_id`),
  ADD KEY `IDX_E00CEDDE4A4A3511` (`vehicule_id`),
  ADD KEY `IDX_E00CEDDEA76ED395` (`user_id`);

--
-- Indexes for table `campervan`
--
ALTER TABLE `campervan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_6891BB7FEA0ED812` (`img_gallery_id`),
  ADD KEY `IDX_6891BB7FB2639FE4` (`caracteristiques_id`);

--
-- Indexes for table `campervan_agence`
--
ALTER TABLE `campervan_agence`
  ADD PRIMARY KEY (`campervan_id`,`agence_id`),
  ADD KEY `IDX_E52BEF12B9D53E94` (`campervan_id`),
  ADD KEY `IDX_E52BEF12D725330D` (`agence_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_content`
--
ALTER TABLE `category_content`
  ADD PRIMARY KEY (`category_id`,`content_id`),
  ADD KEY `IDX_391D70D712469DE2` (`category_id`),
  ADD KEY `IDX_391D70D784A0A3ED` (`content_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_category`
--
ALTER TABLE `content_category`
  ADD PRIMARY KEY (`content_id`,`category_id`),
  ADD KEY `IDX_54FBF32E84A0A3ED` (`content_id`),
  ADD KEY `IDX_54FBF32E12469DE2` (`category_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `img_gallery`
--
ALTER TABLE `img_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CE748AA76ED395` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_8D93D6494DE7DC5C` (`adresse_id`);

--
-- Indexes for table `user_agence`
--
ALTER TABLE `user_agence`
  ADD PRIMARY KEY (`user_id`,`agence_id`),
  ADD KEY `IDX_1938194A76ED395` (`user_id`),
  ADD KEY `IDX_1938194D725330D` (`agence_id`);

--
-- Indexes for table `van_caracteristique`
--
ALTER TABLE `van_caracteristique`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_292FFF1DB9D53E94` (`campervan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `adresse_agence`
--
ALTER TABLE `adresse_agence`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agence`
--
ALTER TABLE `agence`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `assurance`
--
ALTER TABLE `assurance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `campervan`
--
ALTER TABLE `campervan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `img_gallery`
--
ALTER TABLE `img_gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `van_caracteristique`
--
ALTER TABLE `van_caracteristique`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agence`
--
ALTER TABLE `agence`
  ADD CONSTRAINT `FK_64C19AA94DE7DC5C` FOREIGN KEY (`adresse_id`) REFERENCES `adresse` (`id`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_E00CEDDE4A4A3511` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`id`),
  ADD CONSTRAINT `FK_E00CEDDEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_E00CEDDED725330D` FOREIGN KEY (`agence_id`) REFERENCES `agence` (`id`);

--
-- Constraints for table `campervan`
--
ALTER TABLE `campervan`
  ADD CONSTRAINT `FK_6891BB7FB2639FE4` FOREIGN KEY (`caracteristiques_id`) REFERENCES `van_caracteristique` (`id`),
  ADD CONSTRAINT `FK_6891BB7FEA0ED812` FOREIGN KEY (`img_gallery_id`) REFERENCES `img_gallery` (`id`);

--
-- Constraints for table `campervan_agence`
--
ALTER TABLE `campervan_agence`
  ADD CONSTRAINT `FK_E52BEF12B9D53E94` FOREIGN KEY (`campervan_id`) REFERENCES `campervan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E52BEF12D725330D` FOREIGN KEY (`agence_id`) REFERENCES `agence` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_content`
--
ALTER TABLE `category_content`
  ADD CONSTRAINT `FK_391D70D712469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_391D70D784A0A3ED` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `content_category`
--
ALTER TABLE `content_category`
  ADD CONSTRAINT `FK_54FBF32E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_54FBF32E84A0A3ED` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6494DE7DC5C` FOREIGN KEY (`adresse_id`) REFERENCES `adresse` (`id`);

--
-- Constraints for table `user_agence`
--
ALTER TABLE `user_agence`
  ADD CONSTRAINT `FK_1938194A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1938194D725330D` FOREIGN KEY (`agence_id`) REFERENCES `agence` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `FK_292FFF1DB9D53E94` FOREIGN KEY (`campervan_id`) REFERENCES `campervan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
