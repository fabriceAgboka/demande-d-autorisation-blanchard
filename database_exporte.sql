-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: localhost    Database: blanchard
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actionnaires`
--

DROP TABLE IF EXISTS `actionnaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actionnaires` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raison_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` int unsigned NOT NULL,
  `part` int unsigned NOT NULL,
  `demande_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actionnaires_demande_id_foreign` (`demande_id`),
  CONSTRAINT `actionnaires_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actionnaires`
--

LOCK TABLES `actionnaires` WRITE;
/*!40000 ALTER TABLE `actionnaires` DISABLE KEYS */;
/*!40000 ALTER TABLE `actionnaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activites`
--

DROP TABLE IF EXISTS `activites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('principal','secondaire') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `demande_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activites_demande_id_foreign` (`demande_id`),
  CONSTRAINT `activites_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activites`
--

LOCK TABLES `activites` WRITE;
/*!40000 ALTER TABLE `activites` DISABLE KEYS */;
/*!40000 ALTER TABLE `activites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capitals`
--

DROP TABLE IF EXISTS `capitals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `capitals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `montant` int NOT NULL,
  `devise` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CFA',
  `demande_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `capitals_demande_id_foreign` (`demande_id`),
  CONSTRAINT `capitals_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capitals`
--

LOCK TABLES `capitals` WRITE;
/*!40000 ALTER TABLE `capitals` DISABLE KEYS */;
/*!40000 ALTER TABLE `capitals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chiffre_affaires`
--

DROP TABLE IF EXISTS `chiffre_affaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chiffre_affaires` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `montant` int NOT NULL,
  `devise` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CFA',
  `demande_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chiffre_affaires_demande_id_foreign` (`demande_id`),
  CONSTRAINT `chiffre_affaires_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chiffre_affaires`
--

LOCK TABLES `chiffre_affaires` WRITE;
/*!40000 ALTER TABLE `chiffre_affaires` DISABLE KEYS */;
/*!40000 ALTER TABLE `chiffre_affaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contribuables`
--

DROP TABLE IF EXISTS `contribuables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contribuables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `raison_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forme_juridique` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_postale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rccm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_rccm` date NOT NULL,
  `organisme_rccm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demande_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contribuables_demande_id_foreign` (`demande_id`),
  CONSTRAINT `contribuables_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contribuables`
--

LOCK TABLES `contribuables` WRITE;
/*!40000 ALTER TABLE `contribuables` DISABLE KEYS */;
/*!40000 ALTER TABLE `contribuables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demandes`
--

DROP TABLE IF EXISTS `demandes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `demandes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demandes`
--

LOCK TABLES `demandes` WRITE;
/*!40000 ALTER TABLE `demandes` DISABLE KEYS */;
/*!40000 ALTER TABLE `demandes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dirigeants`
--

DROP TABLE IF EXISTS `dirigeants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dirigeants` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demande_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dirigeant_bp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dirigeants_demande_id_foreign` (`demande_id`),
  CONSTRAINT `dirigeants_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dirigeants`
--

LOCK TABLES `dirigeants` WRITE;
/*!40000 ALTER TABLE `dirigeants` DISABLE KEYS */;
/*!40000 ALTER TABLE `dirigeants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `documentable_id` int NOT NULL,
  `documentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etablissements`
--

DROP TABLE IF EXISTS `etablissements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etablissements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` int unsigned DEFAULT NULL,
  `localite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demande_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `etablissements_demande_id_foreign` (`demande_id`),
  CONSTRAINT `etablissements_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etablissements`
--

LOCK TABLES `etablissements` WRITE;
/*!40000 ALTER TABLE `etablissements` DISABLE KEYS */;
/*!40000 ALTER TABLE `etablissements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localisations`
--

DROP TABLE IF EXISTS `localisations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `localisations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quartier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lot` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `illot` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_cadastre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_tf` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demande_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom_complet_lieu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double(15,10) DEFAULT NULL,
  `longitude` double(15,10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `localisations_demande_id_foreign` (`demande_id`),
  CONSTRAINT `localisations_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localisations`
--

LOCK TABLES `localisations` WRITE;
/*!40000 ALTER TABLE `localisations` DISABLE KEYS */;
/*!40000 ALTER TABLE `localisations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locals`
--

DROP TABLE IF EXISTS `locals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raison_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ncc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boite_postale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `demande_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locals_demande_id_foreign` (`demande_id`),
  CONSTRAINT `locals_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locals`
--

LOCK TABLES `locals` WRITE;
/*!40000 ALTER TABLE `locals` DISABLE KEYS */;
/*!40000 ALTER TABLE `locals` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2019_12_14_000001_create_personal_access_tokens_table',1),(3,'2023_08_29_061716_create_demandes_table',1),(4,'2023_08_29_062158_create_paiements_table',1),(5,'2023_08_29_062225_create_contribuables_table',1),(6,'2023_08_29_062238_create_telephones_table',1),(7,'2023_08_29_062253_create_documents_table',1),(8,'2023_08_29_062315_create_localisations_table',1),(9,'2023_08_29_062330_create_etablissements_table',1),(10,'2023_08_29_062359_create_activites_table',1),(11,'2023_08_29_062447_create_chiffre_affaires_table',1),(12,'2023_08_29_062523_create_capitals_table',1),(13,'2023_08_29_062533_create_actionnaires_table',1),(14,'2023_08_29_062607_create_dirigeants_table',1),(15,'2023_08_29_062617_create_locals_table',1),(16,'2023_08_29_062632_create_suivi_comptables_table',1),(17,'2023_08_29_062657_create_regimes_table',1),(18,'2023_09_05_211904_add_dirigeant_bp_to_dirigeants_table',1),(19,'2023_09_05_224636_add_nom_suivi_compta_to_suivi_comptables_table',1),(20,'2023_09_20_024708_alter_table_localisations',1),(21,'2023_12_04_172455_create_statistics_table',1),(22,'2023_12_04_175156_create_statistic_globals_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paiements`
--

DROP TABLE IF EXISTS `paiements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paiements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `montant` int unsigned DEFAULT '12',
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `network` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_message` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL,
  `demande_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paiements_demande_id_foreign` (`demande_id`),
  CONSTRAINT `paiements_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paiements`
--

LOCK TABLES `paiements` WRITE;
/*!40000 ALTER TABLE `paiements` DISABLE KEYS */;
/*!40000 ALTER TABLE `paiements` ENABLE KEYS */;
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
  `expires_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `regimes`
--

DROP TABLE IF EXISTS `regimes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regimes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `regime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demande_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regimes_demande_id_foreign` (`demande_id`),
  CONSTRAINT `regimes_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regimes`
