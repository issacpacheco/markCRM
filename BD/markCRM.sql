CREATE TABLE `almacen_productos`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_producto` int(10) NULL,
  `id_almacen` int(10) NULL,
  `cantidad` double NULL,
  `precio_compra` double NULL,
  `porcentaje_ganancia` int(10) NULL,
  `iva` int(10) NULL,
  `precio_venta` double NULL,
  `mod_fecha_entrada` date NULL,
  `mod_hora_entrada` time NULL,
  `mod_fecha_salida` date NULL,
  `mod_hora_salida` time NULL,
  `mod_id_usuario` int NULL,
  `id_categoria` int(10) NULL,
  `id_estatus` int(10) NULL,
  `numero_serie` varchar(75) NULL,
  `sku` varchar(75) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `almacenes`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) NULL,
  `descripcion` varchar(150) NULL,
  `estatus` int(10) NULL,
  `id_empresa` int(10) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `areas`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) NULL,
  `estatus` int(10) NULL,
  `id_empresa` int(10) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `categorias`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) NULL,
  `id_empresa` int(10) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `clientes`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) NULL,
  `apellido_paterno` varchar(75) NULL,
  `apellido_materno` varchar(75) NULL,
  `edad` int(10) NULL,
  `fch_nacimiento` date NULL,
  `genero` int(10) NULL,
  `telefono` varchar(75) NULL,
  `correo` varchar(255) NULL,
  `estatus` int(10) NULL,
  `id_prospecto` int(10) NULL,
  `fch_registro` date NULL,
  `hra_registro` time NULL,
  `id_usuario_alta` int(10) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `cotizaciones`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_registro` date NULL,
  `hora_registro` time NULL,
  `comentarios` varchar(255) NULL,
  `id_prospecto` int(255) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `cotizaciones_detalle`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_cotizacion` int(10) NULL,
  `id_producto` int(10) NULL,
  `cantidad` double(10, 2) NULL,
  `total` double(10, 2) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `empresas`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NULL,
  `descripcion` varchar(255) NULL,
  `estatus` int(2) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `niveles`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `productos`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NULL,
  `descripcion` varchar(255) NULL,
  `fecha_registro` date NULL,
  `hora_registro` time NULL,
  `id_usuario_alta` int(10) NULL,
  `id_area` int(10) NULL,
  `id_unidad` int(10) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `prospectos`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) NULL,
  `apellido_paterno` varchar(75) NULL,
  `apellido_materno` varchar(75) NULL,
  `edad` int(10) NULL,
  `fch_nacimiento` date NULL,
  `genero` int(10) NULL,
  `comentarios` varchar(255) NULL,
  `id_usuario` int(10) NULL,
  `correo` varchar(100) NULL,
  `telefono` varchar(75) NULL,
  `estatus` int(10) NULL,
  `fch_registro` date NULL,
  `hra_registro` time NULL,
  `id_usuario_alta` int(10) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `unidades_medida`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(85) NULL,
  `abreviacion` varchar(50) NULL,
  `id_empresa` int(10) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `usuarios`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NULL,
  `usuario` varchar(75) NULL,
  `contraseña` varchar(255) NULL,
  `nivel` int(10) NULL,
  `fch_ultima_conexion` date NULL,
  `hra_ultima_conexion` time NULL,
  `id_empresa` int(10) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `ventas`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_cotizacion` int(10) NULL,
  `fch_venta` date NULL,
  `hra_venta` time NULL,
  `id_usuario` int(10) NULL,
  `total_venta` double NULL,
  `total_pagado` double NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `ventas_detalle`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_venta` int(10) NULL,
  `id_producto` int(10) NULL,
  `cantidad` double(10, 2) NULL,
  `total` double(10, 2) NULL,
  PRIMARY KEY (`id`)
);

