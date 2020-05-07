


--
-- Base de datos: `db_cole`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `Id_Asistencia` int(11) NOT NULL,
  `Id_usuario` int(11) DEFAULT NULL,
  `Entrada` datetime NOT NULL,
  `Salida` datetime NOT NULL,
  `Fecha` varchar(13) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asistencia`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenciae`
--

CREATE TABLE `asistenciae` (
  `Id_Ae` int(11) NOT NULL,
  `Dni` int(11) NOT NULL,
  `Detalle_as` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Entrada_as` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Salida_as` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `Id_cursos` int(11) NOT NULL,
  `Nombre_curso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Id_categoria` int(11) NOT NULL,
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

--
-- Volcado de datos para la tabla `cursos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_curso`
--

CREATE TABLE `c_curso` (
  `Id_categoria` int(11) NOT NULL,
  `Nombre_c` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `c_curso`
--

INSERT INTO `c_curso` (`Id_categoria`, `Nombre_c`) VALUES
(1, 'Interno'),
(3, 'Externo'),
(4, 'Conferencia'),
(5, 'Taller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula_curso`
--

CREATE TABLE `matricula_curso` (
  `Id_Mc` int(11) NOT NULL,
  `Id_Curso` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_sede` int(11) NOT NULL,
  `Fecha_Matricula` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `matricula_curso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `Direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Id_sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`Direccion`, `Id_sede`) VALUES
('Salaverry', 3),
('Santa Victoria', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Dni` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Ref_Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Ref_Celular` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `Miembro` int(11) NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_sangre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `Dni`, `Apellido`, `Direccion`, `Telefono`, `Ref_Nombre`, `Ref_Celular`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`, `Miembro`, `correo`, `tipo_sangre`, `fecha_nacimiento`) VALUES
(1, '', '', '', '', '', '', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'hrmoigo1.png', 1, '2020-03-04 14:56:09', 0, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(2, 'Especial', 2, 1),
(3, 'Alumno', 3, 1),
(4, 'Miembro', 4, 1),
(5, 'Escolastica', 5, 1),
(6, 'Seguridad', 6, 1),
(7, 'Docente', 7, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`Id_Asistencia`),
  ADD KEY `Id_usuario` (`Id_usuario`);

--
-- Indices de la tabla `asistenciae`
--
ALTER TABLE `asistenciae`
  ADD PRIMARY KEY (`Id_Ae`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`Id_cursos`),
  ADD KEY `Id_categoria` (`Id_categoria`),
  ADD KEY `Docente` (`Docente`);

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_level` (`user_level`),
  ADD KEY `Dni` (`Dni`);

--
-- Indices de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `Id_Asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `Id_cursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `c_curso`
--
ALTER TABLE `c_curso`
  MODIFY `Id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `matricula_curso`
--
ALTER TABLE `matricula_curso`
  MODIFY `Id_Mc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `Id_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `matricula_curso` (`Id_Mc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`Id_categoria`) REFERENCES `c_curso` (`Id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`Docente`) REFERENCES `users` (`Dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `matricula_curso`
--
ALTER TABLE `matricula_curso`
  ADD CONSTRAINT `matricula_curso_ibfk_1` FOREIGN KEY (`Id_Curso`) REFERENCES `cursos` (`Id_cursos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matricula_curso_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matricula_curso_ibfk_3` FOREIGN KEY (`Id_sede`) REFERENCES `sedes` (`Id_sede`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

