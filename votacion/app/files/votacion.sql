-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2024 a las 15:51:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `votacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_alumno_voto`
--

CREATE TABLE `tbl_alumno_voto` (
  `id_usuario` int(11) NOT NULL,
  `votos_total` int(11) NOT NULL,
  `voto_opt_one` varchar(70) NOT NULL,
  `voto_opt_two` varchar(70) NOT NULL,
  `total_opt_one` int(11) NOT NULL,
  `total_opt_two` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_usuario` int(11) NOT NULL,
  `nombre_completo` varchar(70) NOT NULL,
  `correo_usuario` varchar(70) NOT NULL,
  `clave_usuario` varchar(70) NOT NULL,
  `img_usuario` text NOT NULL,
  `dni` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_login`
--

INSERT INTO `tbl_login` (`id_usuario`, `nombre_completo`, `correo_usuario`, `clave_usuario`, `img_usuario`, `dni`) VALUES
(1, 'milenka rojas bastidas', 'miley@gmail.com', 'milenka12345', '', ''),
(2, 'milenka rojas bastidas', 'miley@gmail.com', 'milenka12345', '', ''),
(3, 'valentina ruiz guevara', 'valentinaBonita@gmail.com', 'valentina1234', '', ''),
(4, 'gianina guzman herrera', 'gianinaGato@gmail.com', 'gianina1234', '', ''),
(5, 'david tasilla suarez', 'david@gmail.com', 'david1234', '', ''),
(6, 'julian perez ballizan', 'julian_pb@gmail.com', 'julian1234', '', '74891235'),
(7, 'sf', 'sdf', 'sdedg', '', ''),
(8, 'sf', 'dsgfg', 'dgg', '', ''),
(9, 'andrea jimenes peralta', 'andrea@gmail.com', 'andrea1234', '', '74178921');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_alumno_voto`
--
ALTER TABLE `tbl_alumno_voto`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
