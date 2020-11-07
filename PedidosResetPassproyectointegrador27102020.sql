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

-- Dumping database structure for smartin_triju
CREATE DATABASE IF NOT EXISTS `smartin_triju` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `smartin_triju`;


-- Dumping structure for table smartin_triju.pedidos_reset_pass
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

-- Dumping data for table smartin_triju.pedidos_reset_pass: ~5 rows (approximately)
/*!40000 ALTER TABLE `pedidos_reset_pass` DISABLE KEYS */;
INSERT INTO `pedidos_reset_pass` (`id`, `id_usuario`, `pass_temp`, `renovado`, `estado`, `fecha_alta`) VALUES
	(1, 15, 'c4TJuPSeqZ983azfH6nbVIx7ydMsFp', 0, 0, '2019-06-01 01:47:32'),
	(2, 15, '8aQC4HpSEXGNcBP0nxFktODzwYUbym', 0, 0, '2019-06-01 01:52:35'),
	(3, 5, 'snLghHiuFdYjkK5T7I8f9w4cpA031e', 0, 0, '2019-08-14 22:52:17'),
	(4, 15, 'Z1XsqktSuLbUeNJ0FWiCGc4n9dMrmP', 0, 0, '2020-01-26 15:21:56'),
	(5, 15, '8Y7mWjMynXtzI6Tbpd0QoE5HR1KwfJ', 0, 0, '2020-01-26 16:04:01');
/*!40000 ALTER TABLE `pedidos_reset_pass` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
