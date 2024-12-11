-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2024 a las 21:38:15
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
-- Base de datos: `servicio_militar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_companias`
--

CREATE TABLE `tbl_companias` (
  `id_companias` int(11) NOT NULL,
  `clave_compania` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_companias`
--

INSERT INTO `tbl_companias` (`id_companias`, `clave_compania`) VALUES
(1, 'Compania Norte'),
(2, 'Compania Central'),
(3, 'Companía Sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cuarteles`
--

CREATE TABLE `tbl_cuarteles` (
  `idCuartel` int(11) NOT NULL,
  `nombre_cuartel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_cuarteles`
--

INSERT INTO `tbl_cuarteles` (`idCuartel`, `nombre_cuartel`) VALUES
(1, 'Cuartel A'),
(2, 'Cuartel B'),
(3, 'Cuartel C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_persona`
--

CREATE TABLE `tbl_persona` (
  `id_persona` int(10) UNSIGNED NOT NULL,
  `nombres_persona` varchar(100) DEFAULT NULL,
  `dni_persona` varchar(15) DEFAULT NULL,
  `codigo_persona` varchar(20) DEFAULT NULL,
  `edad_persona` int(11) DEFAULT NULL,
  `telefono_persona` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_persona`
--

INSERT INTO `tbl_persona` (`id_persona`, `nombres_persona`, `dni_persona`, `codigo_persona`, `edad_persona`, `telefono_persona`) VALUES
(1, 'Juan Pérez', '12345678', 'C001', 5, '987654321'),
(2, 'María López', '23456789', 'C002', 15, '987654322'),
(3, 'Carlos García', '34567890', 'C003', 25, '987654323'),
(4, 'Ana Martínez', '45678901', 'C004', 8, '987654324'),
(5, 'Pedro Sánchez', '56789012', 'C005', 13, '987654325'),
(6, 'Luisa Fernández', '67890123', 'C006', 30, '987654326'),
(7, 'José Rodríguez', '78901234', 'C007', 9, '987654327'),
(8, 'Sofía Gómez', '89012345', 'C008', 16, '987654328'),
(9, 'Miguel Díaz', '90123456', 'C009', 40, '987654329'),
(10, 'Laura Martín', '01234567', 'C010', 7, '987654330'),
(11, 'Javier Pérez', '12356789', 'C011', 18, '987654331'),
(12, 'Clara Ruiz', '23467890', 'C012', 12, '987654332'),
(13, 'David Jiménez', '34578901', 'C013', 20, '987654333'),
(14, 'Elena Sánchez', '45689012', 'C014', 6, '987654334'),
(15, 'Juanita Gómez', '56790123', 'C015', 11, '987654335'),
(16, 'Pablo Fernández', '67801234', 'C016', 22, '987654336'),
(17, 'Ricardo Torres', '78912345', 'C017', 10, '987654337'),
(18, 'Teresa Martínez', '89023456', 'C018', 14, '987654338'),
(19, 'Victor López', '90134567', 'C019', 19, '987654339'),
(20, 'Raúl García', '01245678', 'C020', 27, '987654340');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_soldado`
--

CREATE TABLE `tbl_soldado` (
  `idSoldado` int(11) NOT NULL,
  `codigo_soldado` varchar(50) NOT NULL,
  `nombres_soldado` varchar(255) NOT NULL,
  `grado_soldado` varchar(100) NOT NULL,
  `idCuartel` int(11) NOT NULL,
  `id_companias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_soldado`
--

INSERT INTO `tbl_soldado` (`idSoldado`, `codigo_soldado`, `nombres_soldado`, `grado_soldado`, `idCuartel`, `id_companias`) VALUES
(4, '4', 'Juan Alberto Mendoza Ormeño', 'Cabo', 2, 1),
(7, '2', 'Jose Limachi Ordoñez', 'Capitán', 1, 1),
(8, '2', 'Andres Santa Cruz', 'Subteniente', 3, 1),
(9, '5', 'Valentina Gelescar Ruiz Guevara', 'Capitán', 2, 1),
(10, 'c', 'jose martin', 'Teniente', 1, 3),
(16, '7', 'Juan Pérez Andrade Nuñez', 'Coronel', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_soldado_servicios`
--

CREATE TABLE `tbl_soldado_servicios` (
  `idServicio` int(11) NOT NULL,
  `idSoldado` int(11) NOT NULL,
  `servicio_nombre` varchar(255) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_companias`
--
ALTER TABLE `tbl_companias`
  ADD PRIMARY KEY (`id_companias`);

--
-- Indices de la tabla `tbl_cuarteles`
--
ALTER TABLE `tbl_cuarteles`
  ADD PRIMARY KEY (`idCuartel`);

--
-- Indices de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `tbl_soldado`
--
ALTER TABLE `tbl_soldado`
  ADD PRIMARY KEY (`idSoldado`),
  ADD KEY `idCuartel` (`idCuartel`),
  ADD KEY `id_companias` (`id_companias`);

--
-- Indices de la tabla `tbl_soldado_servicios`
--
ALTER TABLE `tbl_soldado_servicios`
  ADD PRIMARY KEY (`idServicio`),
  ADD KEY `idSoldado` (`idSoldado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_companias`
--
ALTER TABLE `tbl_companias`
  MODIFY `id_companias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_cuarteles`
--
ALTER TABLE `tbl_cuarteles`
  MODIFY `idCuartel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  MODIFY `id_persona` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tbl_soldado`
--
ALTER TABLE `tbl_soldado`
  MODIFY `idSoldado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_soldado_servicios`
--
ALTER TABLE `tbl_soldado_servicios`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_soldado`
--
ALTER TABLE `tbl_soldado`
  ADD CONSTRAINT `tbl_soldado_ibfk_1` FOREIGN KEY (`idCuartel`) REFERENCES `tbl_cuarteles` (`idCuartel`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_soldado_ibfk_2` FOREIGN KEY (`id_companias`) REFERENCES `tbl_companias` (`id_companias`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tbl_soldado_servicios`
--
ALTER TABLE `tbl_soldado_servicios`
  ADD CONSTRAINT `tbl_soldado_servicios_ibfk_1` FOREIGN KEY (`idSoldado`) REFERENCES `tbl_soldado` (`idSoldado`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
