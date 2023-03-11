-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2023 a las 21:39:51
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rrhhpy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_ciu`
--

CREATE TABLE `t_ciu` (
  `id_ciudad` int(11) NOT NULL,
  `nombre_ciudad` varchar(50) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_ciu`
--

INSERT INTO `t_ciu` (`id_ciudad`, `nombre_ciudad`, `id_departamento`, `id_pais`) VALUES
(1, 'AREGUA', 1, 1),
(2, 'CAPIATA', 1, 1),
(3, 'FERNANDO DE LA MORA', 1, 1),
(4, 'GUARAMBARE', 1, 1),
(5, 'ITA', 1, 1),
(6, 'ITAUGUA', 1, 1),
(7, 'J. AUGUSTO SALDIVAR', 1, 1),
(8, 'LAMBARE', 1, 1),
(9, 'LIMPIO', 1, 1),
(10, 'MARIANO ROQUE ALONSO', 1, 1),
(11, 'NUEVA ITALIA', 1, 1),
(12, 'ÑEMBY', 1, 1),
(13, 'SAN ANTONIO', 1, 1),
(14, 'SAN LORENZO', 1, 1),
(15, 'VILLA ELISA', 1, 1),
(16, 'VILLETA', 1, 1),
(17, 'YPACARAI', 1, 1),
(18, 'YPANE', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_log`
--

CREATE TABLE `t_log` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_log`
--

INSERT INTO `t_log` (`id_usuario`, `usuario`, `contrasena`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_pais`
--

CREATE TABLE `t_pais` (
  `id_pais` int(11) NOT NULL,
  `nombre_pais` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_pais`
--

INSERT INTO `t_pais` (`id_pais`, `nombre_pais`) VALUES
(1, 'PARAGUAY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_prov`
--

CREATE TABLE `t_prov` (
  `id_departamento` int(11) NOT NULL,
  `nombre_estado` varchar(50) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_prov`
--

INSERT INTO `t_prov` (`id_departamento`, `nombre_estado`, `id_pais`) VALUES
(1, 'CENTRAL', 1),
(2, 'ASUNCION', 1),
(3, 'SAN PEDRO', 1),
(4, 'CONCEPCION', 1),
(5, 'GUAIRA', 1),
(6, 'CAAGUAZU', 1),
(7, 'CAAZAPA', 1),
(8, 'ITAPUA', 1),
(9, 'MISIONES', 1),
(10, 'ÑEMBUCU', 1),
(11, 'AMAMBAY', 1),
(12, 'CANINDEYU', 1),
(13, 'PRESIDENTE HAYES', 1),
(14, 'BOQUERON', 1),
(15, 'ALTO PARAGUAY', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_ciu`
--
ALTER TABLE `t_ciu`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `id_departamento` (`id_departamento`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `t_log`
--
ALTER TABLE `t_log`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `t_pais`
--
ALTER TABLE `t_pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `t_prov`
--
ALTER TABLE `t_prov`
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_ciu`
--
ALTER TABLE `t_ciu`
  ADD CONSTRAINT `t_ciu_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `t_prov` (`id_departamento`),
  ADD CONSTRAINT `t_ciu_ibfk_2` FOREIGN KEY (`id_pais`) REFERENCES `t_pais` (`id_pais`);

--
-- Filtros para la tabla `t_prov`
--
ALTER TABLE `t_prov`
  ADD CONSTRAINT `t_prov_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `t_pais` (`id_pais`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
