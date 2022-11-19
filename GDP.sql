-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: gdp
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.20.04.1

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

--
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `datedenaissance` date DEFAULT NULL,
  `matricule` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `cp` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `dateupdate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents`
--

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` VALUES (26,'DESMETTREAAAA','Anabelleaaaa','2222-11-12','101','rue de courtrai aaaaa','7700','00000000000000','Tuesday 20 September 2022 03:29:21 PM'),(27,'VANDERMEULEN','Christophe','1982-04-01','113','Rue de Roulers 69','','0479241189','Friday 16 September 2022 05:53:51 PM'),(28,'ISOREE','Loridan','1111-01-01','114','Rue des moulins','7700','0479247888858','Thursday 22 September 2022 09:03:07 PM'),(29,'VEYS','Sam','1888-04-01','115','','','','Friday 23 September 2022 08:12:29 AM'),(30,'FERME','Gérard','1119-01-01','119','aezrazr','7700','056848/465414','Tuesday 4 October 2022 12:55:28 PM'),(31,'CHATELAIN','Maryline','2022-09-28','155','335 Rue de la Lys','59250','','Tuesday 4 October 2022 02:25:35 PM');
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habitations`
--

DROP TABLE IF EXISTS `habitations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `habitations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `adresse` varchar(45) DEFAULT NULL,
  `localite` int DEFAULT NULL,
  `demandeur` varchar(100) DEFAULT NULL,
  `datedebut` datetime DEFAULT NULL,
  `datefin` datetime DEFAULT NULL,
  `mesures` longtext,
  `vehicule` varchar(45) DEFAULT NULL,
  `googlemap` varchar(100) DEFAULT NULL,
  `dateupdate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habitations`
--

