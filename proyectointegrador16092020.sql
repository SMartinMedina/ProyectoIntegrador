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


-- Dumping structure for table proyectointegrador.especialidades_empleados
CREATE TABLE IF NOT EXISTS `especialidades_empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.especialidades_empleados: 0 rows
/*!40000 ALTER TABLE `especialidades_empleados` DISABLE KEYS */;
INSERT INTO `especialidades_empleados` (`id`, `nombre`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 'Peluquero', '2020-09-16 21:44:25', NULL),
	(2, 'Recepcionista', '2020-09-16 21:44:31', NULL);
/*!40000 ALTER TABLE `especialidades_empleados` ENABLE KEYS */;


-- Dumping structure for table proyectointegrador.estados_turnos
CREATE TABLE IF NOT EXISTS `estados_turnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.estados_turnos: 0 rows
/*!40000 ALTER TABLE `estados_turnos` DISABLE KEYS */;
INSERT INTO `estados_turnos` (`id`, `nombre`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 'En espera', '2020-09-16 21:44:45', NULL),
	(2, 'Siendo Atendido', '2020-09-16 21:44:50', NULL),
	(3, 'Cancelado', '2020-09-16 21:44:53', NULL);
/*!40000 ALTER TABLE `estados_turnos` ENABLE KEYS */;


-- Dumping structure for table proyectointegrador.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.roles: 3 rows
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nombre`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 'Administrador', '2020-09-16 20:01:30', NULL),
	(2, 'Empleado', '2020-09-16 21:19:04', NULL),
	(3, 'Cliente', '2020-09-16 21:19:07', NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
