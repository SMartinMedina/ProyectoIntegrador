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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.especialidades_empleados: ~4 rows (approximately)
/*!40000 ALTER TABLE `especialidades_empleados` DISABLE KEYS */;
INSERT INTO `especialidades_empleados` (`id`, `nombre`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 'Peluquero', '2020-09-16 21:44:25', NULL),
	(2, 'Recepcionista', '2020-09-16 21:44:31', NULL),
	(3, 'Aasdsad', '2020-09-29 07:59:54', NULL),
	(4, 'Aqwe qwe', '2020-09-29 08:34:19', '2020-09-29 08:34:25');
/*!40000 ALTER TABLE `especialidades_empleados` ENABLE KEYS */;


-- Dumping structure for table proyectointegrador.estados_turnos
CREATE TABLE IF NOT EXISTS `estados_turnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.estados_turnos: ~5 rows (approximately)
/*!40000 ALTER TABLE `estados_turnos` DISABLE KEYS */;
INSERT INTO `estados_turnos` (`id`, `nombre`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 'En espera', '2020-09-16 21:44:45', NULL),
	(2, 'Siendo Atendido', '2020-09-16 21:44:50', NULL),
	(3, 'Cancelado', '2020-09-16 21:44:53', NULL),
	(4, 'asasdas', '2020-09-29 07:59:41', NULL),
	(5, 'asdadassaqweqweqwe', '2020-09-29 08:32:59', '2020-09-29 08:33:07');
/*!40000 ALTER TABLE `estados_turnos` ENABLE KEYS */;


-- Dumping structure for table proyectointegrador.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.roles: ~16 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nombre`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 'Administrador', '2020-09-16 20:01:30', NULL),
	(2, 'Empleado', '2020-09-16 21:19:04', NULL),
	(3, 'Cliente', '2020-09-16 21:19:07', NULL),
	(4, 'sdasdasd', '2020-09-16 22:05:47', NULL),
	(5, 'Fix22222', '2020-09-16 22:12:24', '2020-09-16 22:58:23'),
	(6, 'wqeqweqewqqeqw', '2020-09-16 22:12:28', '2020-09-16 22:56:55'),
	(7, 'wqeqweqewqqeqw', '2020-09-16 22:20:47', '2020-09-16 22:51:04'),
	(8, 'asdasdsad', '2020-09-16 22:29:23', '2020-09-16 22:48:51'),
	(9, '121231', '2020-09-16 22:38:34', '2020-09-16 22:50:49'),
	(10, 'AAAAAAAAA', '2020-09-16 22:58:26', '2020-09-16 22:58:33'),
	(11, 'asdadasd', '2020-09-16 23:14:23', '2020-09-16 23:14:32'),
	(12, 'adasdsadsa', '2020-09-16 23:14:27', NULL),
	(13, '123 - ad', '2020-09-19 14:47:53', NULL),
	(14, 'Aq123 123 ', '2020-09-19 14:48:04', '2020-09-19 14:48:15'),
	(15, 'a2', '2020-09-29 07:58:59', '2020-09-29 07:59:12'),
	(16, 'Q', '2020-09-29 08:32:50', NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table proyectointegrador.turnos
CREATE TABLE IF NOT EXISTS `turnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_estado_turno` int(11) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente_turno` (`id_cliente`),
  KEY `id_empleado_turno` (`id_empleado`),
  KEY `id_estadoturno_turno` (`id_estado_turno`),
  CONSTRAINT `id_cliente_turno` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `id_empleado_turno` FOREIGN KEY (`id_empleado`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `id_estadoturno_turno` FOREIGN KEY (`id_estado_turno`) REFERENCES `estados_turnos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.turnos: ~0 rows (approximately)
/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `turnos` ENABLE KEYS */;


-- Dumping structure for table proyectointegrador.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rol_usuario_fk` (`id_rol`),
  CONSTRAINT `id_rol_usuario_fk` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.usuarios: ~0 rows (approximately)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


-- Dumping structure for table proyectointegrador.usuarios_especialidades
CREATE TABLE IF NOT EXISTS `usuarios_especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_especialidad_usuario_fk` (`id_especialidad`),
  KEY `id_usuario_especialidad_fk` (`id_usuario`),
  CONSTRAINT `id_especialidad_usuario_fk` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades_empleados` (`id`),
  CONSTRAINT `id_usuario_especialidad_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.usuarios_especialidades: ~0 rows (approximately)
/*!40000 ALTER TABLE `usuarios_especialidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios_especialidades` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
