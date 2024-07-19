-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2024 a las 18:53:25
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
  `vuelto` decimal(12,2) NOT NULL,
  `cliente_bifor` varchar(100) NOT NULL,
  `efectivo_bifor` decimal(12,2) NOT NULL,
  `precio_all_vBifor` decimal(12,2) NOT NULL,
  `vuelto_bifor` decimal(12,2) NOT NULL,
  `cant_comprada` decimal(12,2) NOT NULL,
  `igv` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_libreria`
--

INSERT INTO `tb_libreria` (`id`, `producto`, `cantidad_inventario`, `cant_ingreso_inven`, `precio_unid_inven`, `precio_unid_venta`, `cantidad_comprar`, `precio_total_venta`, `precio_total_inven`, `ingreso`, `egreso`, `fecha`, `cant_total_ingreso`, `cant_comprar_bifor`, `cliente`, `provedor`, `figura`, `efectivo_pagar`, `vuelto`, `cliente_bifor`, `efectivo_bifor`, `precio_all_vBifor`, `vuelto_bifor`, `cant_comprada`, `igv`) VALUES
(6, 'Camioneta Changan', 10, 0, 7589.23, 14874.52, 2, 14874.52, 0.00, 29749.04, 0.00, '0000-00-00 00:00:00', 0, 1, 'pedro aquino gonzales', 'Changan Import Sac', '1720746471 _ auto.jpeg', 14900.00, 25.48, '77777', 15000.00, 14874.52, 125.48, 1.00, 0.00),
(7, 'Camioneta Changan', 15, 0, 5874.12, 12258.32, 2, 12258.32, 0.00, 24516.64, 0.00, '0000-00-00 00:00:00', 0, 1, 'davit tasia suarez', 'Ghangan Distribuidor Atorizado', '1720792862 _ changan.jpg', 13000.00, 741.68, 'ajejandra rojas bastidas', 90000.00, 12258.32, 77741.68, 1.00, 2206.50),
(11, 'Auto BMW 2024 ', 10, 0, 4587.36, 9874.58, 2, 19749.16, 0.00, 19749.16, 0.00, '0000-00-00 00:00:00', 0, 2, 'jose peña peñaloza ', 'Santa Clara', '1720839742 _ mitsubishi.jpg', 19750.00, 0.84, '', 0.00, 0.00, 0.00, 0.00, 0.00),
(15, 'Auto Mitsibisshi 2021', 10, 0, 8741.00, 22987.00, 0, 0.00, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', 0, 0, '', 'Almacen Santa Clara Autorizado', '1720914361 _ mitsubishi.jpg', 0.00, 0.00, '', 0.00, 0.00, 0.00, 0.00, 0.00),
(16, 'camioneta changan deportivo 2021', 37, 30, 3700.00, 14789.00, 1, 14789.00, 111000.00, -96211.00, 111000.00, '0000-00-00 00:00:00', 30, 1, 'Jose Jimenes Rodrigues', 'almacen santa clara ', '1720968828 _ changan2021.jpeg', 15000.00, 211.00, '', 0.00, 0.00, 0.00, 0.00, 0.00),
(17, 'Auto Kia 2024', 9, 0, 5782.00, 15874.00, 1, 15874.00, 0.00, 15874.00, 0.00, '0000-00-00 00:00:00', 0, 1, 'moguel gonzales peña', 'Kia Autorizado lima', '1720970886 _ kia 2024.jpeg', 16000.00, 126.00, '', 0.00, 0.00, 0.00, 0.00, 2857.32);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
