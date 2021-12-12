-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.6.5-MariaDB-1:10.6.5+maria~focal - mariadb.org binary distribution
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for Registro
CREATE DATABASE IF NOT EXISTS `Registro` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci */;
USE `Registro`;
-- Dumping structure for table Registro.mat_materia
CREATE TABLE IF NOT EXISTS `mat_materia` (
  `mat_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mat_nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Registro.mat_materia: ~9 rows (approximately)
/*!40000 ALTER TABLE `mat_materia` DISABLE KEYS */;
INSERT INTO `mat_materia` (`mat_id`, `mat_nombre`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Lenguaje', NULL, NULL, NULL),
	(2, 'Matemáticas', NULL, NULL, NULL),
	(3, 'Sociales', NULL, NULL, NULL),
	(4, 'Ciencias Salud y Medio Ambiente', NULL, NULL, NULL),
	(5, 'Informática', NULL, NULL, NULL),
	(6, 'Orientación para la vida', NULL, NULL, NULL),
	(7, 'Artistica', '2021-12-12 08:17:10', '2021-12-12 08:18:23', '2021-12-12 08:18:23');
/*!40000 ALTER TABLE `mat_materia` ENABLE KEYS */;


-- Dumping structure for table Registro.grd_grado
CREATE TABLE IF NOT EXISTS `grd_grado` (
  `grd_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `grd_nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`grd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Registro.grd_grado: ~16 rows (approximately)
/*!40000 ALTER TABLE `grd_grado` DISABLE KEYS */;
INSERT INTO `grd_grado` (`grd_id`, `grd_nombre`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Séptimo Grado', NULL, NULL, NULL),
	(2, 'Octavo Grado', NULL, NULL, NULL),
	(3, 'Noveno Grado', NULL, NULL, NULL),
	(4, 'Primer Año Bachillerato', NULL, NULL, NULL),
	(5, 'Segundo Año Bachillerato', NULL, NULL, NULL),
	(6, 'Tercer Año Bachillerato', NULL, NULL, NULL),
	(7, 'Kinder', '2021-12-12 08:19:13', '2021-12-12 08:20:14', '2021-12-12 08:20:14');
/*!40000 ALTER TABLE `grd_grado` ENABLE KEYS */;
-- Dumping structure for table Registro.alm_alumno
CREATE TABLE IF NOT EXISTS `alm_alumno` (
  `alm_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alm_codigo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alm_nombre` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alm_edad` int(10) unsigned NOT NULL,
  `alm_sexo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alm_id_grd` bigint(20) unsigned NOT NULL,
  `alm_observacion` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`alm_id`),
  UNIQUE KEY `alm_alumno_alm_codigo_unique` (`alm_codigo`),
  KEY `alm_alumno_alm_id_grd_foreign` (`alm_id_grd`),
  CONSTRAINT `alm_alumno_alm_id_grd_foreign` FOREIGN KEY (`alm_id_grd`) REFERENCES `grd_grado` (`grd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Registro.alm_alumno: ~5 rows (approximately)
/*!40000 ALTER TABLE `alm_alumno` DISABLE KEYS */;
INSERT INTO `alm_alumno` (`alm_id`, `alm_codigo`, `alm_nombre`, `alm_edad`, `alm_sexo`, `alm_id_grd`, `alm_observacion`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '20222229', 'Rita Alexandra Gutierrez', 16, 'Femenino', 3, NULL, '2021-12-12 06:04:07', '2021-12-12 06:33:42', NULL),
	(2, '20222462', 'Rasheed Harber II', 17, 'Masculino', 5, 'Quis occaecati ut harum voluptatem. Illo nulla est harum ut. Totam iusto ipsam quas excepturi debitis laborum provident sequi. Culpa quas odit aperiam voluptatem totam aliquid et. Maiores nihil ut ut at expedita laudantium voluptatum autem.', '2021-12-12 06:04:07', '2021-12-12 07:16:28', NULL),
	(3, '20225676', 'Jovan Mraz', 15, 'Masculino', 5, 'Et aliquid et quia dolor vel. Optio dolor aut aspernatur maiores corporis rem. Odit doloribus non sint amet. Et rem quidem aut minus earum nam. Non impedit suscipit debitis. Vel unde consectetur nihil enim omnis quis est.', '2021-12-12 06:04:07', '2021-12-12 06:04:07', NULL),
	(4, '20226449', 'Mr. Hubert Gleichner', 12, 'Masculino', 2, 'At illum doloribus numquam beatae quia nam non. Sed beatae in tempora. Nostrum debitis nemo et consequatur et minima occaecati. Itaque aut minima debitis quia officiis aut rerum natus. Illo a est ut et dolorem.', '2021-12-12 06:04:07', '2021-12-12 06:04:07', NULL),
	(5, '20225598', 'Jacques Effertz', 10, 'Masculino', 1, 'Neque minus necessitatibus autem eveniet. Et quod laborum eum perferendis. Ut sequi earum suscipit possimus. Qui delectus non repudiandae velit cumque sint voluptatem consectetur.', '2021-12-12 06:04:07', '2021-12-12 06:04:07', NULL),
	(6, '20220012', 'Fernando Carranza', 22, 'Masculino', 6, 'Ninguna', '2021-12-12 06:35:00', '2021-12-12 06:36:10', '2021-12-12 06:36:10'),
	(9, '22222222', 'Fernando Carranza', 22, 'Masculino', 5, NULL, '2021-12-12 08:22:18', '2021-12-12 08:37:57', NULL);
/*!40000 ALTER TABLE `alm_alumno` ENABLE KEYS */;

-- Dumping structure for table Registro.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Registro.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;




-- Dumping structure for table Registro.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Registro.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2021_12_10_212755_create_mat_materia_table', 1),
	(6, '2021_12_10_212806_create_grd_grado_table', 1),
	(7, '2021_12_10_212832_create_mxg_materiasxgrado_table', 1),
	(8, '2021_12_10_212840_create_alm_alumno_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table Registro.mxg_materiasxgrado
CREATE TABLE IF NOT EXISTS `mxg_materiasxgrado` (
  `mxg_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mxg_id_grd` bigint(20) unsigned NOT NULL,
  `mxg_id_mat` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mxg_id`),
  KEY `mxg_materiasxgrado_mxg_id_grd_foreign` (`mxg_id_grd`),
  KEY `mxg_materiasxgrado_mxg_id_mat_foreign` (`mxg_id_mat`),
  CONSTRAINT `mxg_materiasxgrado_mxg_id_grd_foreign` FOREIGN KEY (`mxg_id_grd`) REFERENCES `grd_grado` (`grd_id`),
  CONSTRAINT `mxg_materiasxgrado_mxg_id_mat_foreign` FOREIGN KEY (`mxg_id_mat`) REFERENCES `mat_materia` (`mat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Registro.mxg_materiasxgrado: ~43 rows (approximately)
/*!40000 ALTER TABLE `mxg_materiasxgrado` DISABLE KEYS */;
INSERT INTO `mxg_materiasxgrado` (`mxg_id`, `mxg_id_grd`, `mxg_id_mat`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, NULL, NULL, NULL),
	(2, 1, 2, NULL, NULL, NULL),
	(3, 1, 3, NULL, NULL, NULL),
	(4, 2, 1, NULL, NULL, NULL),
	(5, 2, 2, NULL, NULL, NULL),
	(6, 3, 2, NULL, NULL, NULL),
	(7, 3, 3, NULL, NULL, NULL),
	(8, 4, 1, NULL, NULL, NULL),
	(9, 4, 2, NULL, NULL, NULL),
	(10, 4, 3, NULL, NULL, NULL),
	(11, 4, 4, NULL, NULL, NULL),
	(12, 5, 1, NULL, NULL, NULL),
	(13, 5, 2, NULL, NULL, NULL),
	(14, 5, 4, NULL, NULL, NULL),
	(15, 5, 5, NULL, NULL, NULL),
	(16, 7, 1, '2021-12-12 08:19:13', '2021-12-12 08:19:57', '2021-12-12 08:19:57'),
	(17, 7, 2, '2021-12-12 08:19:13', '2021-12-12 08:19:57', '2021-12-12 08:19:57'),
	(18, 7, 1, '2021-12-12 08:19:57', '2021-12-12 08:19:57', NULL),
	(19, 7, 2, '2021-12-12 08:19:57', '2021-12-12 08:19:57', NULL),
	(20, 7, 4, '2021-12-12 08:19:57', '2021-12-12 08:19:57', NULL);
/*!40000 ALTER TABLE `mxg_materiasxgrado` ENABLE KEYS */;
