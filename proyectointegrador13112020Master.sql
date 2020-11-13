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


-- PRIMERO
-- Dumping structure for table proyectointegrador.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.roles: ~20 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nombre`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 'Administrador', '2020-09-16 20:01:30', NULL),
	(2, 'Estilista', '2020-09-16 21:19:04', NULL),
	(3, 'Cliente', '2020-09-16 21:19:07', NULL),
	(4, 'Recepcionista', '2020-09-16 22:05:47', NULL);

	
--SEGUNDO
-- Dumping structure for table proyectointegrador.especialidades_empleados
CREATE TABLE IF NOT EXISTS `especialidades_empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.especialidades_empleados: ~11 rows (approximately)
DELETE FROM `especialidades_empleados`;
/*!40000 ALTER TABLE `especialidades_empleados` DISABLE KEYS */;
INSERT INTO `especialidades_empleados` (`id`, `nombre`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 'Peluquero', '2020-09-16 21:44:25', NULL),
	(2, 'Tinturero', '2020-09-16 21:44:31', NULL),
	(3, 'Barberia', '2020-09-29 07:59:54', NULL);


-- TERCERO
-- Dumping structure for table proyectointegrador.estados_turnos
CREATE TABLE IF NOT EXISTS `estados_turnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.estados_turnos: ~8 rows (approximately)
DELETE FROM `estados_turnos`;
/*!40000 ALTER TABLE `estados_turnos` DISABLE KEYS */;
INSERT INTO `estados_turnos` (`id`, `nombre`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 'En espera', '2020-09-16 21:44:45', NULL),
	(2, 'Siendo atendido', '2020-09-16 21:44:50', NULL),
	(3, 'Finalizado', '2020-09-16 21:44:53', NULL),
	(4, 'Cancelado', '2020-09-29 07:59:41', NULL);

	
-- CUARTO

CREATE TABLE IF NOT EXISTS `usuarios_especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `demora_min` int(11) NOT NULL DEFAULT '20',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_especialidad_usuario_fk` (`id_especialidad`),
  KEY `id_usuario_especialidad_fk` (`id_usuario`),
  CONSTRAINT `id_especialidad_usuario_fk` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades_empleados` (`id`),
  CONSTRAINT `id_usuario_especialidad_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.usuarios: ~28 rows (approximately)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `id_rol`, `nombre`, `apellido`, `usuario`, `password`, `email`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 1, 'Admin', 'de Sistema', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin@admin.com', '2020-10-07 20:06:56', NULL);


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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- Dumping structure for table proyectointegrador.pedidos_reset_pass
CREATE TABLE IF NOT EXISTS `pedidos_reset_pass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `pass_temp` varchar(75) DEFAULT '',
  `renovado` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_usuario_pedido_reset` (`id_usuario`),
  CONSTRAINT `id_usuario_pedido_reset` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;




-- Dumping structure for table proyectointegrador.tiempo_estimado_especialista
CREATE TABLE IF NOT EXISTS `tiempo_estimado_especialista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_especialista` int(11) DEFAULT NULL,
  `id_servicio` int(11) DEFAULT NULL,
  `tiempo_demora` int(11) DEFAULT NULL,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- Dumping structure for table proyectointegrador.turnos
CREATE TABLE IF NOT EXISTS `turnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_estado_turno` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente_turno` (`id_cliente`),
  KEY `id_empleado_turno` (`id_empleado`),
  KEY `id_estadoturno_turno` (`id_estado_turno`),
  KEY `id_especialidad_empleado` (`id_especialidad`),
  CONSTRAINT `id_cliente_turno` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `id_empleado_turno` FOREIGN KEY (`id_empleado`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `id_especialidad_empleado` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades_empleados` (`id`),
  CONSTRAINT `id_estadoturno_turno` FOREIGN KEY (`id_estado_turno`) REFERENCES `estados_turnos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;





-- Dumping structure for table proyectointegrador.usuarios_especialidades

