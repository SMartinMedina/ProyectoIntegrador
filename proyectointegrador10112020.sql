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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.especialidades_empleados: ~11 rows (approximately)
DELETE FROM `especialidades_empleados`;
/*!40000 ALTER TABLE `especialidades_empleados` DISABLE KEYS */;
INSERT INTO `especialidades_empleados` (`id`, `nombre`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 'Peluquero', '2020-09-16 21:44:25', NULL),
	(2, 'Tinturero', '2020-09-16 21:44:31', NULL),
	(3, 'Barberia', '2020-09-29 07:59:54', NULL),
	(4, 'Aqwe qwe', '2020-09-29 08:34:19', '2020-09-29 08:34:25'),
	(5, 'ASdASDdasdad', '2020-10-07 19:47:41', '2020-10-07 19:47:48'),
	(6, 'qweq qwwq eqw', '2020-10-07 19:48:00', '2020-10-07 19:48:02'),
	(7, 'Test1', '2020-10-21 09:15:04', '2020-10-22 19:53:04'),
	(8, 'Prueba 99', '2020-10-21 09:15:20', '2020-10-21 11:53:35'),
	(9, 'Barberia 2', '2020-10-22 19:59:40', '2020-10-22 19:59:50'),
	(10, 'AsdSDSA', '2020-10-22 20:40:52', NULL),
	(11, 'adasqqwewqe', '2020-10-22 20:41:09', '2020-10-22 20:41:16');
/*!40000 ALTER TABLE `especialidades_empleados` ENABLE KEYS */;


