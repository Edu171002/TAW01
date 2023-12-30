-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-12-2023 a las 10:45:10
-- Versión del servidor: 8.0.31
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int UNSIGNED NOT NULL,
  `email` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `coste_total` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_productos`
--

CREATE TABLE `pedido_productos` (
  `id_pedido` int UNSIGNED NOT NULL,
  `id_producto` int UNSIGNED NOT NULL,
  `cantidad` int UNSIGNED NOT NULL,
  `precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int UNSIGNED NOT NULL,
  `nombre` char(30) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `peso` char(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `precio` float(6,2) NOT NULL,
  `imagen` char(255) COLLATE utf8mb4_general_ci NOT NULL,
  `categoria` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `peso`, `precio`, `imagen`, `categoria`) VALUES
(1, 'Primo Passo Bag', 'Café en grano italiano de muy buena calidad y seleccionado a mano. ', '449g', 97.97, 'imagenes/Primo-Passo-Bags.jpg@imagenes/Primo-Passo-Coffee.jpg', 1),
(2, 'Battlecreek Coffee Bag', 'Cafe descafeinado de marca Indie. ', '330g', 18.63, 'imagenes/battlecreek-coffee-roasters-Bag.jpg@imagenes/battlecreek-coffee-roasters-Bag2.jpg', 2),
(4, 'Rpahona Beans Bag', 'Cafe descafeinado vegano y sin azucar. ', '813g', 18.83, 'imagenes/Rpahona-Bean-Bag.jpg@imagenes/Rpahona-Bean-Bag2.jpg', 2),
(6, 'Litle Nap Coffee Beans', 'Granos de cafe brasileiro. ', '503g', 35.00, 'imagenes/Little-Nap-Bag.jpg@imagenes/Little-Nap-Coffee.jpg', 1),
(8, 'Wood Burl Coffee', 'Granos de cafe seleccionados a mano.', '400g', 30.00, 'imagenes/Wood-Burl-Coffee-Bags.jpg@imagenes/Wood-Burl-Coffee.jpg', 1),
(9, 'Good Folks Coffee', 'Granos de cafe descafeinado con toque a canels.', ' 400g', 29.95, 'imagenes/Good-Folks-Coffee-Bags.jpg@imagenes/Good-Folks-Coffee.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` char(60) COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` char(60) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` char(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ciudad` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `privilegio` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `pass`, `nombre`, `apellidos`, `telefono`, `direccion`, `ciudad`, `fecha_nac`, `privilegio`) VALUES
('admin@red.com', 'pass', 'admin', 'de la red', '12345678', 'calle', 'VA', '2000-12-12', 1),
('admin@subred.com', '', 'admin', 'de la subred', '681394146', 'Calle General Almirante', 'ciudad', '2000-12-12', 2),
('cliente1@gmail.com', 'pass_cliente', 'Cliente', 'De La Tienda', '222334455', 'la calle', 'la ciudad', '2023-10-10', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `pedido_productos`
--
ALTER TABLE `pedido_productos`
  ADD PRIMARY KEY (`id_pedido`,`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
