-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: moviebooking
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
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_movie_id` int(11) DEFAULT NULL,
  `r_user_id` int(11) DEFAULT NULL,
  `r_theater_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `r_payment` int(11) DEFAULT NULL,
  `booking_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('confirmed','cancelled') NOT NULL DEFAULT 'confirmed',
  PRIMARY KEY (`booking_id`),
  KEY `fk_booking_movie` (`r_movie_id`),
  KEY `fk_booking_user` (`r_user_id`),
  KEY `fk_booking_theater` (`r_theater_id`),
  KEY `fk_booking_payment` (`r_payment`),
  CONSTRAINT `fk_booking_movie` FOREIGN KEY (`r_movie_id`) REFERENCES `movie` (`movie_id`),
  CONSTRAINT `fk_booking_payment` FOREIGN KEY (`r_payment`) REFERENCES `payment` (`payment_id`),
  CONSTRAINT `fk_booking_theater` FOREIGN KEY (`r_theater_id`) REFERENCES `theater` (`theater_id`),
  CONSTRAINT `fk_booking_user` FOREIGN KEY (`r_user_id`) REFERENCES `login` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (89,1,2,1,500.00,3,'2025-04-17 14:08:58',''),(90,2,1,3,300.00,2,'2025-04-17 14:09:34','confirmed'),(91,1,3,2,600.00,4,'2025-04-17 14:10:10','confirmed'),(92,1,1,4,800.00,1,'2025-04-17 14:10:44','confirmed'),(93,3,2,3,250.00,2,'2025-04-17 14:11:37','confirmed');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caste`
--

DROP TABLE IF EXISTS `caste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caste` (
  `cast_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `role` varchar(25) NOT NULL,
  PRIMARY KEY (`cast_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caste`
--

LOCK TABLES `caste` WRITE;
/*!40000 ALTER TABLE `caste` DISABLE KEYS */;
/*!40000 ALTER TABLE `caste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `mobileNo` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'9999999991','pass123'),(2,'9999999992','hello456'),(3,'9999999993','qwerty'),(4,'9999999994','test789'),(5,'9999999995','abc321');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(50) DEFAULT NULL,
  `description` varchar(750) NOT NULL,
  `duration` time DEFAULT NULL,
  `movie_type` varchar(15) NOT NULL,
  `supp_lang` varchar(15) NOT NULL,
  `release_date` date NOT NULL,
  `r_caste` int(11) DEFAULT NULL,
  `image_url` varchar(2049) NOT NULL,
  PRIMARY KEY (`movie_id`),
  KEY `fk_movie_caste` (`r_caste`),
  CONSTRAINT `fk_movie_caste` FOREIGN KEY (`r_caste`) REFERENCES `caste` (`cast_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` VALUES (1,'Inception','A mind-bending thriller','02:28:00','Sci-Fi','English','2010-07-16',NULL,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtnvAOajH9gS4C30cRF7rD_voaTAKly2Ntaw&s'),(2,'Interstellar','A journey through space and time','02:49:00','Sci-Fi','English','2014-11-07',NULL,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtnvAOajH9gS4C30cRF7rD_voaTAKly2Ntaw&s'),(3,'Avatar','An epic sci-fi about another world','02:42:00','Action','English','2009-12-18',NULL,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtnvAOajH9gS4C30cRF7rD_voaTAKly2Ntaw&s'),(4,'Parasite','A thriller about class division','02:12:00','Drama','Korean','2019-05-30',NULL,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtnvAOajH9gS4C30cRF7rD_voaTAKly2Ntaw&s'),(5,'3 Idiots','A story of friendship and education','02:50:00','Comedy','Hindi','2009-12-25',NULL,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtnvAOajH9gS4C30cRF7rD_voaTAKly2Ntaw&s');
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(20) NOT NULL,
  `status` enum('success','failed') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paid_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,'Credit Card','success',250.00,'2025-04-16 11:19:54'),(2,'Debit Card','success',300.00,'2025-04-16 11:19:54'),(3,'UPI','success',150.00,'2025-04-16 11:19:54'),(4,'Net Banking','failed',200.00,'2025-04-16 11:19:54'),(5,'Cash','success',275.00,'2025-04-16 11:19:54');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theater`
--

DROP TABLE IF EXISTS `theater`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theater` (
  `theater_id` int(11) NOT NULL AUTO_INCREMENT,
  `theater_name` varchar(40) NOT NULL,
  `location` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  PRIMARY KEY (`theater_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theater`
--

LOCK TABLES `theater` WRITE;
/*!40000 ALTER TABLE `theater` DISABLE KEYS */;
INSERT INTO `theater` VALUES (1,'PVR Cinemas','Mumbai','8001234567'),(2,'INOX','Delhi','8002345678'),(3,'Carnival','Chennai','8003456789'),(4,'Sathyam','Bangalore','8004567890'),(5,'Miraj','Hyderabad','8005678901');
/*!40000 ALTER TABLE `theater` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theaterowner`
--

DROP TABLE IF EXISTS `theaterowner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theaterowner` (
  `thowner_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_theater` int(11) DEFAULT NULL,
  `r_payment` int(11) DEFAULT NULL,
  `r_movie_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`thowner_id`),
  KEY `r_theater` (`r_theater`),
  KEY `r_payment` (`r_payment`),
  KEY `r_movie_id` (`r_movie_id`),
  CONSTRAINT `theaterowner_ibfk_1` FOREIGN KEY (`r_theater`) REFERENCES `theater` (`theater_id`),
  CONSTRAINT `theaterowner_ibfk_2` FOREIGN KEY (`r_payment`) REFERENCES `payment` (`payment_id`),
  CONSTRAINT `theaterowner_ibfk_3` FOREIGN KEY (`r_movie_id`) REFERENCES `movie` (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theaterowner`
--

LOCK TABLES `theaterowner` WRITE;
/*!40000 ALTER TABLE `theaterowner` DISABLE KEYS */;
/*!40000 ALTER TABLE `theaterowner` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-17 19:59:41
