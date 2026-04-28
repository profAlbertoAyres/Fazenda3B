-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: aula3b
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL AUTO_INCREMENT,
  `identificador` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` enum('M','F') NOT NULL,
  `id_raca` int(11) NOT NULL,
  `id_mae` int(11) DEFAULT NULL,
  `id_lote` int(11) NOT NULL,
  PRIMARY KEY (`id_animal`),
  KEY `id_raca` (`id_raca`),
  KEY `id_mae` (`id_mae`),
  KEY `id_lote` (`id_lote`),
  CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`id_raca`) REFERENCES `raca` (`id_raca`) ON UPDATE CASCADE,
  CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`id_mae`) REFERENCES `animal` (`id_animal`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `animal_ibfk_3` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` VALUES (1,'9401','2022-01-10','M',1,NULL,1),(2,'9402','2021-02-15','F',2,NULL,2),(3,'9403','2020-03-20','F',3,NULL,3),(4,'9404','2021-04-25','F',4,NULL,4),(5,'9405','2022-05-30','F',5,NULL,5),(6,'9406','2021-06-05','F',6,NULL,6),(7,'9407','2020-07-10','F',7,NULL,7),(8,'9408','2022-08-15','F',8,NULL,8),(9,'9409','2021-09-20','F',9,NULL,9),(10,'9410','2024-10-25','M',10,NULL,10),(11,'E2003412012345678920','2025-01-10','F',1,3,1),(12,'E2003412012345678921','2025-02-14','M',2,4,2),(13,'E2003412012345678922','2025-03-20','F',3,6,3),(14,'E2003412012345678923','2025-04-18','M',1,7,1),(15,'E2003412012345678924','2024-05-25','F',2,9,2);
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Ração'),(2,'Medicamento'),(3,'Vacina'),(4,'Suplemento'),(5,'Equipamento'),(6,'Ferramenta'),(7,'Higiene'),(8,'Tratamento'),(9,'Alimento'),(10,'Outros');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `id_fornecedor` (`id_fornecedor`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (1,'2025-04-08',1),(2,'2025-04-08',2),(3,'2025-04-08',3),(4,'2025-04-08',4),(5,'2025-04-08',5),(6,'2025-04-08',6),(7,'2025-04-08',7),(8,'2025-04-08',8),(9,'2025-04-08',9),(10,'2025-04-08',10);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (1,'Fornecedor A','99999-0001','a@fornecedor.com'),(2,'Fornecedor B','99999-0002','b@fornecedor.com'),(3,'Fornecedor C','99999-0003','c@fornecedor.com'),(4,'Fornecedor D','99999-0004','d@fornecedor.com'),(5,'Fornecedor E','99999-0005','e@fornecedor.com'),(6,'Fornecedor F','99999-0006','f@fornecedor.com'),(7,'Fornecedor G','99999-0007','g@fornecedor.com'),(8,'Fornecedor H','99999-0008','h@fornecedor.com'),(9,'Fornecedor I','99999-0009','i@fornecedor.com'),(10,'Fornecedor J','99999-0010','j@fornecedor.com');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto_animal`
--

DROP TABLE IF EXISTS `foto_animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto_animal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_animal` int(11) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `legenda` varchar(255) DEFAULT NULL,
  `alternativo` varchar(255) DEFAULT NULL,
  `data_upload` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_animal` (`id_animal`),
  CONSTRAINT `foto_animal_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto_animal`
--

LOCK TABLES `foto_animal` WRITE;
/*!40000 ALTER TABLE `foto_animal` DISABLE KEYS */;
/*!40000 ALTER TABLE `foto_animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_compra`
--

DROP TABLE IF EXISTS `item_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_compra` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_unitario` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_compra` (`id_compra`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `item_compra_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `item_compra_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_compra`
--

LOCK TABLES `item_compra` WRITE;
/*!40000 ALTER TABLE `item_compra` DISABLE KEYS */;
INSERT INTO `item_compra` VALUES (1,1,1,5,120.00),(2,2,2,10,35.50),(3,3,3,8,42.00),(4,4,4,3,98.90),(5,5,5,2,230.00),(6,6,6,6,15.00),(7,7,7,4,22.00),(8,8,8,7,58.00),(9,9,9,10,18.50),(10,10,10,1,1550.00);
/*!40000 ALTER TABLE `item_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lote`
--

DROP TABLE IF EXISTS `lote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lote` (
  `id_lote` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id_lote`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lote`
--

LOCK TABLES `lote` WRITE;
/*!40000 ALTER TABLE `lote` DISABLE KEYS */;
INSERT INTO `lote` VALUES (1,'Lote 1 - Área A'),(2,'Lote 2 - Área B'),(3,'Lote 3 - Área C'),(4,'Lote 4 - Área D'),(5,'Lote 5 - Área E'),(6,'Lote 6 - Área F'),(7,'Lote 7 - Área G'),(8,'Lote 8 - Área H'),(9,'Lote 9 - Área I'),(10,'Lote 10 - Área J');
/*!40000 ALTER TABLE `lote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manejo`
--

DROP TABLE IF EXISTS `manejo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manejo` (
  `id_manejo` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `descricao` text NOT NULL,
  `id_lote` int(11) NOT NULL,
  PRIMARY KEY (`id_manejo`),
  KEY `id_lote` (`id_lote`),
  CONSTRAINT `manejo_ibfk_1` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manejo`
--

LOCK TABLES `manejo` WRITE;
/*!40000 ALTER TABLE `manejo` DISABLE KEYS */;
INSERT INTO `manejo` VALUES (1,'2025-04-08','Vacinação contra febre aftosa',1),(2,'2025-04-08','Aplicação de vermífugo',2),(3,'2025-04-08','Revisão de cochos',3),(4,'2025-04-08','Suplementação alimentar',4),(5,'2025-04-08','Higienização da área de pasto',5),(6,'2025-04-08','Aplicação de carrapaticida',6),(7,'2025-04-08','Transporte para área nova',7),(8,'2025-04-08','Avaliação de saúde',8),(9,'2025-04-08','Recolhimento para vacinação',9),(10,'2025-04-08','Pesar os animais',10);
/*!40000 ALTER TABLE `manejo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,'Ração Premium',1),(2,'Vermífugo Bovino',2),(3,'Vacina Aftosa',3),(4,'Suplemento Mineral',4),(5,'Cocho Plástico',5),(6,'Seringa',6),(7,'Shampoo Veterinário',7),(8,'Pomada Anti-inflamatória',8),(9,'Silagem de Milho',9),(10,'Caminhão de Transporte',10);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `raca`
--

DROP TABLE IF EXISTS `raca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `raca` (
  `id_raca` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_raca`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raca`
--

LOCK TABLES `raca` WRITE;
/*!40000 ALTER TABLE `raca` DISABLE KEYS */;
INSERT INTO `raca` VALUES (1,'Nelore'),(2,'Angus'),(3,'Brahman'),(4,'Gir'),(5,'Guzerá'),(6,'Senepol'),(7,'Tabapuã'),(8,'Caracu'),(9,'Canadense'),(10,'Hereford'),(11,'Brangus'),(12,'Normando'),(13,'Senepol'),(14,'Santa Gertrudis'),(15,'Girolando'),(16,'Guernsey'),(17,'Braford'),(18,'Murray Grey'),(19,'Romagnola'),(20,'Holandês');
/*!40000 ALTER TABLE `raca` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-13 14:22:01
