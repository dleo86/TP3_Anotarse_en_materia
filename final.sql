-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-08-2019 a las 12:19:01
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE IF NOT EXISTS `aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id`, `nombre`) VALUES
(1, 'Aula 12'),
(2, 'Aula 13C'),
(3, 'Aula 11A'),
(4, 'Laboratorio 1'),
(5, 'Aula 11B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_us` varchar(255) NOT NULL,
  `ap_us` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `carrera` varchar(255) NOT NULL,
  `dia` varchar(80) NOT NULL,
  `desde` varchar(100) NOT NULL,
  `hasta` varchar(100) NOT NULL,
  `aula` varchar(200) NOT NULL,
  `archivo` mediumblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nom_us`, `ap_us`, `nombre`, `carrera`, `dia`, `desde`, `hasta`, `aula`, `archivo`) VALUES
(39, 'maria', 'sosa', 'Desarrollo en UML', 'Web developer', 'Martes', '10', '12', 'Aula 11A', ''),
(42, 'leandro', 'molina', 'Algebra 3', 'Administracion de Empresas', 'Lunes', '10', '12', 'Aula 12', ''),
(43, 'leandro', 'molina', 'Analisis matematico I', 'Analista de Sistemas', 'Lunes', '08', '12', 'Aula 11A', ''),
(44, 'mario', 'lopez', 'Macroeconomia', 'Administracion de Empresas', 'Lunes', '09', '12', 'Aula 13C', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia`
--

CREATE TABLE IF NOT EXISTS `dia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `dia`
--

INSERT INTO `dia` (`id`, `nombre`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE IF NOT EXISTS `lugar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carrera` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`id`, `carrera`) VALUES
(1, 'Administracion de Empresas'),
(2, 'Analista de Sistemas'),
(3, 'Web developer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `clave` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `email`, `clave`) VALUES
(1, 'leandro', 'molina', 'mleo@gmail.com', '1234'),
(2, 'maria', 'sosa', 'msosa@gmail.com', '12345'),
(3, 'mario', 'lopez', 'lmario@gmial.com', 'mario123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
