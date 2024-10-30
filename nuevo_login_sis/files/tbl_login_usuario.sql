-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2024 a las 17:31:00
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
-- Base de datos: `tarea_login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_login_usuario`
--

CREATE TABLE `tbl_login_usuario` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `correo_usuario` varchar(50) NOT NULL,
  `clave_usuario` varchar(50) NOT NULL,
  `pais_usuario` varchar(50) NOT NULL,
  `telefono_usuario` varchar(17) NOT NULL,
  `fecha_correo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_login_usuario`
--

INSERT INTO `tbl_login_usuario` (`id`, `nombre_usuario`, `correo_usuario`, `clave_usuario`, `pais_usuario`, `telefono_usuario`, `fecha_correo`) VALUES
(2, 'Gianina Guzman Herrera', 'gianina_gato@gmail.com', 'gianina1234', '51', '123456789', '0000-00-00'),
(3, 'alexa Gelescar Ruiz ', 'valexaBonita@gmail.com', 'valentina12345', '54', '741896324', '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_login_usuario`
--
ALTER TABLE `tbl_login_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_login_usuario`
--
ALTER TABLE `tbl_login_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;