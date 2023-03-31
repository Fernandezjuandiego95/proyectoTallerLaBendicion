-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2023 a las 22:47:44
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
-- Base de datos: `tallerlabendicion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `idestado` int(2) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `idmodulo` int(11) NOT NULL,
  `modulo` varchar(60) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos_permisos`
--

CREATE TABLE `modulos_permisos` (
  `idmodulo_permiso` int(2) NOT NULL,
  `idmodulo2` int(2) NOT NULL,
  `idpermiso2` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` int(2) NOT NULL,
  `permiso` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` int(2) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `rol`) VALUES
(1, 'administrador'),
(2, 'Empleado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_modulos`
--

CREATE TABLE `roles_modulos` (
  `idrole_modulo` int(2) NOT NULL,
  `idrol2` int(2) NOT NULL,
  `idmodulo1` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cedula` bigint(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `celular` bigint(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idrol1` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombre`, `apellido`, `direccion`, `celular`, `password`, `idrol1`) VALUES
(1005646517, 'Diego', 'Barrios', 'Albania', 3154355938, '$2y$10$YOll6e33ue8IE3URJ5mGBuII6SAbDDBKDAecY.P6yjY7jvdx2lm8K', 2),
(1005649691, 'Juan', 'Fernandez', 'sincelejo/plaza-majagual', 3017256135, '$2y$10$YOll6e33ue8IE3URJ5mGBuII6SAbDDBKDAecY.P6yjY7jvdx2lm8K', 1),
(1005661372, 'Moises', 'mendez', 'carr55 25b 76', 3004320257, '$2y$10$YOll6e33ue8IE3URJ5mGBuII6SAbDDBKDAecY.P6yjY7jvdx2lm8K', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_permisos`
--

CREATE TABLE `usuarios_permisos` (
  `idusuario_permiso` int(2) NOT NULL,
  `cedula1` bigint(10) NOT NULL,
  `idpermiso1` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `placa` varchar(6) NOT NULL,
  `color` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `cedula2` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos_estados`
--

CREATE TABLE `vehiculos_estados` (
  `idvehicul_estado` int(4) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `diagnostico_entrada` varchar(150) NOT NULL,
  `fecha_salida` date NOT NULL,
  `diagnostico_salida` varchar(150) NOT NULL,
  `placa1` varchar(6) NOT NULL,
  `idestado1` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `modulos_permisos`
--
ALTER TABLE `modulos_permisos`
  ADD PRIMARY KEY (`idmodulo_permiso`),
  ADD KEY `idmodulo2` (`idmodulo2`),
  ADD KEY `idpermiso2` (`idpermiso2`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `roles_modulos`
--
ALTER TABLE `roles_modulos`
  ADD PRIMARY KEY (`idrole_modulo`),
  ADD KEY `idrol2` (`idrol2`),
  ADD KEY `idmodulo1` (`idmodulo1`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `idrol1` (`idrol1`);

--
-- Indices de la tabla `usuarios_permisos`
--
ALTER TABLE `usuarios_permisos`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `cedula1` (`cedula1`),
  ADD KEY `idpermiso1` (`idpermiso1`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`placa`),
  ADD KEY `cedula2` (`cedula2`);

--
-- Indices de la tabla `vehiculos_estados`
--
ALTER TABLE `vehiculos_estados`
  ADD PRIMARY KEY (`idvehicul_estado`),
  ADD KEY `placa1` (`placa1`),
  ADD KEY `idestado1` (`idestado1`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `idestado` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulos_permisos`
--
ALTER TABLE `modulos_permisos`
  MODIFY `idmodulo_permiso` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles_modulos`
--
ALTER TABLE `roles_modulos`
  MODIFY `idrole_modulo` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_permisos`
--
ALTER TABLE `usuarios_permisos`
  MODIFY `idusuario_permiso` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculos_estados`
--
ALTER TABLE `vehiculos_estados`
  MODIFY `idvehicul_estado` int(4) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modulos_permisos`
--
ALTER TABLE `modulos_permisos`
  ADD CONSTRAINT `modulos_permisos_ibfk_1` FOREIGN KEY (`idpermiso2`) REFERENCES `permisos` (`idpermiso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `modulos_permisos_ibfk_2` FOREIGN KEY (`idmodulo2`) REFERENCES `modulos` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles_modulos`
--
ALTER TABLE `roles_modulos`
  ADD CONSTRAINT `roles_modulos_ibfk_1` FOREIGN KEY (`idrol2`) REFERENCES `roles` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_modulos_ibfk_2` FOREIGN KEY (`idmodulo1`) REFERENCES `modulos` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idrol1`) REFERENCES `roles` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_permisos`
--
ALTER TABLE `usuarios_permisos`
  ADD CONSTRAINT `usuarios_permisos_ibfk_1` FOREIGN KEY (`cedula1`) REFERENCES `usuarios` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_permisos_ibfk_2` FOREIGN KEY (`idpermiso1`) REFERENCES `permisos` (`idpermiso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`cedula2`) REFERENCES `usuarios` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculos_estados`
--
ALTER TABLE `vehiculos_estados`
  ADD CONSTRAINT `vehiculos_estados_ibfk_1` FOREIGN KEY (`idestado1`) REFERENCES `estados` (`idestado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculos_estados_ibfk_2` FOREIGN KEY (`placa1`) REFERENCES `vehiculo` (`placa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
