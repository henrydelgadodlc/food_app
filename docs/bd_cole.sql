-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2020 a las 00:21:08
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cole`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `Id_Asistencia` int(11) NOT NULL,
  `Id_Mc` int(11) NOT NULL,
  `Entrada` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Salida` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `Id_cursos` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Tc` int(11) NOT NULL,
  `Id_Asiste` int(11) NOT NULL,
  `Fecha_inicio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_final` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Detalle` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `Docente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Lunes` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Martes` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Miercoles` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Jueves` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Viernes` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Sabado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Domingo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Costo_curso` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_curso`
--

CREATE TABLE `c_curso` (
  `Id_categoria` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `c_curso`
--

INSERT INTO `c_curso` (`Id_categoria`, `Nombre`) VALUES
(1, 'Taller'),
(2, 'Conferencias'),
(3, 'Curso Interno'),
(4, 'Curso Externo'),
(7, 'Santa Victoria'),
(8, 'Santa Victoria'),
(9, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula_curso`
--

CREATE TABLE `matricula_curso` (
  `Id_Mc` int(11) NOT NULL,
  `Id_Curso` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_sede` int(11) NOT NULL,
  `Fecha_Matricula` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `Id_sede` int(11) NOT NULL,
  `Direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`Id_sede`, `Direccion`) VALUES
(3, 'Santa Victoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_user`
--

CREATE TABLE `tipo_user` (
  `Id_User` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Detalle` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_user`
--

INSERT INTO `tipo_user` (`Id_User`, `Nombre`, `Detalle`) VALUES
(7, 'Admin', 'Control total del sistema'),
(8, 'Cursos Externos', 'Control Total del sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Dni` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Tu` int(11) NOT NULL,
  `Ref_Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Ref_Celular` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_Miembro` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `Dni`, `Nombre`, `Apellido`, `Direccion`, `Telefono`, `Id_Tu`, `Ref_Nombre`, `Ref_Celular`, `Tipo_Miembro`) VALUES
(7, '70805960', 'Cursos Externos', 'delgado', 'la victoria', '147852963', 7, 'delgado', '478965345', 'Miembro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`Id_Asistencia`),
  ADD KEY `Id_Mc` (`Id_Mc`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`Id_cursos`),
  ADD KEY `Id_Tc` (`Id_Tc`),
  ADD KEY `Id_Asiste` (`Id_Asiste`);

--
-- Indices de la tabla `c_curso`
--
ALTER TABLE `c_curso`
  ADD PRIMARY KEY (`Id_categoria`);

--
-- Indices de la tabla `matricula_curso`
--
ALTER TABLE `matricula_curso`
  ADD PRIMARY KEY (`Id_Mc`),
  ADD KEY `Id_Curso` (`Id_Curso`),
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `Id_sede` (`Id_sede`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`Id_sede`);

--
-- Indices de la tabla `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`Id_User`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Id_Tu` (`Id_Tu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `Id_Asistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `Id_cursos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `c_curso`
--
ALTER TABLE `c_curso`
  MODIFY `Id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `matricula_curso`
--
ALTER TABLE `matricula_curso`
  MODIFY `Id_Mc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `Id_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`Id_Tc`) REFERENCES `c_curso` (`Id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`Id_Asiste`) REFERENCES `asistencia` (`Id_Asistencia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `matricula_curso`
--
ALTER TABLE `matricula_curso`
  ADD CONSTRAINT `matricula_curso_ibfk_1` FOREIGN KEY (`Id_Curso`) REFERENCES `cursos` (`Id_cursos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matricula_curso_ibfk_2` FOREIGN KEY (`Id_sede`) REFERENCES `sedes` (`Id_sede`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matricula_curso_ibfk_3` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Id_Tu`) REFERENCES `tipo_user` (`Id_User`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
