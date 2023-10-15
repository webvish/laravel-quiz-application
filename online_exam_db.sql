-- MySQL dump 10.13  Distrib 8.0.33, for macos13 (arm64)
--
-- Host: localhost    Database: online_exam_db
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_10_15_055325_create_tbl_question_master_table',1),(6,'2023_10_15_055942_create_tbl_results_table',1),(7,'2023_10_15_060100_create_tbl_user_exams_table',1),(8,'2023_10_15_060245_create_tbl_admins_table',1),(9,'2023_10_15_060421_create_tbl_categories_table',1),(10,'2023_10_15_060522_create_tbl_exam_masters_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_admins`
--

DROP TABLE IF EXISTS `tbl_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admins`
--

LOCK TABLES `tbl_admins` WRITE;
/*!40000 ALTER TABLE `tbl_admins` DISABLE KEYS */;
INSERT INTO `tbl_admins` VALUES (1,'Admin','admin@gmail.com',NULL,'$2y$10$GnUwTSm5Q8PZlBHfP1iADOVCl5oU2YOnpw/JIyGeYQSjgN0L4sWI.',NULL,'2023-10-15 00:54:59','2023-10-15 00:54:59');
/*!40000 ALTER TABLE `tbl_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categories`
--

DROP TABLE IF EXISTS `tbl_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categories`
--

LOCK TABLES `tbl_categories` WRITE;
/*!40000 ALTER TABLE `tbl_categories` DISABLE KEYS */;
INSERT INTO `tbl_categories` VALUES (1,'IT',1,'2023-10-15 00:54:59','2023-10-15 00:54:59'),(2,'General Knowledge',1,'2023-10-15 04:21:35','2023-10-15 04:21:35');
/*!40000 ALTER TABLE `tbl_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_exam_masters`
--

DROP TABLE IF EXISTS `tbl_exam_masters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_exam_masters` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_exam_masters`
--

