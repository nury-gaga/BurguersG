-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2020 a las 19:48:41
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `burguersg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buergers`
--
CREATE DATABASE burguersg;
USE burgursg;

CREATE TABLE `buergers` (
  `id_burguer` int(11) NOT NULL,
  `costo` tinyint(4) NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `imagen` text NOT NULL,
  `existente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `buergers`
--

INSERT INTO `buergers` (`id_burguer`, `costo`, `especialidad`, `imagen`, `existente`) VALUES
(5, 35, 'Sencilla', 'sencilla.jpg', 93),
(6, 42, 'Hawaiana', 'hawai.png', 89),
(7, 45, 'Salchiburger', 'salchi.png', 94),
(8, 50, 'Doble', 'doble.png', 98),
(9, 47, 'Especial', 'especial.jpg', 97),
(11, 55, 'Prueba', 'prueba.png', 98),
(12, 0, 'Prueba2', 'prueba.png', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `correo`, `password`, `nombre`, `nombre_usuario`, `rol`) VALUES
(2, 'gera.smok@gmail.com', 'tumama123', 'Juan Gerardo García Valenzuela', 'JGGV', 1),
(3, 'jggv97u@gmail.com', 'gagaga', 'ioadj', 'GAFAGA', 1),
(5, 'jgarcialazarin@gmail.com', 'rara', 'Carlos Ramírez', 'rara', 1),
(7, 'jfoa@gmail.com', 'tut', 'NF WI', 'TUT', 1),
(9, 'YUYU@gmail.com', 'yuyu', 'Yjnf owjdnf', 'YUYU', 2),
(10, 'jisnd', 'jwniv', 'KJNWF JIWNF', 'jkwdnf', 2),
(11, 'ovnwo', 'nfow', 'ojnwf owjn', 'own', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL,
  `numeroventa` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `imagen` text NOT NULL,
  `costo` text NOT NULL,
  `cantidad` text NOT NULL,
  `subtotal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compras`, `numeroventa`, `nombre`, `imagen`, `costo`, `cantidad`, `subtotal`) VALUES
(1, 1, 'Hawaiana', 'hawai.png', '42', '1', '42'),
(2, 1, 'Sencilla', 'sencilla.jpg', '35', '1', '35'),
(3, 1, 'Especial', 'especial.jpg', '47', '3', '141'),
(4, 2, 'Sencilla', 'sencilla.jpg', '35', '1', '35'),
(5, 3, 'Sencilla', 'sencilla.jpg', '35', '1', '35'),
(6, 4, 'Salchiburger', 'salchi.png', '45', '3', '135'),
(7, 5, 'Hawaiana', 'hawai.png', '42', '3', '126'),
(8, 5, 'Salchiburger', 'salchi.png', '45', '2', '90'),
(9, 6, 'Hawaiana', 'hawai.png', '42', '2', '84');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `tipo_pedido` bit(1) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `entregado` tinyint(1) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `tipo_pedido`, `fecha`, `entregado`, `id_cliente`) VALUES
(1, b'1', '2020-04-19 20:13:25', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_burguer`
--

CREATE TABLE `pedido_burguer` (
  `id_pedido_burguer` int(11) NOT NULL,
  `no_pedido` int(11) NOT NULL,
  `id_burguer` int(11) NOT NULL,
  `total` smallint(6) NOT NULL,
  `cantidad` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido_burguer`
--

INSERT INTO `pedido_burguer` (`id_pedido_burguer`, `no_pedido`, `id_burguer`, `total`, `cantidad`) VALUES
(1, 1, 1, 70, 2),
(2, 1, 3, 90, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `buergers`
--
ALTER TABLE `buergers`
  ADD PRIMARY KEY (`id_burguer`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compras`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_id_cliente` (`id_cliente`);

--
-- Indices de la tabla `pedido_burguer`
--
ALTER TABLE `pedido_burguer`
  ADD PRIMARY KEY (`id_pedido_burguer`),
  ADD KEY `fk_no_pedido` (`no_pedido`),
  ADD KEY `fk_id_burguer` (`id_burguer`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `buergers`
--
ALTER TABLE `buergers`
  MODIFY `id_burguer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido_burguer`
--
ALTER TABLE `pedido_burguer`
  MODIFY `id_pedido_burguer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