--

LOCK TABLES `regimes` WRITE;
/*!40000 ALTER TABLE `regimes` DISABLE KEYS */;
/*!40000 ALTER TABLE `regimes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistic_globals`
--

DROP TABLE IF EXISTS `statistic_globals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statistic_globals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `month` int DEFAULT NULL,
  `year` int DEFAULT NULL,
  `total_demande` int DEFAULT NULL,
  `total_demande_attente` int DEFAULT NULL,
  `total_demande_confirmer` int DEFAULT NULL,
  `total_demande_valider` int DEFAULT NULL,
  `total_demande_rejeter` int DEFAULT NULL,
  `graphe_demande_total` longtext COLLATE utf8mb4_unicode_ci,
  `graphe_demande_attente` longtext COLLATE utf8mb4_unicode_ci,
  `graphe_demande_confirmer` longtext COLLATE utf8mb4_unicode_ci,
  `graphe_demande_valider` longtext COLLATE utf8mb4_unicode_ci,
  `graphe_demande_rejeter` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistic_globals`
--

LOCK TABLES `statistic_globals` WRITE;
/*!40000 ALTER TABLE `statistic_globals` DISABLE KEYS */;
/*!40000 ALTER TABLE `statistic_globals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistics`
--

DROP TABLE IF EXISTS `statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statistics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `month` int DEFAULT NULL,
  `year` int DEFAULT NULL,
  `total_demande` int DEFAULT NULL,
  `total_demande_attente` int DEFAULT NULL,
  `total_demande_confirmer` int DEFAULT NULL,
  `total_demande_valider` int DEFAULT NULL,
  `total_demande_rejeter` int DEFAULT NULL,
  `graphe_demande_total` longtext COLLATE utf8mb4_unicode_ci,
  `graphe_demande_attente` longtext COLLATE utf8mb4_unicode_ci,
  `graphe_demande_confirmer` longtext COLLATE utf8mb4_unicode_ci,
  `graphe_demande_valider` longtext COLLATE utf8mb4_unicode_ci,
  `graphe_demande_rejeter` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistics`
--

LOCK TABLES `statistics` WRITE;
/*!40000 ALTER TABLE `statistics` DISABLE KEYS */;
/*!40000 ALTER TABLE `statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suivi_comptables`
--

DROP TABLE IF EXISTS `suivi_comptables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suivi_comptables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('Cabinet Comptable','Centre de Gestion Integré') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ncc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boite_postale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demande_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom_suivi_compta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `suivi_comptables_demande_id_foreign` (`demande_id`),
  CONSTRAINT `suivi_comptables_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suivi_comptables`
--

LOCK TABLES `suivi_comptables` WRITE;
/*!40000 ALTER TABLE `suivi_comptables` DISABLE KEYS */;
/*!40000 ALTER TABLE `suivi_comptables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telephones`
--

DROP TABLE IF EXISTS `telephones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `telephones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephoneable_id` int NOT NULL,
  `telephoneable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telephones`
--

LOCK TABLES `telephones` WRITE;
/*!40000 ALTER TABLE `telephones` DISABLE KEYS */;
/*!40000 ALTER TABLE `telephones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int NOT NULL DEFAULT '2' COMMENT '1 : admin & 2 : user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Etat du compte',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'AGBOKA','Fabrice','22590948503','fabrice@gmail.com','$2y$12$Pxjzpy05NGt60NMmBVydbOxTZmHWXRr0HX8YjYEpX2bXz2Dknj8GO',1,NULL,1,NULL,'2023-12-04 20:48:23','2023-12-04 20:48:23'),(2,'DOE','John','22590948503','john@gmail.com','$2y$12$2OEedo1V2H9nolQ46A0xZugkHzEHcMxrBxQt3rubEhwMEfc3ktvm6',2,NULL,1,NULL,'2023-12-04 20:48:23','2023-12-04 20:48:23'),(3,'DOE','Jane',NULL,'jane@gmail.com','$2y$12$9wYXilNS/nvFBoa34GdpQ.eNFklB65DsSyB4bh1eDI.09chlWHdzK',2,NULL,1,NULL,'2023-12-04 20:48:23','2023-12-04 20:48:23');
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

-- Dump completed on 2023-12-04 20:56:57
