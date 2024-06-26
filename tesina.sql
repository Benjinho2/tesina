-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2024 a las 13:44:31
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
-- Base de datos: `tesina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_riego`
--

CREATE TABLE `configuracion_riego` (
  `id_configuracion` int(11) NOT NULL,
  `id_dispositivo` int(11) NOT NULL,
  `nivel_minimo_humedad` decimal(10,0) NOT NULL,
  `nivel_maximo_humedad` decimal(10,0) NOT NULL,
  `duracion_riego` decimal(10,0) NOT NULL,
  `intervalo_riego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `configuracion_riego`
--

INSERT INTO `configuracion_riego` (`id_configuracion`, `id_dispositivo`, `nivel_minimo_humedad`, `nivel_maximo_humedad`, `duracion_riego`, `intervalo_riego`) VALUES
(1, 0, 421, 234, 234, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos`
--

CREATE TABLE `dispositivos` (
  `id_dispositivo` int(11) NOT NULL,
  `nombre_dispositivo` varchar(50) NOT NULL,
  `id_tipo_dispositivo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lecturas_humedad`
--

CREATE TABLE `lecturas_humedad` (
  `id_lectura` int(11) NOT NULL,
  `id_dispositivo` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `nivel_humedad` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planta`
--

CREATE TABLE `planta` (
  `id_planta` int(11) NOT NULL,
  `nombre_planta` varchar(30) NOT NULL,
  `id_tipo_planta` int(11) NOT NULL,
  `id_ubi` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_riegos`
--

CREATE TABLE `registro_riegos` (
  `id_registro` int(11) NOT NULL,
  `id_dispositivo` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `duracion_riego` decimal(10,0) NOT NULL,
  `cantidad_agua` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_dispositivos`
--

CREATE TABLE `tipos_dispositivos` (
  `id_tipo_dispositivo` int(11) NOT NULL,
  `tipo_dispositivo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_planta`
--

CREATE TABLE `tipos_planta` (
  `id_tipo_planta` int(11) NOT NULL,
  `tipo_planta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubi` int(11) NOT NULL,
  `lugar_planta` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `email` varchar(75) NOT NULL,
  `contraseña` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_completo`, `email`, `contraseña`) VALUES
(34, 'Thiago Comba', 'thiago@gmail.com', '$2y$10$hnNEghh1ofTeZVSpPzJ0KOq3CVJWr9D9HDwAHip7wU.tfE10EanFy'),
(35, 'nahuel', 'nahuelalvarez@gmail.com', '$2y$10$XSmoCNLFKE4la16sLrXUlulVvaePnPyufGxF3cpKze.GKOS8vxmPi'),
(36, 'nahuel', 'nahuelalvarez5@gmail.com', '$2y$10$yNoJeziZb7cSLfQQZcyl5.tB5UG7HAfeAIv3JIGykHetR.KeYg8ja');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracion_riego`
--
ALTER TABLE `configuracion_riego`
  ADD PRIMARY KEY (`id_configuracion`),
  ADD KEY `id_dispositivo` (`id_dispositivo`);

--
-- Indices de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`id_dispositivo`),
  ADD KEY `id_tipo_dispositivo` (`id_tipo_dispositivo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `lecturas_humedad`
--
ALTER TABLE `lecturas_humedad`
  ADD PRIMARY KEY (`id_lectura`),
  ADD KEY `id_dispositivo` (`id_dispositivo`);

--
-- Indices de la tabla `planta`
--
ALTER TABLE `planta`
  ADD PRIMARY KEY (`id_planta`),
  ADD KEY `id_tipo_planta` (`id_tipo_planta`),
  ADD KEY `id_ubi` (`id_ubi`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `registro_riegos`
--
ALTER TABLE `registro_riegos`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_dispositivo` (`id_dispositivo`);

--
-- Indices de la tabla `tipos_dispositivos`
--
ALTER TABLE `tipos_dispositivos`
  ADD PRIMARY KEY (`id_tipo_dispositivo`);

--
-- Indices de la tabla `tipos_planta`
--
ALTER TABLE `tipos_planta`
  ADD PRIMARY KEY (`id_tipo_planta`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubi`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuracion_riego`
--
ALTER TABLE `configuracion_riego`
  MODIFY `id_configuracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `id_dispositivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lecturas_humedad`
--
ALTER TABLE `lecturas_humedad`
  MODIFY `id_lectura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planta`
--
ALTER TABLE `planta`
  MODIFY `id_planta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_riegos`
--
ALTER TABLE `registro_riegos`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_dispositivos`
--
ALTER TABLE `tipos_dispositivos`
  MODIFY `id_tipo_dispositivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_planta`
--
ALTER TABLE `tipos_planta`
  MODIFY `id_tipo_planta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `configuracion_riego`
--
ALTER TABLE `configuracion_riego`
  ADD CONSTRAINT `configuracion_riego_ibfk_1` FOREIGN KEY (`id_dispositivo`) REFERENCES `dispositivos` (`id_dispositivo`);

--
-- Filtros para la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD CONSTRAINT `dispositivos_ibfk_1` FOREIGN KEY (`id_tipo_dispositivo`) REFERENCES `tipos_dispositivos` (`id_tipo_dispositivo`),
  ADD CONSTRAINT `dispositivos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `lecturas_humedad`
--
ALTER TABLE `lecturas_humedad`
  ADD CONSTRAINT `lecturas_humedad_ibfk_1` FOREIGN KEY (`id_dispositivo`) REFERENCES `dispositivos` (`id_dispositivo`);

--
-- Filtros para la tabla `planta`
--
ALTER TABLE `planta`
  ADD CONSTRAINT `planta_ibfk_1` FOREIGN KEY (`id_tipo_planta`) REFERENCES `tipos_planta` (`id_tipo_planta`),
  ADD CONSTRAINT `planta_ibfk_2` FOREIGN KEY (`id_ubi`) REFERENCES `ubicacion` (`id_ubi`),
  ADD CONSTRAINT `planta_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `registro_riegos`
--
ALTER TABLE `registro_riegos`
  ADD CONSTRAINT `registro_riegos_ibfk_1` FOREIGN KEY (`id_dispositivo`) REFERENCES `dispositivos` (`id_dispositivo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
