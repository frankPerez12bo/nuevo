-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2024 a las 17:58:55
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
-- Base de datos: `carros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_libreria`
--

CREATE TABLE `tb_libreria` (
  `id` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad_inventario` int(14) NOT NULL,
  `cant_ingreso_inven` int(14) NOT NULL,
  `precio_unid_inven` decimal(12,2) NOT NULL,
  `precio_unid_venta` decimal(12,2) NOT NULL,
  `cantidad_comprar` int(14) NOT NULL,
  `precio_total_venta` decimal(12,2) NOT NULL,
  `precio_total_inven` decimal(12,2) NOT NULL,
  `ingreso` decimal(12,2) NOT NULL,
  `egreso` decimal(12,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `cant_total_ingreso` int(14) NOT NULL,
  `cant_comprar_bifor` int(14) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `provedor` varchar(100) NOT NULL,
  `figura` varchar(100) NOT NULL,
  `efectivo_pagar` decimal(12,2) NOT NULL,
  `vuelto` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_libreria`
--

INSERT INTO `tb_libreria` (`id`, `producto`, `cantidad_inventario`, `cant_ingreso_inven`, `precio_unid_inven`, `precio_unid_venta`, `cantidad_comprar`, `precio_total_venta`, `precio_total_inven`, `ingreso`, `egreso`, `fecha`, `cant_total_ingreso`, `cant_comprar_bifor`, `cliente`, `provedor`, `figura`, `efectivo_pagar`, `vuelto`) VALUES
(6, 'Camioneta Changan', 11, 0, 7589.23, 14874.52, 1, 14874.52, 0.00, 14874.52, 0.00, '0000-00-00 00:00:00', 0, 1, '77777', 'Changan Import Sac', '1720746471 _ auto.jpeg', 15000.00, 125.48),
(7, 'Camioneta Changan', 17, 0, 5874.12, 12258.32, 0, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', 0, 0, '', 'Ghangan Distribuidor Atorizado', '1720792862 _ changan.jpg', 0.00, 0.00),
(11, 'Auto BMW 2024 ', 12, 0, 4587.36, 9874.58, 0, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', 0, 0, '', 'Santa Clara', '1720839742 _ mitsubishi.jpg', 0.00, 0.00),
(15, 'Auto Mitsibisshi 2021', 10, 0, 8741.00, 22987.00, 0, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', 0, 0, '', 'Almacen Santa Clara Autorizado', '1720914361 _ mitsubishi.jpg', 0.00, 0.00),
(16, 'camioneta changan deportivo 2021', 37, 30, 3700.00, 14789.00, 1, 14789.00, 111000.00, -96211.00, 111000.00, '0000-00-00 00:00:00', 30, 1, 'Jose Jimenes Rodrigues', 'almacen santa clara ', '1720968828 _ changan2021.jpeg', 15000.00, 211.00),
(17, 'Auto Kia 2024', 10, 0, 5782.00, 15874.00, 0, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', 0, 0, '', 'Kia Autorizado lima', '1720970886 _ kia 2024.jpeg', 0.00, 0.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_libreria`
--
ALTER TABLE `tb_libreria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_libreria`
--
ALTER TABLE `tb_libreria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
