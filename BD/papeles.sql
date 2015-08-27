-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2015 a las 21:31:10
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `papeles`
--
CREATE DATABASE IF NOT EXISTS `papeles` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `papeles`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

DROP TABLE IF EXISTS `asignaciones`;
CREATE TABLE IF NOT EXISTS `asignaciones` (
  `idasignacion` varchar(5) NOT NULL,
  `feciniasignacion` date NOT NULL,
  `fecfinasignacion` date NOT NULL,
  `actividadasignacion` varchar(255) NOT NULL,
  `enteasignacion` varchar(155) NOT NULL,
  `supervisorasignacion` varchar(155) NOT NULL,
  PRIMARY KEY (`idasignacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`idasignacion`, `feciniasignacion`, `fecfinasignacion`, `actividadasignacion`, `enteasignacion`, `supervisorasignacion`) VALUES
('11', '2015-01-26', '2015-05-29', 'POR INSTRUCCIONES DE LA CD SOCIAL, SE ADELANTARÁ UNA ACTUACIÓN ESPECIAL AL DEPARTAMENTO DEL VALLE DE CAUCA, MUNICIPIOS DE CALI, JAMUNDÍ, FLORIDA Y PRADERA PARA EVALUAR RECURSOS DEL SGP VIGENCIA 2014', 'Departamento De Valle Del Cauca', 'Libia Cruz Sánchez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos`
--

DROP TABLE IF EXISTS `objetivos`;
CREATE TABLE IF NOT EXISTS `objetivos` (
  `idobjetivo` int(11) NOT NULL AUTO_INCREMENT,
  `idasignacion` int(11) NOT NULL,
  `numobjetivo` varchar(3) NOT NULL,
  `descobjetivo` varchar(500) NOT NULL,
  PRIMARY KEY (`idobjetivo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `objetivos`
--

INSERT INTO `objetivos` (`idobjetivo`, `idasignacion`, `numobjetivo`, `descobjetivo`) VALUES
(1, 11, '2', 'Determinar y verificar que el Ente Territorial haya efectuado el proceso de ejecución de los recursos con destinación específica a la prestación del servicio de salud a la población pobre en lo no cubierto con subsidios a la demanda – PPNA, de conformidad con las normas legales y administrativas vigentes.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos`
--

DROP TABLE IF EXISTS `procedimientos`;
CREATE TABLE IF NOT EXISTS `procedimientos` (
  `idprocedimiento` int(11) NOT NULL AUTO_INCREMENT,
  `idobjetivo` int(11) NOT NULL,
  `numprocedimiento` varchar(30) NOT NULL,
  `descprocedimiento` varchar(750) NOT NULL,
  `feciniprocedimiento` date NOT NULL,
  `fecfinprocedimiento` date NOT NULL,
  PRIMARY KEY (`idprocedimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `procedimientos`
--

INSERT INTO `procedimientos` (`idprocedimiento`, `idobjetivo`, `numprocedimiento`, `descprocedimiento`, `feciniprocedimiento`, `fecfinprocedimiento`) VALUES
(1, 1, '004-ACE4SGPD-4', 'Determine que el Ente Territorial haya efectuado de conformidad con las normas legales y administrativas vigentes, el proceso de ejecución de los recursos con destinación específica a la prestación del servicio de salud a la población pobre en lo no cubierto con subsidios a la demanda, estableciendo que los pagos realizados por este concepto a las IPS se hayan realizado sobre servicios efectivamente prestados, soportados en la compra de los mismos acorde a los respectivos contratos de acuerdo con el artículo 157 de la Ley 1450 de 2011. Así mismo, establezca los mecanismos y la oportunidad con que se comunica a las IPS contratadas las Bases de Datos de población pobre y vulnerable.', '2015-03-05', '2015-06-16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
