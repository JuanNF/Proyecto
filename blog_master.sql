-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-09-2019 a las 21:57:25
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog_master`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Accion'),
(2, 'Rol'),
(3, 'Deportes'),
(4, 'Plataformas'),
(7, 'MOBA'),
(8, 'MOBA'),
(9, 'RPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` mediumtext,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entrada_usuario` (`usuario_id`),
  KEY `fk_entrada_categoria` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `usuario_id`, `categoria_id`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 22, 1, 'Jugando con SQL', 'Hola', '2019-09-06'),
(2, 1, 2, 'Guia de GTA Vice City', 'GTA', '2019-09-06'),
(3, 18, 3, 'Nuevo jugadores de FORMULA 1 202O', 'Review del Formula 1', '2019-09-06'),
(4, 23, 1, 'Review de Fornite Online', 'Todo sobre el Fonite', '2019-09-06'),
(5, 22, 1, 'El chido', 'Juegame', '2019-09-06'),
(6, 22, 1, 'Ay papaya de celaya', 'Ahorita vemos que pex', '2019-09-06'),
(7, 22, 1, 'Vamonos perrosss', 'Woooo', '2019-09-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `fecha`) VALUES
(1, 'Jun', 'Torres', 'nfuerzajuan@gmail.com', '$2y$04$8s7TgCt2LHjk7zQylAZWPeVv.FBPT.sUcn/6BxrsjJRQJgyypU1X2', '2019-09-05'),
(18, 'Juan', 'p', 'nfuerajuan@gmail.com', '$2y$04$jw2entxPi/689Fv4x7S9T.e9nQBjEOJ2Lo.j/UquzkU7hq7AX3tYO', '2019-09-05'),
(21, 'Juan', 'Torres\'\'', 'nas@ga.com', '$2y$04$R9gEO3T4z8jA1BIncuCOueXhwthNvIaMQ/uFzJiwUmsErZi7JxJDi', '2019-09-05'),
(22, 'Jan', 'sads', 'nfuerzapablo@gmail.com', '$2y$04$gXOFdasPF4PPd0bufyg0YejvqTJQqzOVi.h4WmdiX3IMcdbGVaRE6', '2019-09-05'),
(23, 'Juan', 'Torres', 'juan@gmail.com', '$2y$04$SupD1mv.tcWJ4erhksYGb.7qIrjNCwx9ubWE2SzvnoWSDXc36SvX2', '2019-09-05');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entrada_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_entrada_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
