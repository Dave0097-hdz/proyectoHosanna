-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2023 a las 03:34:06
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_hosanna`
--
CREATE DATABASE IF NOT EXISTS `gestion_hosanna` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gestion_hosanna`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `update_product_status`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_product_status` (IN `product_id` INT)   BEGIN
    UPDATE productos
    SET activo = 0
    WHERE id_producto = product_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'VENDEDOR'),
(3, 'CLIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestor_inventario`
--

DROP TABLE IF EXISTS `gestor_inventario`;
CREATE TABLE `gestor_inventario` (
  `id_inventario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_pedidos` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gestor_inventario`
--

INSERT INTO `gestor_inventario` (`id_inventario`, `id_producto`, `id_usuario`, `cantidad`, `fecha_registro`, `id_pedidos`, `id_venta`) VALUES
(4, 1, 3, 2, '2023-07-27', 10, 10),
(5, 29, 2, 6, '2023-07-20', 1, 1),
(6, 50, 3, 3, '2023-07-27', 11, 11),
(7, 53, 3, 1, '2023-07-27', 12, 12),
(8, 55, 3, 2, '2023-07-26', 6, 6),
(9, 55, 3, 1, '2023-07-26', 8, 8),
(10, 56, 3, 1, '2023-07-26', 7, 7),
(11, 56, 3, 1, '2023-07-26', 9, 9),
(12, 58, 2, 12, '2023-07-29', 17, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha_pedido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_usuario`, `id_producto`, `cantidad`, `total`, `fecha_pedido`) VALUES
(1, 2, 29, 6, 120.00, '2023-07-20'),
(2, 3, 50, 1, 0.00, '2023-07-26'),
(3, 3, 52, 2, 0.00, '2023-07-26'),
(4, 3, 54, 1, 0.00, '2023-07-26'),
(5, 3, 53, 1, 0.00, '2023-07-26'),
(6, 3, 55, 2, 155.00, '2023-07-26'),
(7, 3, 56, 1, 75.00, '2023-07-26'),
(8, 3, 55, 1, 155.00, '2023-07-26'),
(9, 3, 56, 1, 75.00, '2023-07-26'),
(10, 3, 1, 2, 10.00, '2023-07-27'),
(11, 3, 50, 3, 25.00, '2023-07-27'),
(12, 3, 53, 1, 125.00, '2023-07-27'),
(17, 2, 58, 12, 6000.00, '2023-07-29');

--
-- Disparadores `pedidos`
--
DROP TRIGGER IF EXISTS `check_pedido_cantidad`;
DELIMITER $$
CREATE TRIGGER `check_pedido_cantidad` BEFORE INSERT ON `pedidos` FOR EACH ROW BEGIN
    DECLARE product_quantity INT;

    SELECT cantidad INTO product_quantity
    FROM productos
    WHERE id_producto = NEW.id_producto;

    IF product_quantity < NEW.cantidad THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: La cantidad solicitada en el pedido supera la cantidad disponible del producto';
    END IF;

    IF (product_quantity - NEW.cantidad) <= 0 THEN
        UPDATE productos
        SET activo = 0
        WHERE id_producto = NEW.id_producto;
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_productos_pedidos`;
DELIMITER $$
CREATE TRIGGER `update_productos_pedidos` AFTER INSERT ON `pedidos` FOR EACH ROW BEGIN
	UPDATE productos
    SET cantidad = cantidad - NEW.cantidad
    WHERE id_producto = (SELECT id_producto FROM pedidos WHERE id_pedido = NEW.id_pedido);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `nombre_corto` varchar(256) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo_categoria` int(11) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `codigo` int(50) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `nombre_corto`, `descripcion`, `tipo_categoria`, `cantidad`, `imagen`, `precio`, `codigo`, `activo`) VALUES
