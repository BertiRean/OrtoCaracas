-- MySQL dump 10.13  Distrib 5.7.12, for Linux (x86_64)
--
-- Host: localhost    Database: orto
-- ------------------------------------------------------
-- Server version	5.7.12-0ubuntu1

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
-- Table structure for table `consults`
--

DROP TABLE IF EXISTS `consults`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consults` (
  `id_consult` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int(10) unsigned NOT NULL,
  `pacient_id` int(10) unsigned NOT NULL,
  `date_consult` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `observations` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_consult`),
  KEY `consults_doctor_id_foreign` (`doctor_id`),
  KEY `consults_pacient_id_foreign` (`pacient_id`),
  CONSTRAINT `consults_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id_doctor`),
  CONSTRAINT `consults_pacient_id_foreign` FOREIGN KEY (`pacient_id`) REFERENCES `pacients` (`id_pacient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consults`
--

LOCK TABLES `consults` WRITE;
/*!40000 ALTER TABLE `consults` DISABLE KEYS */;
/*!40000 ALTER TABLE `consults` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id_contact` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dates`
--

DROP TABLE IF EXISTS `dates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dates` (
  `date_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int(10) unsigned NOT NULL,
  `pacient_id` int(10) unsigned NOT NULL,
  `date_consult` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`date_id`),
  KEY `dates_doctor_id_foreign` (`doctor_id`),
  KEY `dates_pacient_id_foreign` (`pacient_id`),
  CONSTRAINT `dates_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id_doctor`),
  CONSTRAINT `dates_pacient_id_foreign` FOREIGN KEY (`pacient_id`) REFERENCES `pacients` (`id_pacient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dates`
--

LOCK TABLES `dates` WRITE;
/*!40000 ALTER TABLE `dates` DISABLE KEYS */;
/*!40000 ALTER TABLE `dates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id_department` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_department`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Radiografía Odontologica'),(2,'Radiografía Medica'),(3,'Mamografía'),(4,'Laboratorio'),(5,'Ecosonografía');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor_specs`
--

DROP TABLE IF EXISTS `doctor_specs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor_specs` (
  `doctor_id` int(10) unsigned NOT NULL,
  `spec_id` int(10) unsigned NOT NULL,
  KEY `doctor_specs_doctor_id_foreign` (`doctor_id`),
  KEY `doctor_specs_spec_id_foreign` (`spec_id`),
  CONSTRAINT `doctor_specs_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id_doctor`),
  CONSTRAINT `doctor_specs_spec_id_foreign` FOREIGN KEY (`spec_id`) REFERENCES `specialities` (`id_speciality`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor_specs`
--

LOCK TABLES `doctor_specs` WRITE;
/*!40000 ALTER TABLE `doctor_specs` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctor_specs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctors` (
  `id_doctor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ci` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_account` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contact_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_doctor`),
  UNIQUE KEY `doctors_ci_unique` (`ci`),
  KEY `doctors_contact_id_foreign` (`contact_id`),
  CONSTRAINT `doctors_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `earnings`
--

DROP TABLE IF EXISTS `earnings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `earnings` (
  `id_earning` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mount` double(8,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `department_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `doctor_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_earning`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `earnings`
--

LOCK TABLES `earnings` WRITE;
/*!40000 ALTER TABLE `earnings` DISABLE KEYS */;
/*!40000 ALTER TABLE `earnings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exams` (
  `id_exam` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `pacient_id` int(10) unsigned NOT NULL,
  `date_exam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `personal` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_exam`),
  KEY `exams_pacient_id_foreign` (`pacient_id`),
  KEY `exams_department_id_foreign` (`department_id`),
  CONSTRAINT `exams_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id_department`),
  CONSTRAINT `exams_pacient_id_foreign` FOREIGN KEY (`pacient_id`) REFERENCES `pacients` (`id_pacient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exams`
--

LOCK TABLES `exams` WRITE;
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenses` (
  `id_expense` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bill_number` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_expense`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2016_06_08_010301_create_specialities_table',1),('2016_06_08_010302_create_contacts_table',1),('2016_06_08_010310_create_doctors_table',1),('2016_06_08_010318_create_dates_table',1),('2016_06_08_010349_create_consults_table',1),('2016_06_08_010402_create_doctor_specs_table',1),('2016_06_08_013218_create_pacients_table',1),('2016_06_08_190018_create_phones_table',1),('2016_06_10_030212_FillSpecs',1),('2016_06_23_024243_create_table_ingress',1),('2016_06_29_022128_create_table_exams',1),('2016_06_29_143829_create_deparments_table',1),('2016_06_29_190019_foreign_keys',1),('2016_06_29_195747_FillDeparments',1),('2016_07_10_183022_create_table_expenses',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacient_department`
--

DROP TABLE IF EXISTS `pacient_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacient_department` (
  `pacient_id` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  KEY `pacient_department_pacient_id_foreign` (`pacient_id`),
  KEY `pacient_department_department_id_foreign` (`department_id`),
  CONSTRAINT `pacient_department_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id_department`),
  CONSTRAINT `pacient_department_pacient_id_foreign` FOREIGN KEY (`pacient_id`) REFERENCES `pacients` (`id_pacient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacient_department`
--

LOCK TABLES `pacient_department` WRITE;
/*!40000 ALTER TABLE `pacient_department` DISABLE KEYS */;
/*!40000 ALTER TABLE `pacient_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacients`
--

DROP TABLE IF EXISTS `pacients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacients` (
  `id_pacient` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ci` int(10) unsigned NOT NULL,
  `birth_date` date NOT NULL,
  `sex` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_pacient`),
  UNIQUE KEY `pacients_ci_unique` (`ci`),
  KEY `pacients_contact_id_foreign` (`contact_id`),
  CONSTRAINT `pacients_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacients`
--

LOCK TABLES `pacients` WRITE;
/*!40000 ALTER TABLE `pacients` DISABLE KEYS */;
/*!40000 ALTER TABLE `pacients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phones_contact_id_foreign` (`contact_id`),
  CONSTRAINT `phones_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phones`
--

LOCK TABLES `phones` WRITE;
/*!40000 ALTER TABLE `phones` DISABLE KEYS */;
/*!40000 ALTER TABLE `phones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialities`
--

DROP TABLE IF EXISTS `specialities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialities` (
  `id_speciality` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_speciality`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialities`
--

LOCK TABLES `specialities` WRITE;
/*!40000 ALTER TABLE `specialities` DISABLE KEYS */;
INSERT INTO `specialities` VALUES (1,'Odontologia General'),(2,'Ortodoncia'),(3,'OdontoPedatría'),(4,'Prostodoncia'),(5,'Periodoncia'),(6,'Endodoncia'),(7,'Cariología'),(8,'Odontología estética o cosmética'),(9,'Implantología oral');
/*!40000 ALTER TABLE `specialities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-10 17:49:23
