-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: db_gaston
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `conseil`
--

DROP TABLE IF EXISTS `conseil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conseil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `printemps` tinyint(3) NOT NULL DEFAULT '0',
  `ete` tinyint(3) NOT NULL DEFAULT '0',
  `automne` tinyint(3) NOT NULL DEFAULT '0',
  `hiver` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conseil`
--

LOCK TABLES `conseil` WRITE;
/*!40000 ALTER TABLE `conseil` DISABLE KEYS */;
INSERT INTO `conseil` VALUES (1,'Profitez du mois de mars pour nettoyer votre potager. Bêchez pour aérer la terre et éliminer les mauvaises herbes, faites un apport d’engrais organique pour l’enrichir.',1,1,1,1),(2,'h - Lorem ipsum dolor sit amet, consectetur adipiscing elit.',0,0,0,1),(3,'ea - Lorem ipsum dolor sit amet, consectetur adipiscing elit.',0,1,1,0),(4,'C’est le moment de sarcler et de biner les massifs. Les légumes primeurs peuvent être semés sous abris, en serre, sous châssis ou tunnels plastique. Carottes, radis, choux, oignons, petits pois, etc, pourront ainsi être consommés dès le mois de mai.',1,0,0,0),(5,'eh - Lorem ipsum dolor sit amet, consectetur adipiscing elit.',0,1,0,1),(6,'Vous pouvez aussi commencer à semer au chaud, à la maison, dans des godets ou des caissettes les graines des légumes d’été : aubergines, concombres, tomates, poivrons, poireaux…',1,0,0,0),(7,'En avril, le sol se réchauffe et les risques de gelée sont moindres. Vous pouvez semer en pleine terre les capucines, les volubilis, les lupins et les nigelles pour agrémenter le potager et y attirer les insectes utiles.',1,0,0,0),(8,'En mai, la terre est suffisamment réchauffée (15 à 20°C) pour accueillir les plants repiqués ou achetés en godets des céleris, cornichons, haricots, tomates, concombres, courgettes, poivrons et melons.',1,1,0,0);
/*!40000 ALTER TABLE `conseil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `contenu` text NOT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'MARTIN','Alfred','martin@truc.fr','Quand est-ce qu\'on mange les carottes ?','9876543210','2017-04-04 11:00:00','0'),(2,'DUPOND','Fabien','dkjd@sjd.dd','Besoin de tailler les haies',NULL,'2017-01-01 12:00:00','2'),(3,'ROGER','Nicolas','dskjf@sjdh.fr','Merci pour les travaux','9966332255','2017-04-04 12:30:00','1'),(4,'DUPONT','Aline','','Besoin d\'un devis pour la tonte des pelouses',NULL,'2007-01-01 00:00:00','2'),(5,'DURAND','Camille','sub.neo@gmail.com','Comme prévu je vous envoi le réglement par chèque','0123456789','2017-04-20 10:23:40','0'),(6,'Clinton','Bill','hilary-loser@gmail.com','snif snif','','2017-04-20 14:33:36','0'),(7,'Clinton','Bill','hilary-loser@gmail.com','snif snif','','2017-04-20 14:35:04','0'),(8,'Clinton','Bill','hilary-loser@gmail.com','pouet','<b>sf</b>','2017-04-20 16:25:39','0'),(9,'sfs','sfs','hilary-loser@gmail.com','vsdfv','sdsdf','2017-04-20 16:29:07','0');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journal`
--

DROP TABLE IF EXISTS `journal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `journal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `contenu` text,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journal`
--

LOCK TABLES `journal` WRITE;
/*!40000 ALTER TABLE `journal` DISABLE KEYS */;
INSERT INTO `journal` VALUES (1,'Plantation des carottes','A vos binettes,on est en mars','2017-03-10 00:00:00'),(3,'Regarnissage de la pelouse','Pelouse regarnit grâce à un engrais naturel','2017-03-20 15:32:00'),(4,'Création d\'un espace piscine zen','Travail de la pelouse et des haies','2017-04-20 12:13:47'),(7,'Taille de printemps','Au printemps, on taille ses haies...','2017-04-20 12:16:12'),(8,'Cultiver un esprit champêtre','Plantez des fleurs des champs....','2017-04-20 12:20:10');
/*!40000 ALTER TABLE `journal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livredor`
--

DROP TABLE IF EXISTS `livredor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livredor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `auteur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livredor`
--

LOCK TABLES `livredor` WRITE;
/*!40000 ALTER TABLE `livredor` DISABLE KEYS */;
INSERT INTO `livredor` VALUES (1,'Très content de la taille de ma haie','Monsieur Patrick'),(2,'Grâce à vous j\'ai le plus le joli massif de fleur du quartier','Madame Joinot'),(3,'Merci pour vos précieux conseils','Madame Lerond'),(4,'Un service de qualité !!!','Monsieur Daviaud');
/*!40000 ALTER TABLE `livredor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametre`
--

DROP TABLE IF EXISTS `parametre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parametre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chezgaston` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametre`
--

LOCK TABLES `parametre` WRITE;
/*!40000 ALTER TABLE `parametre` DISABLE KEYS */;
INSERT INTO `parametre` VALUES (1,1);
/*!40000 ALTER TABLE `parametre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presentation` (
  `id` int(10) unsigned NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentation`
--

LOCK TABLES `presentation` WRITE;
/*!40000 ALTER TABLE `presentation` DISABLE KEYS */;
INSERT INTO `presentation` VALUES (1,'Vous souhaitez profiter de votre jardin ...','« Mettez des vêtements souples et lâches, un grand chapeau de paille, ayez dans une main un râteau, dans l’autre une boisson fraîche... » et indiquez « aux jardins de Gaston » votre projet… ! L’entretien d’un jardin demande de l’expérience mais aussi de l’observation et de la réflexion sur cet environnement si particulier, précieux et unique. Je mets à votre service mon expérience et ma formation dans le domaine horticole pour répondre à vos besoins.'),(2,'Votre jardin est un lieu où vous aimez vous sentir bien...','Votre satisfaction passe par le respect de votre demande. Il est important de se rencontrer pour établir, ensemble, les travaux que vous envisagez, modeste ou plus conséquent, afin d’être en accord sur le résultat final. Je n’interviens qu’après visite préalable à l’établissement d’un devis détaillé des prestations envisagées.'),(3,'Votre jardin est un espace de nature...','C’est un lieu d’équilibre et de quiétude où il faut agir en accord avec l’environnement afin d’optimiser sa fonction d’espace de bien être. Respectons ensemble ce site afin de lui conserver son âme, sans le dénaturer par des opérations hasardeuses. Je n’utilise aucun engrais ou traitements chimiques.');
/*!40000 ALTER TABLE `presentation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestation`
--

DROP TABLE IF EXISTS `prestation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `contenu` text,
  `ordreAff` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestation`
--

LOCK TABLES `prestation` WRITE;
/*!40000 ALTER TABLE `prestation` DISABLE KEYS */;
INSERT INTO `prestation` VALUES (2,'Taille de haies','Taille des haies, arbustes, arbres fruitiers, ...',2),(3,'Entretien des massifs','Entretien des massifs, désherbage, paillage, ... ',3),(4,'Potager','Mise en place et entretien de potagers, ...',4),(5,'Evacuation des déchets végétaux','Evacuation des déchets végétaux, ...',5),(6,'Entretien des extérieurs','Déneigement, peinture, lasure, nettoyage haute pression, ...',6),(9,'Entretien des pelouses','Tonte, émoussage, scarification, regarnissage ...',1);
/*!40000 ALTER TABLE `prestation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realisation`
--

DROP TABLE IF EXISTS `realisation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `realisation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `contenu` text,
  `activation` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realisation`
--

LOCK TABLES `realisation` WRITE;
/*!40000 ALTER TABLE `realisation` DISABLE KEYS */;
INSERT INTO `realisation` VALUES (1,'Taille d\'une haie','Entretien annuel chez un particulier',1),(2,'Taille des haies','Entretien qui a permis retrouver l\'accés d\'un chemin',1),(3,'Paillage d\'un parterre de fleur','Permet de nourrir et protéger le sol',1);
/*!40000 ALTER TABLE `realisation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-20 17:51:55
