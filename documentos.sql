-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla documentos.pro_proceso
CREATE TABLE IF NOT EXISTS `pro_proceso` (
  `PRO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRO_PREFIJO` varchar(20) DEFAULT NULL,
  `PRO_NOMBRE` varchar(60) DEFAULT NULL,
  KEY `Índice 1` (`PRO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla documentos.pro_proceso: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `pro_proceso` DISABLE KEYS */;
INSERT INTO `pro_proceso` (`PRO_ID`, `PRO_PREFIJO`, `PRO_NOMBRE`) VALUES
	(1, 'ING', 'Ingeniería'),
	(2, 'ADM', 'Administracion'),
	(3, 'CONT', 'Contaduria'),
	(4, 'TES', 'Tesoreria'),
	(5, 'ALM', 'Almacen');
/*!40000 ALTER TABLE `pro_proceso` ENABLE KEYS */;

-- Volcando estructura para tabla documentos.tip_tipo_doc
CREATE TABLE IF NOT EXISTS `tip_tipo_doc` (
  `TIP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIP_NOMBRE` varchar(60) DEFAULT NULL,
  `TIP_PREFIJO` varchar(20) DEFAULT NULL,
  KEY `Índice 1` (`TIP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla documentos.tip_tipo_doc: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tip_tipo_doc` DISABLE KEYS */;
INSERT INTO `tip_tipo_doc` (`TIP_ID`, `TIP_NOMBRE`, `TIP_PREFIJO`) VALUES
	(1, 'Instrucctivo', 'INS'),
	(2, 'Factura', 'FAC'),
	(3, 'Nota de Credito', 'NDC'),
	(4, 'Nota de Debito', 'NDD'),
	(5, 'Cheque', 'CHE');
/*!40000 ALTER TABLE `tip_tipo_doc` ENABLE KEYS */;


-- Volcando estructura para tabla documentos.doc_documento
CREATE TABLE IF NOT EXISTS `doc_documento` (
  `DOC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOC_NOMBRE` varchar(60) DEFAULT NULL,
  `DOC_CODIGO` varchar(20) NOT NULL DEFAULT '',
  `DOC_CONTENIDO` varchar(4000) DEFAULT NULL,
  `DOC_ID_TIPO` int(11) NOT NULL,
  `DOC_ID_PROCESO` int(11) NOT NULL,
  KEY `Índice 1` (`DOC_ID`),
  KEY `DOC_PROCESO_idx` (`DOC_ID_PROCESO`),
  KEY `DOC_TIPO_idx` (`DOC_ID_TIPO`),
  CONSTRAINT `DOC_PROCESO_idx` FOREIGN KEY (`DOC_ID_PROCESO`) REFERENCES `pro_proceso` (`PRO_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `DOC_TIPO_idx` FOREIGN KEY (`DOC_ID_TIPO`) REFERENCES `tip_tipo_doc` (`TIP_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla documentos.doc_documento: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `doc_documento` DISABLE KEYS */;
INSERT INTO `doc_documento` (`DOC_ID`, `DOC_NOMBRE`, `DOC_CODIGO`, `DOC_CONTENIDO`, `DOC_ID_TIPO`, `DOC_ID_PROCESO`) VALUES
	(3, 'Especificacion de pagos', 'NDC-TES-1', 'Documentacion de las condiciones de pago', 3, 4),
	(4, 'Manual de entidad relacion', 'INS-ING-1', 'diagrama de la base de datos', 1, 1),
	(5, 'Notas de Nueva reglamento', 'INS-ADM-1', 'Nuevo Reglamento de proceso', 1, 2),
	(6, 'fdfds', 'FAC-ALM-1', 'sdfds', 2, 5),
	(7, 'Conciliaciones 2022', 'NDD-CONT-1', 'Documentos de conciliaciones de almacen', 4, 3),
	(8, 'Nomenclatura de cuentas', 'INS-CONT-1', 'Descripcion de cuentas', 1, 3);
/*!40000 ALTER TABLE `doc_documento` ENABLE KEYS */;

-- Volcando estructura para tabla documentos.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla documentos.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla documentos.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla documentos.migrations: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla documentos.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla documentos.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla documentos.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
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

-- Volcando datos para la tabla documentos.personal_access_tokens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;


-- Volcando estructura para tabla documentos.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla documentos.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'misael vargas', 'misaeboca@gmail.com', NULL, '$2y$10$Mtb0NIyisbVoD5Eq1cbDLOML4C4UOMdZ.hUIPn.C7H.PBhTMwR/5i', NULL, '2022-03-22 23:36:30', '2022-03-22 23:36:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
