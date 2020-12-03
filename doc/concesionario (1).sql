-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2020 a las 01:18:45
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concesionario`
--
CREATE DATABASE IF NOT EXISTS `concesionario` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `concesionario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`codigo`, `nombre`) VALUES
(50001, 'Medellin'),
(110111, 'Bogota'),
(274057, 'Choco'),
(730001, 'Ibague');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codigo` int(11) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8 NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8 NOT NULL,
  `codigoCiudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codigo`, `identificacion`, `nombre`, `direccion`, `telefono`, `codigoCiudad`) VALUES
(1, 1005716773, 'Santiago Ballen', 'Cra 4 sur 80-10 Ciudad Luz', '3228622722', 50001),
(2, 1005815552, 'Harry Peralta', 'Calle 15 1-22 apt 201 Centro', '3134026253', 110111),
(3, 1006127201, 'Fabian Piedrahita', 'La coqueta', '3203713760', 274057),
(4, 1005718570, 'Ronald Rada', 'El vergel', '3042133864', 730001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`codigo`, `descripcion`) VALUES
(1234, 'Mazda'),
(4321, 'Renault'),
(77777, 'Nissan'),
(99975, 'BMW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision`
--

CREATE TABLE `revision` (
  `codigo` int(11) NOT NULL,
  `cambioFrenos` char(2) CHARACTER SET utf8 NOT NULL,
  `cambioAceite` char(2) CHARACTER SET utf8 NOT NULL,
  `cambioFiltros` char(2) CHARACTER SET utf8 NOT NULL,
  `otros` varchar(50) CHARACTER SET utf8 NOT NULL,
  `matriculaVehiculo` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `revision`
--

INSERT INTO `revision` (`codigo`, `cambioFrenos`, `cambioAceite`, `cambioFiltros`, `otros`, `matriculaVehiculo`) VALUES
(1, 'SI', 'SI', 'NO', 'Se cambiaron los parachoques delanteros y traseros', 'ABC123'),
(2, 'No', 'No', 'No', 'Cambio de motro', 'RTX123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `matricula` char(6) NOT NULL,
  `modelo` int(11) NOT NULL,
  `color` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `precio` int(11) NOT NULL,
  `codigoCliente` int(11) NOT NULL,
  `codigoMarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`matricula`, `modelo`, `color`, `precio`, `codigoCliente`, `codigoMarca`) VALUES
('ABC123', 2001, 'Rojo', 14000000, 1, 1234),
('BPY987', 2013, 'Morado', 21000000, 4, 77777),
('RTX123', 2004, 'Verde', 1500000, 3, 4321),
('XYZ432', 2006, 'Naranja', 20000000, 2, 99975);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `identificacion` (`identificacion`),
  ADD KEY `codigoCiudad` (`codigoCiudad`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `matriculaVehiculo` (`matriculaVehiculo`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `codigoCliente` (`codigoCliente`,`codigoMarca`),
  ADD KEY `codigoMarca` (`codigoMarca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `revision`
--
ALTER TABLE `revision`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`codigoCiudad`) REFERENCES `ciudad` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `revision`
--
ALTER TABLE `revision`
  ADD CONSTRAINT `revision_ibfk_1` FOREIGN KEY (`matriculaVehiculo`) REFERENCES `vehiculo` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`codigoMarca`) REFERENCES `marca` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`codigoCliente`) REFERENCES `cliente` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