-- Dumping structure for table proyectointegrador.estados_turnos
CREATE TABLE IF NOT EXISTS `estados_turnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.estados_turnos: ~8 rows (approximately)
DELETE FROM `estados_turnos`;
/*!40000 ALTER TABLE `estados_turnos` DISABLE KEYS */;
INSERT INTO `estados_turnos` (`id`, `nombre`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 'En espera', '2020-09-16 21:44:45', NULL),
	(2, 'Siendo atendido', '2020-09-16 21:44:50', NULL),
	(3, 'Cancelado', '2020-09-16 21:44:53', NULL),
	(4, 'asdasdasdasdasdasdadasd', '2020-09-29 07:59:41', '2020-10-22 20:00:35'),
	(5, 'asdadassaqweqweqwe', '2020-09-29 08:32:59', '2020-09-29 08:33:07'),
	(6, 'a', '2020-10-07 19:48:20', '2020-10-07 19:48:26'),
	(7, 'A borrar', '2020-10-21 09:35:01', '2020-10-21 11:59:30'),
	(8, 'Sorpresa1111', '2020-10-21 09:36:23', '2020-10-22 20:00:39'),
	(9, 'asdasdas', '2020-10-21 11:59:55', '2020-10-22 20:00:42'),
	(10, 'Qweqweqew', '2020-10-25 14:24:27', '2020-10-25 14:24:40');
/*!40000 ALTER TABLE `estados_turnos` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectointegrador.pedidos_reset_pass: ~5 rows (approximately)
DELETE FROM `pedidos_reset_pass`;
/*!40000 ALTER TABLE `pedidos_reset_pass` DISABLE KEYS */;
INSERT INTO `pedidos_reset_pass` (`id`, `id_usuario`, `pass_temp`, `renovado`, `estado`, `fecha_alta`) VALUES
	(1, 15, 'c4TJuPSeqZ983azfH6nbVIx7ydMsFp', 0, 0, '2019-06-01 01:47:32'),
	(2, 15, '8aQC4HpSEXGNcBP0nxFktODzwYUbym', 0, 0, '2019-06-01 01:52:35'),
	(3, 5, 'snLghHiuFdYjkK5T7I8f9w4cpA031e', 0, 0, '2019-08-14 22:52:17'),
	(4, 15, 'Z1XsqktSuLbUeNJ0FWiCGc4n9dMrmP', 0, 0, '2020-01-26 15:21:56'),
	(5, 15, '8Y7mWjMynXtzI6Tbpd0QoE5HR1KwfJ', 0, 0, '2020-01-26 16:04:01');
/*!40000 ALTER TABLE `pedidos_reset_pass` ENABLE KEYS */;


-- Dumping structure for table proyectointegrador.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.roles: ~20 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nombre`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 'Administrador', '2020-09-16 20:01:30', NULL),
	(2, 'Estilista', '2020-09-16 21:19:04', NULL),
	(3, 'Cliente', '2020-09-16 21:19:07', NULL),
	(4, 'sdasdasd', '2020-09-16 22:05:47', '2020-10-22 20:00:21'),
	(5, 'Fix22222', '2020-09-16 22:12:24', '2020-09-16 22:58:23'),
	(6, 'wqeqweqewqqeqw', '2020-09-16 22:12:28', '2020-09-16 22:56:55'),
	(7, 'wqeqweqewqqeqw', '2020-09-16 22:20:47', '2020-09-16 22:51:04'),
	(8, 'asdasdsad', '2020-09-16 22:29:23', '2020-09-16 22:48:51'),
	(9, '121231', '2020-09-16 22:38:34', '2020-09-16 22:50:49'),
	(10, 'AAAAAAAAA', '2020-09-16 22:58:26', '2020-09-16 22:58:33'),
	(11, 'asdadasd', '2020-09-16 23:14:23', '2020-09-16 23:14:32'),
	(12, 'adasdsadsa', '2020-09-16 23:14:27', '2020-10-22 20:00:17'),
	(13, 'Sorpresa', '2020-09-19 14:47:53', '2020-10-21 11:58:42'),
	(14, 'Aq123 123 ', '2020-09-19 14:48:04', '2020-09-19 14:48:15'),
	(15, 'a2', '2020-09-29 07:58:59', '2020-09-29 07:59:12'),
	(16, 'Qasdasda', '2020-09-29 08:32:50', '2020-10-07 19:43:53'),
	(17, 'Qasda s', '2020-10-07 19:48:43', '2020-10-07 19:48:54'),
	(18, 'Asd q 2 ', '2020-10-21 09:34:32', '2020-10-21 11:58:28'),
	(19, 'adadasd', '2020-10-21 10:32:17', '2020-10-21 11:58:22'),
	(20, 'Zaraza', '2020-10-21 10:46:17', '2020-10-22 20:00:11'),
	(21, 'Recepcionista', '2020-10-27 20:04:27', NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table proyectointegrador.tiempo_estimado_especialista
CREATE TABLE IF NOT EXISTS `tiempo_estimado_especialista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_especialista` int(11) DEFAULT NULL,
  `id_servicio` int(11) DEFAULT NULL,
  `tiempo_demora` int(11) DEFAULT NULL,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.tiempo_estimado_especialista: 7 rows
DELETE FROM `tiempo_estimado_especialista`;
/*!40000 ALTER TABLE `tiempo_estimado_especialista` DISABLE KEYS */;
INSERT INTO `tiempo_estimado_especialista` (`id`, `id_especialista`, `id_servicio`, `tiempo_demora`, `fecha_baja`, `fecha_alta`) VALUES
	(1, 2, 1, 20, NULL, '2020-11-06 16:55:20'),
	(2, 18, 1, 20, NULL, '2020-11-06 16:55:38'),
	(3, 19, 1, 20, NULL, '2020-11-06 16:55:46'),
	(4, 21, 2, 40, NULL, '2020-11-06 16:56:18'),
	(5, 18, 2, 35, NULL, '2020-11-06 16:56:26'),
	(6, 19, 2, 45, NULL, '2020-11-06 16:56:36'),
	(7, 2, 3, 20, NULL, '2020-11-10 08:32:24');
/*!40000 ALTER TABLE `tiempo_estimado_especialista` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.turnos: ~23 rows (approximately)
DELETE FROM `turnos`;
/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
INSERT INTO `turnos` (`id`, `id_cliente`, `id_empleado`, `id_estado_turno`, `id_especialidad`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 3, 2, 3, 1, '2020-10-07 22:27:07', NULL),
	(2, 3, 6, 1, 3, '2020-10-07 22:27:56', NULL),
	(3, 8, 1, 1, 1, '2020-10-27 18:30:26', '2020-10-27 18:37:08'),
	(4, 8, 1, 1, 1, '2020-10-27 18:30:47', '2020-10-27 18:37:10'),
	(5, 3, 1, 1, 1, '2020-10-27 18:31:30', '2020-10-27 18:37:14'),
	(6, 8, 1, 1, 1, '2020-10-27 18:33:59', '2020-10-27 18:37:16'),
	(7, 20, 3, 1, 3, '2020-10-27 18:34:21', '2020-10-27 18:37:18'),
	(8, 8, 18, 1, 1, '2020-10-27 18:36:27', NULL),
	(9, 8, 2, 1, 1, '2020-10-27 19:23:43', NULL),
	(10, 8, 19, 1, 2, '2020-10-27 19:23:43', NULL),
	(11, 8, 4, 1, 3, '2020-10-27 19:23:43', NULL),
	(12, 8, 2, 1, 1, '2020-10-27 19:26:44', NULL),
	(13, 8, 19, 1, 1, '2020-10-27 19:27:22', NULL),
	(14, 8, 18, 1, 2, '2020-10-27 19:27:22', NULL),
	(15, 8, 2, 1, 3, '2020-10-27 19:27:22', NULL),
	(17, 3, 19, 1, 2, '2020-11-07 16:23:38', NULL),
	(18, 3, 19, 1, 1, '2020-11-07 16:29:02', NULL),
	(19, 3, 21, 1, 1, '2020-11-07 16:30:56', NULL),
	(20, 3, 18, 1, 2, '2020-11-07 16:30:56', NULL),
	(21, 3, 19, 1, 2, '2020-11-09 16:39:16', NULL),
	(23, 3, 21, 1, 1, '2020-11-09 20:22:33', NULL),
	(24, 30, 19, 1, 1, '2020-11-09 20:26:58', NULL),
	(25, 30, 18, 1, 2, '2020-11-09 20:26:58', NULL),
	(26, 30, 2, 1, 3, '2020-11-09 20:26:58', NULL),
	(27, 3, 32, 1, 1, '2020-11-10 22:14:30', NULL),
	(28, 3, 32, 1, 2, '2020-11-10 22:14:30', NULL),
	(29, 3, 32, 1, 3, '2020-11-10 22:14:30', NULL),
	(30, 3, 21, 1, 1, '2020-11-10 22:49:20', NULL),
	(32, 3, 21, 1, 1, '2020-11-10 22:50:19', NULL),
	(33, 3, 32, 1, 1, '2020-11-10 23:34:21', NULL),
	(34, 3, 2, 1, 1, '2020-11-10 23:36:50', NULL),
	(35, 3, 18, 1, 2, '2020-11-10 23:36:50', NULL),
	(36, 3, 4, 1, 3, '2020-11-10 23:36:50', NULL),
	(37, 3, 21, 1, 1, '2020-11-10 23:47:44', NULL),
	(38, 3, 18, 1, 2, '2020-11-10 23:47:44', NULL),
	(39, 3, 2, 1, 1, '2020-11-10 23:48:32', NULL),
	(40, 3, 18, 1, 2, '2020-11-10 23:48:32', NULL),
	(41, 3, 4, 1, 3, '2020-11-10 23:48:32', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.usuarios: ~29 rows (approximately)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `id_rol`, `nombre`, `apellido`, `usuario`, `password`, `email`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 1, 'Admin', 'istrador', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 'asda@asdasd.com', '2020-10-07 20:06:56', NULL),
	(2, 2, 'Emp UsuarioRol2', 'Apell', 'empleado@empleado.com', 'e10adc3949ba59abbe56e057f20f883e', 'asd2a@asdasd.com', '2020-10-07 20:07:32', NULL),
	(3, 3, 'Buen Cliente', 'Apell', 'cliente@cliente.com', 'e10adc3949ba59abbe56e057f20f883e', 'cliente@asdasd.com', '2020-10-07 22:20:26', NULL),
	(4, 2, 'Emp Dos', 'ApellDos', 'empleado1', 'e10adc3949ba59abbe56e057f20f883e', 'empleado2@asdasd.com', '2020-10-07 22:23:58', NULL),
	(5, 2, 'Emp Tres', 'ApellTres', 'empleado2', 'e10adc3949ba59abbe56e057f20f883e', 'empleado3@asdasd.com', '2020-10-07 22:24:14', NULL),
	(6, 2, 'Emp Cuatro', 'ApellTres', 'empleado3', 'e10adc3949ba59abbe56e057f20f883e', 'empleado4@asdasd.com', '2020-10-07 22:24:28', NULL),
	(7, 2, 'Test ', 'Qweqew', 'asdas@asda.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdas@asda.com', '2020-10-22 02:03:07', NULL),
	(8, 3, 'Cliente', 'Cliente 2222', 'adqweqw@dada.com', 'e10adc3949ba59abbe56e057f20f883e', 'adqweqw@dada.com', '2020-10-22 02:03:27', NULL),
	(9, 12, 'ZZZZZZZZZZZZZ', 'A231', '2222dadas@asda.com', 'e10adc3949ba59abbe56e057f20f883e', '2222dadas@asda.com', '2020-10-22 02:04:54', '2020-10-22 02:22:22'),
	(10, 3, 'sadad', 'adasda', 'dasdada@sadasd.com', 'e10adc3949ba59abbe56e057f20f883e', 'dasdada@sadasd.com', '2020-10-22 02:06:03', '2020-10-22 02:22:15'),
	(11, 2, 'Empi', 'Apell', 'das@asdasd.com', 'e10adc3949ba59abbe56e057f20f883e', 'das@asdasd.com', '2020-10-22 16:08:21', NULL),
	(12, 2, 'Empi2', 'Apell2', 'daas@asdasd.com', 'e10adc3949ba59abbe56e057f20f883e', 'daas@asdasd.com', '2020-10-22 16:09:02', NULL),
	(13, 2, 'Aqweqeqwe', 'asdad', 'asdsada@asdasd.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdsada@asdasd.com', '2020-10-22 16:10:20', NULL),
	(14, 2, 'Emple', 'Adoo', 'asdsa@asdads.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdsa@asdads.com', '2020-10-22 16:11:30', NULL),
	(15, 2, 'ASqwewqe qeq', 'q wewq ewqew eqw eqwe ', 'qweqweqe@adas.com', 'e10adc3949ba59abbe56e057f20f883e', 'qweqweqe@adas.com', '2020-10-22 16:13:13', NULL),
	(16, 2, 'awqeqeqwe', 'qweqweadasd', 'asda@asdasd.com', 'e10adc3949ba59abbe56e057f20f883e', 'asda@asdasd.com', '2020-10-22 16:14:39', NULL),
	(17, 2, 'asdsadsadsa', 'adadas', 'asdad@asda.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdad@asda.com', '2020-10-22 16:16:32', NULL),
	(18, 2, 'Xsadaasda', 'asd ad sad asdas ', 'dasdsa@sadad.com', 'e10adc3949ba59abbe56e057f20f883e', 'dasdsa@sadad.com', '2020-10-22 16:18:10', NULL),
	(19, 2, 'ASDadasd', 'sdadas', 'dasdsa@sadad.com', 'e10adc3949ba59abbe56e057f20f883e', 'dasdsa@sadad.com', '2020-10-22 16:18:31', NULL),
	(20, 3, 'Nadia', 'Nadein', 'nadie@asdasd.com', 'e10adc3949ba59abbe56e057f20f883e', 'nadie@asdasd.com', '2020-10-22 20:03:23', NULL),
	(21, 2, 'Peluq', 'Nuevo', 'asdasda@asdasd.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdasda@asdasd.com', '2020-10-22 20:04:13', NULL),
	(22, 2, 'ASDasdasd', '', 'asdasd@asdasd.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdasd@asdasd.com', '2020-10-22 20:43:53', '2020-10-22 20:44:10'),
	(23, 2, 'Andres', 'Ribet', 'asdasd@asda.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdasd@asda.com', '2020-10-22 20:45:05', '2020-10-24 14:23:56'),
	(24, 3, 'Awqeqwe', 'Bdasdasd8', 'as222ada@asdasd.com', 'e10adc3949ba59abbe56e057f20f883e', 'as222ada@asdasd.com', '2020-10-23 09:50:01', '2020-10-24 14:20:59'),
	(25, 3, 'Usuario Cliente', 'Cliente', 'asdada@adad.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdada@adad.com', '2020-10-24 13:39:34', '2020-10-24 14:20:53'),
	(26, 3, 'Usuario Empleado', 'Apellido Emple', 'asdada@adasdada.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdada@adasdada.com', '2020-10-24 13:39:56', '2020-10-24 13:40:11'),
	(27, 2, 'Empleado', 'Asdada', 'asdada@asdasd.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdada@asdasd.com', '2020-10-24 13:40:25', '2020-10-24 13:42:38'),
	(28, 2, 'Empleado 233', 'asdad 233', 'a233sdas@asdasd.com', 'e10adc3949ba59abbe56e057f20f883e', 'a233sdas@asdasd.com', '2020-10-24 13:42:54', '2020-10-25 14:23:43'),
	(29, 3, 'Asdasda', 'asdada', 'asdasda@sdasd.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdasda@sdasd.com', '2020-10-29 23:39:46', NULL),
	(30, 3, 'Lucas', 'Sergio', 'lucassergio@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'lucas.sergio@gmail.com', '2020-11-09 20:26:19', NULL),
	(31, 2, 'Edgar', 'Cabelloso', 'edgar@empleado.com', 'e10adc3949ba59abbe56e057f20f883e', 'edgar@empleado.com', '2020-11-10 09:40:27', '2020-11-10 09:42:12'),
	(32, 2, 'Edgardo', 'Belloso', 'edgardo@empleado.com', 'e10adc3949ba59abbe56e057f20f883e', 'edgardo@empleado.com', '2020-11-10 09:41:58', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


-- Dumping structure for table proyectointegrador.usuarios_especialidades
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- Dumping data for table proyectointegrador.usuarios_especialidades: ~35 rows (approximately)
DELETE FROM `usuarios_especialidades`;
/*!40000 ALTER TABLE `usuarios_especialidades` DISABLE KEYS */;
INSERT INTO `usuarios_especialidades` (`id`, `id_usuario`, `id_especialidad`, `demora_min`, `fecha_alta`, `fecha_baja`) VALUES
	(1, 2, 1, 20, '2020-10-07 22:22:52', NULL),
	(2, 4, 3, 20, '2020-10-07 22:25:37', NULL),
	(3, 2, 3, 20, '2020-10-07 22:26:00', NULL),
	(4, 18, 1, 20, '2020-10-22 16:18:10', NULL),
	(5, 18, 2, 20, '2020-10-22 16:18:10', NULL),
	(6, 19, 1, 20, '2020-10-22 16:18:31', NULL),
	(7, 19, 2, 20, '2020-10-22 16:18:31', NULL),
	(8, 19, 3, 20, '2020-10-22 16:18:31', NULL),
	(9, 19, 7, 20, '2020-10-22 16:18:31', NULL),
	(10, 21, 1, 20, '2020-10-22 20:04:13', '2020-10-25 14:21:47'),
	(11, 21, 2, 20, '2020-10-22 20:04:13', '2020-10-25 14:21:47'),
	(12, 21, 3, 20, '2020-10-22 20:04:13', '2020-10-25 14:21:47'),
	(13, 23, 1, 20, '2020-10-22 20:45:05', '2020-10-24 14:23:56'),
	(14, 23, 2, 20, '2020-10-22 20:45:05', '2020-10-24 14:23:56'),
	(15, 23, 3, 20, '2020-10-22 20:45:05', '2020-10-24 14:23:56'),
	(16, 23, 10, 20, '2020-10-22 20:45:05', '2020-10-24 14:23:56'),
	(17, 28, 1, 20, '2020-10-24 13:42:54', '2020-10-25 14:23:43'),
	(18, 28, 1, 20, '2020-10-24 14:05:56', '2020-10-25 14:23:43'),
	(19, 28, 2, 20, '2020-10-24 14:05:56', '2020-10-25 14:23:43'),
	(20, 28, 1, 20, '2020-10-24 14:06:04', '2020-10-25 14:23:43'),
	(21, 28, 2, 20, '2020-10-24 14:06:04', '2020-10-25 14:23:43'),
	(22, 28, 3, 20, '2020-10-24 14:06:04', '2020-10-25 14:23:43'),
	(23, 28, 10, 20, '2020-10-24 14:06:04', '2020-10-25 14:23:43'),
	(24, 28, 1, 20, '2020-10-24 14:06:10', '2020-10-25 14:23:43'),
	(25, 28, 2, 20, '2020-10-24 14:06:10', '2020-10-25 14:23:43'),
	(26, 28, 10, 20, '2020-10-24 14:06:10', '2020-10-25 14:23:43'),
	(27, 28, 1, 20, '2020-10-24 14:07:10', '2020-10-25 14:23:43'),
	(28, 28, 2, 20, '2020-10-24 14:07:10', '2020-10-25 14:23:43'),
	(29, 28, 10, 20, '2020-10-24 14:07:10', '2020-10-25 14:23:43'),
	(30, 28, 1, 20, '2020-10-25 14:21:34', '2020-10-25 14:23:43'),
	(31, 28, 2, 20, '2020-10-25 14:21:34', '2020-10-25 14:23:43'),
	(32, 21, 1, 20, '2020-10-25 14:21:47', NULL),
	(33, 21, 2, 20, '2020-10-25 14:21:47', NULL),
	(34, 21, 3, 20, '2020-10-25 14:21:47', NULL),
	(35, 28, 1, 20, '2020-10-25 14:23:37', '2020-10-25 14:23:43'),
	(36, 32, 1, 35, '2020-11-10 09:41:58', NULL),
	(37, 32, 2, 20, '2020-11-10 09:41:58', NULL),
	(38, 32, 3, 10, '2020-11-10 09:41:58', NULL);
/*!40000 ALTER TABLE `usuarios_especialidades` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
