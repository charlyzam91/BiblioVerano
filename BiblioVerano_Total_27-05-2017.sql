-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: biblioverano
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracion` (
  `id_conf` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) NOT NULL,
  `Detalle` varchar(30) NOT NULL,
  PRIMARY KEY (`id_conf`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracion`
--

LOCK TABLES `configuracion` WRITE;
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
INSERT INTO `configuracion` VALUES (1,30,'maximo de lugares');
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escuelas`
--

DROP TABLE IF EXISTS `escuelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escuelas` (
  `id_escuela` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(15) NOT NULL,
  `Descripcion` varchar(75) NOT NULL,
  `Estatus` int(11) DEFAULT '1',
  PRIMARY KEY (`id_escuela`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escuelas`
--

LOCK TABLES `escuelas` WRITE;
/*!40000 ALTER TABLE `escuelas` DISABLE KEYS */;
INSERT INTO `escuelas` VALUES (1,'PRIM','Alvaro Obregon',1),(2,'PRIM','Colegio Jacona',1),(3,'PRIM','Colegio Plancarte',1),(4,'PRIM','Miguel Hidalgo',1),(5,'PRIM','Vicente Guerrero',1),(6,'PRIM','Niños Heroes',1),(7,'PRIM','Colegio Anamaria Gomez',1),(8,'PRIM','Amado Nervo',1),(9,'PRES','Gabriel Amistral',1),(10,'PRES','Jean Piaget',1),(11,'PRES','Colegio Plancarte',1),(12,'PRES','CENDI',1);
/*!40000 ALTER TABLE `escuelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficha`
--

DROP TABLE IF EXISTS `ficha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha` (
  `id_ficha` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_ficha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha`
--

LOCK TABLES `ficha` WRITE;
/*!40000 ALTER TABLE `ficha` DISABLE KEYS */;
/*!40000 ALTER TABLE `ficha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grados`
--

DROP TABLE IF EXISTS `grados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grados` (
  `id_grado` int(11) NOT NULL AUTO_INCREMENT,
  `Grado` int(11) NOT NULL,
  `Descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`id_grado`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grados`
--

LOCK TABLES `grados` WRITE;
/*!40000 ALTER TABLE `grados` DISABLE KEYS */;
INSERT INTO `grados` VALUES (1,1,'PREESCOLAR'),(2,2,'1°'),(3,3,'2°'),(4,4,'3°'),(5,5,'4°'),(6,6,'5°'),(7,7,'6°');
/*!40000 ALTER TABLE `grados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,'RICARDO ELISIEL MACIAS ACOSTA',1),(2,'ROSA MARIA SALAS ACOSTA',1),(4,'JORGE ALBERTO GOMEZ OLIVAREZ',1),(5,'ADORACIÓN AMAYA LOPEZ',1),(7,'DAVID COVARRUBIAS HERNANDEZ',1),(10,'BETZABETH GRAJEDA AMEZCUA',1);
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planeacion`
--

DROP TABLE IF EXISTS `planeacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planeacion` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `id_semana` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planeacion`
--

LOCK TABLES `planeacion` WRITE;
/*!40000 ALTER TABLE `planeacion` DISABLE KEYS */;
INSERT INTO `planeacion` VALUES (5,5,1,1,1,1),(6,7,1,2,1,1),(7,1,1,4,2,1),(8,4,1,6,2,1),(9,2,2,1,1,1),(10,5,2,2,1,1),(11,4,2,4,2,1),(12,10,2,6,2,1),(13,5,3,1,1,1),(14,2,3,3,1,1),(15,7,3,4,2,1),(16,1,3,6,2,1),(17,1,3,7,2,1),(18,1,4,1,1,1),(19,10,4,2,1,1),(20,2,4,4,2,1),(21,4,4,6,2,1);
/*!40000 ALTER TABLE `planeacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semanas`
--

DROP TABLE IF EXISTS `semanas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semanas` (
  `id_semana` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(15) NOT NULL,
  PRIMARY KEY (`id_semana`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semanas`
--

LOCK TABLES `semanas` WRITE;
/*!40000 ALTER TABLE `semanas` DISABLE KEYS */;
INSERT INTO `semanas` VALUES (1,'SEMANA 1'),(2,'SEMANA 2'),(3,'SEMANA 3'),(4,'SEMANA 4');
/*!40000 ALTER TABLE `semanas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turnos`
--

DROP TABLE IF EXISTS `turnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_turno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turnos`
--

LOCK TABLES `turnos` WRITE;
/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
INSERT INTO `turnos` VALUES (1,'MATUTINO 10 A 12'),(2,'VESPERTINO 12:30 A 2:30');
/*!40000 ALTER TABLE `turnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Credencial` varchar(25) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `A_Paterno` varchar(30) NOT NULL,
  `A_Materno` varchar(30) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Calle` varchar(50) NOT NULL,
  `Num_ext` int(11) NOT NULL,
  `Colonia` varchar(100) NOT NULL,
  `Ciudad` varchar(50) NOT NULL,
  `Tutor` varchar(100) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `E_Mail` varchar(55) NOT NULL,
  `Sexo` int(11) NOT NULL,
  `Fecha_Registro` date NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'0','0','0','0',0,'0',0,'0','0','0','0','0',0,'2017-01-01');
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

-- Dump completed on 2017-05-27 12:18:49
