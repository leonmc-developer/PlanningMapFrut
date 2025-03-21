-- Adminer 5.0.6 MariaDB 10.4.24-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `combustibles`;
CREATE TABLE `combustibles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `tipo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `equipo` varchar(250) NOT NULL,
  `responsable` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `herramientas`;
CREATE TABLE `herramientas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `equipo` int(11) NOT NULL,
  `marca` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `ubicacion` varchar(250) NOT NULL,
  `ultimo_mantenimiento` datetime DEFAULT NULL,
  `proximo_mantenimiento` datetime DEFAULT NULL,
  `responsable` int(11) NOT NULL,
  `fecha_evento` datetime DEFAULT NULL,
  `descripcion_evento` text DEFAULT NULL,
  `accion_tomada` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `hileras`;
CREATE TABLE `hileras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(25) NOT NULL,
  `color` varchar(7) NOT NULL,
  `tipo_linea` tinyint(4) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `hilera_persona`;
CREATE TABLE `hilera_persona` (
  `hilera_id` int(11) NOT NULL,
  `planta_id` int(11) NOT NULL,
  KEY `hilera_id` (`hilera_id`,`planta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `insumos`;
CREATE TABLE `insumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `insumo` int(11) NOT NULL,
  `marca` int(11) DEFAULT NULL,
  `cantidad_inicial` int(11) NOT NULL,
  `cantidad_actual` int(11) NOT NULL,
  `fecha_compra` datetime NOT NULL,
  `fecha_vencimiento` datetime DEFAULT NULL,
  `ubicacion` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_evento` datetime DEFAULT NULL,
  `descripcion_evento` text DEFAULT NULL,
  `accion_tomada` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `materiales`;
CREATE TABLE `materiales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `recurso` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `equipo` varchar(250) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `proveedor` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_evento` datetime DEFAULT NULL,
  `cantidad_afectada` int(11) DEFAULT NULL,
  `descripcion_evento` text DEFAULT NULL,
  `accion_tomada` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `plantas`;
CREATE TABLE `plantas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `delete_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sectores`;
CREATE TABLE `sectores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` int(11) NOT NULL,
  `poligono` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `terrenos`;
CREATE TABLE `terrenos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `coordenadas` text NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `relleno` varchar(7) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `terrenos` (`id`, `nombre`, `descripcion`, `coordenadas`, `color`, `relleno`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'achiras',	'achiras',	'[{\"lat\":-18.163279331289505,\"lng\":-63.803298868926994},{\"lat\":-18.16377810001784,\"lng\":-63.80311044370675},{\"lat\":-18.16369283469969,\"lng\":-63.80344974315759},{\"lat\":-18.163508064443985,\"lng\":-63.80359793521025}]',	'achiras',	'achiras',	0,	'2025-03-09 00:00:00',	'2025-03-10 18:04:26',	NULL);

DROP TABLE IF EXISTS `tipo_plantas`;
CREATE TABLE `tipo_plantas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) NOT NULL,
  `variedad` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `color` varchar(7) NOT NULL,
  `fondo` varchar(7) NOT NULL,
  `imagen` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tipo_plantas` (`id`, `nombre`, `variedad`, `descripcion`, `color`, `fondo`, `imagen`, `created_at`, `updated_at`, `delete_at`) VALUES
(36,	'lima',	'lima',	'lima',	'',	'',	'',	'2025-03-14 00:30:30',	'2025-03-14 00:30:30',	NULL),
(37,	'mandarina',	'mandarina',	'mandarina',	'',	'',	'',	'2025-03-15 02:06:14',	'2025-03-15 02:06:14',	NULL);

DROP TABLE IF EXISTS `tipo_recursos_inventario`;
CREATE TABLE `tipo_recursos_inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `tipo` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2025-03-21 01:19:52 UTC
