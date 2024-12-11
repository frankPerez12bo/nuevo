-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2024 a las 22:01:58
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
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `Mat_alumno` int(11) NOT NULL,
  `Nom_alumno` varchar(100) DEFAULT NULL,
  `Edad_alumno` int(11) DEFAULT NULL,
  `Sem_alumno` int(11) DEFAULT NULL,
  `Gen_alumno` char(1) DEFAULT NULL,
  `Clave_C` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`Mat_alumno`, `Nom_alumno`, `Edad_alumno`, `Sem_alumno`, `Gen_alumno`, `Clave_C`) VALUES
(7, 'Alejandra Alejandra Milenka Rojas', 25, 3, 'F', 4),
(8, 'Davit Tasilla Suarez', 25, 9, 'M', 3),
(9, 'Noelia Rodriguez Herrera', 25, 10, 'F', 3),
(10, 'Gianina Paola Herrera Guzman', 25, 10, 'F', 3),
(11, 'Luis Ospino Humansisa', 25, 10, 'M', 3),
(12, 'Angela Navarro Zorrilla', 24, 10, 'F', 3),
(13, 'Valentina RUiz Guevara', 23, 10, 'F', 10),
(14, 'Luis Jimenez Peralta', 22, 10, 'M', 12),
(15, 'Henry Vaca Peralta', 21, 7, 'M', 13),
(16, 'Jordan Benito Quispe', 24, 9, 'M', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `Clave_C` int(11) NOT NULL,
  `Nom_C` varchar(100) DEFAULT NULL,
  `Durac_C` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`Clave_C`, `Nom_C`, `Durac_C`) VALUES
(3, 'Ingineria de Sistema', 10),
(4, 'Arquitectura', 10),
(5, 'Ingeneria de software', 10),
(7, 'Diseño Graficos', 10),
(8, 'Ingeneria en Inteligencia Artificial', 10),
(9, 'Ciberseguridad y Redes', 10),
(10, 'Ingeneria en Robotica y Automatizacion', 10),
(11, 'Data Science', 10),
(12, 'Diseño y Desarrolllo en Videojuegos', 10),
(13, 'Ingeneria en Bioinformacion', 10),
(14, 'Ingeneria en Realidad Virtual Aumentada', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `Clave_M` int(11) NOT NULL,
  `Nom_M` varchar(100) DEFAULT NULL,
  `Cred_M` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`Clave_M`, `Nom_M`, `Cred_M`) VALUES
(4, 'testeo 1', 5),
(5, 'Arquitectura Web', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_alumno`
--

CREATE TABLE `materias_alumno` (
  `Clave_M` int(11) NOT NULL,
  `Mat_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_profesores`
--

CREATE TABLE `materias_profesores` (
  `Clave_M` int(11) NOT NULL,
  `Clave_P` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `Clave_P` int(11) NOT NULL,
  `Nom_P` varchar(100) DEFAULT NULL,
  `Dir_P` varchar(150) DEFAULT NULL,
  `Tel_P` varchar(15) DEFAULT NULL,
  `Hor_P` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`Clave_P`, `Nom_P`, `Dir_P`, `Tel_P`, `Hor_P`) VALUES
(3, 'Kevin Perez Alarcom', 'Av Cusipata s/n ', '987777478', 'lunes');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`Mat_alumno`),
  ADD KEY `Clave_C` (`Clave_C`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`Clave_C`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`Clave_M`);

--
-- Indices de la tabla `materias_alumno`
--
ALTER TABLE `materias_alumno`
  ADD PRIMARY KEY (`Clave_M`,`Mat_alumno`),
  ADD KEY `Mat_alumno` (`Mat_alumno`);

--
-- Indices de la tabla `materias_profesores`
--
ALTER TABLE `materias_profesores`
  ADD PRIMARY KEY (`Clave_M`,`Clave_P`),
  ADD KEY `Clave_P` (`Clave_P`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`Clave_P`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `Mat_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `Clave_C` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `Clave_M` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `Clave_P` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`Clave_C`) REFERENCES `carrera` (`Clave_C`);

--
-- Filtros para la tabla `materias_alumno`
--
ALTER TABLE `materias_alumno`
  ADD CONSTRAINT `materias_alumno_ibfk_1` FOREIGN KEY (`Clave_M`) REFERENCES `materias` (`Clave_M`),
  ADD CONSTRAINT `materias_alumno_ibfk_2` FOREIGN KEY (`Mat_alumno`) REFERENCES `alumno` (`Mat_alumno`);

--
-- Filtros para la tabla `materias_profesores`
--
ALTER TABLE `materias_profesores`
  ADD CONSTRAINT `materias_profesores_ibfk_1` FOREIGN KEY (`Clave_M`) REFERENCES `materias` (`Clave_M`),
  ADD CONSTRAINT `materias_profesores_ibfk_2` FOREIGN KEY (`Clave_P`) REFERENCES `profesores` (`Clave_P`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