LOCK TABLES `tbl_exam_masters` WRITE;
/*!40000 ALTER TABLE `tbl_exam_masters` DISABLE KEYS */;
INSERT INTO `tbl_exam_masters` VALUES (1,'CSS','1','2023-10-16','5','1','2023-10-15 00:58:02','2023-10-15 00:58:02'),(2,'HTML','1','2023-10-16','5','1','2023-10-15 01:13:48','2023-10-15 02:09:38'),(3,'PHP','1','2023-10-16','7','1','2023-10-15 04:12:01','2023-10-15 04:12:01');
/*!40000 ALTER TABLE `tbl_exam_masters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_question_master`
--

DROP TABLE IF EXISTS `tbl_question_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_question_master` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `questions` text COLLATE utf8mb4_unicode_ci,
  `ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_question_master`
--

LOCK TABLES `tbl_question_master` WRITE;
/*!40000 ALTER TABLE `tbl_question_master` DISABLE KEYS */;
INSERT INTO `tbl_question_master` VALUES (1,'1','The full form of CSS is?','Cascading Style Sheets','{\"option1\":\"Cascading Style Sheets\",\"option2\":\"Coloured Style Sheets\",\"option3\":\"Color and Style Sheets\",\"option4\":\"None of the above\"}','1','2023-10-15 01:06:30','2023-10-15 01:09:47'),(2,'1','How can we change the background color of an element?','background-color','{\"option1\":\"background-color\",\"option2\":\"color\",\"option3\":\"Both A and B\",\"option4\":\"None of the above\"}','1','2023-10-15 01:10:45','2023-10-15 01:10:45'),(3,'1','How can we change the text color of an element?','color','{\"option1\":\"background-color\",\"option2\":\"color\",\"option3\":\"None of the above\",\"option4\":\"Both A and B\"}','1','2023-10-15 01:11:50','2023-10-15 01:11:50'),(4,'1','In how many ways can CSS be written in?','3','{\"option1\":\"1\",\"option2\":\"2\",\"option3\":\"3\",\"option4\":\"4\"}','1','2023-10-15 01:12:20','2023-10-15 01:12:20'),(5,'1','What type of CSS is the following code snippet?','Inline','{\"option1\":\"Internal\",\"option2\":\"External\",\"option3\":\"None of the above\",\"option4\":\"Inline\"}','1','2023-10-15 01:13:16','2023-10-15 01:13:16'),(6,'2','What does the abbreviation HTML stand for?','HyperText Markup Language','{\"option1\":\"HighText Markup Language\",\"option2\":\"HyperText Markdown Language\",\"option3\":\"HyperText Markup Language\",\"option4\":\"None of the above\"}','1','2023-10-15 01:16:46','2023-10-15 01:16:46'),(7,'2','How many sizes of headers are available in HTML by default?','6','{\"option1\":\"5\",\"option2\":\"2\",\"option3\":\"3\",\"option4\":\"6\"}','1','2023-10-15 01:17:37','2023-10-15 01:17:37'),(8,'2','What is the smallest header in HTML by default?','h6','{\"option1\":\"h1\",\"option2\":\"h3\",\"option3\":\"h2\",\"option4\":\"h6\"}','1','2023-10-15 01:18:05','2023-10-15 01:18:05'),(9,'2','How to create an ordered list in HTML?','<ol>','{\"option1\":\"<ol>\",\"option2\":\"<ul>\",\"option3\":\"<href>\",\"option4\":\"<b>\"}','1','2023-10-15 01:19:02','2023-10-15 01:19:02'),(10,'2','HTML files are saved by default with the extension?','.html','{\"option1\":\".h\",\"option2\":\".ht\",\"option3\":\".html\",\"option4\":\"None of the above\"}','1','2023-10-15 04:10:45','2023-10-15 04:10:45'),(11,'2','We enclose HTML tags within?','<>','{\"option1\":\"[]\",\"option2\":\"<>\",\"option3\":\"!!\",\"option4\":\"None of the above\"}','1','2023-10-15 04:11:29','2023-10-15 04:11:29'),(12,'3','Full form of PHP is?','Hypertext Preprocessor','{\"option1\":\"Pretext Hypertext preprocessor\",\"option2\":\"Preprocessor Home Page\",\"option3\":\"Hypertext Preprocessor\",\"option4\":\"None\"}','1','2023-10-15 04:13:37','2023-10-15 04:14:28'),(13,'3','Choose the default file extension of PHP among the following.','.php','{\"option1\":\".ph\",\"option2\":\".php\",\"option3\":\".xml\",\"option4\":\".html\"}','1','2023-10-15 04:14:20','2023-10-15 04:14:20'),(14,'3','What type of language is PHP?','Server-side Scripting Language','{\"option1\":\"User-side Scripting\",\"option2\":\"Server-side Scripting Language\",\"option3\":\"Client-side Scripting\",\"option4\":\"None\"}','1','2023-10-15 04:15:38','2023-10-15 04:15:38'),(15,'3','Choose the correct syntax of PHP?','<?php?>','{\"option1\":\"<php>\",\"option2\":\"<?php>\",\"option3\":\"<!php?>\",\"option4\":\"<?php?>\"}','1','2023-10-15 04:16:28','2023-10-15 04:16:28'),(16,'3','Total ways in which user a print output in PHP is?','2','{\"option1\":\"1\",\"option2\":\"3\",\"option3\":\"4\",\"option4\":\"2\"}','1','2023-10-15 04:17:07','2023-10-15 04:17:07'),(17,'3','Is PHP variable case sensitive?','True','{\"option1\":\"False\",\"option2\":\"Depends on Variable\",\"option3\":\"None\",\"option4\":\"True\"}','1','2023-10-15 04:18:02','2023-10-15 04:18:02'),(18,'3','Total types of the array in PHP is?','3','{\"option1\":\"2\",\"option2\":\"4\",\"option3\":\"3\",\"option4\":\"5\"}','1','2023-10-15 04:18:56','2023-10-15 04:18:56'),(19,'3','Another term used for Objects is?','Instances','{\"option1\":\"Reference\",\"option2\":\"Template\",\"option3\":\"Instances\",\"option4\":\"Class\"}','1','2023-10-15 04:19:41','2023-10-15 04:19:41');
/*!40000 ALTER TABLE `tbl_question_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_results`
--

DROP TABLE IF EXISTS `tbl_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_results` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yes_ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_json` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_results`
--

LOCK TABLES `tbl_results` WRITE;
/*!40000 ALTER TABLE `tbl_results` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_exams`
--

DROP TABLE IF EXISTS `tbl_user_exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user_exams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `std_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_joined` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_exams`
--

LOCK TABLES `tbl_user_exams` WRITE;
/*!40000 ALTER TABLE `tbl_user_exams` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user_exams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Student','student@gmail.com',NULL,'$2y$10$v1vUgIowix.JB04sbwH1IeAbcQFuhJUtoqa16YxnIxNYdkU3f0/oK',NULL,NULL,NULL,NULL,'2023-10-15 00:54:59','2023-10-15 00:54:59'),(2,'Vishal Prajapati','vishal@gmail.com',NULL,'$2y$10$v1vUgIowix.JB04sbwH1IeAbcQFuhJUtoqa16YxnIxNYdkU3f0/oK','1234567890','1','1',NULL,'2023-10-15 01:19:42','2023-10-15 01:19:42'),(3,'Dhaval Patel','dhaval@gmail.com',NULL,'$2y$10$v1vUgIowix.JB04sbwH1IeAbcQFuhJUtoqa16YxnIxNYdkU3f0/oK','1234567890','1','1',NULL,'2023-10-15 01:19:42','2023-10-15 01:19:42'),(4,'Meet Patel','meetpatel@gmail.com',NULL,'$2y$10$v1vUgIowix.JB04sbwH1IeAbcQFuhJUtoqa16YxnIxNYdkU3f0/oK',NULL,NULL,NULL,NULL,'2023-10-15 05:36:48','2023-10-15 05:36:48');
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

-- Dump completed on 2023-10-15 16:46:37
