-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 23:00:09
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
create database 'bd_aeroluna_luna';
use 'bd_aeroluna_luna';
-- Base de datos: `bd_aeroluna_luna`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletos`
--

CREATE TABLE `boletos` (
  `id_boleto` int(10) NOT NULL,
  `num_boleto` varchar(10) NOT NULL,
  `id_avion` varchar(10) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `num_asiento` int(10) NOT NULL,
  `tipo_asiento` varchar(100) NOT NULL,
  `lugar_salida` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `hora_salida` time NOT NULL,
  `fecha_salida` date NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `boletos`
--

INSERT INTO `boletos` (`id_boleto`, `num_boleto`, `id_avion`, `id_usuario`, `num_asiento`, `tipo_asiento`, `lugar_salida`, `destino`, `hora_salida`, `fecha_salida`, `precio`) VALUES
(1, 'BOL123', 'AV123', 'Val1507', 129, 'General', 'Ciudad Juárez', 'Cancún', '20:20:00', '2023-11-19', '1543.12'),
(2, 'BOL234', 'AV193', 'Liz943', 133, 'VIP', 'Chihuahua', 'Monterrey', '18:00:00', '2023-12-01', '3433.12');

-- --------------------------------------------------------


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boletos`
--
ALTER TABLE `boletos`
  ADD PRIMARY KEY (`id_boleto`);


--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boletos`
--
ALTER TABLE `boletos`
  MODIFY `id_boleto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
