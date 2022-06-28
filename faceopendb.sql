-- MySQL dump 10.14  Distrib 5.5.68-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: faceopendb
-- ------------------------------------------------------
-- Server version	5.5.68-MariaDB

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
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `area_desc` varchar(50) DEFAULT NULL,
  `area_cod` int(100) DEFAULT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Seguridad',NULL),(2,'Operaciones',NULL),(3,'RRHH',NULL),(4,'Administracion',NULL),(5,'Desarrollo',NULL),(6,'Tecnologia',NULL),(7,'Marketing',NULL),(8,'Tecnologia',0),(9,'Tecnologia',666);
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_desc` varchar(50) DEFAULT NULL,
  `cargo_cod` int(100) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Desarrollador',NULL),(2,'Analista',NULL),(3,'Oficial de Seguridad',NULL),(4,'Gerente de TI',NULL),(5,'Analista',0),(6,'Analista',0),(7,'Analista',666);
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catastro`
--

DROP TABLE IF EXISTS `catastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catastro` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `id_pers` int(11) DEFAULT NULL,
  `cat_img` blob,
  `cat_ruta_img` varchar(250) DEFAULT NULL,
  `cat_ruta_entre` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_cat`),
  KEY `id_pers` (`id_pers`),
  CONSTRAINT `catastro_ibfk_1` FOREIGN KEY (`id_pers`) REFERENCES `personas` (`id_pers`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catastro`
--

LOCK TABLES `catastro` WRITE;
/*!40000 ALTER TABLE `catastro` DISABLE KEYS */;
INSERT INTO `catastro` VALUES (2,1,NULL,'//images1','//images1'),(3,2,NULL,'//images2','//images2'),(4,1,NULL,'./images/1234567','trainer.yml'),(5,2,NULL,'./images/7654321','trainer.yml'),(6,4,NULL,'./images/23456871','trainer.yml'),(7,5,'MariaGimenez','./images/MariaGimenez','trainer.yml'),(8,6,'./images/EnriquetaMartinez','EnriquetaMartinez','trainer.yml'),(9,7,'MarciaRodriguez','./images/MarciaRodriguez','trainer.yml');
/*!40000 ALTER TABLE `catastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionarios` (
  `id_fun` int(11) NOT NULL AUTO_INCREMENT,
  `id_cargo` int(11) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `id_suc` int(11) DEFAULT NULL,
  `id_pers` int(11) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fun`),
  KEY `id_cargo` (`id_cargo`),
  KEY `id_area` (`id_area`),
  KEY `id_suc` (`id_suc`),
  KEY `id_pers` (`id_pers`),
  KEY `id_cat` (`id_cat`),
  CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `funcionarios_ibfk_2` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `funcionarios_ibfk_3` FOREIGN KEY (`id_suc`) REFERENCES `sucursales` (`id_suc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `funcionarios_ibfk_4` FOREIGN KEY (`id_pers`) REFERENCES `personas` (`id_pers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `funcionarios_ibfk_5` FOREIGN KEY (`id_cat`) REFERENCES `catastro` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` VALUES (1,1,1,1,8,8),(2,1,1,1,1,2),(3,2,2,2,2,3),(6,1,1,1,3,2);
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcaciones`
--

DROP TABLE IF EXISTS `marcaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marcaciones` (
  `id_marc` int(11) NOT NULL AUTO_INCREMENT,
  `id_pers` int(11) DEFAULT NULL,
  `tipo_marc` varchar(2) DEFAULT NULL,
  `fec_marc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_marc`),
  KEY `id_pers` (`id_pers`),
  CONSTRAINT `marcaciones_ibfk_1` FOREIGN KEY (`id_pers`) REFERENCES `personas` (`id_pers`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcaciones`
--

LOCK TABLES `marcaciones` WRITE;
/*!40000 ALTER TABLE `marcaciones` DISABLE KEYS */;
INSERT INTO `marcaciones` VALUES (1,4,'E','2021-10-23 21:44:42'),(2,4,'E','2021-10-23 21:53:54'),(3,4,'E','2021-10-23 21:56:30'),(4,NULL,'S','2021-10-23 22:45:25'),(5,NULL,'S','2021-10-23 22:45:51'),(6,NULL,'S','2021-10-23 22:53:58'),(7,NULL,'S','2021-10-23 22:56:46'),(8,NULL,'S','2021-10-23 22:59:12'),(9,NULL,'S','2021-10-23 23:00:30'),(10,NULL,'S','2021-10-23 23:03:54'),(11,5,'S','2021-10-23 23:05:31'),(12,5,'S','2021-10-23 23:06:06'),(13,5,'E','2021-10-23 23:08:16'),(14,7,'E','2021-10-23 23:18:32'),(15,7,'S','2021-10-23 23:26:02'),(16,7,'E','2021-10-23 23:26:19'),(17,7,'S','2021-10-23 23:26:39');
/*!40000 ALTER TABLE `marcaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `id_pers` int(11) NOT NULL AUTO_INCREMENT,
  `pers_ci` int(10) DEFAULT NULL,
  `pers_nom` varchar(20) DEFAULT NULL,
  `pers_ape` varchar(20) DEFAULT NULL,
  `pers_fecnac` date DEFAULT NULL,
  `pers_dir` char(200) DEFAULT NULL,
  `pers_estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_pers`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,1234567,'Luis','Dominguez','0000-00-00','Santa Teresa','1'),(2,7654321,'Ruth','Espinola',NULL,NULL,NULL),(3,5678543,'Francisco','Fernandez',NULL,NULL,NULL),(4,23456871,'Fulana','Lopez',NULL,NULL,NULL),(5,5674329,'Maria','Gimenez',NULL,NULL,NULL),(6,8293401,'Enriqueta','Martinez',NULL,NULL,NULL),(7,6510966,'Marcia','Rodriguez',NULL,NULL,NULL),(8,4133266,'Derlis','Caballero','0000-00-00','Loma Pyta','1'),(9,111111,'Derlis','Caballero','0000-00-00','s','A');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol_desc` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Encargado'),(2,'Consultas');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursales`
--

DROP TABLE IF EXISTS `sucursales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursales` (
  `id_suc` int(11) NOT NULL AUTO_INCREMENT,
  `suc_nro` int(100) DEFAULT NULL,
  `suc_desc` varchar(50) DEFAULT NULL,
  `suc_dir` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_suc`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursales`
--

LOCK TABLES `sucursales` WRITE;
/*!40000 ALTER TABLE `sucursales` DISABLE KEYS */;
INSERT INTO `sucursales` VALUES (1,1,'MATRIZ','Asuncion, Lopez Moreira c/ Aviadores'),(2,2,'SUCURSAL 2','San Lorenzo, Saturio Rios c/ mcal. lopez');
/*!40000 ALTER TABLE `sucursales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) DEFAULT NULL,
  `user_name` varchar(10) DEFAULT NULL,
  `user_pass` varchar(20) DEFAULT NULL,
  `user_estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-17  2:07:25
