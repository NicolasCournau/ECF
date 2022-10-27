-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ecf
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `structure_id` int DEFAULT NULL,
  `equipe_technique_id` int DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  KEY `IDX_8D93D6492534008B` (`structure_id`),
  KEY `IDX_8D93D64999938903` (`equipe_technique_id`),
  CONSTRAINT `FK_8D93D6492534008B` FOREIGN KEY (`structure_id`) REFERENCES `structure` (`id`),
  CONSTRAINT `FK_8D93D64999938903` FOREIGN KEY (`equipe_technique_id`) REFERENCES `equipe_technique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'database85170@gmail.com','[\"ROLE_ADMIN\"]','$2y$13$nkisiwH0enHs8peOfrrH5OeRyCe2wRClXsExIgOHwcj2gn0CTZgzq','Nicolas Cournau',NULL,NULL,0),(2,'userrandom1@gmail.com','[]','$2y$13$QzKBWWyNboOOwlvLjvNxLe6fmVKxcVNY/UooeLpu2ORlA3VbowPbq','Sebastien Cournau',1,NULL,0),(3,'userrandom2@gmail.com','[]','$2y$13$a2Isn5Yf2NdL9VQS28zf1OeRA0oDvWis7dp9mlOU.PEznX3GODPky','Charles Briffault',2,NULL,1),(4,'userrandom3@gmail.com','[]','$2y$13$3SFmAjHeU0HtQRoTV7TOlOO36P5RX4yqXPfeMBmwWzLOlo3.hW5QC','Frédéric Guillou',3,NULL,1),(5,'userrandom4@gmail.com','[]','$2y$13$4jyiAdB/gqGakzPPioIFYOVgtlMRDy5X3BlDi0LWxQacetBeJhvKa','Julien Guillemet',4,NULL,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-27 20:22:58
