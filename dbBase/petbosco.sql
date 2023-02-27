@@ -3,7 +3,7 @@
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-02-2023 a las 03:04:12
-- Tiempo de generación: 27-02-2023 a las 23:23:30
-- Versión del servidor: 5.7.33
-- Versión de PHP: 8.1.9

@@ -24,16 +24,28 @@ SET time_zone = "+00:00";
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
-- Estructura de tabla para la tabla `citacliente`
--

CREATE TABLE `citas` (
  `id_cita` int(20) NOT NULL,
  `fechaHora` datetime NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `fk_cliente` int(20) NOT NULL,
CREATE TABLE `citacliente` (
  `id_citaCliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `fk_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citaveterinario`
--

CREATE TABLE `citaveterinario` (
  `id_cita` int(11) NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `fk_veterinario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

@@ -42,15 +54,21 @@ CREATE TABLE `citas` (
--

CREATE TABLE `cliente` (
  `id_cliente` int(20) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `fechaNac` date NOT NULL,
  `dui` int(9) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `num_telefonico` int(10) NOT NULL,
  `fk_pago` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  `num_telefonico` varchar(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `DUI` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `fechaNac`, `num_telefonico`, `direccion`, `DUI`) VALUES
(1, 'ale', 'jimenez', '2023-02-14', '22866916', 'mi casa', '12345678900');

-- --------------------------------------------------------

@@ -59,22 +77,31 @@ CREATE TABLE `cliente` (
--

CREATE TABLE `clinicavet` (
  `id_clinica` int(20) NOT NULL,
  `num_telefonico` varchar(20) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `fk_veterinario` int(11) NOT NULL
  `id_clinicaVet` int(11) NOT NULL,
  `nombreVeterinaria` varchar(11) NOT NULL,
  `numTelefonico` varchar(11) NOT NULL,
  `direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clinicavet`
--

INSERT INTO `clinicavet` (`id_clinicaVet`, `nombreVeterinaria`, `numTelefonico`, `direccion`) VALUES
(1, 'PetBosco', '1234245', 'una casa y giro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id_expediente` int(20) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  `fecha` date NOT NULL,
  `id_expediente` int(11) NOT NULL,
  `fk_reporteMedico` int(11) NOT NULL,
  `fk_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

@@ -84,16 +111,35 @@ CREATE TABLE `expediente` (

CREATE TABLE `mascota` (
  `id_mascota` int(11) NOT NULL,
  `apodo` varchar(100) NOT NULL,
  `especie` varchar(100) NOT NULL,
  `raza` varchar(100) NOT NULL,
  `color` varchar(60) NOT NULL,
  `altura` double NOT NULL,
  `peso` double NOT NULL,
  `condición_mascota` varchar(255) NOT NULL,
  `fechaNac` date NOT NULL,
  `fk_cliente` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  `Apodo_mascota` varchar(200) NOT NULL,
  `raza` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `Altura` varchar(200) NOT NULL,
  `condicionMascota` varchar(200) NOT NULL,
  `Peso` varchar(200) NOT NULL,
  `FechaNac` date NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `especie` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id_mascota`, `Apodo_mascota`, `raza`, `color`, `Altura`, `condicionMascota`, `Peso`, `FechaNac`, `fk_cliente`, `especie`) VALUES
(1, 'michus', 'gato', 'negro', '100cm', 'ningun medicamento', '12kg', '2023-02-23', 1, 'anaranjado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedero`
--

CREATE TABLE `monedero` (
  `id_monedero` int(11) NOT NULL,
  `saldoDisp` decimal(3,2) NOT NULL,
  `tarjetaOcupada` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

@@ -102,10 +148,13 @@ CREATE TABLE `mascota` (
--

CREATE TABLE `pago` (
  `id_pago` int(20) NOT NULL,
  `IDpago` int(11) NOT NULL,
  `montoTotal` decimal(3,2) NOT NULL,
  `fecha` date NOT NULL,
  `montoTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  `fk_cliente` int(11) NOT NULL,
  `fk_veterinario` int(11) NOT NULL,
  `fk_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

@@ -114,12 +163,12 @@ CREATE TABLE `pago` (
--

CREATE TABLE `reportemedico` (
  `id_reporte` int(20) NOT NULL,
  `chequeoGeneral` varchar(255) NOT NULL,
  `medicamento` varchar(255) NOT NULL,
  `tratamiento` varchar(255) NOT NULL,
  `fk_expediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  `Tratamiento` varchar(200) NOT NULL,
  `Medicamento` varchar(200) NOT NULL,
  `ChequeoGeneral` varchar(200) NOT NULL,
  `fechaReporte` date NOT NULL,
  `id_reporteMedico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

@@ -128,172 +177,193 @@ CREATE TABLE `reportemedico` (
--

CREATE TABLE `veterinario` (
  `id_veterinario` int(20) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `fechaNac` date NOT NULL,
  `especialidad` varchar(255) NOT NULL,
  `num_telefonico` int(11) NOT NULL,
  `fk_mascota` int(20) NOT NULL,
  `fk_reporteMedico` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  `Especialidad` varchar(200) NOT NULL,
  `Nombres` varchar(200) NOT NULL,
  `Apellidos` varchar(200) NOT NULL,
  `num_telefonico` varchar(11) NOT NULL,
  `id_veterinario` int(11) NOT NULL,
  `fk_mascota` int(11) NOT NULL,
  `fk_clinicaVeterinario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`fechaNac`, `Especialidad`, `Nombres`, `Apellidos`, `num_telefonico`, `id_veterinario`, `fk_mascota`, `fk_clinicaVeterinario`) VALUES
('2023-02-12', 'e', 'pedrito', 'aguilar', '12345', 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
-- Indices de la tabla `citacliente`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `fk_cliente` (`fk_cliente`),
  ADD KEY `fk_veterinario` (`fk_veterinario`);
ALTER TABLE `citacliente`
  ADD PRIMARY KEY (`id_citaCliente`),
  ADD KEY `fk_agendarCitasCliente` (`fk_cliente`);

--
-- Indices de la tabla `citaveterinario`
--
ALTER TABLE `citaveterinario`
  ADD KEY `fk_veterinarioCita` (`fk_veterinario`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_pago` (`fk_pago`);
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `clinicavet`
--
ALTER TABLE `clinicavet`
  ADD PRIMARY KEY (`id_clinica`),
  ADD KEY `fk_veterinario` (`fk_veterinario`);
  ADD PRIMARY KEY (`id_clinicaVet`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id_expediente`);
  ADD PRIMARY KEY (`id_expediente`),
  ADD KEY `fk_reporteExpediente` (`fk_reporteMedico`),
  ADD KEY `fk_mascotaExpediente` (`fk_mascota`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `fk_clienteMascota` (`fk_cliente`),
  ADD KEY `fk_cliente` (`fk_cliente`);
  ADD KEY `fk_clienteMascota` (`fk_cliente`);

--
-- Indices de la tabla `monedero`
--
ALTER TABLE `monedero`
  ADD PRIMARY KEY (`id_monedero`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`);
  ADD PRIMARY KEY (`IDpago`),
  ADD KEY `fk_clientePago` (`fk_cliente`),
  ADD KEY `fk_veterinarioPago` (`fk_veterinario`),
  ADD KEY `fk_mascotaPago` (`fk_mascota`);

--
-- Indices de la tabla `reportemedico`
--
ALTER TABLE `reportemedico`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `fk_reporteMedico` (`fk_expediente`);
  ADD PRIMARY KEY (`id_reporteMedico`);

--
-- Indices de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id_veterinario`),
  ADD KEY `fk_mascota` (`fk_mascota`),
  ADD KEY `fk_reporteMedico` (`fk_reporteMedico`);
  ADD KEY `fk_mascotaVet` (`fk_mascota`),
  ADD KEY `fk_clinicaVeterinariaVeterinario` (`fk_clinicaVeterinario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
-- AUTO_INCREMENT de la tabla `citacliente`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(20) NOT NULL AUTO_INCREMENT;
ALTER TABLE `citacliente`
  MODIFY `id_citaCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(20) NOT NULL AUTO_INCREMENT;
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clinicavet`
--
ALTER TABLE `clinicavet`
  MODIFY `id_clinica` int(20) NOT NULL AUTO_INCREMENT;
  MODIFY `id_clinicaVet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id_expediente` int(20) NOT NULL AUTO_INCREMENT;
  MODIFY `id_expediente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT;
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(20) NOT NULL AUTO_INCREMENT;
  MODIFY `IDpago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportemedico`
--
ALTER TABLE `reportemedico`
  MODIFY `id_reporte` int(20) NOT NULL AUTO_INCREMENT;
  MODIFY `id_reporteMedico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id_veterinario` int(20) NOT NULL AUTO_INCREMENT;
  MODIFY `id_veterinario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
-- Filtros para la tabla `citacliente`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_clienteCitas` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `fk_veterinarioCitas` FOREIGN KEY (`fk_veterinario`) REFERENCES `veterinario` (`id_veterinario`);
ALTER TABLE `citacliente`
  ADD CONSTRAINT `fk_agendarCitasCliente` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
-- Filtros para la tabla `citaveterinario`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_pago` FOREIGN KEY (`fk_pago`) REFERENCES `pago` (`id_pago`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `citaveterinario`
  ADD CONSTRAINT `fk_veterinarioCita` FOREIGN KEY (`fk_veterinario`) REFERENCES `veterinario` (`id_veterinario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clinicavet`
-- Filtros para la tabla `expediente`
--
ALTER TABLE `clinicavet`
  ADD CONSTRAINT `fk_veterinario` FOREIGN KEY (`fk_veterinario`) REFERENCES `veterinario` (`id_veterinario`);
ALTER TABLE `expediente`
  ADD CONSTRAINT `fk_mascotaExpediente` FOREIGN KEY (`fk_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reporteExpediente` FOREIGN KEY (`fk_reporteMedico`) REFERENCES `reportemedico` (`id_reporteMedico`);

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
  ADD CONSTRAINT `fk_clienteMascota` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reportemedico`
-- Filtros para la tabla `pago`
--
ALTER TABLE `reportemedico`
  ADD CONSTRAINT `fk_expediente` FOREIGN KEY (`fk_expediente`) REFERENCES `expediente` (`id_expediente`);
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_clientePago` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mascotaPago` FOREIGN KEY (`fk_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_veterinarioPago` FOREIGN KEY (`fk_veterinario`) REFERENCES `veterinario` (`id_veterinario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD CONSTRAINT `fk_mascota` FOREIGN KEY (`fk_mascota`) REFERENCES `mascota` (`id_mascota`),
  ADD CONSTRAINT `fk_reporteMedico` FOREIGN KEY (`fk_reporteMedico`) REFERENCES `reportemedico` (`id_reporte`);
  ADD CONSTRAINT `fk_clinicaVeterinariaVeterinario` FOREIGN KEY (`fk_clinicaVeterinario`) REFERENCES `clinicavet` (`id_clinicaVet`),
  ADD CONSTRAINT `fk_mascotaVet` FOREIGN KEY (`fk_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;