LOCK TABLES `habitations` WRITE;
/*!40000 ALTER TABLE `habitations` DISABLE KEYS */;
INSERT INTO `habitations` VALUES (2,'RUE DE ROULERS',2,'','2022-09-09 00:00:00','2022-09-24 00:00:00','qsdfqsdfq','',NULL,'Tuesday 20 September 2022 03:24:20 PM'),(3,'qsfdqfsqd',8888,'','2022-09-02 00:00:00','2022-09-30 00:00:00','qsdfqsdfqsf','',NULL,'Tuesday 20 September 2022 03:27:39 PM'),(4,'335 Rue de la Lys',8552,'','9999-05-15 00:00:00','1555-12-15 00:00:00','','',NULL,'Friday 23 September 2022 08:12:56 AM'),(5,'RUE DE ROULERS, 100',7700,'','2022-11-01 00:00:00','2022-12-05 00:00:00','aerazrezra','azerzararaer',NULL,'Tuesday 4 October 2022 01:57:56 PM'),(7,'AREAR',44,'','2022-10-06 00:00:00','2022-10-05 00:00:00','a','',NULL,'Tuesday 4 October 2022 02:37:35 PM'),(8,'Rue du Luxembourg 17',7700,'Vandermeulen Christophe','2022-10-03 00:00:00','2022-12-25 00:00:00','','',NULL,'Friday 18 November 2022 09:35:49 AM'),(9,'RUE DE ROULERS, 69',7711,'','2022-10-03 17:43:00','2022-10-30 23:49:00','Système d\'alarme','qfdsqfds',NULL,'Thursday 6 October 2022 05:43:38 PM'),(10,'dsfqsfqs',7875,'','2022-10-20 22:30:00','2022-10-07 08:26:00','','',NULL,'Friday 7 October 2022 08:27:08 AM'),(11,'Chaussée du Risquons-tout, 187  ',7700,' BAERT Pascal','2022-11-19 14:00:00','2022-12-05 16:00:00','                                - Système d\'alarme : Oui\r\n- Eclairage extérieur : Non\r\n- Minuterie d\'éclairage : Non\r\n- Société gardiennage : Oui\r\n- Chien : Non\r\n- Présence d\'un tiers : Non\r\n- Autres : \r\n','--',NULL,'Thursday 17 November 2022 02:40:06 PM'),(12,'Chaussée du Risquons-tout, 187  ',7700,'BAERT Pascal','2022-11-19 14:00:00','2022-12-05 16:00:00','                         - Système d\'alarme : Oui\r\n- Eclairage extérieur : Non\r\n- Minuterie d\'éclairage : Non\r\n- Société gardiennage : Oui\r\n- Chien : Non\r\n- Présence d\'un tiers : Non\r\n- Autres : \r\n       ','',NULL,'Thursday 17 November 2022 02:42:26 PM'),(13,'Chaussée du Risquons-tout, 187  ',7700,'BAERT Pascal','2022-11-10 14:00:00','2022-12-05 16:00:00','- Système d\'alarme : Oui\r\n- Eclairage extérieur : Non\r\n- Minuterie d\'éclairage : Non\r\n- Société gardiennage : Oui\r\n- Chien : Non\r\n- Présence d\'un tiers : Non\r\n- Autres : \r\n    ','',NULL,'Friday 18 November 2022 08:15:39 AM'),(14,'qsfsqdfqs',7700,'qsdfqdf','2000-11-20 20:11:00','2022-12-20 11:11:00','                                qsdfqfqsfddqsfs','qdfqsdf',NULL,'Thursday 17 November 2022 02:49:30 PM'),(15,'Chaussée du Risquons-tout, 187  ',7700,'BAERT Pascal','2022-11-19 14:00:00','2022-12-05 16:00:00','- Système d\'alarme : Oui\r\n- Eclairage extérieur : Non\r\n- Minuterie d\'éclairage : Non\r\n- Société gardiennage : Oui\r\n- Chien : Non\r\n- Présence d\'un tiers : Non\r\n- Autres : \r\n','----',NULL,'Thursday 17 November 2022 02:50:26 PM'),(16,'Chaussée de Gand 55',7700,'Manu','2022-11-17 14:00:00','2023-02-02 16:00:00','dsfdqsfqsf\r\nqsdfqsdf\r\nqdf\r\nqsdf\r\nqsd\r\nfqsd\r\ndqsf','qsdfqsdfqsdf',NULL,'Friday 18 November 2022 10:01:48 AM');
/*!40000 ALTER TABLE `habitations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `validations`
--

DROP TABLE IF EXISTS `validations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `validations` (
  `idvalidations` int NOT NULL AUTO_INCREMENT,
  `matricule` varchar(45) DEFAULT NULL,
  `habitation` varchar(45) DEFAULT NULL,
  `message` longtext,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`idvalidations`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `validations`
--

LOCK TABLES `validations` WRITE;
/*!40000 ALTER TABLE `validations` DISABLE KEYS */;
INSERT INTO `validations` VALUES (5,'113','RUE DE ROULERS, 100','aezrazer azerazer aezr ','2004-10-22 02:20:19'),(6,'115','zer aezraezr','llll','2004-10-22 02:24:06'),(7,'115','RUE DE ROULERS','fddfsgsg','2007-10-22 08:27:43'),(8,'113','RUE DE ROULERS, 100','ddfsdfdq dsq d','2007-10-22 08:53:32'),(9,'119','RUE DE ROULERS, 100','','2010-11-22 12:23:34'),(10,'-1','','','2018-11-22 09:44:17'),(11,'113','','qsdfqdfqsfdqsfsq','2018-11-22 09:44:30'),(12,'101','Chaussée du Risquons-tout, 187  ','dqfdqfsqsdfdfs','2018-11-22 09:47:19'),(13,'115','Rue du Luxembourg 17','aezrazerzaer','2018-11-22 09:48:04'),(14,'114','Chaussée du Risquons-tout, 187  ','ESSAI 114\r\n','2018-11-22 09:48:55'),(15,'155','Rue du Luxembourg 17','azer','2018-11-22 09:50:12'),(16,'113','Rue du Luxembourg 17','qsdfqsdfqsdfqsfsdq','2018-11-22 09:59:47'),(17,'114','Chaussée de Gand 55','edfdqfdsfqsdf qsdfsqsddqs','2018-11-22 10:02:05'),(18,'113','qsfsqdfqs','aaaaaaaaaaaaaaaaaaa','2018-11-22 01:07:54');
/*!40000 ALTER TABLE `validations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-19  9:19:21
