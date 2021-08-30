-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: cinema
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `c_horario`
--

DROP TABLE IF EXISTS `c_horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `c_horario` (
  `idHorario` int(11) NOT NULL,
  `horarioInicio` int(11) DEFAULT NULL,
  `horarioFin` int(11) DEFAULT NULL,
  PRIMARY KEY (`idHorario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_horario`
--

LOCK TABLES `c_horario` WRITE;
/*!40000 ALTER TABLE `c_horario` DISABLE KEYS */;
INSERT INTO `c_horario` VALUES (2,1400,1600),(1,1200,1400),(3,1600,1800),(4,1800,2000),(5,2000,2200);
/*!40000 ALTER TABLE `c_horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_pelicula`
--

DROP TABLE IF EXISTS `m_pelicula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_pelicula` (
  `idPelicula` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePelicula` varchar(55) DEFAULT NULL,
  `imagenPelicula` varchar(100) DEFAULT NULL,
  `duracionPelicula` int(11) DEFAULT NULL,
  `clasificacionPelicula` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`idPelicula`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_pelicula`
--

LOCK TABLES `m_pelicula` WRITE;
/*!40000 ALTER TABLE `m_pelicula` DISABLE KEYS */;
INSERT INTO `m_pelicula` VALUES (12,'Pelicula3','https://',150,'A'),(11,'Pelicula2','https://',150,'A'),(10,'Pelicula1','https://',150,'A');
/*!40000 ALTER TABLE `m_pelicula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_peliculahorario`
--

DROP TABLE IF EXISTS `r_peliculahorario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `r_peliculahorario` (
  `idPeliculaHorario` int(11) NOT NULL AUTO_INCREMENT,
  `idPelicula` int(11) DEFAULT NULL,
  `idHorario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPeliculaHorario`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_peliculahorario`
--

LOCK TABLES `r_peliculahorario` WRITE;
/*!40000 ALTER TABLE `r_peliculahorario` DISABLE KEYS */;
INSERT INTO `r_peliculahorario` VALUES (23,12,2),(13,11,5),(12,11,2),(11,11,1),(10,10,5),(9,10,2),(8,10,1),(22,12,3),(21,12,4),(20,12,1);
/*!40000 ALTER TABLE `r_peliculahorario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-30 17:47:20
