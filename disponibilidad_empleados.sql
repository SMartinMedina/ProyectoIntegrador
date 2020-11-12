-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2020 a las 22:23:52
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectointegrador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad_empleados`
--

CREATE TABLE `disponibilidad_empleados` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `horario_salida` timestamp NULL DEFAULT current_timestamp(),
  `horario_entrada` timestamp NULL DEFAULT NULL,
  `fecha_baja` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `disponibilidad_empleados`
--

INSERT INTO `disponibilidad_empleados` (`id`, `id_usuario`, `horario_salida`, `horario_entrada`, `fecha_baja`) VALUES
(1, 2, NULL, '2020-11-12 18:43:06', NULL),
(2, 4, NULL, '2020-11-12 18:43:06', NULL),
(3, 5, NULL, '2020-11-12 18:43:06', NULL),
(4, 6, NULL, '2020-11-12 18:43:06', NULL),
(5, 11, NULL, '2020-11-12 18:43:06', NULL),
(6, 12, NULL, '2020-11-12 18:43:06', NULL),
(7, 13, NULL, '2020-11-12 18:43:06', NULL),
(8, 14, NULL, '2020-11-12 18:43:06', NULL),
(9, 15, NULL, '2020-11-12 18:43:06', NULL),
(10, 16, NULL, '2020-11-12 18:43:06', NULL),
(11, 17, NULL, '2020-11-12 18:43:06', NULL),
(12, 18, NULL, '2020-11-12 18:43:06', NULL),
(13, 19, NULL, '2020-11-12 18:43:06', NULL),
(14, 21, NULL, '2020-11-12 18:43:06', NULL),
(15, 22, NULL, '2020-11-12 18:43:06', NULL),
(16, 23, NULL, '2020-11-12 18:43:06', NULL),
(17, 27, NULL, '2020-11-12 18:43:06', NULL),
(18, 28, NULL, '2020-11-12 18:43:06', NULL),
(19, 42, NULL, '2020-11-12 18:43:06', NULL),
(21, 44, NULL, '2020-11-12 18:43:06', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `disponibilidad_empleados`
--
ALTER TABLE `disponibilidad_empleados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `disponibilidad_empleados`
--
ALTER TABLE `disponibilidad_empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
