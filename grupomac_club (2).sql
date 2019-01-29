-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-01-2019 a las 17:59:07
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupomac_club`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(4) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `rp` int(2) NOT NULL,
  `repartidor` varchar(40) NOT NULL,
  `estado` int(1) NOT NULL,
  `fiesta` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `nombre`, `apellido`, `rut`, `mail`, `telefono`, `rp`, `repartidor`, `estado`, `fiesta`) VALUES
(4829, 'prueba', '', '19071145-5', '', '', 1, '2', 0, 1),
(4830, 'pruejajsajSajsa', '', '19071145-5', '', '', 1, '0', 0, 0),
(4831, 'Romane', '', '19071145-5', '', '', 1, '0', 0, 0),
(4832, 'Polonia', '', '19071145-5', '', '', 1, '63', 0, 0),
(4833, 'Roma', '', '19071145-5', '', '', 1, '64', 0, 22),
(4834, 'polo', '', '19071145-5', '', '', 18, '71', 0, 11),
(4835, 'prueba', '', '10520240-7', '', '', 18, '74', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresas` int(5) NOT NULL,
  `nombre_empresas` varchar(50) NOT NULL,
  `id_rp` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresas`, `nombre_empresas`, `id_rp`) VALUES
(0, 'Grupo Macer', 1),
(1, 'gatitos', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estate`
--

CREATE TABLE `estate` (
  `id` int(2) NOT NULL,
  `estate` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estate`
--

INSERT INTO `estate` (`id`, `estate`) VALUES
(0, 'NO FUE'),
(1, 'ASISTIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiestas`
--

CREATE TABLE `fiestas` (
  `id_fiesta` int(2) NOT NULL,
  `nombre_fiesta` varchar(70) NOT NULL,
  `lugar_fiesta` varchar(30) NOT NULL,
  `id_empresa` int(5) NOT NULL,
  `fecha_fiesta` date NOT NULL,
  `hora_fiesta` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fiestas`
--

INSERT INTO `fiestas` (`id_fiesta`, `nombre_fiesta`, `lugar_fiesta`, `id_empresa`, `fecha_fiesta`, `hora_fiesta`) VALUES
(2, 'Los monos', 'asd', 0, '2019-03-03', '22:39:00'),
(11, 'Los monos', '', 1, '0000-00-00', '00:00:00'),
(12, 'Los monos', '', 1, '0000-00-00', '00:00:00'),
(13, 'Los monos', '', 1, '0000-00-00', '00:00:00'),
(16, 'Los monos', '', 1, '0000-00-00', '00:00:00'),
(17, 'Los monos', '', 1, '0000-00-00', '00:00:00'),
(18, 'Los monos', '', 1, '0000-00-00', '00:00:00'),
(19, 'Los monos', '', 1, '0000-00-00', '00:00:00'),
(20, 'Los monos', '', 1, '0000-00-00', '00:00:00'),
(21, 'Los monos', '', 1, '0000-00-00', '00:00:00'),
(22, 'los gatitos', 'viÃ±a del mar', 0, '2018-03-23', '14:50:00'),
(24, 'prueba', 'prueba', 0, '2018-03-23', '12:50:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidores`
--

CREATE TABLE `repartidores` (
  `id_repartidor` int(5) NOT NULL,
  `nombre_repartidor` varchar(50) NOT NULL,
  `id_rp` int(5) NOT NULL,
  `id_empresa` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `repartidores`
--

INSERT INTO `repartidores` (`id_repartidor`, `nombre_repartidor`, `id_rp`, `id_empresa`) VALUES
(1, 'Sin Repartidor', 18, 1),
(2, 'Sin Repartidor', 1, 0),
(60, 'Sherlock', 19, 0),
(63, 'romane', 1, 0),
(64, 'lolo', 1, 0),
(65, 'lili', 1, 0),
(66, 'juanita', 19, 0),
(67, 'momo', 19, 0),
(68, 'gtgtgtgt', 19, 0),
(71, 'Watson', 18, 1),
(74, 'Sherlock', 18, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rp`
--

CREATE TABLE `rp` (
  `id` int(11) NOT NULL,
  `nombrerp` varchar(50) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contrasenia` varchar(20) NOT NULL,
  `permisos` int(2) NOT NULL,
  `id_empresa` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rp`
--

INSERT INTO `rp` (`id`, `nombrerp`, `correo`, `contrasenia`, `permisos`, `id_empresa`) VALUES
(1, 'Mariano Cerda', 'mm@gmail.com', '1234', 1, 0),
(2, 'Paola Morales', '', '', 0, 0),
(3, 'Claudio Olguin', '', '', 0, 0),
(4, 'Paola Ordenes', '', '', 0, 0),
(5, 'Jennifer Mackay', '', '', 0, 0),
(6, 'Daniela Gajardo', '', '', 0, 0),
(7, 'Javier Ramirez', '', '', 0, 0),
(8, 'Kronos', '', '', 0, 0),
(9, 'Leandro Camara', '', '', 0, 0),
(10, 'Vicente Diaz', '', '', 0, 0),
(11, 'Alexis Salazar', '', '', 0, 0),
(15, 'Anna Marienka Lagomarsino', '', '', 0, 0),
(13, 'Ximena Ferrada', '', '', 0, 0),
(14, 'Daniel Garin', '', '', 0, 0),
(18, 'Polonia', 'polo@algo.com', '123', 0, 1),
(21, 'roma', 'ro@algo.com', '123', 0, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresas`);

--
-- Indices de la tabla `fiestas`
--
ALTER TABLE `fiestas`
  ADD PRIMARY KEY (`id_fiesta`);

--
-- Indices de la tabla `repartidores`
--
ALTER TABLE `repartidores`
  ADD PRIMARY KEY (`id_repartidor`);

--
-- Indices de la tabla `rp`
--
ALTER TABLE `rp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4836;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fiestas`
--
ALTER TABLE `fiestas`
  MODIFY `id_fiesta` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `repartidores`
--
ALTER TABLE `repartidores`
  MODIFY `id_repartidor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `rp`
--
ALTER TABLE `rp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
