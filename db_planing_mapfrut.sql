-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-03-2025 a las 03:09:04
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_planing_mapfrut`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hileras`
--

CREATE TABLE `hileras` (
  `id` int(11) NOT NULL,
  `tag` varchar(25) NOT NULL,
  `color` varchar(7) NOT NULL,
  `tipo_linea` tinyint(4) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hilera_persona`
--

CREATE TABLE `hilera_persona` (
  `hilera_id` int(11) NOT NULL,
  `planta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantas`
--

CREATE TABLE `plantas` (
  `id` int(11) NOT NULL,
  `tag` varchar(25) NOT NULL,
  `tipo_planta_id` int(11) NOT NULL,
  `fecha_plantacion` datetime NOT NULL,
  `fecha_injerto` datetime DEFAULT NULL,
  `patron_injerto_id` int(11) DEFAULT NULL,
  `coordenada` varchar(25) NOT NULL,
  `porte` tinyint(4) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE `sectores` (
  `id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `poligono` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terrenos`
--

CREATE TABLE `terrenos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `coordenadas` text NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `relleno` varchar(7) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `terrenos`
--

INSERT INTO `terrenos` (`id`, `nombre`, `descripcion`, `coordenadas`, `color`, `relleno`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'achiras', 'achiras', '[{\"lat\":-18.163279331289505,\"lng\":-63.803298868926994},{\"lat\":-18.16377810001784,\"lng\":-63.80311044370675},{\"lat\":-18.16369283469969,\"lng\":-63.80344974315759},{\"lat\":-18.163508064443985,\"lng\":-63.80359793521025}]', 'achiras', 'achiras', 0, '2025-03-09 00:00:00', '2025-03-10 18:04:26', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_plantas`
--

CREATE TABLE `tipo_plantas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(75) NOT NULL,
  `variedad` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `color` varchar(7) NOT NULL,
  `fondo` varchar(7) NOT NULL,
  `imagen` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_plantas`
--

INSERT INTO `tipo_plantas` (`id`, `nombre`, `variedad`, `descripcion`, `color`, `fondo`, `imagen`, `created_at`, `updated_at`, `delete_at`) VALUES
(36, 'lima', 'lima', 'lima', '', '', '', '2025-03-14 00:30:30', '2025-03-14 00:30:30', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hileras`
--
ALTER TABLE `hileras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hilera_persona`
--
ALTER TABLE `hilera_persona`
  ADD KEY `hilera_id` (`hilera_id`,`planta_id`);

--
-- Indices de la tabla `plantas`
--
ALTER TABLE `plantas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `terrenos`
--
ALTER TABLE `terrenos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_plantas`
--
ALTER TABLE `tipo_plantas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hileras`
--
ALTER TABLE `hileras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plantas`
--
ALTER TABLE `plantas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sectores`
--
ALTER TABLE `sectores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terrenos`
--
ALTER TABLE `terrenos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_plantas`
--
ALTER TABLE `tipo_plantas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
