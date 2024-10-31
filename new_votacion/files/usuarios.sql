-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2024 a las 19:39:26
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
-- Base de datos: `votacion_one`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `numero_celular` varchar(9) DEFAULT NULL,
  `nombres` varchar(100) NOT NULL,
  `clave_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `correo_usuario`, `numero_celular`, `nombres`, `clave_usuario`) VALUES
(1, '77889912', 'camila@gmail.com', '987412357', 'camila cañihuran ayvar', 'camila1234'),
(2, '77554433', 'gianina@gmail.com', '987412555', 'Gianina Guzman Herrera', '$2y$10$ueDpCJHlJXux.95z7tP5be6kJ8f5y.A/t7BRCYpqKl3P5GOLs4Hs2'),
(3, '77441101', 'jose@gmail.com', '991122334', 'jose maria manuel', '$2y$10$AlKWlEZZxZEMqipCNJ5teOxU2Cp7rspNp9dVmdFSGe0X3xufDnKHO'),
(4, '77123457', 'kevin_perezAlarcon@gmail.com', '997744112', 'kevin Perez Alarcon', 'kevin1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
