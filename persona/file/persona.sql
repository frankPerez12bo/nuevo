-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2024 a las 21:34:37
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
-- Base de datos: `persona`
--

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
(20, 'Raúl García', '01245678', 'C020', 27, '987654340'),
(25, 'Juan Casas Garcia ', '78941257', '4', 12, '987412361');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  MODIFY `id_persona` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
