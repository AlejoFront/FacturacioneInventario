-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-04-2020 a las 00:45:07
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nombre_cte` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `categoria` int(2) NOT NULL COMMENT 'Categorias (Oro,Plata,Bronce)',
  `status` int(2) NOT NULL COMMENT 'Activo/Inactivo',
  `comentario` varchar(255) NOT NULL,
  `fecha_add` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id_client`, `nombre_cte`, `direccion`, `email`, `telefono`, `categoria`, `status`, `comentario`, `fecha_add`) VALUES
(6123, 'assdad  editado', 'asdad', 'lalal@sadad.com', '4865', 1, 1, 'adad', '10/04/2020'),
(123456, 'victor', 'calarca', 'victor.gmail.com', '6543285', 2, 1, 'buena paga', '10/04/2020'),
(5162561, 'dfsdfsdf', 'dadads', 'axasx|gmail.com', '41212', 1, 2, 'asdasd', '10/04/2020'),
(9481516, 'asdasd', 'asdad', 'adasd@adsa.com', '51323', 3, 2, 'asdasd', '10/04/2020'),
(1072965474, 'alejandro luna', 'ambala', 'alejo.luna@gmail.com', '456123', 1, 2, 'cliente muy frecuente', '10/04/2020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto`
--

CREATE TABLE `gasto` (
  `id_gasto` int(100) NOT NULL,
  `fecha_add` varchar(100) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `monto` varchar(100) NOT NULL,
  `user_add` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gasto`
--

INSERT INTO `gasto` (`id_gasto`, `fecha_add`, `concepto`, `monto`, `user_add`) VALUES
(1, '11/04/2020', 'Nomina febrero', '950000', 1),
(2, '11/04/2020', 'Servicios Publicos Enero', '200000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `fecha_add` varchar(25) NOT NULL,
  `hora_add` varchar(25) NOT NULL,
  `client_id` int(11) NOT NULL,
  `total_neto` varchar(255) NOT NULL COMMENT 'total.sin.descuento',
  `descuento` varchar(25) NOT NULL,
  `total` varchar(25) NOT NULL COMMENT 'totalneto.menos.descuento',
  `metodo` int(11) NOT NULL COMMENT 'efectivo/tarjeta',
  `totalProducto` varchar(100) NOT NULL COMMENT 'total.productos.orden',
  `tipo_orden` int(11) NOT NULL COMMENT 'consig/venta',
  `monto` varchar(25) NOT NULL COMMENT 'monto.pagado',
  `saldo` varchar(25) NOT NULL COMMENT 'saldo.por.liquidar',
  `estado` int(11) NOT NULL COMMENT 'liquidada/No_liquidada',
  `fecha_liqui` varchar(25) NOT NULL,
  `user_add_id` int(11) NOT NULL COMMENT 'quien.hace.la.venta'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id_order`, `fecha_add`, `hora_add`, `client_id`, `total_neto`, `descuento`, `total`, `metodo`, `totalProducto`, `tipo_orden`, `monto`, `saldo`, `estado`, `fecha_liqui`, `user_add_id`) VALUES
(100, '08/01/2018', '08:15:05', 123456, '13020.00', '0', '13020.00', 1, '45', 2, '0', '13020.00', 2, '08/01/2018', 2),
(101, '10/04/2020', '17:11:46', 123456, '69.00', '16', '53.00', 1, '3', 2, '53', '0.00', 1, '10/04/2020', 1),
(102, '11/04/2020', '06:56:06', 6123, '99003.00', '16000', '83003.00', 1, '61', 2, '83003', '0.00', 2, '10/04/2020', 1),
(103, '11/04/2020', '07:13:32', 6123, '17853.00', '7000', '10853.00', 2, '11', 1, '10850', '3.00', 2, '10/04/2020', 1),
(104, '11/04/2020', '16:53:57', 123456, '528.00', '28', '500.00', 1, '4', 1, '250', '250.00', 2, '11/04/2020', 1),
(105, '13/04/2020', '13:16:32', 123456, '792.00', '92', '700.00', 1, '6', 2, '700', '0.00', 1, '13/04/2020', 1),
(106, '15/04/2020', '17:18:50', 123456, '15000000.00', '1500000', '13500000.00', 1, '10', 2, '13500000', '0.00', 1, '15/04/2020', 1),
(107, '15/04/2020', '17:27:15', 123456, '2400000.00', '24', '2399976.00', 1, '2', 2, '2399976', '0.00', 1, '15/04/2020', 1),
(108, '15/04/2020', '17:33:45', 123456, '1200000.00', '20000', '1180000.00', 1, '1', 2, '1180000', '0.00', 1, '15/04/2020', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_detalle`
--

CREATE TABLE `orders_detalle` (
  `order_detalle_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cantidad` varchar(255) NOT NULL COMMENT 'cantidad.a.comprar',
  `precio` varchar(255) NOT NULL COMMENT 'precio.unitario',
  `total` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orders_detalle`
--

INSERT INTO `orders_detalle` (`order_detalle_id`, `order_id`, `product_id`, `cantidad`, `precio`, `total`) VALUES
(1, 100, 9000102, '5', '250', '1250.00'),
(2, 101, 9000103, '3', '23', '69.00'),
(8, 103, 9000102, '11', '1623', '17853.00'),
(9, 104, 9000102, '4', '132', '528.00'),
(10, 105, 9000102, '6', '132', '792.00'),
(11, 106, 9000109, '6', '1700000', '10200000.00'),
(12, 106, 9000110, '4', '1200000', '4800000.00'),
(14, 107, 9000110, '3', '1200000', '2400000.00'),
(15, 108, 9000110, '1', '1200000', '1200000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` int(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagen` text NOT NULL,
  `costo` varchar(20) NOT NULL COMMENT 'precio.compra',
  `precio` varchar(10) NOT NULL COMMENT 'precio.oro',
  `plata` varchar(100) NOT NULL COMMENT 'precio.plata',
  `bronce` varchar(100) NOT NULL COMMENT 'precio.bronce',
  `marca` varchar(50) NOT NULL,
  `cantidad` int(10) NOT NULL COMMENT 'stock.existencia',
  `categoria` int(2) NOT NULL COMMENT 'Aseo/Lácteos/Fruta',
  `status` int(5) NOT NULL COMMENT 'Disp/NoDisp',
  `estado` int(2) NOT NULL COMMENT 'Eliminado',
  `fchProd_add` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `nombre`, `imagen`, `costo`, `precio`, `plata`, `bronce`, `marca`, `cantidad`, `categoria`, `status`, `estado`, `fchProd_add`) VALUES
(9000100, 'PANTALON GABARDINA MUJER', '../assests/images/stock/185585a5197b91702a.jpg', '175', '280', '300', '315', 'GABARDINA ', 8, 2, 1, 2, '06/01/2018'),
(9000101, 'PANTALON GABARDINA ', '../assests/images/stock/291515a5198054f7ea.jpg', '175', '280', '300', '315', 'GABARDINA', 30, 1, 1, 2, '06/01/2018'),
(9000102, 'asdasd', '../assests/images/stock/7685858485e90c81e1d611.png', '451', '1623', '132', '623', 'asd', 37, 1, 1, 2, '10/04/2020'),
(9000103, 'as editado', '../assests/images/stock/16658159995e90ca3ea583d.png', '512', '231', '23', '231', 'asd', 38, 1, 1, 2, '10/04/2020'),
(9000104, 'adasd', '../assests/images/stock/7476844965e90cb99afaff.png', '61230', '231', '32', '32', 'asd', 123, 2, 1, 2, '10/04/2020'),
(9000105, 'salchichas', '../assests/images/stock/11841584555e90d2f62cda6.png', '1000', '1300', '1450', '1800', 'zenu', 45, 1, 1, 2, '10/04/2020'),
(9000106, 'pruebaErr', '../assests/images/stock/1730623845e90d6258867e.png', '65132', '13013', '320', '23', 'asd', 152, 1, 1, 2, '10/04/2020'),
(9000107, 'pruee01', '../assests/images/stock/102647245e90d711c5906.png', '6512', '612', '123', '231', 'asd', 32, 1, 1, 2, '10/04/2020'),
(9000108, 'nuevo', '../assests/images/stock/17526902005e90dcc141f58.png', '52', '123', '231', '231', 'asd', 4, 4, 1, 2, '10/04/2020'),
(9000109, 'Portatil', '../assests/images/stock/16185957925e971683d8367.png', '1500000', '1600000', '1700000', '1800000', 'Lenovo', 23, 2, 1, 1, '15/04/2020'),
(9000110, 'Lavadora', '../assests/images/stock/5645581835e978612c993c.png', '950000', '1000000', '1200000', '1300000', '1500000', 7, 2, 1, 1, '15/04/2020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `providers`
--

CREATE TABLE `providers` (
  `id_provider` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `categoria` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  `fecha_add` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `providers`
--

INSERT INTO `providers` (`id_provider`, `nombre`, `direccion`, `email`, `telefono`, `categoria`, `status`, `fecha_add`) VALUES
(408, 'editado', 'sala', 'sala@gmail.com', '123456789', 4, 2, '13/04/2020'),
(507, 'ade', 'pola', 'qwerty@qwerty.com', '956123', 3, 2, '13/04/2020'),
(3333, 'editado', 'ricaurte', 'zc@nuevo.com', '44512', 5, 1, '13/04/2020'),
(4007, 'ade', 'salado', 'zenu@zenu.com', '3216546', 3, 1, '13/04/2020'),
(4020, 'Asus Ltda', 'Bogota DC', 'colasus@gmail.com', '56221896', 2, 1, '14/04/2020'),
(5212, 'new', 'Cali', 'new@new.edu.co', '55221', 2, 1, '14/04/2020'),
(12234, 'ade', 'bbbb', 'aaaa@bbbb.com', '25875633', 6, 1, '14/04/2020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salesproducts`
--

CREATE TABLE `salesproducts` (
  `id` int(10) NOT NULL,
  `id_product` int(20) NOT NULL,
  `costo` varchar(20) NOT NULL,
  `cant` int(10) NOT NULL,
  `fchSaleProd_add` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salesproducts`
--

INSERT INTO `salesproducts` (`id`, `id_product`, `costo`, `cant`, `fchSaleProd_add`) VALUES
(7, 9000103, '800000', 17, '15/04/2020'),
(8, 9000109, '840000', 8, '15/04/2020'),
(9, 9000110, '950000', 15, '15/04/2020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` int(2) NOT NULL COMMENT 'Admin/Normal',
  `fecha_add` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `nombre`, `username`, `password`, `rol`, `fecha_add`) VALUES
(1, 'Administrador', 'admin', 'admin', 1, '27/12/2017'),
(2, 'Andrea', 'Cajero1', 'cajero1', 2, '12/04/2020');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Indices de la tabla `gasto`
--
ALTER TABLE `gasto`
  ADD PRIMARY KEY (`id_gasto`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indices de la tabla `orders_detalle`
--
ALTER TABLE `orders_detalle`
  ADD PRIMARY KEY (`order_detalle_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indices de la tabla `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id_provider`);

--
-- Indices de la tabla `salesproducts`
--
ALTER TABLE `salesproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gasto`
--
ALTER TABLE `gasto`
  MODIFY `id_gasto` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `orders_detalle`
--
ALTER TABLE `orders_detalle`
  MODIFY `order_detalle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9000111;

--
-- AUTO_INCREMENT de la tabla `providers`
--
ALTER TABLE `providers`
  MODIFY `id_provider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12235;

--
-- AUTO_INCREMENT de la tabla `salesproducts`
--
ALTER TABLE `salesproducts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
