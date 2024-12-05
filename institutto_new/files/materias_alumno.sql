-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2024 a las 22:54:21
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `instituto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_alumno`
--

CREATE TABLE `materias_alumno` (
  `Clave_M` int(11) NOT NULL,
  `Mat_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `materias_alumno`
--
ALTER TABLE `materias_alumno`
  ADD PRIMARY KEY (`Clave_M`,`Mat_alumno`),
  ADD KEY `Mat_alumno` (`Mat_alumno`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `materias_alumno`
--
ALTER TABLE `materias_alumno`
  ADD CONSTRAINT `materias_alumno_ibfk_1` FOREIGN KEY (`Clave_M`) REFERENCES `materias` (`Clave_M`),
  ADD CONSTRAINT `materias_alumno_ibfk_2` FOREIGN KEY (`Mat_alumno`) REFERENCES `alumno` (`Mat_alumno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
