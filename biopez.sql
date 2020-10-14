-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2020 a las 07:06:17
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biopez`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `biometrico`
--

CREATE TABLE `biometrico` (
  `ID_bio` int(11) NOT NULL,
  `Especie` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Estan` int(11) NOT NULL,
  `pMuestra` int(11) NOT NULL,
  `PecesTanque` int(11) NOT NULL,
  `Peso` decimal(10,2) NOT NULL,
  `Tamano` decimal(10,2) NOT NULL,
  `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp(),
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cookies`
--

CREATE TABLE `cookies` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `marca` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cookies`
--

INSERT INTO `cookies` (`ID`, `ID_user`, `marca`) VALUES
(54, 3, '3547638'),
(57, 2, '1670316'),
(59, 2, '5769126');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especies`
--

CREATE TABLE `especies` (
  `ID_Espe` int(11) NOT NULL,
  `Especie` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especies`
--

INSERT INTO `especies` (`ID_Espe`, `Especie`, `Estado`) VALUES
(1, 'Tilapia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanques`
--

CREATE TABLE `estanques` (
  `ID_Estan` int(11) NOT NULL,
  `NoEstanque` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Espe` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_Finca` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fincas`
--

CREATE TABLE `fincas` (
  `ID_fn` int(11) NOT NULL,
  `Finca` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `Estado` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametrosagua`
--

CREATE TABLE `parametrosagua` (
  `ID` int(11) NOT NULL,
  `Indicador` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `menor` decimal(10,2) DEFAULT NULL,
  `Equilibrio` decimal(10,2) DEFAULT NULL,
  `Mayor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parametrosagua`
--

INSERT INTO `parametrosagua` (`ID`, `Indicador`, `menor`, `Equilibrio`, `Mayor`) VALUES
(1, 'Alcalinidad', '120.00', NULL, '280.00'),
(2, 'Osigeno', '5.00', '6.00', '9.00'),
(3, 'Floculos', '15.00', '25.00', '40.00'),
(4, 'Dureza', '550.00', NULL, '600.00'),
(5, 'Nitrato', '50.00', NULL, '150.00'),
(6, 'Nitrito', '0.10', NULL, '0.30'),
(7, 'pH', '7.40', NULL, '8.00'),
(8, 'TAN', '0.00', NULL, '0.50'),
(9, 'Solidos', '600.00', NULL, '1500.00'),
(10, 'Temperatura', '22.00', '26.00', '34.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rangos`
--

CREATE TABLE `rangos` (
  `ID_ra` int(11) NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rangos`
--

INSERT INTO `rangos` (`ID_ra`, `Descripcion`, `Estado`) VALUES
(1, 'Admin', 1),
(2, 'Supervisor', 1),
(3, 'Consultor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `siembras`
--

CREATE TABLE `siembras` (
  `ID_Siem` int(11) NOT NULL,
  `FechaSiembra` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `NoEstanque` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Especie` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `AgualLts` decimal(10,2) NOT NULL,
  `SiembraQty` int(11) NOT NULL,
  `Tamano` decimal(10,2) NOT NULL,
  `ID_Finca` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Clave` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `FechaRegistro` date NOT NULL DEFAULT current_timestamp(),
  `Rol` int(11) NOT NULL,
  `Estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Correo`, `Clave`, `FechaRegistro`, `Rol`, `Estado`) VALUES
(2, 'Juan Carlos Hernandez', 'juan@gmail.com', '6116afedcb0bc31083935c1c262ff4c9', '2020-09-20', 1, 1),
(3, 'Albert Rodriguez', 'albherth5@gmail.com', '6116afedcb0bc31083935c1c262ff4c9', '2020-09-20', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `biometrico`
--
ALTER TABLE `biometrico`
  ADD PRIMARY KEY (`ID_bio`),
  ADD KEY `ID_Estan` (`ID_Estan`);

--
-- Indices de la tabla `cookies`
--
ALTER TABLE `cookies`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `cookies_ibfk_1` (`ID_user`);

--
-- Indices de la tabla `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`ID_Espe`);

--
-- Indices de la tabla `estanques`
--
ALTER TABLE `estanques`
  ADD PRIMARY KEY (`ID_Estan`),
  ADD KEY `estanques_ibfk_1` (`ID_Finca`),
  ADD KEY `ID_Espe` (`ID_Espe`);

--
-- Indices de la tabla `fincas`
--
ALTER TABLE `fincas`
  ADD PRIMARY KEY (`ID_fn`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `parametrosagua`
--
ALTER TABLE `parametrosagua`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `rangos`
--
ALTER TABLE `rangos`
  ADD PRIMARY KEY (`ID_ra`);

--
-- Indices de la tabla `siembras`
--
ALTER TABLE `siembras`
  ADD PRIMARY KEY (`ID_Siem`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Rol` (`Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `biometrico`
--
ALTER TABLE `biometrico`
  MODIFY `ID_bio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cookies`
--
ALTER TABLE `cookies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `ID_Espe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estanques`
--
ALTER TABLE `estanques`
  MODIFY `ID_Estan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fincas`
--
ALTER TABLE `fincas`
  MODIFY `ID_fn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `parametrosagua`
--
ALTER TABLE `parametrosagua`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rangos`
--
ALTER TABLE `rangos`
  MODIFY `ID_ra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `siembras`
--
ALTER TABLE `siembras`
  MODIFY `ID_Siem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `biometrico`
--
ALTER TABLE `biometrico`
  ADD CONSTRAINT `biometrico_ibfk_1` FOREIGN KEY (`ID_Estan`) REFERENCES `estanques` (`ID_Estan`);

--
-- Filtros para la tabla `cookies`
--
ALTER TABLE `cookies`
  ADD CONSTRAINT `cookies_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `usuarios` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estanques`
--
ALTER TABLE `estanques`
  ADD CONSTRAINT `estanques_ibfk_1` FOREIGN KEY (`ID_Finca`) REFERENCES `fincas` (`ID_fn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estanques_ibfk_2` FOREIGN KEY (`ID_Espe`) REFERENCES `especies` (`ID_Espe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fincas`
--
ALTER TABLE `fincas`
  ADD CONSTRAINT `fincas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `siembras`
--
ALTER TABLE `siembras`
  ADD CONSTRAINT `siembras_ibfk_1` FOREIGN KEY (`ID_Siem`) REFERENCES `estanques` (`ID_Estan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `rangos` (`ID_ra`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
