-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.23 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for proyectointegrador
CREATE DATABASE IF NOT EXISTS `proyectointegrador` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `proyectointegrador`;


-- Dumping structure for table proyectointegrador.log_turnos
CREATE TABLE IF NOT EXISTS `log_turnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_turno` int(11) DEFAULT NULL,
  `id_estado_turno` int(11) DEFAULT NULL,
  `fecha_hora_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_turno_log_turnos` (`id_turno`),
  KEY `id_estado_turno_log_turnos` (`id_estado_turno`),
  CONSTRAINT `id_estado_turno_log_turnos` FOREIGN KEY (`id_estado_turno`) REFERENCES `estados_turnos` (`id`),
  CONSTRAINT `id_turno_log_turnos` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.log_turnos: ~12 rows (approximately)
DELETE FROM `log_turnos`;
/*!40000 ALTER TABLE `log_turnos` DISABLE KEYS */;
INSERT INTO `log_turnos` (`id`, `id_turno`, `id_estado_turno`, `fecha_hora_alta`) VALUES
	(1, 44, 1, '2020-11-13 17:42:23'),
	(2, 45, 1, '2020-11-13 17:49:53'),
	(3, 46, 1, '2020-11-13 17:51:03'),
	(4, 12, 2, '2020-11-13 17:51:53'),
	(5, 12, 3, '2020-11-13 17:51:55'),
	(6, 9, 3, '2020-11-13 17:51:56'),
	(7, 15, 2, '2020-11-13 17:52:00'),
	(8, 15, 3, '2020-11-13 17:52:01'),
	(9, 26, 2, '2020-11-13 17:52:05'),
	(10, 26, 3, '2020-11-13 17:52:07'),
	(11, 34, 2, '2020-11-13 17:52:09'),
	(12, 34, 3, '2020-11-13 17:52:12');
/*!40000 ALTER TABLE `log_turnos` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
