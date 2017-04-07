-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: db_gaston
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
INSERT INTO `conseil` VALUES (1,'peah - Lorem ipsum dolor sit amet, consectetur adipiscing elit.',1,1,1,1),(2,'h - Lorem ipsum dolor sit amet, consectetur adipiscing elit.',0,0,0,1),(3,'ea - Lorem ipsum dolor sit amet, consectetur adipiscing elit.',0,1,1,0),(4,'p - Lorem ipsum dolor sit amet, consectetur adipiscing elit.',1,0,0,0),(5,'eh - Lorem ipsum dolor sit amet, consectetur adipiscing elit.',0,1,0,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'MARTIN','Alfred','martin@truc.fr','Quand est-ce qu\'on mange les carottes ?',NULL,'2017-04-04 11:00:00','0'),(2,'DUPOND',NULL,'dkjd@sjd.dd','Truc soiejeofijsofjdsijdfijsd',NULL,'2017-01-01 12:00:00','2'),(3,'ROGER','','dskjf@sjdh.fr','WAZAAAAAA !',NULL,'2017-04-04 12:30:00','1'),(4,'KJLJ',NULL,'kjh@ug.fr','soiufpoiusfpozeui',NULL,'2007-01-01 00:00:00','3');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journal`
--

LOCK TABLES `journal` WRITE;
/*!40000 ALTER TABLE `journal` DISABLE KEYS */;
INSERT INTO `journal` VALUES (1,'Plantation des carottes','A vos binettes,on est en mars','2107-03-10 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livredor`
--

LOCK TABLES `livredor` WRITE;
/*!40000 ALTER TABLE `livredor` DISABLE KEYS */;
INSERT INTO `livredor` VALUES (1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Monsieur X'),(2,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Madame Y'),(3,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Schtroumf'),(4,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Martien zorglub');
/*!40000 ALTER TABLE `livredor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presentation` (
  `id` int(10) unsigned NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentation`
--

LOCK TABLES `presentation` WRITE;
/*!40000 ALTER TABLE `presentation` DISABLE KEYS */;
INSERT INTO `presentation` VALUES (1,'Bienvenue dans les jardins de Gaston','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'),(2,'Valeur 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'),(3,'Valeur 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.');
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
  `ordreaff` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ordreaff` (`ordreaff`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestation`
--

LOCK TABLES `prestation` WRITE;
/*!40000 ALTER TABLE `prestation` DISABLE KEYS */;
INSERT INTO `prestation` VALUES (1,'Entretien des pelouses','Tonte, émoussage, scarification, regarnissage, ...',1),(2,'Taille de haies','Taille des haies, arbustes, arbres fruitiers, ...',2),(3,'Entretien des massifs','Entretien des massifs, désherbage, paillage, ...',3),(4,'Potager','Mise en place et entretien de potagers, ...',4),(5,'Evacuation des déchets végétaux','Evacuation des déchets végétaux, ...',5),(6,'Entretien des extérieurs','Déneigement, peinture, lasure, nettoyage haute pression, ...',6);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realisation`
--

LOCK TABLES `realisation` WRITE;
/*!40000 ALTER TABLE `realisation` DISABLE KEYS */;
INSERT INTO `realisation` VALUES (1,'Réalisation 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'),(2,'Réalisation 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.');
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

-- Dump completed on 2017-04-05 17:47:47
