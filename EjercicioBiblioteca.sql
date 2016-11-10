-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-11-2016 a las 11:06:43
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `EjercicioBiblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AUTORES`
--

CREATE TABLE `AUTORES` (
  `COD_AUTOR` int(4) NOT NULL,
  `NOM_AUTOR` varchar(20) DEFAULT NULL,
  `APES_AUTOR` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ESCRIBE`
--

CREATE TABLE `ESCRIBE` (
  `COD_AUTOR` int(4) NOT NULL,
  `ISBN` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ES_PRESTADO`
--

CREATE TABLE `ES_PRESTADO` (
  `FECHA_PRESTAMO` date NOT NULL,
  `FECHA_DEVOLUCION` date DEFAULT NULL,
  `ISBN` int(10) DEFAULT NULL,
  `ID_SOCIO` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LIBROS`
--

CREATE TABLE `LIBROS` (
  `ISBN` int(10) NOT NULL,
  `TITULO` varchar(25) DEFAULT NULL,
  `EJEMPLARES` int(3) DEFAULT NULL,
  `PRECIO` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `LIBROS`
--

INSERT INTO `LIBROS` (`ISBN`, `TITULO`, `EJEMPLARES`, `PRECIO`) VALUES
(231134, 'Pokemon', 6, '15.00'),
(2132132, 'Harry Potter 1', 2, '18.00'),
(21312314, 'El Quijote', 1, '18.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SOCIOS`
--

CREATE TABLE `SOCIOS` (
  `ID_SOCIO` int(3) NOT NULL,
  `DNI` varchar(9) DEFAULT NULL,
  `NOM_SOCIO` varchar(20) DEFAULT NULL,
  `APES_SOCIO` varchar(40) DEFAULT NULL,
  `TELEFONO` int(9) DEFAULT NULL,
  `FECHA_ALTA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `SOCIOS`
--

INSERT INTO `SOCIOS` (`ID_SOCIO`, `DNI`, `NOM_SOCIO`, `APES_SOCIO`, `TELEFONO`, `FECHA_ALTA`) VALUES
(1, '49121804z', 'Álvaro', 'Tellez Hidalgo', 656930852, '2016-11-30'),
(2, '49121508v', 'David', 'Benitez Rasero', 64654164, '2016-11-24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `AUTORES`
--
ALTER TABLE `AUTORES`
  ADD PRIMARY KEY (`COD_AUTOR`);

--
-- Indices de la tabla `ESCRIBE`
--
ALTER TABLE `ESCRIBE`
  ADD PRIMARY KEY (`COD_AUTOR`,`ISBN`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indices de la tabla `ES_PRESTADO`
--
ALTER TABLE `ES_PRESTADO`
  ADD PRIMARY KEY (`FECHA_PRESTAMO`),
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `ID_SOCIO` (`ID_SOCIO`);

--
-- Indices de la tabla `LIBROS`
--
ALTER TABLE `LIBROS`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indices de la tabla `SOCIOS`
--
ALTER TABLE `SOCIOS`
  ADD PRIMARY KEY (`ID_SOCIO`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ESCRIBE`
--
ALTER TABLE `ESCRIBE`
  ADD CONSTRAINT `escribe_ibfk_1` FOREIGN KEY (`COD_AUTOR`) REFERENCES `AUTORES` (`COD_AUTOR`),
  ADD CONSTRAINT `escribe_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `LIBROS` (`ISBN`);

--
-- Filtros para la tabla `ES_PRESTADO`
--
ALTER TABLE `ES_PRESTADO`
  ADD CONSTRAINT `es_prestado_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `LIBROS` (`ISBN`),
  ADD CONSTRAINT `es_prestado_ibfk_2` FOREIGN KEY (`ID_SOCIO`) REFERENCES `SOCIOS` (`ID_SOCIO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