(1, 'bolsas', 'regalo', 'des', 6, 50, 'Assets/img_categorias/bolsas/71icons8-instagram-96.png', 10.00, 12345678, 1),
(29, 'bolsa de regalo tamaño grande', 'bolsa grande', 'bolsa de regalo tamaño grande', 5, 6, '../../../Assets/img_categorias/bolsas/principal.jpg', 20.00, 123456789, 0),
(50, 'Bolsa #1', 'bolsa gr', 'color amarillo.', 5, 490, 'Assets/img_categorias/bolsas/71principal.jpg', 25.00, 1, 1),
(52, 'cuerda de guitarra clásica', 'cuerdas de nylon', 'cuerda de nylon de la marca valenciana', 1, 10, 'Assets/img_categorias/p_musicales/71la-valenciana.jpg', 125.00, 50, 1),
(53, 'mochila para niños', 'mochila ecom', 'Mochila para niños con imagen de kirby', 2, 30, 'Assets/img_categorias/mochilas/8196179563030-mochila-kirby-nubes-1.jpg', 125.00, 100, 1),
(54, 'Gorra cuadrada', 'Gorra cuadrada', 'Color negro, tipo cuadrada', 3, 27, 'Assets/img_categorias/gorras/5771rcmK7BgUL._AC_SX569_.jpg', 350.00, 150, 1),
(55, 'cinturón de piel', 'cinturon de piel ', 'Color negro, tipo piel.', 4, 21, 'Assets/img_categorias/cinturones/77300-1a_color-negro.jpg', 155.00, 200, 0),
(56, 'Cargador para telefono', 'Cargador para telefono', 'Cargador con entrada para teléfonos de tipo C', 6, 10, 'Assets/img_categorias/p_electronicos/85122cSvA8wL.jpg', 75.00, 250, 1),
(58, 'mochila golden star para laptops', 'portalap golden', 'mochila golden star color negro tamaño grande', 2, 0, 'Assets/img_categorias/mochilas/42dominio linux.png', 500.00, 101, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `id_cargo` int(11) NOT NULL DEFAULT 3,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `correo`, `telefono`, `direccion`, `contraseña`, `id_cargo`, `estado`) VALUES
(1, 'david', 'hernandez', 'info@davidhernandez.net', '9233295718', '3ra poniente sur S/N', 'admin', 1, 1),
(2, 'juan', 'mancilla', 'info@juanmancilla.net', '9191323262', '5ta sur poniente S/N', '123', 2, 1),
(3, 'leny daniel ', 'lopez laras', 'dani@gmail.com', '123456', 'Bochil, Chiapas', '123', 3, 1),
(4, 'nacho la vieja', 'lopez', 'nacho@gmail.com', '123456788', 'nose', '321', 2, 1),
(5, 'nacho', 'lopez', 'nacho@gmail.com', '123456788', 'nose', '123', 2, 0),
(6, 'nacho', 'lopez', 'nacho@gmail.com', '123456788', 'nose', '123', 2, 0),
(7, 'nacho', 'lopez', 'nacho@gmail.com', '123456788', 'nose', '123', 2, 0),
(8, 'nacho', 'lopez', 'nacho@gmail.com', '123456788', 'nose', '123', 2, 0),
(9, 'francisco', 'lopez', 'fran@gmail.com', '6227567494', 'Santo Domingo', 'chichichisco', 2, 0),
(10, 'leny', 'gimenez', 'leny@gmail.com', '123456789', 'bochil', '456', 2, 0),
(11, 'weq', 'wqe', 'leny@gmail.com', '1234567', 'sdfgh', '123', 2, 0),
(12, 'weq', 'wqe', 'leny@gmail.com', '1234567', 'sdfgh', '123', 2, 0),
(13, 'weq', 'wqe', 'leny@gmail.com', '1234567', 'sdfgh', '123', 2, 0),
(14, 'weq', 'wqe', 'leny@gmail.com', '1234567', 'sdfgh', '123', 2, 0),
(15, 'weq', 'wqe', 'leny@gmail.com', '1234567', 'sdfgh', '123', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `fecha_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_usuario`, `id_producto`, `cantidad`, `precio`, `total`, `fecha_venta`) VALUES
(1, 2, 1, 6, 60, 60, '2023-07-20'),
(6, 2, 1, 5, 60, 90, '2023-07-20'),
(7, 1, 50, 16, 25, 400, '0000-00-00'),
(8, 1, 50, 34, 25, 400, '0000-00-00'),
(9, 1, 50, 35, 25, 875, '0000-00-00'),
(10, 1, 50, 35, 25, 400, '0000-00-00'),
(11, 1, 50, 4, 25, 100, '0000-00-00'),
(12, 1, 50, 5, 25, 125, '0000-00-00'),
(13, 1, 50, 5, 25, 125, '0000-00-00'),
(14, 1, 50, 5, 25, 125, '2023-07-23'),
(15, 1, 50, 2, 25, 50, '2023-07-23'),
(16, 1, 50, 2, 25, 50, '2023-07-23'),
(17, 1, 50, 7, 25, 175, '2023-07-23'),
(18, 2, 54, 2, 350, 700, '2023-07-23'),
(19, 2, 53, 4, 125, 500, '2023-07-23'),
(20, 1, 53, 8, 125, 125, '2023-07-24'),
(21, 1, 50, 1, 25, 25, '2023-07-24'),
(22, 1, 52, 5, 125, 625, '2023-07-24'),
(23, 1, 52, 3, 125, 375, '2023-07-24'),
(24, 1, 52, 1, 125, 125, '2023-07-24'),
(25, 1, 52, 1, 125, 125, '2023-07-24'),
(26, 1, 52, 2, 125, 250, '2023-07-24'),
(27, 1, 50, 5, 25, 125, '2023-07-27'),
(28, 1, 53, 10, 125, 1250, '2023-08-01'),
(29, 2, 53, 10, 125, 1250, '2023-08-01');

--
-- Disparadores `ventas`
--
DROP TRIGGER IF EXISTS `update_productos_ventas`;
DELIMITER $$
CREATE TRIGGER `update_productos_ventas` AFTER INSERT ON `ventas` FOR EACH ROW BEGIN
	UPDATE productos
    SET cantidad = cantidad - NEW.cantidad
    WHERE id_producto = (SELECT id_producto FROM ventas WHERE id_venta = NEW.id_venta);
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `gestor_inventario`
--
ALTER TABLE `gestor_inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD UNIQUE KEY `id_venta` (`id_venta`),
  ADD KEY `id_pedidos` (`id_pedidos`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE,
  ADD KEY `id_producto` (`id_producto`) USING BTREE;

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE,
  ADD KEY `id_producto` (`id_producto`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `gestor_inventario`
--
ALTER TABLE `gestor_inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gestor_inventario`
--
ALTER TABLE `gestor_inventario`
  ADD CONSTRAINT `gestor_inventario_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gestor_inventario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gestor_inventario_ibfk_3` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gestor_inventario_ibfk_4` FOREIGN KEY (`id_pedidos`) REFERENCES `pedidos` (`id_pedido`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
